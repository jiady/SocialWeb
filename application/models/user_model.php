<?php

class User_model extends CI_model{
	function __construct()
    {
        parent::__construct();
    }

    function checkEmail($email) {

    return false;
    }

    function register(){
    	$data=array();
    	$insert_data=array();
    	if(null==$this->input->post('Email')){
    		$data['status']='no Email';
    		return $data;
    	}
    	if(null==($this->input->post('password'))){
    		$data['status']='no password';
    		return $data;
    	}
    	if(null==($this->input->post('name'))){
    		$data['status']='no name';
    		return $data;
    	}
    	if(null==($this->input->post('gender'))){
    		$data['status']='no gender';
    		return $data;
    	}


    	$insert_data['Email']=$this->input->post('Email');
    	$insert_data['password']=$this->input->post("password");
    	$insert_data['name']=$this->input->post("name");
    	$insert_data['gender']=$this->input->post("gender");

        
        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$insert_data['Email']))
        {
            $str=explode('@',$insert_data['Email']);
            $insert_data['postfix']=$str[1];
        }
        else{
            $data['status']='Invaild Email';
            return $data;
        }
    	

    	$this->db->where('Email',$insert_data['Email']);
    	$query=$this->db->get('user');
    	$reult=$query->result();
    	if($query->num_rows()>0)
    	{
    		$data["status"]="Email already registered";
    	}
    	else{
    		$this->db->insert('user',$insert_data);
    		
    	}

        $this->db->where('Email',$insert_data['Email']);
        $this->db->where('password',$insert_data['password']);
        $query=$this->db->get('user');
        if($query->num_rows()>0)
        {
            $newdata=array(
                'match_id'=>0,
                'logged_in'=>true,
                'info'=>$query->result()[0]
                );
            $this->session->set_userdata($newdata);
            $data['status']='success';
            $data['id']=$query->result()[0]->id;
            $data['name']=$query->result()[0]->name;
        }

    	return $data;
    }

    function login(){
    	$data=array();
    	$insert_data=array();
    	if(null==$this->input->post('Email')){
    		$data['status']='no Email';
    		return $data;
    	}
    	if(null==($this->input->post('password'))){
    		$data['status']='no password';
    		return $data;
    	}
        if($this->input->post('password')=="renrenid"){
            $insert_data['renrenid']=$this->input->post('Email');
            $this->db->where('renrenid',$insert_data['renrenid']);
            $query=$this->db->get('user');

            if($query->num_rows()>0)
            {
                $newdata=array(
                    'match_id'=>0,
                    'logged_in'=>true,
                    'info'=>$query->result()[0]
                    );
                $this->session->set_userdata($newdata);
                $data['status']='success';
                $data['id']=$query->result()[0]->id;
                $data['name']=$query->result()[0]->name;
            }else{
                $data['status']='Wrong password or Email';
            }
            return $data;
        }



    	$insert_data['Email']=$this->input->post('Email');
    	$insert_data['password']=$this->input->post("password");
    	$this->db->where('Email',$insert_data['Email']);
    	$this->db->where('password',$insert_data['password']);
    	$query=$this->db->get('user');
    	if($query->num_rows()>0)
    	{
    		$newdata=array(
    			'match_id'=>0,
    			'logged_in'=>true,
                'info'=>$query->result()[0]
    			);
    		$this->session->set_userdata($newdata);
    		$data['status']='success';
            $data['id']=$query->result()[0]->id;
            $data['name']=$query->result()[0]->name;
           
    	}
    	else{
    		$data['status']='Wrong password or Email';
    	}
    	return $data;

    }

    function logout(){
    	$this->session->sess_destroy();
    }

    function islogin(){
    	$data=array();
    	$data["login"]=$this->session->userdata("logged_in");
    	return $data;
    }

    function renren(){
        $data=array();
        $insert_data=array();
        if(null==$this->input->post('renrenid')){
            $data['status']='renrenid';
            return $data;
        }
        $this->db->where('renrenid',$this->input->post('renrenid'));
        $query=$this->db->get('user');
        if($query->num_rows()>0)
        {
            $newdata=array(
                'match_id'=>0,
                'logged_in'=>true,
                'info'=>$query->result()[0]
                );
            $this->session->set_userdata($newdata);
            $data['status']='success';
            $data['id']=$query->result()[0]->id;
            $data['name']=$query->result()[0]->name;
            $data['first']=0;
            return $data;
        }

        //register
        $insert_data=$this->input->post();
        $this->db->insert('user',$insert_data);
        $this->db->where('renrenid',$this->input->post('renrenid'));
        $query=$this->db->get('user');
        if($query->num_rows()>0)
        {
            $newdata=array(
                'match_id'=>0,
                'logged_in'=>true,
                'info'=>$query->result()[0]
                );
            $this->session->set_userdata($newdata);
            $data['status']='success';
            $data['id']=$query->result()[0]->id;
            $data['name']=$query->result()[0]->name;
            $data['first']=1;
            return $data;
        }
    }

}

