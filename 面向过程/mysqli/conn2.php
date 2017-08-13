<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 9:53
 */
$mysqli=@new mysqli('localhost',"root","","test");
if ($mysqli->connect_errno){
    die('con error'.$mysqli->connect_error);
}
//2.设置默认的编码方式
$mysqli->set_charset('utf8');
//执行sql查询
$sql=<<<EOF
	CREATE TABLE IF NOT EXISTS mysqli(
		id TINYINT UNSIGNED AUTO_INCREMENT KEY,
		username VARCHAR(20) NOT NULL,
		password VARCHAR(21) NOT NULL
	);
EOF;

$res=$mysqli->query($sql);
var_dump($res);
/*
 SELECT/DESC/DESCRIBE/SHOW/EXPLAIN执行成功返回mysqli_result对象，执行失败返回false
 对于其它SQL语句的执行，执行成功返回true，否则返回false
 */
$mysqli->close();
