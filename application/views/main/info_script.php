<script>
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('info_control/deleteTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function(data) {
            if (data=="0")
            	window.location.assign(<?="\"".site_url('info_control')."\"" ?>);
        });
});
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*192)+64;
	var g=Math.round(Math.random()*192)+64;
	var b=Math.round(Math.random()*192)+64;
	var value="background-color: rgb("+r+","+g+","+b+")";
	$(this).attr("style",value);
});
</script>