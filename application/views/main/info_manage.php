<style type="text/css">
form {float:left; margin-top: 5px; margin-bottom: 5px;}
</style>

	<form  method="post" action=<?=site_url('info_control/add')?> class='form-horizontal'>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					新增<?=$part?>
				</span>
		      	<input type="text" class="form-control" name="name_add" placeholder="New name..."/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">提交</button>
	     		</span>
	    	</div>
	    </div>
    	<div class="input-group">
		    <input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>
	<form  method="post" action=<?=site_url('info_control/update')?> class='form-horizontal'>
		<div class="row col-lg-10">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">
						修改<?=$part?>
					</span>
			      	<input type="text" class="form-control" name="name_old" placeholder="Old name..."/>
		    	</div>
		    </div>
	    	<div class="col-lg-6">
				<div class="input-group">
			      	<input type="text" class="form-control" name="name_new" placeholder="New name..."/>
			      	<span class="input-group-btn">
			        	<button class="btn btn-default" type="submit">提交</button>
		     		</span>
		    	</div>
		    </div>
	    </div>
    	<div class="input-group">
		    <input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>
	<form method="post" action=<?=site_url('info_control/delete')?> class='form-horizontal'>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">
					删除<?=$part?>
				</span>
		      	<input type="text" class="form-control" name="name_delete" placeholder="Name..."/>
		      	<span class="input-group-btn">
		        	<button class="btn btn-default" type="submit">提交</button>
	     		</span>
	    	</div>
	    </div>
    	<div class="input-group">
		    <input type="hidden" class="form-control" name="part" value=<?=$part?> placeholder="Old name..."/>
	    </div>
	</form>