<?php
require_once(APPPATH."qiniu/rs.php");
require_once(APPPATH."qiniu/auth_digest.php");
require_once(APPPATH."qiniu/io.php");

class Image_model extends CI_model{

    var $bucket = 'lovetransfer';
    var $accessKey = '7GftZjKuwI575QzLaZ5XErfs0TqNSCHLF4TIbpEG';
    var $secretKey = 'yMnwwrcjMIKkoIh4E58fSnYvmQK_a916xpEMLG-d';


    function __construct()
    {
        parent::__construct();
        Qiniu_SetKeys($this->accessKey, $this->secretKey);
    }

    function auth()
    {
        
        $putPolicy = new Qiniu_RS_PutPolicy($this->bucket);
        $putPolicy->CallbackUrl='http://lovetransfer.me/index.php/callback/push';
        $putPolicy->CallbackBody="key=$(key)";
        $upToken = $putPolicy->Token(null);
        return $upToken;
    }

    function uploadtest()
    {
       
        $putPolicy = new Qiniu_RS_PutPolicy($this->bucket);
        $putPolicy->CallbackUrl='http://lovetransfer.me/index.php/callback/push';
        $putPolicy->CallbackBody="key=$(key)";
        $upToken = $putPolicy->Token(null);
        $putExtra = new Qiniu_PutExtra();
       
        list($ret, $err) = Qiniu_PutFile($upToken, "54c25b25b9643e61528b4567_123.jpg",APPPATH.'third_party/1.png' , $putExtra);
        echo "====> Qiniu_PutFile result: \n";
        if ($err !== null) {
            var_dump($err);
        } else {
            var_dump($ret);
        }
    }

    function copy($key1,$key2){
        $client = new Qiniu_MacHttpClient(null);
        $err1 = Qiniu_RS_Delete($client, $this->bucket, $key2);
        $err2 = Qiniu_RS_Copy($client, $this->bucket, $key1, $this->bucket, $key2); 
  
        return $err2;
    }

    function uploadStr($key1,$str){
        $putPolicy = new Qiniu_RS_PutPolicy($this->bucket);
        $upToken = $putPolicy->Token(null);
        list($ret, $err) = Qiniu_Put($upToken, $key1, $str, null);
        echo "====> Qiniu_Put result: \n";
        if ($err !== null) {
            var_dump($err);
        } else {
            var_dump($ret);
        }
    }
    
     function uploadStrAndCopy($key1,$key2,$str){
        $putPolicy = new Qiniu_RS_PutPolicy($this->bucket);
        $upToken = $putPolicy->Token(null);
        list($ret, $err) = Qiniu_Put($upToken, $key1, $str, null);
        $client = new Qiniu_MacHttpClient(null);
        $err2 = Qiniu_RS_Copy($client, $this->bucket, $key1, $this->bucket, $key2); 
        return $err2;
    }
    
 
}

