<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/19
 * Time: 11:48
 */
$fileInfo=$_FILES['myfile'];
$filename=$fileInfo['name'];
$type=$fileInfo['type'];
$tmp_name=$fileInfo['tmp_name'];
$size=$fileInfo['size'];
$error=$fileInfo['error'];
//判断错误号
if ($error == UPLOAD_ERR_OK ){
    if (move_uploaded_file($tmp_name,"upload/".$filename)){
        echo $filename . "upload success";

    }else{
        echo $filename . "upload error";
    }

}else{
    switch ($error){
        case 1:
            echo "上传size超过upload_max_filesize  ";
            break;
        case 2:
            echo "超过表单max_file_size";
            break;
        case 3:
            echo "部分上";
            break;
        case 4:
            echo "没有上传";
            break;
        case 6:
            echo "没有找到临时目录";
            break;

    }
}