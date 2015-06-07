
<script type="text/javascript">
var to_uid=0;  
var fid=0;
var to_name="回复";
var from_uid=0;
var cid=0;
var to_delete;
$(".comment").click(function(){
	console.log('here');
	$("#delete_post").hide();
	to_name="回复";
	fid=$(this).attr('fid');
	$("#postx").removeAttr('placeholder');
	$("#postx").attr('placeholder',"回复");
	
});
$(".comment_area").click(function(){
	console.log('to_name');
	to_delete=$(this);
	from_uid=$(this).attr('fromuid');
	cid=$(this).attr('cid');
	console.log(from_uid);
	console.log(myid);
	if(from_uid==myid){
		$("#delete_post").show();
	}else{
		$("#delete_post").hide();
	}
	fid=$(this).attr('fid');
	to_uid=$(this).attr('touid');
	to_name=$(this).attr('toname');
	console.log(to_name);
	$("#postx").removeAttr('placeholder');
	$("#postx").attr('placeholder',"@"+to_name);
});
$("#delete_post").click(function(){
	to_delete.hide();
	var postobject={};
	postobject.cid=cid;
	var url="http://xsjtu.com/index.php/feed/inner_comment_delete";
	$.post(url,postobject,function(data){
			console.log(data.toString());
             if(data.ret==true){
                  //window.location.href="http://xsjtu.com/index.php/feed/#"+fid.toString(); 
             }
             else{
                alert("Something goes wrong");
             }
        },"json");
});
$(".feed_delete").click(function(){
	var fid_to_delete=$(this).attr('fid');
	$("#feed"+fid_to_delete).hide();
	var url="http://xsjtu.com/index.php/feed/inner_feed_delete";
	var postobject={};
	postobject.fid=fid_to_delete;
	$.post(url,postobject,function(data){
			console.log(data.toString());
             if(data.ret==true){
                  //window.location.href="http://xsjtu.com/index.php/feed/#"+fid.toString(); 
             }
             else{
                alert("Something goes wrong");
             }
        },"json");
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
	var inject='<div class="media comment_area" touid='+to_uid+' fid='+fid+' toname= '+to_name+' data-toggle="modal" data-target="#myModal">';
	inject+='<div class="media-left">';
	inject+='<img class="media-object" src='+myimg+' alt="head">';
	inject+='</div>';

	inject+='<div class="media-body">';
	inject+='<p>我 @ '+to_name+'</p>';
	inject+='<p> '+postobject.content+'</p>';
	inject+='</div>';
	inject+='</div>';

	
	$("#"+fid).before(inject);
	$("#postx").removeAttr('value');
});

$(".comment_area").mouseenter(function(){
 	$(this).addClass("myactive");
});


$(".comment_area").mouseleave(function(){
  	$(this).removeClass("myactive");
});
$(document).ready(function(){
  // 在这里写你的代码...
  $("#delete_post").hide();
});


</script>



