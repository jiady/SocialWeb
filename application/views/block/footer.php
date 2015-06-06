
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
</script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src=<?=base_url("dist/js/bootstrap-typeahead.js")?>></script>
   
     </div> <!-- /container -->
  </body>
</html>