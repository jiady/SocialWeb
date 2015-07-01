<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link href="<?=base_url()?>dist/css/home_act.min.css" rel="stylesheet">
<style type="text/css">


::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
 <!-- Static navbar -->
   <!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=<?=base_url()?>>Social Web</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">

               <li
               <?php if (isset($activetag)&&$activetag=="首页") echo "class='active' "?>
               ><a href=<?=site_url("feed")?>>首页</a></li>

				<li
               <?php if (isset($activetag)&&$activetag=="发布") echo "class='active' "?>
               ><a href=<?=site_url("feed/feed_post")?>>发布</a></li>
              
               <li
                <?php if (isset($activetag)&&$activetag=="个人资料") echo "class='active' "?>
               ><a href=<?=site_url("userinfo_control")?>>个人资料</a></li>
               
              <li
                <?php if (isset($activetag)&&$activetag=="好友列表") echo "class='active' "?>
               ><a href=<?=site_url("friends_control")?>>好友列表</a></li>

               <li
                <?php if (isset($activetag)&&$activetag=="二度人脉") echo "class='active' "?>
               ><a href=<?=site_url("people/secondary")?>>二度人脉</a></li>

                <li
                <?php if (isset($activetag)&&$activetag=="今日匹配") echo "class='active' "?>
               ><a href=<?=site_url("people/match")?>>今日匹配</a></li>

               <li
                <?php if (isset($activetag)&&$activetag=="黑名单") echo "class='active' "?>
               ><a href=<?=site_url("blacklist_control")?>>黑名单</a></li>
               

            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li
                <?php if (isset($activetag)&&$activetag=="登出") echo "class='active'"?>
               ><a href=<?=site_url("welcome/logout")?>>登出</a></li>
            </ul>

            </div><!--/.nav-collapse -->
    </div>
</nav>
 </br>
 </br>
 </br>

	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
</body>
</html>