	<form  method="post" class='form-horizontal'>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					查找用户：
				</span>
		      	<input type="text" class="form-control" id="search_content" placeholder="ID或姓名"/>
	    	</div>
	    </div>
	    <div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					申请理由：
				</span>
		      	<input type="text" class="form-control" id="search_reason" value="Hello" placeholder="申请理由"/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" id="search_button" type="button">搜索并发送请求</button>
	     		</span>
	    	</div>
	    </div>
	</form>

	<div class="col-lg-10">
		<div id="status_tag" role="alert" style="display:none;" class="alert alert-success">
			成功发送了好友申请
		</div>
	</div>