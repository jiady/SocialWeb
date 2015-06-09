<script>
var to_delete;
var to_add;
var add=0;
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*96)+160;
	var g=Math.round(Math.random()*96)+160;
	var b=Math.round(Math.random()*96)+160;
	var value="background-color: rgb("+r+","+g+","+b+")";
	$(this).attr("style",value);
});
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function() {
            console.log("succeed");
            add=$(this).attr("status");
            if (add==0) {
            	to_delete=$("#"+$(this).attr("content")));
            	to_delete.hide();
            	to_add='<div class="row col-lg-10" id='+$(this).attr("content")+'>'+to_delete.html()+'</div>';
            	$("#current-tag").after(to_add);
            }
            else {
            	to_delete=$(this).parent().parent().parent();
            	to_delete.hide("fast");
            	to_add=to_delete.html();
            	$("#current-not-tag").after(to_add);
            }
        });
});
</script>