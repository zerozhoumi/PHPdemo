<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/20
 * Time: 18:47
 */

include_once 'upload.func1.php';
require_once 'common.func.php';
$files=getFiles();
//print_r($_FILES);
foreach($files as $fileInfo){
    $res=uploadFile($fileInfo);
    echo $res['mes'],'<br/>';
    $uploadFiles[]=$res['dest'];
}
$uploadFiles=array_values(array_filter($uploadFiles));
print_r($uploadFiles);