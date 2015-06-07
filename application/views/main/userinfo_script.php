<script>
$("div.colorful").each(function(index, element) {
	var r=getRandomNum(0, 255);
	var g=getRandomNum(0, 255);
	var b=getRandomNum(0, 255);
	var value="rgb("+r+","+g+","+b+")";
	$(this).setAttribute("background-color",value);
});
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function() {
            window.location.assign(<?="\"".site_url('userinfo_control')."\"" ?>);
        });
});
</script>