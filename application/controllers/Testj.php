<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Feed_model');
	}
	
	public function TestUser()
	{
		$this->User_model->register("email","password111");
		var_dump($this->session->all_userdata());
		echo $this->User_model->login("email","password112");
		$this->User_model->logout();
		var_dump($this->session->all_userdata());
	}
	public function TestFeed(){
		
	}
}
