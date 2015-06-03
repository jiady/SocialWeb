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

<link rel="stylesheet" href=<?=base_url("dist/css/register.css")?> >
<link rel="stylesheet" href=<?=base_url("dist/css/bootstrap.min.css")?>>
<link rel="stylesheet" href=<?=base_url("dist/css/animate.css")?>>
<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

</head>

<body bgcolor="#c0c0c0" link="#999999" alink="#999999" vlink="#999999"
	 >
	<div class="container">
		<h2 class="pull-right"><a href=<?=site_url('welcome')?>>Login</a></h2>
		<div class="searchbox">
			<div class="col-lg-4 col-md-4 col-sm-8 col-xs-10 
			col-lg-offset-4 
			col-md-offset-4 
			col-sm-offset-2 
			col-xs-offset-1
			">
				<h2>Register</h2>
				<form  method="post" action=<?=site_url('welcome/register')?> role="register">
		        <div class='form-group'>
	                    <input type='text' class='form-control' id="email"  name="email" placeholder="Email" >
	
            	</div>
            	
            	 <div class='form-group'>
	                
	                    <input type='password' class='form-control' id="password"  name="password" placeholder="Password" >
	                
            	</div>

		        <div class='form-actions '>
	                <input type='submit' class='btn btn-info col-sm-offset-10 col-md-offset-10 col-lg-offset-10'  value="Register">
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
$(".btn").click( function(){
	$(".searchbox").addClass("flipOutX");})
});

</script>




</html>
