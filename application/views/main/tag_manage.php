<style type="text/css">
div.tags {margin: 5px;}
</style>

<div class="row col-lg-10">
	<div class="col-lg-2">
		<p> </p>
	</div>
	<div class="tags row col-lg-6 pull-center colorful">
		<div class="col-lg-3">
			<p><?=$content?></p>
		</div>
		<div class="col-lg-3 pull-right">
			<button style="padding:2px;" <?php
				if ($status==0)
					echo "class='btn btn-success changeTag_button'";
				else
					echo "class='btn btn-warning changeTag_button'";
			?> content=<?=$content?> status=<?=$status?>> 
			<?php
				if ($status=="0")
					echo "添加";
				else
					echo "移除";
			?></button>
		</div>
	</div>
	<div class="col-lg-2">
		<p> </p>
	</div>
</div>