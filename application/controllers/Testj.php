<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testj extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Feed_model');
		//$this->output->set_content_type('application/json');
	}
	
	public function TestUser()
	{
		//$this->output->set_content_type('application/json');

		if(true==$this->User_model->register("email","password111")){
			echo "all_userdata:<\br>";
			var_dump($this->session->all_userdata());
		}
		echo "login : expected true \n";
		var_dump( $this->User_model->login("email","password111") );

		echo "logout,expected:no uid \n";
		$this->User_model->logout();
		var_dump($this->session->all_userdata());
	}
	public function TestFeed($uid){
		$this->User_model->login("222","54250");
		
		//*************************************************************
		list($fidarray,$Contentarray)=$this->Feed_model->getFeeds($uid);
		echo "Get Feeds seq</br>";
		var_dump($fidarray);
		echo "Get Feeds </br>";
		var_dump($Contentarray);
		//*******************************************************
		echo "Comment #</br>";
		$comment=$this->Feed_model->getComment($fidarray);
		var_dump($comment);

		//*******************************************************
		$gallery=$this->Feed_model->getFeedGallery($fidarray);
		echo "Feedimage</br>";
		var_dump($gallery);

		//*******************************************************
		$map['content']="来一发";
		$f=$this->Feed_model->postFeed($map);
		$ar=array("www.baidu.com","www.google.com");
		$this->Feed_model->addPictures($f,$ar);
		$map['fid']=$f;

		$this->Feed_model->postComments($map);
		//*******************************************************
		echo "Comment #</br>";
		$comment=$this->Feed_model->getComment($fidarray);
		var_dump($comment);

		//*************************************************************
		list($fidarray,$Contentarray)=$this->Feed_model->getFeeds($uid);
		echo "Get Feeds seq</br>";
		var_dump($fidarray);
		echo "Get Feeds </br>";
		var_dump($Contentarray);


	}
}
