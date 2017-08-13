<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 20:05
 */
header('cont-type:text/html;charset=utf-8');
$mysqli=new mysqli("localhost","root","","test");
if ($mysqli->errno){
    die('connect error'.$mysqli->error);
}
$mysqli->set_charset("utf8");
//先关闭自动提交功能
$mysqli->autocommit(false);
$sql="UPDATE account SET money=money-200 WHERE username='king'";
$res=$mysqli->query($sql);
$res_affect=$mysqli->affected_rows;

$sql1='UPDATE account SET money=money+200 WHERE username="qune"';
$res1=$mysqli->query($sql1);
$res1_affect=$mysqli->affected_rows;
if($res &&$res_affect>0 && $res1 && $res1_affect>0){
    $mysqli->commit();
    echo '转账成功<br/>';
    $mysqli->autocommit(TRUE);
}else{
    $mysqli->rollback();
    echo '转账失败<br/>';
}
$mysqli->close();
