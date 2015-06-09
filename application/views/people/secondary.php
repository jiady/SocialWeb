<link rel="stylesheet" href=<?=base_url("dist/css/background.css")?> >
<?php $count=0; ?>

<?php foreach($friends as $info): $uid=$info['uid']; $url=site_url("/people/index/".$uid); ?>
 <?php if($count%3==0) echo "<div class='row' >"; $count++ ?>
<div class=" col-md-4 myclass animated">
    <div class="thumbnail ">
      <img src=<?=$info['headimage']?> alt="...">
      <div class="caption">
        <h3><?=$info['name']?></h3>
        <p><?="出生年份：".$info['birthyear']?></p>
        <?php if($info['gender']==0) $g='女'; else $g='男';?>
        <p><?="性别：".$g?></p>
        <p><?="学校：".$info['school']?></p>
        <p><?="专业：".$info['major']?></p>
        <p><?="城市：".$info['city']?></p>
        <p><?="签名：".$info['profile']?></p>
        <p class="text-right"><a href="<?=$url?>" class="btn btn-danger "  role="button">个人主页</a> </p>
      </div>
    </div>
  </div>
<?php if($count>0  && ($count%3==0||$count==sizeof($friends) ) ) echo "</div>" ?>
<?php endforeach ?>
