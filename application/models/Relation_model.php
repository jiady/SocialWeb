<?php

class Relation_model extends CI_model{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Userinfo_model');
    }

    function addBlackList($id, $blackid) {
    	$query="SELECT * FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($blackid);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
        $delete="DELETE FROM friend WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($blackid);
        $this->db->query($delete);
    	$insert="INSERT INTO blacklist(from_uid, to_uid) VALUES(".$this->db->escape($id).",".$this->db->escape($blackid).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getBlackLists($id) {
    	$query="SELECT to_uid FROM blacklist WHERE from_uid=".$this->db->escape($id);
    	return $this->db->query($query)->result();
    }

    function deleteBlackList($id,$blackid) {
    	$delete="DELETE FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($blackid);
    	$this->db->query($delete);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getFriends($id) {
    	$query="SELECT to_uid FROM friend WHERE from_uid=".$this->db->escape($id);
    	return $this->db->query($query)->result();
    }

    function getSecondaryFriends($id){
    	$id=$this->db->escape($id);
    	$query="SELECT * FROM user WHERE uid IN (SELECT distinct f2.to_uid FROM friend f1,friend f2 Where f1.from_uid=".$id." AND f1.to_uid=f2.from_uid AND f2.to_uid NOT IN (SELECT to_uid FROM friend WHERE  from_uid=".$id.") )";
    	$result=$this->db->query($query)->result_array();
    	for ($i=0;$i<sizeof($result);$i++){
    		$result[$i]['headimage']=$this->Userinfo_model->getHeadImage($result[$i]['uid']);
    	}
    	return $result;
    }	

    function getNonFriends($id, $limit=20) {
        $query="SELECT uid FROM user WHERE uid NOT IN (SELECT to_uid FROM friend WHERE from_uid=".$this->db->escape($id).") LIMIT ".$this->db->escape($limit);
        return $this->db->query($query)->result();
    }

    function checkFriends($from_uid,$to_uid){
        $check=array();
        $check['from_uid']=$from_uid;
        $check['to_uid']=$to_uid;
        $this->db->where($check);
        $query=$this->db->get('friend');
        if($query->num_rows()>0)
            return true;
        else 
            return false;

    }
    function checkFriendsRequest($from_uid,$to_uid){
        $check=array();
        $check['from_uid']=$from_uid;
        $check['to_uid']=$to_uid;
        $check['accepted']=0;
        $this->db->where($check);
        $query=$this->db->get('friendrequest');
        if($query->num_rows()>0)
            return true;
        else 
            return false;

    }


    function deleteFriend($id, $delete_id) {
    	$delete="DELETE FROM friend WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($delete_id);
    	$this->db->query($delete);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function sendFriendRequest($id, $to_id, $reason="Hello") {
    	$query="SELECT * FROM blacklist WHERE from_uid=".$this->db->escape($to_id)." AND to_uid=".$this->db->escape($id);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
        $delete="DELETE FROM friendrequest WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($to_id);
        $this->db->query($delete);
    	$insert="INSERT INTO friendrequest(from_uid, to_uid, reason) VALUES(".$this->db->escape($id).",".$this->db->escape($to_id).",".$this->db->escape($reason).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getFriendRequests($id) {
    	$query="SELECT from_uid,reason,accepted FROM friendrequest WHERE to_uid=".$this->db->escape($id)." AND NOT to_uid=from_uid";
    	return $this->db->query($query)->result();
    }

    function hasFriendRequest($id, $to_id) {
        $query="SELECT * FROM friendrequest WHERE to_uid=".$this->db->escape($to_id)." AND from_uid=".$this->db->escape($id);
        return $this->db->query($query)->num_rows();
    }

    function acceptFriendRequest($id, $from_id) {
    	$update="UPDATE friendrequest SET accepted=true WHERE from_uid=".$this->db->escape($from_id)." AND to_uid=".$this->db->escape($id);
    	$this->db->query($update);
    	if ($this->db->affected_rows()==0)
    		return false;
        $query="SELECT * FROM friend WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($from_id);
        if ($this->db->query($query)->num_rows()==0) {
    	    $insert="INSERT INTO friend(from_uid, to_uid) VALUES(".$this->db->escape($id).",".$this->db->escape($from_id).")";
    	    $this->db->query($insert);
            if ($this->db->affected_rows()==0)
                return false;
        }
        $query2="SELECT * FROM friend WHERE to_uid=".$this->db->escape($id)." AND from_uid=".$this->db->escape($from_id);
        if ($this->db->query($query2)->num_rows()==0) {
    	    $insert2="INSERT INTO friend(from_uid, to_uid) VALUES(".$this->db->escape($from_id).",".$this->db->escape($id).")";
    	    $this->db->query($insert2);
    	    if ($this->db->affected_rows()==0)
    		   return false;
        }
    	return true;
    }
}