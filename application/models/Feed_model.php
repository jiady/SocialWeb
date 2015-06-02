<?php

class Feed_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function postFid($map){
        $map['uid']=$this->session->userdata('uid');
        $map['putter_name']=$this->session->userdata('name');
        $map['putter_gender']=$this->session->userdata('gender');
        $this->db->insert('feed',$map);
        return $this->db->insert_id();
    } 
    function addPictures($fid,$array){
        $seq=1;
        foreach ($array as $pic){
            $ins=array("fid"=>$fid,"seq"=>$seq,"url"=>$pic);
            $this->db->insert('feedgallery',$ins);
            $seq++;
        } 
        return true;
    } 

    function deleteFeed($fid){
        $this->db->where('fid',$fid);
        $this->db->delete('feed');
        $this->db->where('fid',$fid);
        $this->db->delete('comment');
        $this->db->where('fid',$fid);
        $this->db->delete('feedgallery');
        return true;
    }

    function postComments($map){
        if(!array_key_exists('to_uid', $map)){
            $map['to_name']=$this->session->userdata('name');
            $map['to_gender']=$this->session->userdata('gender');
        }
        else{
            $query=$this->where('uid',$map['to_uid']);
            $row=$query->first_row();
            $map['to_name']=$row->name;
            $map['to_gender']=$row->gender;
        }
        $map['commenter_name']=$this->session->userdata('name');
        $map['commenter_gender']=$this->session->userdata('gender');
        $this->db->insert('comment',$map);
        return $this->db->insert_id();
    }

    function deleteComments($cid){
        $this->db->where('cid',$cid);
        $this->db->delete('comment');
        return true;
    }

    function getFeeds($id,$limit=20,$offset=0){
        $query=$this->db->query("SELECT * From feed WHERE uid IN (SELECT to_uid FROM friend
                WHERE from_uid=".$this->db->escape($id).") LIMIT ".$this->db->escape($limit)." OFFSET ".$this->db->escape($offset)." ");
        $result=$query->result();
        $fid_array=array();
        foreach( $result as $value){
            array_push($fid_array,$value->fid);
        }
        return array($fid_array,$result);
    }

    function getComment($fid_array){
        $this->db->where_in('fid', $fid_array);
        $this->db->order_by('post_time',"desc");
        $query=$this->db->get('comment');
        $result=$query->result();
        $data=array();
        foreach ($result as $row){
            if(!array_key_exists($row->fid, $data)){
                $data[$row->fid]=array();
            }
            array_push($data[$row->fid],$row);
        }
        return $data;
    }

    function getFeedGallery($fid_array){
        $this->db->where_in('fid', $fid_array);
        $this->db->order_by('seq',"desc");
        $query=$this->db->get('feedgallery');
        $result=$query->result();
        $data=array();
        foreach ($result as $row){
            if(!array_key_exists($row->fid, $data)){
                $data[$row->fid]=array();
            }
            array_push($data[$row->fid],$row);
        }
        return $data;
    }

    

}

