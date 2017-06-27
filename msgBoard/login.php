<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/6/25
 * Time: 20:41
 */

//加载conn.php文件
include("conn.php");
//判断是否退出,并标记cookie为out,返回登录页
    if(isset($_GET['out'])){
        setcookie("cookie","out");
        echo "<script language=\"javascript\">location.href='login.php';</script>";
    }
//提交表单判断登录ID是否为admin,密码是否匹配'PHP'的MD5值,并标记cookie为ok
    if(isset($_POST['id']) =='admin'){
        $pw=md5($_POST['pw']);
        if ($pw=='e1bfd762321e409cee4ac0b6e841963c'){
            setcookie("cookie","ok");
            //刷新登录页面使cookie标记值生效.
            echo "<script language=\"javascript\">location.href='login.php';</script>";
        }
    }
//加载head.php文件
include("head.php");
//提交表单判断cookie标记值不为ok,则显示登录页,否则显示退出页
if($_COOKIE['cookie']!='ok'){

    ?>
    <!--利用JS对登录字符进行限制-->
    <SCRIPT language=javascript>
        function Checklogin(){
            if (myform.id.value ===""){
                alert("请填写登录名");
                myform.id.focus();
                return false;
            }
            if (myform.id.value !=="admin"){
                alert("用户名错误");
                myform.id.focus();
                return false;
            }
            if (myform.pw.value ===""){
                alert("密码不能为空");
                myform.pw.focus();
                return false;
            }

        }
        }
    </SCRIPT>
    <!--HTML登录页-->
    <form action="" method="post" name="myform" onsubmit="return Checklogin();">
        用户名: <INPUT type="text" name="id" /><br>
        密&nbsp;&nbsp;码: <INPUT type="password" name="pw" />
        <input type="submit" name="submit" value="登陆">

    </form>

    <?php
}else{
    ?>
    <!--HTML退出页-->
    <a href='?out=login'>退出</a>
    <?php
}
?>