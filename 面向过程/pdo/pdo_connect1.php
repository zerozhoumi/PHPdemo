<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/15
 * Time: 21:13
 */

try{
    $dsn='mysql:host=localhost;dbname=test';
    $username='root';
    $password='';
    $pdo=new PDO($dsn,$username,$password);


    $sql=<<<EOF
    CREATE TABLE IF NOT EXISTS name(
    id INT UNSIGNED AUTO_INCREMENT KEY ,
    username VARCHAR(32) NOT NULL 
    );
EOF;
    $res=$pdo->exec($sql);
    var_dump($res);
    $sql="INSERT name(username) VALUES('king')";
$res=$pdo->exec($sql);
echo $res;
}catch (PDOException $e){
    echo $e->getMessage();
}