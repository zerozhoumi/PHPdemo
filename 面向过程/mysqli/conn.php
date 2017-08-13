<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 9:35
 */
//链接到mysql数据库
//$mysql=new mysqli("localhost","root","");
//print_r($mysql);
//
//
//if ($mysql->connect_errno){
//    die('connect error '.$mysql->connect_error);
//}
//
////打开指定数据库
//$mysql->select_db('tset');
//echo '客户端信息'.$mysql->client_info."<br/>";
$mysql=new mysqli("localhost","root","");
//print_r($mysql);
$mysql->select_db("msg");
