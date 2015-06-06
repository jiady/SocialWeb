	<form  method="post" action=<?=site_url('friends_control/search')?> class='form-horizontal'>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					查找用户：
				</span>
		      	<input type="text" class="form-control" name="search_content" placeholder="ID或姓名"/>
	    	</div>
	    </div>
	    <div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					申请理由：
				</span>
		      	<input type="text" class="form-control" name="search_reason" value="Hello" placeholder="申请理由"/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">提交</button>
	     		</span>
	    	</div>
	    </div>
	</form>

	<div class="col-lg-10">
		<div role="alert" style="display:none;" class="alert alert-success">
			成功发送了好友申请
		</div>
	</div>