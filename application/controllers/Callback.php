<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callback extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Image_model');
		$this->load->model('Feed_model');
	}

	public function push()//post
	{
		$key=$this->input->post('key');
		$ar=explode("_", $key);
		$fid=$ar[0];
		$url='http://7u2p6a.com1.z0.glb.clouddn.com/'.$key;
		//$data=$this->Feed_model->addPictures($fid,$url);
		$this->output
    		 ->set_content_type('application/json')
    		 ->set_output(json_encode($data));
	}

	public function gettoken(){
		$token=$this->Image_model->auth();
		$this->output
    		 ->set_content_type('application/json')
    		 ->set_output(json_encode(array('uptoken'=>$token)));
	}

	public function test(){
		$this->Image_model->uploadtest();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */