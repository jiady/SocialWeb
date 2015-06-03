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
<body bgcolor="#c0c0c0" link="#999999" alink="#999999" vlink="#999999"
	 >
	<div class="container">
		<form  method="post" action=<?=site_url('info_control/add')?>>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">
					新增<?=$part?>
				</span>
		      	<input type="text" class="form-control" name="name_add" placeholder="New name..."/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">提交</button>
	     		</span>
	    	</div>
	    	<div class="input-group">
			      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
		    </div>
		</form>

		<form  method="post" action=<?=site_url('info_control/update')?>>
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							修改<?=$part?>
						</span>
				      	<input type="text" class="form-control" name="name_old" placeholder="Old name..."/>
			    	</div>
			    </div>
			    <div class="col-lg-6">
					<div class="input-group">
				      	<input type="text" class="form-control" name="name_new" placeholder="New name..."/>
				      	<span class="input-group-btn">
				        	<button class="btn btn-default" type="submit">提交</button>
			     		</span>
			    	</div>
			    </div>
		    <div>
	    	<div class="input-group">
			      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
		    </div>
		</form>

		<form method="post" action=<?=site_url('info_control/delete')?>>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">
					删除<?=$part?>
				</span>
		      	<input type="text" class="form-control" name="name_delete" placeholder="Name..."/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">提交</button>
	     		</span>
	    	</div>
	    	<div class="input-group">
			      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
		    </div>
		</form>
	</div>
</body>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	if (document.addEventListener) {
    //如果是Firefox  
    	document.addEventListener("keypress", enterEvent, false);
	} else {
	    //如果是IE
	    document.attachEvent("onkeypress", enterEvent);
	}
	function enterEvent(evt) {
	    if (evt.keyCode == 13) {
	        //do something
	         console.log("sss");
            $(".searchbox").addClass("flipOutX");
	    }
}       
$(".btn").click( function(){
	$(".searchbox").addClass("flipOutX");})
});

</script>




</html>