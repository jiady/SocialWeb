<link rel="stylesheet" href=<?=base_url("dist/css/background.css")?> >


<div class="col-sm-6 col-md-4 myclass animated">
    <div class="thumbnail ">
      <img src=<?=$headimage?> alt="...">
      <div class="caption">
        <h3><?=$info['name']?></h3>
        <p><?="出生年份：".$info['birthyear']?></p>
        <?php if($info['gender']==0) $g='女'; else $g='男';?>
        <p><?="性别：".$g?></p>
        <p><?="学校：".$info['school']?></p>
        <p><?="专业：".$info['major']?></p>
        <p><?="城市：".$info['city']?></p>
        <p><?="签名：".$info['profile']?></p>
        <?php if($isFriend): ?>
        <p class="text-right"><a href="#" class="btn btn-danger " id='add' role="button">Add<span class="badge">+</span></a> </p>
        <p class="text-right" style="display: none"  id='added'><a href="#" class="btn btn-default disabled " role="button">已经发出请求</a> </p>
    	<?php else :?>
    	<p class="text-right"><a href="#" class="btn btn-default disabled"  role="button">已经是好友了</a> </p>	
    	<?php endif;?>
      </div>
    </div>
  </div>

