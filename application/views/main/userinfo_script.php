<script>
$("div.colorful").each(function(index, element) {
	var r=Math.round(Math.random()*192)+64;
	var g=Math.round(Math.random()*192)+64;
	var b=Math.round(Math.random()*192)+64;
	var value="background-color: rgb("+r+","+g+","+b+")";
	$(this).attr("style",value);
});
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('userinfo_control/changeTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function() {
            window.location.assign(<?="\"".site_url('userinfo_control')."\"" ?>);
        });
});
</script>