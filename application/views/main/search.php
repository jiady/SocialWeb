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

	<div 
		role="alert"
		type=<?php
				if ($status==0)
					echo "hidden "; ?>
		class=<?php
				if ($status==1)
					echo "alert alert-success ";
				else if ($status==2)
					echo "alert alert-danger ";
				else
					echo "alert alert-warning "; ?>
		><? 
			if ($status==1)
				echo "成功发送了好友申请！ ";
			else if ($status==2)
				echo "错误！用户不存在！ ";
			else
				echo "存在同名用户！请用ID查询！ "; ?>
	</div>

	<div>
		<p></br></p>
	</div>
