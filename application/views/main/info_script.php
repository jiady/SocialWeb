<script>
$(".changeTag_button").click(function() {
	to_delete=$("#"+$(this).attr("content"));
	to_delete.remove();
    $.post(<?="\"".site_url('info_control/deleteTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function(data) {
    		console.log("succeed");
});
$("#submit_tag").click(function() {
	var content=$("#tag_name_input").val();
	console.log(content);
	var to_add='<div class="row col-lg-10" id='+content+' ><div class="col-lg-2"><p> </p></div><div class="tags row col-lg-6 pull-center colorful well"><div class="col-lg-3"><p>'+content+'</p></div><div class="col-lg-3 pull-right"><button class=\'btn btn-warning changeTag_button\' content='+content+' status="1" >移除</button></div></div><div class="col-lg-2"><p> </p></div></div>';
    $("#rag_management").after(to_add);
    $.post(<?="\"".site_url('userinfo_control/addTag')."\""?>, {"tag": $(this).attr("content")}, function(data) {
            console.log("succeed");
        });
});
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*96)+160;
	var g=Math.round(Math.random()*96)+160;
	var b=Math.round(Math.random()*96)+160;
	var value="background-color: rgb("+r+","+g+","+b+")";
	$(this).attr("style",value);
});
</script>