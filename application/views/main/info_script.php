<script>
$(".changeTag_button").click(function() {
    $.post(<?="\"".site_url('info_control/deleteTag')."\""?>, {"tag": $(this).attr("content"), "status": $(this).attr("status")}, function(data) {
            if (data=="0")
            	window.location.assign(<?="\"".site_url('info_control')."\"" ?>);
        });
});
</script>