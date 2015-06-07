<style type="text/css">
div.tags {margin-top: 5px; padding:1px;border-style: solid; border-width: 1px; border-color:black;}
</style>

<div class="tags row col-lg-8 colorful">
	<div class="col-lg-6">
		<p><?=$content?></p>
	</div>
	<div class="col-lg-2">
		<button type="button button-success changeTag_button" content=<?=$content?> status=<?=$status?> > <?
			if ($status==0)
				echo "添加";
			else ($status==1)
				echo "移除";
		?></button>
	</div>
</div>
