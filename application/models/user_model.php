<?php

class Usermodel extends CI_model{
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
    

}

