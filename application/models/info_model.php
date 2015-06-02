<?php

class Info_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function addCity($city) {
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
    	return $this->db->query($query)->result();
    }

    function addSchool($school) {
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
    	return $this->db->query($query)->result();
    }

    function addMajor($major) {
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
    	return $this->db->query($query)->result();
    }

    function addTag($tag_name) {
        $insert="INSERT INTO tag VALUES(".$this->db->escape($tag_name).")";
        $this->db->query($insert);
        if ($this->db->affected_rows>0)
            return true;
        return false;
    }
}