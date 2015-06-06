<style type="text/css">
div {margin-top: 10px;}
#request.col-lg-10 {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(221,254,255);}
</style>

<div  id="request" class="col-lg-10">
	<div class="media col-lg-10">
	    <div class="media-left">
	        <a href="#">
	          <img class="media-object" src=<?=$url?> alt="HeadImage">
	        </a>
	    </div>
	    <div class="media-body">
	        <h4 class="media-heading"> <?=$name?> </h4>
	        <p> <?=$reason?></p>
	    </div>
	    <div class="media-right">
	        <?php 
	        	if ($accepted)
	        		echo "<p>已接受</p> ";
	        	else {
	        		echo "<button id=\"acc_but\" class='btn btn-default'>接受</button> ";
	        	}
	        ?>
	    </div>
	</div>
</div>

<scrip src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" >
$("#acc_but").click(function() {
		console.log("function called");
		$.post(<?="\"".site_url('friends_control/accept')."\""?>, {"from_uid": <?="\"".$from_uid."\"" ?>}, function() {
			window.location.assign(<?="\"".site_url('friends_control/accept')."\"" ?>);
		});
	});
</script>