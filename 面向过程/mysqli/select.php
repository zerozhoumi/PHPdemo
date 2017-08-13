<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 19:43
 */
header('cont-type:text/html;charset=utf-8');
$mysqli=new mysqli("localhost","root","","test");
if ($mysqli->errno){
    die('connect error'.$mysqli->error);
}
$mysqli->set_charset("utf8");
$sql="SELECT id,username,age FROM mysqli WHERE id>?";
$mysqli_stmt=$mysqli->prepare($sql);
$id=20;
$mysqli_stmt->bind_param("i",$id);
if ($mysqli_stmt->execute()){
//    绑定结果集
    $mysqli_stmt->bind_result($id,$username,$age);
    //遍历结果集
    while ($mysqli_stmt->fetch()){
        echo "编号".$id ,'</br>';
        echo "用户名".$username ,'</br>';
        echo "年龄".$age.'<br/>';
        echo '<hr/>';
    }
}
$mysqli_stmt->free_result();
$mysqli_stmt->close();
$mysqli->close();
