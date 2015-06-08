	<div class="col-lg-12">
		<h3>标签管理</h3>
	</div>
	<form method="post" action=<?=site_url('info_control/addTag')?> class='sheet form-horizontal'>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					标签：
				</span>
		      	<input type="text" class="form-control" name="name_tag" placeholder="Name..."/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">添加</button>
	     		</span>
	    	</div>
	    </div>
	</form>