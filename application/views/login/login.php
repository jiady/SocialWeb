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
	 align="center">
	<div class="container">
		<div class="searchbox">
			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 
			col-lg-offset-3 
			col-md-offset-3 
			col-sm-offset-2 
			col-xs-offset-1
			">
				<div class="title">Login</div>
			</br>

				<form  method="post" action=<?=site_url('welcome/login')?> role="login">
		        <div class='form-group'>
	                <label class='col-sm-2 control-label' for='email'>Email</label>
	                <div class='col-sm-10'>
	                    <input type='text' class='form-control' id="email"  name="email" placeholder="Email" >
	                </div>
            	</div>
            	 <div class='form-group'>
	                <label class='col-sm-2 control-label' for='password'>Password</label>
	                <div class='col-sm-10'>
	                    <input type='text' class='form-control' id="password"  name="password" placeholder="Password" >
	                </div>
            	</div>

		        <div class='form-actions col-sm-offset-11'>
	                <input type='submit' class='btn btn-success btn-large'  value="Login">
	            </div>

		    	
		      </form>

      		</div>
      		
      	</div>
	
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
$("button").click( function(){
	$(".searchbox").addClass("flipOutX");})
});

</script>




</html>
