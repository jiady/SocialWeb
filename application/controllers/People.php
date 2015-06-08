<?php
class People extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Userinfo_model');
		$this->load->model('Relation_model');
		//$this->load->helper('url');
		if(null ==$this->session->userdata('uid')){
			redirect(site_url());
		}
	}

	function index($id) {
		$info['info']=$this->Userinfo_model->getInfo($id);
		$info['headimage']=$this->Userinfo_model->getHeadImage($id);
		$myid=$this->session->userdata('uid');
		$info['isFriend']=$this->Relation_model->checkFriends($myid,$id);
		$this->load->view('block/header');
		$this->load->view('block/navigation');
		$this->load->view('people/people',$info);
		$this->load->view('block/footer');
		$this->load->view('people/people_js');
	}

	function sendFriendRequest(){
		$to_uid=$this->input->post('to_uid');
		$myid=$this->session->userdata('uid');
		$ret['ret']=$this->Relation_model->sendFriendRequest($myid,$to_uid);
		$this->output
    		 ->set_content_type('application/json');
		 $this->output
		 ->set_output(json_encode($ret));
	}


}