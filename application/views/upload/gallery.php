
<link rel="stylesheet" href=<?=base_url("/demo/main.css")?>>
	<div class="text-left col-md-12 wrapper">
		<h1 class="text-left col-md-12 myclass animated">
			上传图片到我的相册
            
		</h1>
        <input type="hidden" id="domain" value="http://7u2p6a.com1.z0.glb.clouddn.com/">
        <input type="hidden" id="uptoken_url" value="http://xsjtu.com/index.php/callback/gettoken">
		


         
    </div>
    <p id='print'></p>  
       

    <div class="body">
        <div class="col-md-8 " >
            <div id="container">
               
                
                <a class="btn btn-default btn-lg myclass animated" id="pickfiles" href="#" >
                    <i class="glyphicon glyphicon-plus"></i>
                    <sapn>选择图片</sapn>
                </a>
                
            </div>
        </div>

        <div style="display:none" id="success" class="col-md-12">
            <div class="alert-success">
                队列全部文件处理完毕
            </div>
        </div>
        <div class="col-md-12 ">
            <table class="table table-striped table-hover text-left"   style="margin-top:40px;display:none">
                <thead>
                  <tr>
                    <th class="col-md-4">Filename</th>
                    <th class="col-md-2">Size</th>
                    <th class="col-md-6">Detail</th>
                  </tr>
                </thead>
                <tbody id="fsUploadProgress">
                </tbody>
            </table>
        </div>
    </div>
   

<?php $count=0; ?>

<?php foreach($gallery as $info): $gid=$info->gid; $url=$info->url ?>
<?php if($count%3==0) echo "<div class='row' >"; $count++ ?>
<div class=" col-md-4 myclass animated"  id=<?="image".$gid?>>
    <div class="thumbnail ">
      <img src=<?=$url ?> alt="...">
      <div class="caption">

        <p class="text-right">
        <button  class="btn btn-success set_head" role="button" gid=<?=$gid?> >设为头像</button>
        <button class="btn btn-danger delete_button"  role="button" gid=<?=$gid?> >删除</button>
        </p>

      </div>
    </div>
  </div>
<?php if($count>0  && ($count%3==0||$count==sizeof($gallery) ) ) echo "</div>" ?>
<?php endforeach ?>




<script type="text/javascript" src=<?=base_url("/demo/js/jquery-1.9.1.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/bootstrap/js/bootstrap.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/plupload/plupload.full.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/plupload/i18n/zh_CN.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/ui.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/qiniu.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/highlight/highlight.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/main_post_gallery.js")?>></script>

