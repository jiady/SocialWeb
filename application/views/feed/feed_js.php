
<script type="text/javascript">
var to_uid=0;  
var fid=0;
var to_name="回复";
$(".comment").click(function(){
	console.log('here');
	to_name="回复";
	fid=$(this).attr('fid');
	$("#postx").removeAttr('placeholder');
	$("#postx").attr('placeholder',"回复");
	
});
$(".comment_area").click(function(){
	console.log('to_name');
	fid=$(this).attr('fid');
	to_uid=$(this).attr('touid');
	to_name=$(this).attr('toname');
	console.log(to_name);
	$("#postx").removeAttr('placeholder');
	$("#postx").attr('placeholder',"@"+to_name);
});

$("#post_comment").click(function(){
	console.log(fid);
	var postobject={};
	postobject.to_uid=to_uid;
	postobject.fid=fid;
	postobject.content=$("#postx").val();
	var url="http://xsjtu.com/index.php/feed/inner_comment";
	$.post(url,postobject,function(data){
			console.log(data.toString());
             if(data.cid>0){
                  //window.location.href="http://xsjtu.com/index.php/feed/#"+fid.toString(); 
             }
             else{
                alert("Something goes wrong");
             }
        },"json");
	$("#"+fid).before('<div class="media comment_area" touid='+to_uid+' fid='+fid+' toname= '+to_name+' data-toggle="modal" data-target="#myModal">');
	$("#"+fid).before('<div class="media-left">');
	$("#"+fid).before('<img class="media-object" src='+myimg+' alt="head">');
	$("#"+fid).before('</div>');
	$("#"+fid).before('<div class="media-body">');
	$("#"+fid).before('<p>我 @ '+to_name+'</p>');
	$("#"+fid).before('</div>');
	$("#"+fid).before('</div>');
});

$(".comment_area").mouseenter(function(){
 	$(this).addClass("myactive");
});


$(".comment_area").mouseleave(function(){
  	$(this).removeClass("myactive");
});



</script>



