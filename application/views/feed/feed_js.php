
<script type="text/javascript">
var to_uid=0;  
var fid=0;
var to_name="回复";
$(".comment").click(function(){
	console.log('here');
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
	
});

$(".comment_area").mouseenter(function(){
 	$(this).addClass("myactive");
});


$(".comment_area").mouseleave(function(){
  	$(this).removeClass("myactive");
});

</script>


