<style type="text/css">
.non-friend.col-lg-10 {background-color: rgb(253,241,206);}
</style>
<div class="non-friend row well col-lg-10">
	<div class="col-lg-8">
		<div class="media">
		    <div class="media-left">
		        <a href=<?=site_url('people/index/'.$to_uid)?>>
		          <img class="media-object" src=<?=$url?> alt="HeadImage">
		        </a>
		    </div>
		    <div class="media-body">
		        <h4 class="media-heading"> <?=$name?> </h4>
		        <p> <?=$profile?></p>
		    </div>
		</div>
	</div>
	<?php 
		if ($has_request==0)
			echo '
				<div class="btn-group col-lg-2 pull-right">
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					    操作 <span class="caret"></span>
					</button>
				  	<ul class="dropdown-menu" role="menu" style="float:right">
				    	<li><a href="#">操作</a></li>
				    	<li class="divider"></li>
				    	<li><a href='.site_url('people/index/'.$to_uid).'>查看详细资料</a></li>
				    	<li><a class="add_button" to_uid='.$to_uid.'>加为好友</a></li>
				  	</ul>
				</div>';
		else
			echo '
				<div class="col-lg 2 pull-right">
					<p>等待对方接受</p>
				</div>';
	?>
</div>