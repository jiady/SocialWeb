<script>
$("div.colorful").each(function() {
	var r=getRandomNum(0, 255);
	var g=getRandomNum(0, 255);
	var b=getRandomNum(0, 255);
	var start="rgb(";
	$(this).setAttribute("background-color",start.concat(r,",",g,",",b")");
});
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function() {
            window.location.assign(<?="\"".site_url('userinfo_control')."\"" ?>);
        });
});
</script>