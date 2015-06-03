<?php
if(isset($class))
echo "<div class='panel $class'>";
else
echo "<div class='panel panel-default'>";
?>
  <div class="panel-heading">
    <h3 class="panel-title"><?=$title?></h3>
  </div>
  <div class="panel-body">
    <?=$body?>
  </div>
</div>
