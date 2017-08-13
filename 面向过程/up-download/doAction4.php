<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/20
 * Time: 18:39
 */

include_once 'upload.func.php';
//print_r($_FILES);
foreach ($_FILES as $fileInfo){
    $files[]=upload_File($fileInfo);
}
print_r($files);