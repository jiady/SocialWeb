<style>
div {float:left; margin-top: 10px;margin-bottom:10px;}
form {margin-bottom: 10px; margin-top:10px;}
</style>

<div class="container">
	<form  method="post" action=<?=site_url('info_control/add')?> class='form-horizontal'>
		<div class="input-group">
			<span class="input-group-addon">
				新增<?=$part?>
			</span>
	      	<input type="text" class="form-control" name="name_add" placeholder="New name..."/>
	      	<span class="input-group-btn">
	        	<button class="btn btn-default" type="submit">提交</button>
     		</span>
    	</div>
    	<div class="input-group">
		      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>
	<br/>
	<form  method="post" action=<?=site_url('info_control/update')?>>
		<div class="row">
			<div class="col-lg-12">
				<div class="input-group">
					<span class="input-group-addon">
						修改<?=$part?>
					</span>
			      	<input type="text" class="form-control" name="name_old" placeholder="Old name..."/>
		    	</div>
		    </div>
		    <div class="col-lg-12">
				<div class="input-group">
			      	<input type="text" class="form-control" name="name_new" placeholder="New name..."/>
			      	<span class="input-group-btn">
			        	<button class="btn btn-default" type="submit">提交</button>
		     		</span>
		    	</div>
		    </div>
	    <div>
    	<div class="input-group">
		      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>
	<br/>
	<form method="post" action=<?=site_url('info_control/delete')?>>
		<div class="input-group">
			<span class="input-group-addon">
				删除<?=$part?>
			</span>
	      	<input type="text" class="form-control" name="name_delete" placeholder="Name..."/>
	      	<span class="input-group-btn">
	        	<button class="btn btn-default" type="submit">提交</button>
     		</span>
    	</div>
    	<div class="input-group">
		      	<input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>
	<br/>
</div>