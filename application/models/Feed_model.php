<?php

class Feed_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function postFeed($map){
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
            $this->db->where('uid',$map['to_uid']);
            $query=$this->db->get('user');
            $row=$query->first_row();
            $map['to_name']=$row->name;
            $map['to_gender']=$row->gender;
        }
        $this->db->select('fid,putter_gender,uid');
        $this->db->where('fid',$map['fid']);
        $query=$this->db->get("feed");
        $row=$query->row_array();
        $map['fid_putter']=$row['uid'];
        $map['fid_gender']=$row['putter_gender'];
        $map['uid']=$this->session->userdata('uid');
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
        $myid=$this->session->userdata('uid');
        $query=$this->db->query("SELECT * From feed WHERE uid=".$this->db->escape($myid)."OR uid IN (SELECT to_uid FROM friend
                WHERE from_uid=".$this->db->escape($id).") ORDER BY post_time LIMIT ".$this->db->escape($limit)." OFFSET ".$this->db->escape($offset)." ");
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
        foreach ($fid_array as $f){
            $data[$f]=array();
        }
        foreach ($result as $row){
            if(!array_key_exists($row->fid, $data)){
                $data[$row->fid]=array();
            }
            if($row->commenter_gender==$row->fid_gender && $row->to_gender==$row->fid_gender)
                array_push($data[$row->fid],$row);
            else if($row->fid_putter==$this->session->userdata('uid'))
                array_push($data[$row->fid],$row);
            else if($row->uid==$this->session->userdata('uid') || $row->to_uid==$this->session->userdata('uid'))
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
        foreach ($fid_array as $f){
            $data[$f]=array();
        }
        foreach ($result as $row){
            if(!array_key_exists($row->fid, $data)){
                $data[$row->fid]=array();
            }
            array_push($data[$row->fid],$row);
        }
        return $data;
    }

    function getAll($limit,$offset){
        $uid=$this->session->userdata('uid');
        list($fidseq,$fidct)=$this->getFeeds($uid,$limit,$offset);
        $comment=$this->getComment($fidseq);
        $gallery=$this->getFeedGallery($fidseq);
        $data=array();
        $data['comment']=$comment;
        $data['gallery']=$gallery;
        $data['feed']=$fidct;
        return $data;
    }



    

}

