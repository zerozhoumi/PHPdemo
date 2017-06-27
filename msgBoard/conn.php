<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/6/25
 * Time: 20:17
 */

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpress ='';
$conn = mysqli_connect($dbhost,$dbuser,$dbpress);
if (! $conn){
    die("Could not connect:" .mysqli_error($conn));
}

//进入msg库
mysqli_select_db($conn,'msg');
mysqli_query($conn,"set names utf8");

?>