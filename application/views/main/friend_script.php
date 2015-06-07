
<script type="text/javascript" >
$(document).ready(function() {
    var self=$("#buttons").attr("self");
    if (self=="true")
        $("#buttons").hide();
    });
$(".accept_button").click(function() {
    console.log("function called");
    $.post(<?="\"".site_url('friends_control/accept')."\""?>, {"from_uid": $(this).attr("from_uid")}, function() {
            window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
        });
    });
$(".delete_button").click(function() {
    console.log("deleted");
    $.post(<?="\"".site_url('friends_control/delete')."\""?>, {"delete_uid": $(this).attr("to_uid")}, function() {
            window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
        });
    });
$(".moveBlack_button").click(function() {
    $.post(<?="\"".site_url('friends_control/moveBlack')."\""?>, {"black_uid": $(this).attr("to_uid")}, function() {
            window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
        });
    });
$("#search_button").click(function() {
    var content=eval(document.getElementById("search_content")).value;
    var reason=eval(document.getElementById("search_reason")).value;
    $.post(<?="\"".site_url('friends_control/search')."\""?>, {"search_content": content, "search_reason": reason}, function(data) {
            if (data==0) {
                $("#status_tag").fadeOut("fast");
            }
            else {
                $("#status_tag").fadeIn("fast");
                var tag=document.getElementById('status_tag');
                if (data==1) {
                    tag.setAttribute("class","alert alert-success");
                    tag.innerHTML="成功发送了好友请求！";
                }
                else if (data==2) {
                    tag.setAttribute("class","alert alert-warning");
                    tag.innerHTML="存在重名！请用ID查询！";
                }
                else if (data==3) {
                    tag.setAttribute("class","alert alert-danger");
                    tag.innerHTML="错误！用户不存在！";
                }
                else if (data==4) {
                    tag.setAttribute("class","alert alert-info");
                    tag.innerHTML="错误！你在对方黑名单中！";
                }
            }
        });
    });
$(".add_button").click(function() {
    $.post(<?="\"".site_url('friends_control/search')."\""?>, {"search_content": $(this).attr("to_uid"), "search_reason": "系统推荐"}, function(data) {
            $("#status_tag").fadeIn("fast");
            var tag=document.getElementById('status_tag');
            if (data==1) {
                tag.setAttribute("class","alert alert-success");
                tag.innerHTML="成功发送了好友请求！";
                window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
            }
            else if (data==4) {
                tag.setAttribute("class","alert alert-info");
                tag.innerHTML="错误！你在对方黑名单中！";
            }
        });
    });
</script>