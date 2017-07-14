<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/14
 * Time: 20:06
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
//1.在内存建立一个高300，宽200的真色彩的图片
$image_thumb=imagecreatetruecolor(300,200);
//2.复制到真色彩图片上，且按要求压缩
imagecopyresampled($image_thumb,$image,0,0,0,0,300,200,$info[0],$info[1]);
imagedestroy($image);
//输出图片
header("Content-type:".$info['mime']);
$func= "image".$type;
$func($image_thumb);
//销毁图片
imagedestroy($image_thumb);