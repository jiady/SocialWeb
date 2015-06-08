<?php
class Info_control extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Info_model');
	}

	public function index() {
		$data=array();
		$data['part']='城市';
		$this->load->view('block/header');
		$this->load->view('main/info_manage',$data);
		$data['part']='学校';
		$this->load->view('main/info_manage',$data);
		$data['part']='专业';
		$this->load->view('main/info_manage',$data);

		$this->load->view('main/tag_manage');
		$result=$this->Info_model->getTags();
		if (count($result)>0) {
			foreach ($result as $row) {
				$info['status']=1;
				$info['content']=$row->tag_name;
				$this->load->view('main/tag',$info);
			}
		}
		$this->load->view('block/footer');
		$this->load->view('main/info_script');
	}

	public function add() {
		$input=$this->input->post();
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
		if ($input['part']=='城市') {
			if (true!=$this->Info_model->updateCity($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
		else if ($input['part']=='学校') {
			if (true!=$this->Info_model->updateSchool($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
		else {
			if (true!=$this->Info_model->updateMajor($input['name_old'],$input['name_new']))
				echo "Something wrong happened!";
		}
	}

	public function delete() {
		$input=$this->input->post();
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

	function addTag() {
		$input=$this->input->post();
		if (true==$this->Info_model->addTag($input['name_tag']))
			redirect('/info_control', 'refresh');
	}

	function deleteTag() {
		$input=$_POST['tag'];
		if (true==$this->Info_model->deleteTag($input['tag']))
			echo "0";
		else
			echo "1";
	}
}