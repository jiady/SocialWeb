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
    add=$(this).attr("status");
    to_delete=$("#"+$(this).attr("content"));
    console.log(to_delete);
    to_delete.hide();
    to_add='<div class="row col-lg-10" id='+$(this).attr("content")+'>'+to_delete.html()+'</div>';
    if (add=="0") {
        $("#current-tag").after(to_add);
        to_add.find(".changeTag_button").innerHTML("移除");
        to_add.find(".changeTag_button").attr("status","1");
    }
    else {
        $("#current-not-tag").after(to_add);
        to_add.find(".changeTag_button").innerHTML("添加");
        to_add.find(".changeTag_button").attr("status","0");
    }
    to_delete.remove();
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function(data) {
            console.log("succeed");
        });
});
</script>