<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/16
 * Time: 17:11
 */
//$_FILE文件上传变量；
print_r($_FILES);
$filename=$_FILES['myfile']['name'];
$type=$_FILES['myfile']['name'];
$tmp_name=$_FILES['myfile']['tmp_name'];
$size=$_FILES['myfile']['size'];
$error=$_FILES['myfile']['error'];

//move_uploaded_file();
move_uploaded_file($tmp_name,"upload/".$filename);
//copy()