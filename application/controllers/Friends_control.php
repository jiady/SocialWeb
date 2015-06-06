<?php
class Friends_control extends CI_Controller {

	public $status=0;

	function __construct() {
		parent::__construct();
		$this->load->model('Relation_model');
		$this->load->model('Userinfo_model');
		$this->load->helper('url');
	}

	function index() {
		$this->load->view('block/header');
		$this->load->view('block/navigation');
		$parameter=array();
		$parameter['status']=$this->status;
		echo "Search";
		$this->load->view('main/search',$parameter);
		$id=$this->session->userdata("uid");
		echo "Friends";
		$info=array();
		$res=$this->Relation_model->getFriends($id);
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
			echo "你还没有好友！";
		}

		echo "Requests";
		$info_request=array();
		$res_request=$this->Relation_model->getFriendRequests($id);
		if (count($res_request)>0) {
			for ($i=count($res_request)-1;$i>=0;$i--) {
				$user_info=$this->Userinfo_model->getInfo($res_request[$i]->from_uid);
				$info_request['url']=$this->Userinfo_model->getHeadImage($res_request[$i]->from_uid);
				$info_request['name']=$user_info['name'];
				$info_request['reason']=$res_request[$i]->reason;
				$info_request['accepted']=$res_request[$i]->accepted;
				$info_request['from_uid']=$res_request[$i]->from_uid;
				$this->load->view('main/requests',$info_request);
			}
		}
		else {
			echo "你还没有好友请求！";
		}
		$this->load->view('block/footer');
	}

	function search() {
		$input=$this->input->post();
		$result=$this->Userinfo_model->getID($input['search_content']);
		if (count($result)==0)
			$this->status=2;
		else if (count($result)>1)
			$this->status=3;
		else {
			$this->status=1;
			$this->Relation_model->sendFriendRequest($this->session->userdata("uid"), $result[0]->uid,$input['search_reason']);
		}
		redirect('/friends_control', 'refresh');
	}

	function accept() {
		$from_uid=$_POST['from_uid'];
		$this->Relation_model->acceptFriendRequest($this->session->userdata("uid"),$from_uid);
		redirect('/friends_control', 'refresh');
	}
}
