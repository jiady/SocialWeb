<style type="text/css">
div {margin-top: 10px;}
#request.media {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(221,254,255);}
</style>

<div class="col-lg-12">
	<div class="media" id="request">
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
	        		echo "<button id='acc_button' class='btn btn-default' type='button'>接受</button> ";
	        	}
	        ?>
	    </div>
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
$("#acc_button").click(function() {
		$.post(<? echo "\"".site_url('friends_control/accept')."\""?>, {from_uid: <? echo "\"".$from_uid."\"" ?>}, function() {
			window.location.assign(<? echo "\"".site_url('friends_control/accept')."\"" ?>);
		});
	});
</script>