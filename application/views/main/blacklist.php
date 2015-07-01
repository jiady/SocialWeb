<style type="text/css">
.blacklist.col-lg-10 {background-color: rgb(255,206,206);}
</style>
<div class="blacklist row well-sm col-lg-10">
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
	<div id="buttons" class="btn-group col-lg 2">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    操作 <span class="caret"></span>
		</button>
	  	<ul class="dropdown-menu" role="menu">
	    	<li><a href="#">操作</a></li>
	    	<li class="divider"></li>
	    	<li><a href=<?=site_url('people/index/'.$to_uid)?>>查看详细资料</a></li>
	    	<li><a class="moveOutBlack_button" to_uid=<?=$to_uid?>>移出黑名单</a></li>
	  	</ul>
	</div>
</div>