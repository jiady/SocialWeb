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
		$this->load->view('main/head/friend_head');
		$info=array();
		$res=$this->Relation_model->getFriends($id);
		if (count($res)>0) {
			foreach ($res as $row) {
				if ($row->to_uid==$id) {
					$user_info=$this->Userinfo_model->getInfo($row->to_uid);
					$info['url']=$this->Userinfo_model->getHeadImage($row->to_uid);
					$info['name']=$user_info['name'];
					$info['profile']=$user_info['profile'];
					$info['to_uid']=$row->to_uid;
					if ($row->to_uid==$id)
						$info['self']="true";
					else
						$info['self']="false";
					$this->load->view('main/friends',$info);
					break;
				}
			}
			foreach ($res as $row) {
				if ($row->to_uid!=$id) {
					$user_info=$this->Userinfo_model->getInfo($row->to_uid);
					$info['url']=$this->Userinfo_model->getHeadImage($row->to_uid);
					$info['name']=$user_info['name'];
					$info['profile']=$user_info['profile'];
					$info['to_uid']=$row->to_uid;
					if ($row->to_uid==$id)
						$info['self']="true";
					else
						$info['self']="false";
					$this->load->view('main/friends',$info);
				}
			}
		}
		else {
			$this->load->view('main/info/nofriend');
		}

		$this->load->view('main/head/request_head');
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
			$this->load->view('main/info/norequest');
		}

		$this->load->view('main/head/nonfriend_head');
		$info_nonfriend=array();
		$res_nonfriend=$this->Relation_model->getNonFriends($id);
		if (count($res_nonfriend)>0) {
			foreach ($res_nonfriend as $row) {
				$user_info=$this->Userinfo_model->getInfo($row->uid);
				$info_nonfriend['url']=$this->Userinfo_model->getHeadImage($row->uid);
				$info_nonfriend['name']=$user_info['name'];
				$info_nonfriend['profile']=$user_info['profile'];
				$info_nonfriend['to_uid']=$row->uid;
				$info_nonfriend['has_request']=$this->Relation_model->hasFriendRequest($id, $row->uid);
				$this->load->view('main/non_friends',$info_nonfriend);
			}
		}

		$this->load->view('block/footer');
		$this->load->view('main/friend_script');
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
			$input["search_content"]="hello";
		}
		$result=$this->Userinfo_model->getID($input['search_content']);
		if (count($result)==0)
			echo "3";
		else if (count($result)>1)
			echo "2";
		else {
			if (true==$this->Relation_model->sendFriendRequest($this->session->userdata("uid"), $result[0]->uid,$input['search_reason']))
				echo "1";
			else
				echo "4";
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
