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
            <a class="navbar-brand" href=<?=base_url()?>>SJTU SHARE</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
               <!-- <li><a href=<?=base_url()."index.php/web/user/register"?>>注册</a></li>-->

               <li
               <?php if (isset($activenumber)&&$activenumber==1) echo "class=active"?>
               ><a href=<?=base_url()."index.php/admin/department"?>>学院管理</a></li>
              
               <li
                <?php if (isset($activenumber)&&$activenumber==3) echo "class=active"?>
               ><a href=<?=base_url()."index.php/admin/course"?>>课程池</a></li>
               
              <li
                <?php if (isset($activenumber)&&$activenumber==5) echo "class=active"?>
               ><a href=<?=base_url()."index.php/admin/search_course"?>>搜课</a></li>

               <li
                <?php if (isset($activenumber)&&$activenumber==7) echo "class=active"?>
               ><a href=<?=base_url()."index.php/admin/review"?>>审核</a></li>

            </ul>
            </div><!--/.nav-collapse -->
    </div>
</div>
 </br>
 </br>
 </br>
