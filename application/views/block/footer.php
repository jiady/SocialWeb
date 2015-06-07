
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<div class="col-lg-10">	
	<div class="footer">
	    <p>© Team of Social Web</p>
	</div>
</div>
    
   
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript" >
$("#accept_button").click(function() {
    console.log("function called");
    $.post(<?="\"".site_url('friends_control/accept')."\""?>, {"from_uid": $(this).attr("from_uid")}, function() {
      window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
    });
  });
$("#delete_button").click(function() {
    $.post(<?="\"".site_url('friends_control/delete')."\""?>, {"delete_uid": $(this).attr("to_uid")}, function() {
      window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
    });
  });
$("#moveBlack_button").click(function() {
    $.post(<?="\"".site_url('friends_control/moveBlack')."\""?>, {"black_uid": $(this).attr("to_uid")}, function() {
      window.location.assign(<?="\"".site_url('friends_control')."\"" ?>);
    });
  });
$("#search_button").click(function() {
    var content=eval(document.getElementById("search_content")).value;
    var reason=eval(document.getElementById("search_reason")).value;
    $.post(<?="\"".site_url('friends_control/search')."\""?>, {"search_content": content, "search_reason": reason}, function(data) {
        if (data==0) {
            $("#status_tag").hide();
        }
        else {
            $("#status_tag").show();
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
        }
    });
  });
</script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src=<?=base_url("dist/js/bootstrap-typeahead.js")?>></script>
   
     </div> <!-- /container -->
  </body>
</html>