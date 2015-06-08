<script type="text/javascript">
$(document).ready(function(){
$('.myclass').addClass('bounceInRight');
});
$('#add').click(function(){
	$(this).hide();

	var postobject={};
	postobject.to_uid=<?=$info['uid']?>;
	var url="http://xsjtu.com/index.php/people/sendFriendRequest";
	$.post(url,postobject,function(data){
			console.log(data.toString());
             if(data.ret==true){
                  //window.location.href="http://xsjtu.com/index.php/feed/#"+fid.toString(); 
             }
             else{
                alert("Something goes wrong");
             }
        },"json");
	$('#added').show();
});
</script>
