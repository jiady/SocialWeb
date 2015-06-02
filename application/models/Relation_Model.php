<?php

class Relation_Model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function addBlackList($id, $blackid) {
    	$query="SELECT * FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($blackid);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
    	$insert="INSERT INTO blacklist(from_uid, to_uid) VALUES(".$this->db->escape($id).",".$this->db->escape($blackid).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows>0)
    		return true;
    	return false;
    }

    function getBlackLists($id) {
    	$query="SELECT to_uid FROM blacklist WHERE from_uid=".$this->db->escape($id);
    	return $this->db->query($query)->result();
    }

    function deleteBlackList($id,$blackid) {
    	$delete="DELETE FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($blackid);
    	$this->db->query($delete);
    	if ($this->db->affected_rows>0)
    		return true;
    	return false;
    }

    function getFriends($id) {
    	$query="SELECT to_uid FROM friend WHERE from_uid=".$this->db->escape($id);
    	return $this->db->query($query)->result();
    }

    function deleteFriend($id, $delete_id) {
    	$delete="DELETE FROM friend WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($delete_id);
    	$this->db->query($delete);
    	if ($this->db->affected_rows>0)
    		return true;
    	return false;
    }

    function sendFriendRequest($id, $to_id) {
    	$query="SELECT * FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($to_id);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
    	$insert="INSERT INTO friendrequest(from_uid, to_uid) VALUES(".$this->db->escape($id).",".$this->db->escape($to_id).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows>0)
    		return true;
    	return false;
    }

    function sendFriendRequest($id, $to_id, $reason) {
    	$query="SELECT * FROM blacklist WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($to_id);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
    	$query="SELECT * FROM friendrequest WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($to_id)." AND reason=".$this->db->escape($reason);
    	if ($this->db->query($query)->num_rows()>0)
    		return false;
        $delete="DELETE FROM friendrequest WHERE from_uid=".$this->db->escape($id)." AND to_uid=".$this->db->escape($to_id);
        $this->db->query($delete);
    	$insert="INSERT INTO friendrequest(from_uid, to_uid, reason) VALUES(".$this->db->escape($id).",".$this->db->escape($to_id).",".$this->db->escape($reason).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows>0)
    		return true;
    	return false;
    }

    function getFriendRequest($id) {
    	$query="SELECT from_id,reason FROM friendrequest WHERE to_id=".$this->db->escape($id);
    	return $this->db->query($query)->result();
    }

    function acceptFriendRequest($id, $from_id) {
    	$update="UPDATE friendrequest SET accepted=true WHERE from_uid=".$this->db->escape($from_id)." AND to_uid=".$this->db->escape($id);
    	$this->db->query($update);
    	if ($this->db->affected_rows==0)
    		return false;
    	$insert="INSERT INTO friend(from_uid, to_uid) VALUES(".$this->db->escape($id).",".$this->db->escape($from_id).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows==0)
    		return false;
    	$insert="INSERT INTO friend(from_uid, to_uid) VALUES(".$this->db->escape($from_id).",".$this->db->escape($id).")";
    	$this->db->query($insert);
    	if ($this->db->affected_rows==0)
    		return false;
    	return true;
    }
}