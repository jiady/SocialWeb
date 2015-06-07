<?php

class Info_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function addCity($city) {
        $query="SELECT * FROM city WHERE city_name=".$this->db->escape($city);
        $res=$this->db->query($query);
        if ($res->num_rows()>0)
            return false;
    	$insert="INSERT INTO city VALUES(".$this->db->escape($city).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function deleteCity($city) {
    	$delete="DELETE FROM city WHERE city_name=".$this->db->escape($city);
    	$this->db->query($delete);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function updateCity($city, $newCity) {
    	$update="UPDATE city SET city_name=".$this->db->escape($newCity)." WHERE city_name=".$this->db->escape($city);
    	$this->db->query($update);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getCities() {
    	$query="SELECT * FROM city";
        $result=$this->db->query($query)->result();
        $res=array();
        foreach ($result as $row)
        array_push($res,$row->city_name);
    	return $res;
    }

    function addSchool($school) {
        $query="SELECT * FROM school WHERE school_name=".$this->db->escape($school);
        $res=$this->db->query($query);
        if ($res->num_rows()>0)
            return false;
    	$insert="INSERT INTO school VALUES(".$this->db->escape($school).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function deleteSchool($school) {
    	$delete="DELETE FROM school WHERE school_name=".$this->db->escape($school);
    	$this->db->query($delete);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function updateSchool($school, $newSchool) {
    	$update="UPDATE school SET school_name=".$this->db->escape($newSchool)." WHERE school_name=".$this->db->escape($school);
    	$this->db->query($update);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getSchools() {
    	$query="SELECT * FROM school";
    	$result=$this->db->query($query)->result();
        $res=array();
        foreach ($result as $row)
        array_push($res,$row->school_name);
        return $res;
    }

    function addMajor($major) {
        $query="SELECT * FROM major WHERE major_name=".$this->db->escape($major);
        $res=$this->db->query($query);
        if ($res->num_rows()>0)
            return false;
    	$insert="INSERT INTO major VALUES(".$this->db->escape($major).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function deleteMajor($major) {
    	$delete="DELETE FROM major WHERE major_name=".$this->db->escape($major);
    	$this->db->query($delete);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function updateMajor($major, $newMajor) {
    	$update="UPDATE major SET major_name=".$this->db->escape($newMajor)." WHERE major_name=".$this->db->escape($major);
    	$this->db->query($update);
    	if ($this->db->affected_rows()>0)
    		return true;
    	return false;
    }

    function getMajors() {
    	$query="SELECT * FROM major";
    	$result=$this->db->query($query)->result();
        $res=array();
        foreach ($result as $row)
        array_push($res,$row->major_name);
        return $res;
    }

    function addTag($tag_name) {
        $query="SELECT * FROM tag WHERE tag_name=".$this->db->escape($tag_name);
        $res=$this->db->query($query);
        if ($res->num_rows()>0)
            return false;
        $insert="INSERT INTO tag VALUES(".$this->db->escape($tag_name).")";
        $this->db->query($insert);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function deleteTag($tag_name) {
        $delete="DELETE FROM tag WHERE tag_name=".$this->db->escape($tag_name);
        $this->db->query($delete);
        if ($this->db->affected_rows()>0)
            return true;
        return false;
    }

    function getTags() {
        $query="SELECT tag_name FROM tag";
        return $result=$this->db->query($query)->result();
    }
}