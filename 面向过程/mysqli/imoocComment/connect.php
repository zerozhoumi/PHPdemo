<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 20:25
 */
$mysqli=new mysqli('localhost','root','','imoocComment');
if($mysqli->errno){
    die('Connect Error:'.$mysqli->error);
}else{
    $mysqli->set_charset('UTF8');
}