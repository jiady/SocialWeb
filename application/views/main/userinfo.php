<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
<meta http-equiv="description" content="This is my page">

<link rel="stylesheet" href=<?=base_url("dist/css/login.css")?> >
<link rel="stylesheet" href=<?=base_url("dist/css/bootstrap.min.css")?>>
<link rel="stylesheet" href=<?=base_url("dist/css/animate.css")?>>
<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

</head>
<?php $this->load->model("Userinfo_model");?>

<body>
	<div class="container">
		<form  method="post" action=<?=site_url('userinfo_control/change')?> class='form-horizontal'>
			<div class="row">
				<div class="input-group">
					<span class="input-group-addon">
						姓名
					</span>
			      	<input type="text" class="form-control" name="name" value=<?=$info->name?>/>
		    	</div>
		    	<div class="input-group">
					<span class="input-group-addon">
						性别
					</span>
					<input class="form-control" type="text" name="gender" value=<?
						if ($info->gender==0)
							echo "男";
						else {
							echo "女";
						}?> data-provide="typeahead" data-source='["男", "女"]'/>
		    	</div>
		    </div>

	    	<div class="input-group">
	    		<span class="input-group-addon">
					个性签名
				</span>
			    <input type="text" class="form-control" name="profile" value=<?=$info->profile?> placeholder="Profile..."/>
		    </div>

		    <div class="input-group">
	    		<span class="input-group-addon">
					电子邮箱
				</span>
			    <input type="text" class="form-control" name="email" value=<?=$info->email?> placeholder="Profile..."/>
		    </div>

		    <div class="row">
				<div class="input-group">
					<span class="input-group-addon">
						学历
					</span>
			      	<input type="text" class="form-control" name="edu" value=<?=$info->edu?> data-provide="typeahead" data-source='["大学本科", "研究生","其他"]'/>
		    	</div>
		    	<div class="input-group">
					<span class="input-group-addon">
						入学年份
					</span>
					<input class="form-control" type="text" name="eduyear" value=<?=$info->eduyear?> placeholder="2012"/>
		    	</div>
		    </div>

		    <div class="input-group">
	    		<span class="input-group-addon">
					所在学校
				</span>
			    <input id="edu_enter" type="text" class="form-control" name="email" value=<?=$info->school?> data-provide="typeahead"/>
		    </div>

		    <div>
		    	<button type="submit" class="btn btn-default">提交</button>
		    </div>
		</form>
	</div>
</body>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#edu_enter').typeahead({
      	source: function(query, process) {
         	return <?php 
         		echo $this->Userinfo_model->getCities();
         		?>
      	}
   	});
});
</script>




</html>