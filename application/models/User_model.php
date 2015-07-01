<?php

class User_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

   

    function login($email,$password){
        $this->db->where('email',$email)->where('password',$password);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            $row=$query->row_array();
            $this->db->where('uid',$this->session->userdata('uid'));
            $this->db->order_by('seq','asc');
            $query=$this->db->get('usergallery');
            $r=$query->row();
            $row['headimage']=$r->url;
            unset($row['password']);
            $this->session->set_userdata($row);
            return true;
        }
        return false;
    }

    function logout(){
    	$this->session->unset_userdata('uid');
        return true;
    }

    function register($email,$password){
        $this->db->where('email',$email);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            return false;
        }
        $to_insert=array();
        $to_insert['email']=$email;
        $to_insert['password']=$password;
        $this->db->insert('user',$to_insert);
        $url_base="http://7u2p6a.com1.z0.glb.clouddn.com/";
        $postfix=".jpg";

        $ins=array();
        $ins['uid']= $this->db->insert_id();
        $image_url=$url_base.($ins['uid']%9+1).$postfix;
        $ins['url']=$image_url;

        $this->db->insert('usergallery',$ins);
        $ins['seq']=1;
        $this->db->insert('usergallery',$ins);
        
        if($this->login($email,$password)){
            $id=$this->session->userdata('uid');
            $this->addmyself($id);

        }

        return true;
    }

    function addmyself($id){
        $insert=array();
        $insert['from_uid']=$id;
        $insert['to_uid']=$id;
        $this->db->insert('friend',$insert);
    }
    

}

