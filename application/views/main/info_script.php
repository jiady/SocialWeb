<script>
$(document).on("click", ".changeTag_button", function() { 
	to_delete=$("#"+$(this).attr("content"));
	to_delete.remove();
    $.post(<?="\"".site_url('info_control/deleteTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function(data) {
    		console.log("succeed");
    	});
});
$("#submit_tag").click(function() {
	var content=$("#tag_name_input").val();
	var to_add='<div class="row col-lg-10" id=\"'+content+'\" >';
	to_add+='<div class="col-lg-2">';
	to_add+='<p> </p>';
	to_add+='</div>';
	to_add+='<div class="tags row col-lg-6 pull-center colorful well">';
	to_add+='<div class="col-lg-3">';
	to_add+='<p>'+content+'</p>';
	to_add+='</div>';
	to_add+='<div class="col-lg-3 pull-right">';
	to_add+='<button class="btn btn-warning changeTag_button" content=\"'+content+'\" status="1" >移除</button>';
	to_add+='</div>';
	to_add+='</div>';
	to_add+='<div class="col-lg-2">';
	to_add+='<p> </p>';
	to_add+='</div>';
	to_add+='</div>';
    $("#tag_management").after(to_add);
    $.post(<?="\"".site_url('info_control/addTag')."\""?>, {"tag": content}, function(data) {
            console.log("succeed");
        });
    var added=$("#"+content);
    var r=Math.round(Math.random()*96)+160;
    var g=Math.round(Math.random()*96)+160;
    var b=Math.round(Math.random()*96)+160;
    var value="background-color: rgb("+r+","+g+","+b+")";
    added.attr("style",value);
    }
});
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*96)+160;
	var g=Math.round(Math.random()*96)+160;
	var b=Math.round(Math.random()*96)+160;
	var value="background-color: rgb("+r+","+g+","+b+")";
	$(this).attr("style",value);
});
</script>