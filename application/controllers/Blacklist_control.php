<?php
class Blacklist_control extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Relation_model');
		$this->load->model('Userinfo_model');
		$this->load->helper('url');
	}

	function index() {
		$this->load->view('block/header');
		$this->load->view('block/navigation');
		$this->load->view('main/head/blacklist_head');
		$parameter=array();
		$id=$this->session->userdata("uid");
		$info=array();
		$res=$this->Relation_model->getBlackLists($id);
		if (count($res)>0) {
			foreach ($res as $row) {
				$user_info=$this->Userinfo_model->getInfo($row->to_uid);
				$info['url']=$this->Userinfo_model->getHeadImage($row->to_uid);
				$info['name']=$user_info['name'];
				$info['profile']=$user_info['profile'];
				$info['to_uid']=$row->to_uid;
				$this->load->view('main/blacklist',$info);
			}
		}
		else {
			$this->load->view('main/info/noblacklist');
		}

		$this->load->view('block/footer');
		$this->load->view('main/black_script');
	}

	function delete() {
		$delete_uid=$_POST['delete_uid'];
		$this->Relation_model->deleteBlackList($this->session->userdata("uid"),$delete_uid);
	}
}