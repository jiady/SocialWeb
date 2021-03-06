<?php

class Match_model extends CI_model{
	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Time_model');
        $this->load->dbforge();
    }

    function query_match_table(){
    	$id=$this->session->userdata('uid');
    	$gender=$this->session->userdata('gender');

    	if($gender==0){
    		$this->db->where('uid2',$id);
    		$result=$this->db->get('matchuser');
    		if($result->num_rows()>0)
    			return $result->result()[0]->uid1;

            $this->db->where('uid1',$id);
            $result=$this->db->get('matchuser');
            if($result->num_rows()>0)
                return $result->result()[0]->uid2;
    	}
    	else if($gender==1){
    		$this->db->where('uid1',$id);
    		$result=$this->db->get('matchuser');
    		if($result->num_rows()>0)
                return $result->result()[0]->uid2;

            $this->db->where('uid2',$id);
            $result=$this->db->get('matchuser');
            if($result->num_rows()>0)
                return $result->result()[0]->uid1;
    	}
    	return 0;
    }

    function add_match_table($object, $my, $mygender){


        $m=array('lastmatch'=>date('d'));
        $this->db->where('uid',$object);
        $this->db->update('user',$m);
        $m=array('lastmatch'=>date('d'));
        $this->db->where('uid',$my);
        $this->db->update('user',$m);

    	if($mygender==0){
    		$tmp=array('uid1'=>$object,'uid2'=>$my);
    		$this->db->insert('matchuser',$tmp);
    	}
    	elseif($mygender==1){
    		$tmp=array('uid1'=>$my,'uid2'=>$object);
    		$this->db->insert('matchuser',$tmp);
    	}


    	$tmp=array('uid1'=>$my,'uid2'=>$object);
        $this->db->insert('matchhistory',$tmp);    	
    }

    function assign_match($query){
        $id=$this->session->userdata('uid');
        $gender=$this->session->userdata('gender');

    	if($query->num_rows()>0){
    			$num=rand(0,$query->num_rows()-1);
    			$tomatch=$query->result()[$num];
    		
    			$this->add_match_table($tomatch->uid,$id,$gender);
 				return $tomatch->uid;
    	}
    	else return 0;
    }

    function getmatch(){
        if($this->Time_model->readtime()==false){
            $this->clear_match_table();
        }
    	$a=$this->query_match_table();
    	$id=$this->session->userdata('uid');
    	$gender=$this->session->userdata('gender');
    	
      

    	if($a>0) {
            $data['first']=0;
            $data['match_id']=$a;
            return $data;
        }
    	else{
            $this->db->where('gender',1-$gender);
            $this->db->where('lastmatch !=',date('d'));
            $q=$this->db->get('user');
            $tmp=$this->assign_match($q);
            if($tmp>0) {
                $data['first']=1;
                $data['match_id']=$tmp;
                return $data;
            }
    	

    		$this->db->where('uid !=',$id);
    		$this->db->where('lastmatch !=',date('d'));
    		$q=$this->db->get('user');
    		$tmp=$this->assign_match($q);
    		if($tmp>0) {
                $data['first']=1;
                $data['match_id']=$tmp;
                return $data;
            }

    	}
        $data['first']=0;
        $data['match_id']=0;
        return $data;
    	
    }
    function getmatch_safe(){
         $this->db->trans_start();
         $data=$this->getmatch();
         $this->db->trans_complete();
         return $data;
    }

    function getmatchtable_web(){
        $this->db->order_by('create_time','desc');
        $query=$this->db->get('match');
        $data=array();
        for($i=0;$i<$query->num_rows();$i++){
            $match=array();
            $this->db->where('uid',$query->result()[$i]->uid1);
            $boy=$this->db->get("user");
            $match['boy']=$boy->result()[0];
            $this->db->where('uid',$query->result()[$i]->uid2);
            $girl=$this->db->get("user");
            $match['girl']=$girl->result()[0];
            $match['start']=$query->result()[$i]->start_gender;


            $data[$i]=$match;
        }
        $ret=array();
        $ret["items"]=$data;
        return $ret;
    }

    function clear_match_table(){
        $this->db->trans_start();
    	$this->db->empty_table('matchuser');
        $this->dbforge->rename_table('futurematch','tmpmatch');
        $this->dbforge->rename_table('matchuser','futurematch');
        $this->dbforge->rename_table('tmpmatch','matchuser');
        $this->db->empty_table('futurematch');
        $this->db->trans_complete();
    }



}