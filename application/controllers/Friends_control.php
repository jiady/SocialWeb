<?php
class Friends_control extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Relation_model');
		$this->load->model('Userinfo_model');
	}

	function index() {
		$this->load->view('block/header');
		$id=$this->session->userdata("uid");
		$info=array();
		$res=$this->Userinfo_model->getFriends($id);
		if (count($res)>0) {
			foreach ($res as $row) {
				$user_info=$this->Userinfo_model->getInfo($row->to_uid);
				$info['url']=$this->Userinfo_model->getHeadImage($row->to_uid);
				$info['name']=$user_info['name'];
				$info['profile']=$user_info['profile'];
				$this->load->view('main/friends',$info);
			}
		}
		else {
			echo "你没有好友！";
		}
		$this->load->view('block/footer');
	}
}
