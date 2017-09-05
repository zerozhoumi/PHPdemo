<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/15
 * Time: 21:20
 */
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='test';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try{
    $dbh=new PDO($dsn,$user,$pass);
    //初始化一个pdo对象
    echo "连接成功<br/>";
//    foreach ($dbh->query('SELECT * FROM animals') as $row)
//    {
//        print_r($row);
//    }
  //var_dump($GLOBALS);
    $dbh=null;//关闭连接；

}catch (PDOException $e){
    echo $e->getMessage();
}