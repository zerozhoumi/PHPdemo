<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/19
 * Time: 18:01
 */
//单文件上传函数

//$fileInfo=$_FILES['myfile'];
function upload_File($fileInfo,
                     $allowExt=array('jpeg','jpg','png','gif'),$maxSize=2097152,
                     $uploadPath='upload',$flag='true'){


//判断错误号
    if ($fileInfo['error'] > 0){
        switch($fileInfo['error']){
            case 1 :
                $mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
                break;
            case 2 :
                $mes = '超过了表单MAX_FILE_SIZE限制的大小';
                break;
            case 3 :
                $mes = '文件部分被上传';
                break;
            case 4 :
                $mes = '没有选择上传文件';
                break;
            case 6 :
                $mes = '没有找到临时目录';
                break;
            case 7 :
            case 8 :
                $mes = '系统错误';
                break;
        }
        //匹配错误信息

        echo $mes;
        return false;
    }
$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
    if(!is_array($allowExt)){
        exit('系统错误');
    }
    if (!in_array($ext,$allowExt)){
        exit("非法文件类型");
    }
    //检测图片是否为真实的图片类型
    //$flag=true;
    if($flag){
        if(!getimagesize($fileInfo['tmp_name'])){
            exit('不是真实图片类型');
        }
    }
    if ($fileInfo['size']>$maxSize){
        exit("超出文件大小");
    }
    if(!is_uploaded_file($fileInfo['tmp_name'])){
        exit('文件不是通过HTTP POST方式上传来的');
    }
//$uploadPath='upload';
    $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
    $destination=$uploadPath.'/'.$uniName;
    if (!file_exists($uploadPath)){
        mkdir($uploadPath,0777,true);
        chmod($uploadPath,0777);
    }
    if (!@move_uploaded_file($fileInfo['tmp_name'],$destination)){
        exit("文件移动失败");
    }
    //echo "文件上传成功";
    return array(
 		'newName'=>$destination,
 		'size'=>$fileInfo['size'],
 		'type'=>$fileInfo['type']
 	);
}

