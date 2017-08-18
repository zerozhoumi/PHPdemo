<?php
$conn = mysqli_connect("localhost","root","");
if (!$conn){
    die("连接数据库失败：" . mysqli_error());
}
mysqli_select_db('test',$conn);

//字符转换，读库
mysqli_query("set character set 'gbk';");
//写库
mysqli_query("set names 'gbk';");
?>