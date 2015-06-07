<style type="text/css">
div {margin-top: 10px;padding:3px;}
.request.col-lg-10 {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(221,254,255);}
</style>

<div class="request row col-lg-10">
	<div class="media col-lg-8">
	    <div class="media-left">
	        <a href="#">
	          <img class="media-object" src=<?=$url?> alt="HeadImage">
	        </a>
	    </div>
	    <div class="media-body">
	        <h4 class="media-heading"> <?=$name?> </h4>
	        <p> <?=$reason?></p>
	    </div>
	</div>
	<div class="col-lg-2 pull-right">
	        <?php 
	        	if ($accepted)
	        		echo "<p>已接受</p> ";
	        	else {
	        		echo "<button from_uid=".$from_uid." class='accept_button btn btn-default'>接受</button> ";
	        	}
	        ?>
	</div>
</div>