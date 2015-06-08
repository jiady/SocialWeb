<?php

class Userinfo_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function getInfo($id) {
    	$query="SELECT * FROM user WHERE uid=".$this->db->escape($id);
    	return $this->db->query($query)->row_array();
    }

    function getID($input) {
        $query="SELECT uid FROM user WHERE uid=".$this->db->escape($input)." OR name=".$this->db->escape($input);
        $res=$this->db->query($query);
        return $res->result();
    }

    function updateInfo($id, $newInfo) {
    	$this->db->where('uid',$id);
        $this->db->update('user',$newInfo);
    	if ($this->db->affected_rows()==0)
    		return false;
    	return true;
    }

    function addImage($id, $image_url) {
        $query="SELECT MAX(seq)+1 AS n FROM usergallery WHERE uid=".$this->db->escape($id);
        $seq=$this->db->query($query)->row()->n;
        $insert="INSERT INTO usergallery(uid,seq,pic_type,url) VALUES(".$this->db->escape($id).",".$this->db->escape($seq).", 'jpg',".$this->db->escape($image_url).")";
        $this->db->query($insert);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function deleteImage($uid,$gid) {
        $delete="DELETE FROM usergallery WHERE uid=".$this->db->escape($uid)." AND gid=".$this->db->escape($gid);
        $this->db->query($delete);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function changeImageSeq($id,$seq_from,$seq_to) {
        $query="SELECT gid FROM usergallery WHERE uid=".$this->db->escape($id)." AND seq=".$this->db->escape($seq_to);
        $gid_to=$this->db->query($query)->row()->gid;
        $update="UPDATE usergallery SET seq=".$this->db->escape($seq_to)." WHERE uid=".$this->db->escape($id)." AND seq=".$this->db->escape($seq_from);
        $this->db->query($update);
        if ($this->db->affected_rows()==0)
            return false;
        $update2="UPDATE usergallery SET seq=".$this->db->escape($seq_from)." WHERE uid=".$this->db->escape($id)." AND gid=".$this->db->escape($gid_to);
        $this->db->query($update2);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function getGallery($id) {
        $query="SELECT * FROM usergallery WHERE uid=".$this->db->escape($id);
        return $this->db->query($query)->result();
    }

    function getHeadImage($id) {
        $query="SELECT url FROM usergallery WHERE uid=".$this->db->escape($id)." AND seq=(SELECT MIN(seq) FROM usergallery WHERE uid=".$this->db->escape($id).")";
        if($this->db->query($query)->num_rows()>0)
            return $this->db->query($query)->row()->url;
        else
            return 'http://7u2p6a.com1.z0.glb.clouddn.com/headimage.jpg';
    }

    function addTag($id,$tag_name) {
        $query="SELECT * FROM hastag WHERE tag=".$this->db->escape($tag_name)." AND uid=".$this->db->escape($id);
        $res=$this->db->query($query);
        if ($res->num_rows>0)
            return false;
        $insert="INSERT INTO hastag(uid,tag) VALUES(".$this->db->escape($id).",".$this->db->escape($tag_name).")";
        $this->db->query($insert);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function deleteTag($id, $tag_name) {
        $delete="DELETE FROM hastag WHERE tag=".$this->db->escape($tag_name)." AND uid=".$this->db->escape($id);
        $this->db->query($delete);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function getTags($id) {
        $query="SELECT DISTINCT tag FROM hastag WHERE uid=".$this->db->escape($id);
        return $this->db->query($query)->result();
    }

    function getOtherTags($id) {
        $query="SELECT DISTINCT tag_name FROM tag WHERE tag_name NOT IN (SELECT tag FROM hastag WHERE uid=".$this->db->escape($id).")";
        return $this->db->query($query)->result();
    }
}