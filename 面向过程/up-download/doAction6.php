<?php 
header('content-type:text/html;charset=utf-8');
require_once 'upload.class.php';
$upload=new upload('myfile','imooc');
$dest=$upload->uploadFile();
echo $dest;