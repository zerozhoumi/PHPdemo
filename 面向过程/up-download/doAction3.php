<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/20
 * Time: 18:16
 */

include_once 'upload.func.php';
$allowExt=array('jpeg','jpg','png','gif','html','txt');
$fileInfo=
    $_FILES['myfile'];
$newName=upload_File($fileInfo,$allowExt,111111,'upload',false);
print_r($newName);