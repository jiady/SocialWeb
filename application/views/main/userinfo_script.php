<script>
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*256);
	var g=Math.round(Math.random()*256);
	var b=Math.round(Math.random()*256);
	var value="rgb("+r+","+g+","+b+")";
	$(this).attr("background-color",value);
});
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function() {
            window.location.assign(<?="\"".site_url('userinfo_control')."\"" ?>);
        });
});
</script>