<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('feed_model');
		$this->output->set_content_type('application/json');
	}
	
	public function TestUser()
	{
		$this->output->set_content_type('application/json');

		$this->User_model->register("email","password111");
		echo "all_userdata:</br>";
		$this->output->set_output($this->session->all_userdata());
		echo "login wrong: expected false</br>";
		echo $this->User_model->login("email","password112");
		echo "logout,expected:null</br>";
		$this->User_model->logout();
		$this->output->set_output($this->session->all_userdata());
	}
	public function TestFeed($uid){
		$this->output->set_content_type('application/json');
		//*************************************************************
		list($fidarray,$Contentarray)=$this->Feed_model->getFeeds($uid);
		echo "Get Feeds seq</br>";
		$this->output->set_output($fidarray);
		echo "Get Feeds </br>";
		$this->output->set_output($Contentarray);
		//*******************************************************
		echo "Comment #</br>";
		$comment=$this->Feed_model->getComment($fidarray);
		$this->output->set_output($Contentarray);

		//*******************************************************
		$gallery=$this->Feed_model->getFeedGallery($fidarray);
		echo "Feedimage</br>";
		$this->output->set_output($gallery);

		//*******************************************************
		$map['content']="来一发"；
		$f=$this->Feed_model->postFid($map);
		$ar=array("www.baidu.com","www.google.com");
		$this->Feed_model->addPictures($f,$ar);
		$map['fid']=$f;

		$this->Feed_model->postComments($map);
		//*******************************************************
		echo "Comment #</br>";
		$comment=$this->Feed_model->getComment($fidarray);
		$this->output->set_output($Contentarray);

		//*************************************************************
		list($fidarray,$Contentarray)=$this->Feed_model->getFeeds($uid);
		echo "Get Feeds seq</br>";
		$this->output->set_output($fidarray);
		echo "Get Feeds </br>";
		$this->output->set_output($Contentarray);


	}
}
