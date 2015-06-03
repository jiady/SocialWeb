<?php
if(!isset($print)||$print==false)
return;
?>

<div class="alert alert-<?=$type?>">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?=$info?>
</div>