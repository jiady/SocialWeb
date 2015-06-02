<?php

class Feed_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

   

    function Login($email,$password){
        if($this->session->userdata('uid'))
            return false;//already login
        $this->db->where('email',$email)->where('password',$password);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            $row=$query->row_array();
            unset($row['password']);
            $this->session->sess_destroy();
            $this->session->set_userdata($row);
            return true;
        }
        return false;
    }

    function Logout($id){
    	$this->session->sess_destroy();
        return true;
    }

    function Register($email,$password){
        $this->db->where('email',$email);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            return false;
        }
        $to_insert=array();
        $to_insert['email']=$email;
        $to_insert['password']=$password;
        $this->db->insert($to_insert);
        return $this->Login($email,$password);
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
        $this->where('uid',$map[''])


        $this->db->insert('comment',$map);
        return $this->db->insert_id();
    }

    function DeleteComments($cid){
        $this->db->where('cid',$cid);
        $this->db->delete('comment');
        return true;
    }

    

}

