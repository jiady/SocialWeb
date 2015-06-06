

<div class='col-md-12 col-lg-12'>
<?php
function printk($url){
	  		echo " <div class='col-xs-6 col-md-3'>
			    <div class='thumbnail'>
			      <img src=".$url." alt='...'>
			    </div>
			  </div>";
	  	}

?>

<?php foreach ($feed as $row):?>
	<div class="panel panel-default col-md-8 col-lg-8">
	  <div class="panel-body">
	  <?php
	  	$grow=$gallery[$row->fid];
	  	$count=count($grow);
	  	

	  	if($count>0){
		  	if($count>9) $count=9;
		  	$high=(int)(($count-1)/3)+1;
		  	//echo "high".$high;
		  	$last=$count%3;
		  	if($last==0) $last=3;
		  	//var_dump($grow);
		  	for($i=1;$i<=$high;$i++){
		  		echo "<div class='row'>";
		  		if($i<$high)
		  		for ($j=1;$j<=3;$j++){
		  			$c=($i-1)*3+$j-1;
		  			printk($grow[$c]->url);
		  			//echo "c1\n";
		  			//echo $c;
		  			
		  		}
		  		else
		  		for ($j=1;$j<=$last;$j++){
		  			$c=($i-1)*3+$j-1;
		  			printk($grow[$c]->url);
		  			//echo "c2\n";
		  			//echo $c;
		  			
		  		}
		  		echo "</div>";
		  	}

		 }
	  ?>

	    <div class="media">
		  <div class="media-left">
		    
		    
		      <img class="media-object" src=<?=$row->putter_url?> alt="head">

		    
		  </div>
		  <div class="media-body">
		    <p><?=$row->content?></p>
		    <?php foreach ($comment[$row->fid] as $comrow): ?>
				    <div class="media">
					  <div class="media-left">
					    
					      <img class="media-object" src=<?=$comrow->commenter_url?> alt="head">
					    
					  </div>
					  <div class="media-body">
					    <p><?=$comrow->content?></p>
					  </div>
					</div>
			<?php endforeach?>
			<button class='comment' cid=<?=$row->fid?> data-target="#myModal" >回复</button>
		  </div>
		</div>





	  </div>
	</div>
<?php endforeach?>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">回复</h4>
      </div>
      <div class="modal-body">
        <input type='text'  rows="6" class='form-control' id="postx"  name="postx" placeholder="Email" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="post_comment">发布</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var cid=0;
$(".comment").click(function(){
	$cid=$(this).attr('cid');
});
$("#post_comment").click(function(){
	console.log($cid);
});

</script>

<script src=<?=base_url("/dist/qiniu.min.js")?>></script>
<script src=<?=base_url("/dist/plupload-2.1.4/js/plupload.min.js")?>></script>

