 <!-- Static navbar -->
   <!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=<?=base_url()?>>Social Web</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">

               <li
               <?php if (isset($activetag)&&$activetag=="首页") echo "class='active' "?>
               ><a href=<?=site_url("feed")?>>首页</a></li>

				<li
               <?php if (isset($activetag)&&$activetag=="发布") echo "class='active' "?>
               ><a href=<?=site_url("feed/feed_post")?>>发布</a></li>
              
               <li
                <?php if (isset($activetag)&&$activetag=="个人资料") echo "class='active' "?>
               ><a href=<?=site_url("userinfo_control")?>>个人资料</a></li>
               
              <li
                <?php if (isset($activetag)&&$activetag=="好友列表") echo "class='active' "?>
               ><a href=<?=site_url("friends_control")?>>好友列表</a></li>

               <li
                <?php if (isset($activetag)&&$activetag=="黑名单") echo "class='active' "?>
               ><a href=<?=site_url("blacklist_control")?>>黑名单</a></li>
               <li
                <?php if (isset($activetag)&&$activetag=="登出") echo "class='active' "?>
               ><button type="button" class="btn btn-default"
               ><a href=<?=base_url()?>>登出</a></button></li>

            </ul>
            </div><!--/.nav-collapse -->
    </div>
</nav>
 </br>
 </br>
 </br>
