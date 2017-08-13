<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/14
 * Time: 19:20
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
    //1.设置水印图片
    $srcMark= "logo.png";
    //2.获取图片信息
    $infoMark = getimagesize($srcMark);
    //3.通过图像的编号来获取图像信息
    $type2 = image_type_to_extension($infoMark[2],false);
    //在内存中创建和我们图形类型一样的图像
    $fun2="imagecreatefrom".$type2;
    //把图片复制到内存中
    $image2=$fun2($srcMark);
    //合并图片
    imagecopymerge($image,$image2,20,30,0,0,$infoMark[0],$infoMark[1],30);
//销毁水印图片
imagedestroy($image2);
//输出图片
header("Content-type:".$info['mime']);
$func= "image".$type;
$func($image);
//销毁图片
imagedestroy($image);
?>