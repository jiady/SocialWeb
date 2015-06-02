<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function TestUserInfo(){
		$this->load->model("Userinfo_model");
		var_dump($this->UserInfo_Model->getInfo(2));
		$newInfo=array();
		$newInfo["edu"]="研究生";
		var_dump($this->UserInfo_Model->updateInfo(2,$newInfo));
		var_dump($this->UserInfo_Model->addImage(2,"http://www.baidu.jpg"));
		var_dump($this->UserInfo_Model->addImage(2,"http://www.google.jpg"));
		var_dump($this->UserInfo_Model->addImage(2,"http://www.tencent.jpg"));
		var_dump($this->UserInfo_Model->deleteImage(2,2));
		var_dump($this->UserInfo_Model->changeImageSeq(2,1,0));
		var_dump($this->UserInfo_Model->getGallery(2));
		var_dump($this->UserInfo_Model->getHeadImage(2));
		var_dump($this->UserInfo_Model->addTag(2,"很猥琐"));
		var_dump($this->UserInfo_Model->addTag(2,"aaa"));
		var_dump($this->UserInfo_Model->getTags(2));
		var_dump($this->UserInfo_Model->deleteTag(2,"aaa"));
	}
	public function TestInfo(){
		$this->load->model("Info_model");
		var_dump($this->Info_Model->addCity("郑州"));
		var_dump($this->Info_Model->addCity("郑州","南阳"));
		var_dump($this->Info_Model->addCity("南阳"));
		
		var_dump($this->Info_Model->addSchool("郑州"));
		var_dump($this->Info_Model->addSchool("郑州","南阳"));
		var_dump($this->Info_Model->addSchool("南阳"));
		
		var_dump($this->Info_Model->addMajor("郑州"));
		var_dump($this->Info_Model->addMajor("郑州","南阳"));
		var_dump($this->Info_Model->addMajor("南阳"));
	}
	public function TestRelation(){
		$this->load->model("Relation_model");
		var_dump($this->Relation_Model->addBlackList(4,2));
		var_dump($this->Relation_Model->getBlackLists(4));
		var_dump($this->Relation_Model->sendFriendRequest(2,4));
		var_dump($this->Relation_Model->deleteBlackList(4,2));
		var_dump($this->Relation_Model->sendFriendRequest(2,4));
		var_dump($this->Relation_Model->getFriendRequest(4));
		var_dump($this->Relation_Model->acceptFriendRequest(4,2));
		var_dump($this->Relation_Model->getFriends(2));
		var_dump($this->Relation_Model->deleteFriend(4,2));
	}
}
