<link rel="stylesheet" href=<?=base_url("dist/css/background.css")?> >

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
	<div class="panel panel-default col-md-8 col-lg-8 animated" id=<?='feed'.$row->fid?>>
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
		  <div class="media-body ">
		  	<h4><?=$row->putter_name?><small> 发表于<?=$row->post_time?></small></h4>
		    <p><?=$row->content?></p>
		    <?php foreach ($comment[$row->fid] as $comrow): ?>
		    	<?php $touid=0;
		    	if(isset($comrow->to_uid)) $touid=$comrow->to_uid;
		    		$toname='无名氏';
		    	if(isset($comrow->to_name) && strlen($comrow->to_name)>0) 
					$toname=$comrow->to_name;
		    	?>
				    <div class="media comment_area" touid=<?=$touid?> fid=<?=$row->fid?> toname= <?=$toname?> fromuid=<?=$comrow->uid?>  cid=<?=$comrow->cid?>   data-toggle="modal" data-target="#myModal">
					  <div class="media-left">
					      <img class="media-object" src=<?=$comrow->commenter_url?> alt="head">
					  </div>
					  <div class="media-body">

					  <?php if(isset($comrow->to_uid) && isset($comrow->to_name) && strlen($comrow->to_name)>0) :?>
					  	<p><?=$comrow->commenter_name?> 回复 <?=$comrow->to_name?> &nbsp;&nbsp;<small><?= $comrow->post_time?></small></p>
					  <?php else:?>
					  	<p><?=$comrow->commenter_name?>&nbsp;&nbsp;<small><?= $comrow->post_time?></small> </p>
					  <?php endif ?>
					    <p><?=$comrow->content?></p>
					  </div>
					</div>
			<?php endforeach?>
			
			<button  type="button" class='btn btn-primary comment pull-right' data-toggle="modal" data-target="#myModal" fid=<?=$row->fid?> id=<?=$row->fid?> >回复</button>
		    <?php if($myinfo['uid']==$row->uid):?>
			<button  type="button" class='btn btn-success feed_delete pull-right'  fid=<?=$row->fid?>  >删除</button>	
			<?php endif?>
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
        <input type='text'   class='form-control' id="postx"  name="postx"  >
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal" id='delete_post'>删除该评论</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="post_comment" data-dismiss="modal">发布</button>
      </div>
    </div>
  </div>
</div>


<script src=<?=base_url("/dist/qiniu.min.js")?>></script>
<script src=<?=base_url("/dist/plupload-2.1.4/js/plupload.min.js")?>></script>
<script type="text/javascript">
	var myid='<?=$myinfo['uid']?>';
	var myimg='<?=$myinfo['headimage']?>';
</script>

