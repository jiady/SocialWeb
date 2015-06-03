
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>LoveTransfer</title>

<!-- Bootstrap core CSS -->
<link href="<?=base_url()?>dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>dist/css/home_act.min.css" rel="stylesheet">
<!-- Custom styles for this template -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
div {float:left;}
</style>

</head>
<?php $this->load->model("Userinfo_model")?>

<body>
	<div class="container">
		<form  method="post" action=<?=site_url('userinfo_control/change')?> class='form-horizontal'>
			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-addon">姓名</span>
				      	<input type="text" class="form-control" name="name" value=<?=$info["name"]?> />
			    	</div>
			    </div>
			    <div class="col-lg-12">
			    	<div class="input-group">
						<span class="input-group-addon">
							性别
						</span>
						<input class="form-control typeahead" type="text" name="gender" value=<?php
							if ($info['gender']==0)
								echo "男";
							else 
								echo "女" ?> />
			    	</div>
			    </div>
		    </div>
			<br/>
			<div class="col-lg-12">
		    	<div class="input-group">
		    		<span class="input-group-addon">
						个性签名
					</span>
				    <input type="text" class="form-control" name="profile" value=<?=$info["profile"]?> />
			    </div>
			    <br/>
			</div>
			<div class="col-lg-12">
			    <div class="input-group">
		    		<span class="input-group-addon">
						电子邮箱
					</span>
				    <input type="text" class="form-control" name="email" value=<?=$info["email"]?> />
			    </div>
			</div>
		    <br/>
		    <div class="row">
		    	<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-addon">
							学历
						</span>
				      	<input type="text" class="form-control typeahead" name="edu" value=<?=$info["edu"]?> />
			    	</div>
			   	</div>
			   	<div class="col-lg-12">
			    	<div class="input-group">
						<span class="input-group-addon">
							入学年份
						</span>
						<input class="form-control" type="text" name="eduyear" value=<?=$info["eduyear"]?> />
			    	</div>
			    </div>
		    </div>
		    <br/>
		    <div class="col-lg-12">
			    <div class="input-group">
		    		<span class="input-group-addon">
						所在学校
					</span>
				    <input id="school_enter" type="text" class="form-control typeahead" name="school" data-provide="typeahead" value=<?=$info["school"]?> />
			    </div>
			</div>
		    <br/>
		    <div>
			    <div class="input-group">
		    		<span class="input-group-addon">
						所学专业
					</span>
				    <input id="major_enter" type="text" class="form-control typeahead" name="major" data-provide="typeahead" value=<?=$info["major"]?> />
			    </div>
			</div>
		    <br/>
		    <div>
			    <div class="input-group">
		    		<span class="input-group-addon">
						所在城市
					</span>
				    <input id="city_enter" type="text" class="form-control typeahead" name="city" data-provide="typeahead" value=<?=$info["city"]?> />
			    </div>
			</div>
		    <br/>
		    <div >
		    	<button type="submit" class="btn btn-default">提交</button>
		    </div>
		</form>
	</div>
</body>

<div class="footer">
    <p>© Team of Social Web</p>
</div>
    
   
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src=<?=base_url("dist/js/bootstrap-typeahead.js")?>></script>
   
     </div> <!-- /container -->
  </body>
</html>