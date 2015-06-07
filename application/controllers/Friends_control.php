<?php
class Friends_control extends CI_Controller {

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
		$this->load->view('main/search',0);
		$id=$this->session->userdata("uid");
		$this->load->view('main/friend_head');
		$info=array();
		$res=$this->Relation_model->getFriends($id);
		if (count($res)>0) {
			foreach ($res as $row) {
				$user_info=$this->Userinfo_model->getInfo($row->to_uid);
				$info['url']=$this->Userinfo_model->getHeadImage($row->to_uid);
				$info['name']=$user_info['name'];
				$info['profile']=$user_info['profile'];
				$info['to_uid']=$row->to_uid;
				$this->load->view('main/friends',$info);
			}
		}
		else {
			echo "<h3>你还没有好友！</h3>";
		}

		$this->load->view('main/request_head');
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
			echo "<h4>你还没有好友请求！</h4>";
		}
		$this->load->view('block/footer');
		$this->load->view('main/script');
	}

	function search() {
		$input=array();
		$input["search_content"]=$_POST['search_content'];
		$input["search_reason"]=$_POST["search_reason"];
		if (empty($input["search_content"])) {
			echo "0";
			return ;
		}
		if (empty($input["search_reason"])) {
			$input["search_content"]="hello"
		}
		$result=$this->Userinfo_model->getID($input['search_content']);
		if (count($result)==0)
			echo "3";
		else if (count($result)>1)
			echo "3";
		else {
			echo "1";
			$this->Relation_model->sendFriendRequest($this->session->userdata("uid"), $result[0]->uid,$input['search_reason']);
		}
		#redirect('/friends_control', 'refresh');
	}

	function accept() {
		$from_uid=$_POST['from_uid'];
		$this->Relation_model->acceptFriendRequest($this->session->userdata("uid"),$from_uid);
	}

	function delete() {
		$delete_uid=$_POST['delete_uid'];
		$this->Relation_model->deleteFriend($this->session->userdata("uid"),$delete_uid);
	}

	function moveBlack() {
		$black_uid=$_POST['black_uid'];
		$this->Relation_model->addBlackList($this->session->userdata("uid"),$black_uid);
	}
}
