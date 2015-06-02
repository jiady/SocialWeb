<?php

class Feed_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function PostFid($map){
        $this->db->insert('feed',$map);
        return $this->db->insert_id();
    } 
    function AddPictures($fid,$array){
        int $seq=1;
        foreach ($array as $pic){
            $ins=array("fid"=>$fid,"seq"=>$seq,"url"=>$pic);
            $this->db->insert('feedgallery',$ins);
            $seq++;
        } 
        return true;
    } 

    function DeleteFeed($fid){
        $this->db->where('fid',$fid);
        $this->db->delete('feed');
        $this->db->where('fid',$fid);
        $this->db->delete('comment');
        $this->db->where('fid',$fid);
        $this->db->delete('feedgallery');
        return true;
    }

    function PostComments($map){
        $query=$this->where('uid',$map['to_uid']);
        $row=$query->first_row();
        $map['to_name']=$row->name;
        $map['to_gender']=$row->gender;
        $map['comment_name']=$this->session->userdata('name');
        $map['comment_gender']=$this->session->userdate('gender');
        $this->db->insert('comment',$map);
        return $this->db->insert_id();
    }

    function DeleteComments($cid){
        $this->db->where('cid',$cid);
        $this->db->delete('comment');
        return true;
    }

    function GetFeeds($id,$limit=20,$offset=0){
        $query=$this->db->query("SELECT * From feed WHERE uid IN (SELECT to_uid FROM friend
                WHERE from_uid=".$this->db->escape($id).") LIMIT ".$this->db->escape($limit)." OFFSET ".$this->db->escape($offset)." ");
        $result=$query->result();
        $fid_array=array();
        foreach( $result as $value){
            array_push($fid_array,$value->fid);
        }
        return array($fid_array,$result);
    }

    function GetComment($fid_array){
        $this->db->where_in('fid', $fid_array);
        $this->db->order_by('post_time',"desc");
        $query=$this->db->get('comment');
        $result=$query->result();
        $data=array();
        foreach ($result as $row){
            array_push($data[$row->fid],$row);
        }
        return $data;
    }

    function GetFeedGallery($fid_array){
        $this->db->where_in('fid', $fid_array);
        $this->db->order_by('seq',"desc");
        $query=$this->db->get('feedgallery');
        $result=$query->result();
        $data=array();
        foreach ($result as $row){
            array_push($data[$row->fid],$row);
        }
        return $data;
    }

    

}

