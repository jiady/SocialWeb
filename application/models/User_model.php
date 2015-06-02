<?php

class User_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

   

    function login($email,$password){
        if($this->session->userdata('uid'))
            return false;//already login
        $this->db->where('email',$email)->where('password',$password);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            $row=$query->row_array();
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
        return $this->login($email,$password);
    }
    

}

