<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 17:29
 */

header('cont-type:text/html;charset=utf-8');
$mysqli=new mysqli("localhost","root","","test");
if ($mysqli->errno){
    die('connect error'.$mysqli->error);
}
$mysqli->set_charset('utf8');
$sql="INSERT mysqli(username,password,age) VALUES('imooc3','imooc3',32);";
$sql.="UPDATE mysqli SET age=5 WHERE id=21;";
$sql.="DELETE FROM mysqli WHERE id=26;";
//$res=$mysqli->multi_query($sql);
////mysqli_multi_query()第一条为真才行；
//var_dump($res);

//结果集
if ($mysqli->multi_query($sql)){
    do{
        if ($mysqli_result=$mysqli->store_result()) {
            $rows[] = $mysqli_result->fetch_all(MYSQLI_ASSOC);
        }
    }while ($mysqli->more_results()&&$mysqli->next_result());

}else{
        echo $mysqli->error;
    }
print_r($rows);
$mysqli->close();
