<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/16
 * Time: 17:05
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>upload</title>
</head>
<body>
<form action="doAction5.php" method="post" enctype="multipart/form-data">
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="10000">-->
<!--    accept可用做客户端-->
    <input type="file" name="myfile[]"  ><br>
    <input type="file" name="myfile[]"  ><br>

    <input type="submit" value="上传文件">
</form>
</body>
</html>