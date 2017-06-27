<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/6/25
 * Time: 20:17
 */
//加载conn
include ("conn.php");
//加载head
include ("head.php");
//提交表单到数据库
if (isset($_POST['submit'])){
    $user=$_POST['user'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $sql="INSERT INTO message".
        "(user,title, content,lastdate) ".
        "VALUES ".
        "('$user','$title','$content',now())";
    $retval = mysqli_query($conn,$sql);
    if (! $retval){
        die('插入数据失败'.mysqli_error($conn));
    }
    echo "数据插入成功\n";
}
?>
<!--利用JS对表单输入进行字符限制-->
<SCRIPT language="JavaScript">
    function CheckPost() {
        if (myform.user.value==""){
            alert("请填写用户名");
            myform.user.focus();
            return false;
        }
        if (myform.title.vale.length<5){
            alert("标题不能小于5");
            myform.title.focus();
            return false;
        }
        if (myform.content.value==""){
            alert("必须填写留言内容");
        }

    }
</SCRIPT>
<!--HTML表单结构-->
<form action="add.php" method="post" name="myform" onsubmit="return CheckPost();">
    用户: <input type="text" size="10" name="user"/><br>
    标题: <input type="text" name="title" value="value" size="40" maxlength="40"/><br>
    内容: <textarea name="content"></textarea><br/>

    <input type='submit' name='submit' value="发布留言"/>
    <input type="button" name="show" value="显示留言"/>
</form>
