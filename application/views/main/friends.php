<style type="text/css">
div {float:left; margin-top: 10px;}
#friend.col-lg-12 {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(252,255,200);}
</style>
<div id="friend" class="row col-lg-10">
	<div class="col-lg-7">
		<div class="media">
		    <div class="media-left">
		        <a href="#">
		          <img class="media-object" src=<?=$url?> alt="HeadImage">
		        </a>
		    </div>
		    <div class="media-body">
		        <h4 class="media-heading"> <?=$name?> </h4>
		        <p> <?=$profile?></p>
		    </div>
		</div>
	</div>
	<div class="btn-group col-lg 2">
			    <!-- Single button -->
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    操作 <span class="caret"></span>
		</button>
	  	<ul class="dropdown-menu" role="menu">
	    	<li><a href="#">操作</a></li>
	    	<li class="divider"></li>
	    	<li><a href="#">发消息</a></li>
	    	<li><a href="#">删除好友</a></li>
	    	<li><a href="#">移入黑名单</a></li>
	  	</ul>
	</div>
</div>