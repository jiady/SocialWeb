 <!-- Static navbar -->
   <!-- Static navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
               <!-- <li><a href=<?=base_url()."index.php/web/user/register"?>>注册</a></li>-->

               <li
               <?php if (isset($activetag)&&$activetag=="首页") echo "class=active"?>
               ><a href=<?=base_url().$main_page?>>首页</a></li>
              
               <li
                <?php if (isset($activetag)&&$activetag=="个人资料") echo "class=active"?>
               ><a href=<?=base_url().$personal_information?>>个人资料</a></li>
               
              <li
                <?php if (isset($activetag)&&$activetag=="好友列表") echo "class=active"?>
               ><a href=<?=base_url().$friend_list?>>好友列表</a></li>

               <li
                <?php if (isset($activetag)&&$activetag=="黑名单") echo "class=active"?>
               ><a href=<?=base_url().$black_list?>>黑名单</a></li>
               <li
                <?php if (isset($activetag)&&$activetag=="登出") echo "class=active"?>
               ><button type="button" class="btn btn-default"
               ><a href=<?=base_url().$logout?>>登出</button></li>

            </ul>
            </div><!--/.nav-collapse -->
    </div>
</div>
 </br>
 </br>
 </br>