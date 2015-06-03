<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		exec("/home/ubuntu/gitsocialweb.sh",$results,$ret);
		foreach ($results as $row){
			echo $row;
			echo "</br>";
		}
		echo $ret;
	}


	public function index()
	{
		
		$this->load->view('login/login');
		
	}
	public function login(){
		$input=$this->input->post();
		var_dump($input);
		if(true==$this->User_model->login($input['email'],$input['password'])){
			redirect(site_url("feed"));
		}else{
			echo "wrong password or account";
		}
	}
}
