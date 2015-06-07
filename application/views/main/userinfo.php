		<form  method="post" action=<?=site_url('userinfo_control/change')?> class='form-horizontal'>
			<div class="col-lg-8">
		    	<div class="input-group">
		    		<span class="input-group-addon">
						姓名
					</span>
				    <input type="text" class="form-control" name="profile" value=<?=$info["name"]?> />
			    </div>
			</div>

			<div class="row col-lg-8">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">出生年份</span>
				      	<input type="text" class="form-control" name="name" value=<?=$info["birthyear"]?> />
			    	</div>
			    </div>
			     
			    <div class="col-lg-5">
			    	<div class="input-group">
						<span class="input-group-addon">性别</span>
						<input class="form-control typeahead" type="text" name="gender" value=<?php
							if ($info['gender']==0)
								echo "男";
							else 
								echo "女" ?> />
			    	</div>
			    </div>
			</div>
			 
			<div class="col-lg-8">
		    	<div class="input-group">
		    		<span class="input-group-addon">
						个性签名
					</span>
				    <input type="text" class="form-control" name="profile" value=<?=$info["profile"]?> />
			    </div>
			</div>
			 
			<div class="col-lg-8">
			    <div class="input-group">
		    		<span class="input-group-addon">
						电子邮箱
					</span>
				    <input type="text" class="form-control" name="email" value=<?=$info["email"]?> />
			    </div>
			</div>
		     
		    <div class="row col-lg-8">
		    	<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">
							学历
						</span>
				      	<input type="text" class="form-control typeahead" name="edu" value=<?=$info["edu"]?> />
			    	</div>
			    </div>
			   	<div class="col-lg-5">
			    	<div class="input-group">
						<span class="input-group-addon">
							入学年份
						</span>
						<input class="form-control" type="text" name="eduyear" value=<?=$info["eduyear"]?> />
			    	</div>
			    </div>
			</div>
		    <div class="col-lg-8">
			    <div class="input-group">
		    		<span class="input-group-addon">
						所在学校
					</span>
				    <input id="school_enter" type="text" class="form-control typeahead" name="school" data-provide="typeahead" value=<?=$info["school"]?> />
			    </div>
			</div>
		     
		    <div class="col-lg-8">
			    <div class="input-group">
		    		<span class="input-group-addon">
						所学专业
					</span>
				    <input id="major_enter" type="text" class="form-control typeahead" name="major" data-provide="typeahead" value=<?=$info["major"]?> />
			    </div>
			</div>
		     
		    <div class="col-lg-8">
			    <div class="input-group">
		    		<span class="input-group-addon">
						所在城市
					</span>
				    <input id="city_enter" type="text" class="form-control typeahead" name="city" data-provide="typeahead" value=<?=$info["city"]?> />
			    </div>
			</div>
		     
		    <div >
		    	<button type="submit" class="btn btn-default"  style="margin-top:30px; float:right;">提交</button>
		    </div>
		</form>