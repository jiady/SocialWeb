<script type="text/javascript" >
$(".moveOutBlack_button").click(function() {
    $.post(<?="\"".site_url('blacklist_control/delete')."\""?>, {"delete_uid": $(this).attr("to_uid")}, function() {
            window.location.assign(<?="\"".site_url('blacklist_control')."\"" ?>);
        });
    });
</script>