<?php

class UserInfo_Model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function getInfo($id) {
    	$data=array();
    	$query="SELECT * FROM user WHERE uid=".$this->db->escape($id);
    	$res=$this->db->query($query)->result()->row();
    	$data['name']=$res->name;
    	$data['profile']=$res->profile;
    	$data['birthyear']=$res->birthyear;
    	$data['active']=$res->active;
    	$data['password']=$res->password;
    	$data['email']=$res->email;
    	$data['gender']=$res->gender;
    	$data['edu']=$res->edu;
    	$data['eduyear']=$res->eduyear;
    	$data['school']=$res->school;
    	$data['major']=$res->major;
    	$data['city']=$res->city;
    	return $data;
    }

    function updateInfo($id, $newInfo) {
    	$update="UPDATE user SET name=".$this->db->escape($newInfo->name)
    		.",profile=".$this->db->escape($newInfo->name).",
    		birthyear=".$this->db->escape($newInfo->birthyear).",
    		active=".$this->db->escape($newInfo->active).",
    		password=".$this->db->escape($newInfo->password).",
    		email=".$this->db->escape($newInfo->email).",
    		gender=".$this->db->escape($newInfo->gender).",
    		edu=".$this->db->escape($newInfo->edu).",
    		eduyear=".$this->db->escape($newInfo->eduyear).",
    		school=".$this->db->escape($newInfo->school).",
    		major=".$this->db->escape($newInfo->major).",
    		city=".$this->db->escape($newInfo->city);
    		." WHERE uid=".$this->db->escape($id);
    	$data=$this->db->query($query);
    	if ($data->affected_rows()==0)
    		return false;
    	return true;
    }