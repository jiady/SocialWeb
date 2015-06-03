<?php
class Info_model extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data=array();
		$data['part']='城市';
		$this->load->view('block/info_manage',$data);
		$data['part']='学校';
		$this->load->view('block/info_manage',$data);
		$data['part']='专业';
		$this->load->view('block/info_manage',$data);
	}

	public function add() {
		$input=$this->input->post();
		var_dump($input);
		if ($input['part']=='城市') {
			if (true!=$this->Info_model->addCity($input['name_add']))
				echo "Something wrong happened!";
		}
		else if ($input['part']=='学校') {
			if (true!=$this->Info_model->addSchool($input['name_add']))
				echo "Something wrong happened!";
		}
		else {
			if (true!=$this->Info_model->addMajor($input['name_add']))
				echo "Something wrong happened!";
		}
	}

	public function update() {
		$input=$this->input->post();
		var_dump($input);
		if ($input['part']=='城市') {
			if (true!=$this->Info_model->updateCity($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
		else if ($input['part']=='学校') {
			if (true!=$this->Info_model->addSchool($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
		else {
			if (true!=$this->Info_model->addMajor($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
	}

	public function delete() {
		$input=$this->input->post();
		var_dump($input);
		if ($input['part']=='城市') {
			if (true!=$this->Info_model->deleteCity($input['name_delete']))
				echo "Something wrong happened!";
		}
		else if ($input['part']=='学校') {
			if (true!=$this->Info_model->deleteSchool($input['name_delete']))
				echo "Something wrong happened!";
		}
		else {
			if (true!=$this->Info_model->deleteMajor($input['name_delete']))
				echo "Something wrong happened!";
		}
	}
}