<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 19:57
 */
if (isset($_REQUEST['authcode'])){
    session_start();

    if (strtolower($_REQUEST['authcode']) == $_SESSION['authcode']) {
        echo "输入正确";
    }else{
        echo "输入错误";
    }
}
?>
<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8"/>
    <title>确认验证码</title>
</head>
<body>
<form method="post" action=form.php>
    <p>验证图片：
        <img id="captcha_img" border="1" src="captcha.php?r=<?php echo rand();?>"/>
    <a href="javascript:void(0)"
       onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()">换一个？</a>
    </p>
    <p>请输入图片的验证内容：<input type="text" name="authcode" value=""/></p>
    <p><input type="submit" value="提交" ></p>

</form>
</body>
</html>

