<style type="text/css">
div {margin-top: 10px; padding:3px;}
.friend.col-lg-10 {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(203,254,192);}
</style>
<div class="friend row col-lg-10">
	<div class="col-lg-8">
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
	<div id="buttons" self=<?=$self?> class="btn-group col-lg-2">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    操作 <span class="caret"></span>
		</button>
	  	<ul class="dropdown-menu" role="menu" style="float:right">
	    	<li><a href="#">操作</a></li>
	    	<li class="divider"></li>
	    	<li><a class="send" to_uid=<?=$to_uid?>>发消息</a></li>
	    	<li><a class="delete_button" to_uid=<?=$to_uid?>>删除好友</a></li>
	    	<li><a class="moveBlack_button" to_uid=<?=$to_uid?>>移入黑名单</a></li>
	  	</ul>
	</div>
</div>