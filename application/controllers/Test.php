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
//		$obj=new Userinfo_model;
		print_r($this->Userinfo_model->getInfo(2));
/*		$newInfo=array();
		$newInfo["edu"]="研究生";
		var_dump($obj->updateInfo(2,$newInfo));
		var_dump($obj->addImage(2,"http://www.baidu.jpg"));
		var_dump($obj->addImage(2,"http://www.google.jpg"));
		var_dump($obj->addImage(2,"http://www.tencent.jpg"));
		var_dump($obj->deleteImage(2,2));
		var_dump($obj->changeImageSeq(2,1,0));
		var_dump($obj->getGallery(2));
		var_dump($obj->getHeadImage(2));
		var_dump($obj->addTag(2,"很猥琐"));
		var_dump($obj->addTag(2,"aaa"));
		var_dump($obj->getTags(2));
		var_dump($obj->deleteTag(2,"aaa"));*/
	}
	public function TestInfo(){
		$this->load->model("Info_model");
		$obj=new Info_model;
		var_dump($obj->addCity("郑州"));
		var_dump($obj->updateCity("郑州","南阳"));
		var_dump($obj->getCities());
		var_dump($obj->deleteCity("南阳"));
		
		var_dump($obj->addSchool("郑州"));
		var_dump($obj->updateSchool("郑州","南阳"));
		var_dump($obj->getSchools());
		var_dump($obj->deleteSchool("南阳"));
		
		var_dump($obj->addMajor("郑州"));
		var_dump($obj->updateMajor("郑州","南阳"));
		var_dump($obj->getMajors());
		var_dump($obj->deleteMajor("南阳"));
	}
	public function TestRelation(){
		$this->load->model("Relation_model");
		$obj=new Relation_model;
		var_dump($obj->addBlackList(4,2));
		var_dump($obj->getBlackLists(4));
		var_dump($obj->sendFriendRequest(2,4));
		var_dump($obj->deleteBlackList(4,2));
		var_dump($obj->sendFriendRequest(2,4));
		var_dump($obj->getFriendRequests(2));
		var_dump($obj->acceptFriendRequest(4,2));
		var_dump($obj->getFriends(2));
		var_dump($obj->deleteFriend(4,2));
	}
}
