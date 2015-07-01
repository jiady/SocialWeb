<style type="text/css">
.request.col-lg-10 {background-color: rgb(221,254,255);}
</style>

<div class="request well-sm row col-lg-10">
	<div class="media col-lg-8">
	    <div class="media-left">
	        <a href=<?=site_url('people/index/'.$from_uid)?>>
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
	        		echo '
	        		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		   			 操作 <span class="caret"></span>
					</button>
	  				<ul class="dropdown-menu" role="menu" style="float:right">
	    				<li><a href="#">操作</a></li>
	    				<li class="divider"></li>
	    				<li><a href='.site_url('people/index/'.$from_uid).'>查看详细资料</a></li>
	    				<li><a class="accept_button" from_uid='.$from_uid.'>接受</a></li>
	    				<li><a class="moveBlack_button" to_uid='.$from_uid.'>移入黑名单</a></li>
	  				</ul>';
	        	}
	        ?>
	</div>
</div>