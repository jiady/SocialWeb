<?php
class Userinfo_control extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Userinfo_model');
	}

	public function index() {
		$this->load->view('block/navigation');
		$res['info']=$this->Userinfo_model->getInfo($this->session->userdata("uid"));
		$this->load->view('main/userinfo',$res);
		$this->load->view('block/footer');
	}

	public function change() {
		$input=$this->input->post();
		if (true!=$this->Userinfo_model->updateInfo($this->session->userdata("uid"),$input))
			echo "Something wrong happened!";
	}
}