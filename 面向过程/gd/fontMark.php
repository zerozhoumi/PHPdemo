<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/14
 * Time: 18:18
 */
//打开图片
    //1.配置图片路径
    $src ="00001.jpg";
    //2.获取图片信息
    $info = getimagesize($src);
    //3.通过图像的编号来获取图像信息
     $type = image_type_to_extension($info[2],false);
    //在内存中创建和我们图形类型一样的图像
//    $image = imagecreatefromjpeg($src);
        $fun="imagecreatefrom".$type;
    //把图片复制到内存中
        $image=$fun($src);

//操作图片
    //1.设置字体路径
    $font = "msyh.ttc";
    //2.填写水印内容
    $content = "你好 gd库";
    //3.设置字体颜色，透明度
    $col = imagecolorallocatealpha($image,0,0,255,50);
    //4.写入文字
    imagettftext($image,20,0,20,30,$col,$font,$content);


//输出图片
//
header("Content-type:".$info['mime']);
$func= "image".$type;
$func($image);
//$func($image,'newimage.'.$type);
//销毁图片
imagedestroy($image);
?>
