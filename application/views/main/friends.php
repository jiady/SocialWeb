<style type="text/css">
div {margin-top: 10px;}
#friend.media {border-style: solid; border-width: 1px; border-color:black;background-color: rgb(252,255,200);}
</style>

<div class="col-lg-10">
	<div id="friend" class="media">
	    <div class="media-left">
	        <a href="#">
	          <img class="media-object" src=<?=$url?> alt="HeadImage">
	        </a>
	    </div>
	    <div class="media-body">
	        <h4 class="media-heading"> <?=$name?> </h4>
	        <p> <?=$profile?></p>
	    </div>
	    <div class="media-right">
	    	<div class="btn-group">
			    <button type="button" class="btn btn-danger">Action</button>
			    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			  		<span class="caret"></span>
			        <span class="sr-only">Toggle Dropdown</span>
			  	</button>
			  	<ul class="dropdown-menu" role="menu">
			    	<li><a href="#">Action</a></li>
			    	<li><a href="#">Another action</a></li>
			    	<li><a href="#">Something else here</a></li>
			    	<li class="divider"></li>
			    	<li><a href="#">Separated link</a></li>
			  	</ul>
			</div>
	    </div>
	</div>
</div>