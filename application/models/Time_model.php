<?php

class Time_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }
    function readtime(){
    	$month=date('n');
    	$date=date('j');
    	$this->db->where('id','1');
    	$query=$this->db->get('time');
    	$reult=$query->result();
    	if($query->num_rows()>0)
    	{
    		$d=$query->result()[0]->date;
    		$m=$query->result()[0]->month;
    		if($m!=$month||$d!=$date){
    			$this->WriteTime($date,$month);
    			return false;
    		}
    		else{
    			return true;
    		}
    	}
    }
    function WriteTime($d,$m){
    	$insert_data=array();
    	$insert_data['date']=$d;
    	$insert_data['month']=$m;
    	$this->db->where('id','1');
    	$this->db->update('time',$insert_data);
    }
}