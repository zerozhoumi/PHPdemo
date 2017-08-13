<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 10:21
 */
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost',"root","","test");
if ($mysqli->connect_errno){
    die('connect error'.$mysqli->connect_error);
}
//2.设置默认的编码方式
$mysqli->set_charset('utf8');
//可以封装一下；；；；
$sql="INSERT mysqli (username,password) VALUES('KING','king'),('KING','king');";

$res=$mysqli->query($sql);
if ($res){
    echo "恭喜你，你是网站的第".$mysqli->insert_id."位 \n";
    echo $mysqli->affected_rows."条记录被影响";

}else{
    echo  'error'.$mysqli->errno.':'.$mysqli->error;
}
//将表中年龄+10
$sql="UPDATE mysqli SET age=age+10";
$res=$mysqli->query($sql);
if($res){
    echo $mysqli->affected_rows.'条记录被更新';
}else{
    echo "ERROR ".$mysqli->errno.':'.$mysqli->error;
}
echo '<hr/>';
$sql="DELETE FROM mysqli WHERE id<=6";
$res=$mysqli->query($sql);
if($res){
    echo $mysqli->affected_rows.'条记录被删除';
}else{
    echo "ERROR ".$mysqli->errno.':'.$mysqli->error;
}
//关闭到MySQL的连接
$mysqli->close();