<?php
class Userinfo_control extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Userinfo_model');
		$this->load->helper('url');
	}

	function index() {
		$this->load->view("block/header");
		$this->load->view('block/navigation');
		$id=$this->session->userdata("uid");
		$res['info']=$this->Userinfo_model->getInfo($id);
		var_dump($res['info']);
		$this->load->view('main/userinfo',$res);

		$this->load->view('main/head/tag_head');
		$result=$this->Userinfo_model->getTags($id);
		$info=array();
		if (count($result)>0) {
			foreach ($result as $row) {
				$info['status']='1';
				$info['content']=$row->tag;
				$this->load->view('main/tag',$info);
			}
		}

		$this->load->view('main/head/tagNot_head');
		$result_other=$this->Userinfo_model->getOtherTags($id);
		$info_other=array();
		if (count($result_other)>0) {
			foreach ($result_other as $row) {
				$info_other['status']='0';
				$info_other['content']=$row->tag_name;
				$this->load->view('main/tag',$info_other);
			}
		}

		$this->load->view('block/footer');
		$this->load->view('main/userinfo_script');
	}

	function change() {
		$input=$this->input->post();
		if ($input['genderF']=="on")
			$input['gender']='1';
		else
			$input['gender']='0';
		$pass=array();
		foreach ($input as $key => $val) {
			if ($key!="genderF" and $key!="genderM")
				$input[$key]=$val;
		}
		var_dump($pass);
		if (true!=$this->Userinfo_model->updateInfo($this->session->userdata("uid"),$pass))
			echo "Something wrong happened!";
		else
			redirect('/userinfo_control', 'refresh');
	}

	function changeTag() {
		$input=array();
		$input['tag']=$_POST['tag'];
		$input['status']=$_POST['status'];
		$id=$this->session->userdata("uid");
		if ($input['status']==0)
			$this->Userinfo_model->addTag($id, $input['tag']);
		else
			$this->Userinfo_model->deleteTag($id, $input['tag']);
	}
}