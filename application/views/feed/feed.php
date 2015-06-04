<button type="button" class="btn btn-default" id="postnew" data-toggle="modal" data-target="#myModal"> 发布新鲜事</button>

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
		  </div>
		</div>





	  </div>
	</div>
<?php endforeach?>
</div>
<script type="text/javascript">
	 var uploader = Qiniu.uploader({
                runtimes: 'html5,html4,flash',    //上传模式,依次退化
                browse_button: '#pickfiles',       //上传选择的点选按钮，**必需**
                uptoken_url: 'http://xsjtu.com/index.php/callback/gettoken',            //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
                // uptoken : '', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
                // unique_names: true, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
                // save_key: true,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
                domain: 'http://qiniu-plupload.qiniudn.com/',   //bucket 域名，下载资源时用到，**必需**
                container: 'container',           //上传区域DOM ID，默认是browser_button的父元素，
                max_file_size: '100mb',           //最大文件体积限制
                flash_swf_url: <?=base_url('/dist/plupload-2.1.4/js/plupload/Moxie.swf')?>,  //引入flash,相对路径
                max_retries: 3,                   //上传失败最大重试次数
                dragdrop: true,                   //开启可拖曳上传
                drop_element: 'container',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                //分块上传时，每片的体积
                auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
                init: {
                    'FilesAdded': function(up, files) {
                        plupload.each(files, function(file) {
                            // 文件添加进队列后,处理相关的事情
                        });
                    },
                    'BeforeUpload': function(up, file) {
                           // 每个文件上传前,处理相关的事情
                    },
                    'UploadProgress': function(up, file) {
                           // 每个文件上传时,处理相关的事情
                    },
                    'FileUploaded': function(up, file, info) {
                           // 每个文件上传成功后,处理相关的事情
                           // 其中 info 是文件上传成功后，服务端返回的json，形式如
                           // {
                           //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                           //    "key": "gogopher.jpg"
                           //  }
                           // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html

                           // var domain = up.getOption('domain');
                           // var res = parseJSON(info);
                           // var sourceLink = domain + res.key; 获取上传成功后的文件的Url
                    },
                    'Error': function(up, err, errTip) {
                           //上传出错时,处理相关的事情
                    },
                    'UploadComplete': function() {
                           //队列文件处理完毕后,处理相关的事情
                    },
                    'Key': function(up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在 unique_names: false , save_key: false 时才生效

                        var key =  (new Date()).valueOf().toString()+Math.floor((Math.random() * 10) + 1).toString();

                        // do something with key here
                        return key
                    }
                }
            });
uploader.init();
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">发布新鲜事</h4>
      </div>
      <div class="modal-body">
        <input type='text'  rows="6" class='form-control' id="postx"  name="postx" placeholder="Email" >
        <button id="pickfiles" type="button" class="btn btn-success" > 选取照片 </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">发布</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>

<script src=<?=base_url("/dist/qiniu.min.js")?>></script>
<script src=<?=base_url("/dist/plupload-2.1.4/js/plupload.min.js")?>></script>

