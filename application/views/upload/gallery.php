
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
               
                <div class="input-group input-group-lg">
                  <input type="text" id="feed_content" class="form-control " placeholder="新鲜事...">
                  <span class="input-group-btn">
                    <button id="post_button" class="btn btn-success btn-large" type="button">发布</button>
                  </span>
                </div><!-- /input-group -->
                </br>
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
   

   





<script type="text/javascript" src=<?=base_url("/demo/js/jquery-1.9.1.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/bootstrap/js/bootstrap.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/plupload/plupload.full.min.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/plupload/i18n/zh_CN.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/ui.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/qiniu.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/highlight/highlight.js")?>></script>
<script type="text/javascript" src=<?=base_url("/demo/js/main_post_gallery.js")?>></script>

