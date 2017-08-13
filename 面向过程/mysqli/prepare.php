<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 19:23
 */

header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','','test');
if($mysqli->errno){
    die('Connect Error'.$mysqli->error);
}
$mysqli->set_charset('UTF8');
$sql="INSERT mysqli(username,password,age) VALUES(?,?,?)";
//准备预处理语句
$mysqli_stmt=$mysqli->prepare($sql);
//print_r($mysqli_stmt);
$username='king';
$password=md5('king');
$age=12;
$mysqli_stmt->bind_param('ssi',$username,$password,$age);
//执行预处理语句
if($mysqli_stmt->execute()){
    echo $mysqli_stmt->insert_id;
    echo '<br/>';
}else{
    $mysqli_stmt->error;
}