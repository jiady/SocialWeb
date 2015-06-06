<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Feed_model');
		
	}

	function index($offset=0){
		
		$this->load->view('block/header');
		$data['activetag']="首页";
		$this->load->view('block/navigation',$data);
		$feeddata=$this->Feed_model->getAll(20,$offset);
		$this->load->view('feed/feed',$feeddata);
		$this->load->view('block/footer');
	}

	function feed_post(){
		$this->load->view('upload/index');
		//$this->load->view('block/header');
		//$data['activetag']="发布";
		//$this->load->view('block/navigation',$data);
		//$this->load->view('block/footer');
	}

	function inner_post(){
		$this->output
    		 ->set_content_type('application/json');
    	$feed=$this->input->post('feed_content');
    	$pictures=$this->input->post('pictures');
    	var_dump($pictures);
    	$pictures=json_decode($pictures);
    	var_dump($pictures);
    	$postfeed['content']=$feed;
    	$fid=$this->Feed_model->postFeed($postfeed);
    	$this->Feed_model->addPictures($fid,$pictures);
		$this->output
    		 ->set_output(json_encode(array('ret'=>true)));
	}
}