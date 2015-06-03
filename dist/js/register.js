


function checkpassword(){
    if($("#password").val()!=$("#password2").val())
    {
        console.log("1");
        $("#help-password2").html("密码输入不相符！");
        $("#help-password2").attr({"style":'color:#ff0000'});
        return  false;
    }else{
        $("#help-password2").html("密码相符！");
        $("#help-password2").removeAttr("style");
        console.log("2");
        return  true;
    }
}

function checkname(){
    if($("#username").val()==null||$("#name").val()==""){
        $("#help-name").html("用户名不能为空");
        $("#help-name").attr({"style":'color:#ff0000'});
           return  false;
    }else{
        console.log($("#username").val());
        $("#help-name").html("用户名合法");
        $("#help-name").removeAttr("style");
        return  true;
    }

}

function checkemail(){
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    if(!reg.test($("#Email").val())){
        $("#help-Email").html("不合法的邮箱");
        $("#help-Email").attr({"style":'color:#ff0000'});
        return  false;
    }
    else{
        $("#help-Email").html("合法的邮箱!");
        $("#help-Email").removeAttr("style");
        return  true;
    }
}