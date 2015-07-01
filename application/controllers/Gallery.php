<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
		if(!$this->session->userdata('uid')){
			redirect(site_url());
		}
	}



	function gallery_post(){
		$this->load->view('block/header');
		$data['activetag']="相册";
		$this->load->view('block/navigation',$data);
		
		$this->load->view('upload/gallery');
		
		$this->load->view('block/footer');
	}



}