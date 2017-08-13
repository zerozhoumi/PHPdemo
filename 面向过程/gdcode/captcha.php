<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 17:05
 */


//中文验证码以后做；；；
session_start();
//必须处于代码最顶端；；；

// 在内存中创建一个黑色图像
$image=imagecreatetruecolor(100,30);
// 定义背景色为白色
$bgcolor=imagecolorallocate($image,255,255,255);
// 填充颜色
imagefill($image,0,0,$bgcolor);

$captcode='';
for ($i=0;$i<4;$i++){
    $fontsize=6;
    // 让颜色深一些；用户看得清
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    // 随机数字
   // $fontcontent = rand(0,9);
   // 随机字母及数字，去掉不容易辨认的
    $data='qwertyupasdfghjkzxcvbnmQWERTYUPASDFGHJKZXCVBNM23456789';
    // 任意取出一个字母或数字
    $fontcontent=substr($data,rand(0,strlen($data)),1);
    // 加进去
    $captcode.=$fontcontent;
    //左右位置任意，注意范围
    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);
    //把验证文字加上去
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
// 把文字加入session会话中
$_SESSION['authcode']=$captcode;
// 制作一些障碍，防止识图；
for ($i=0; $i<200; $i++){
    $pointColor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    imagesetpixel($image,rand(0,100),rand(0,30),$pointColor);
}
for ($i=0;$i<3;$i++){
    $linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
    imageline($image,rand(0,100),rand(0,30),rand(1,99),rand(1,29),$pointColor);
}


// hear之前不能有输出
header('content-type:image/png');
// 显示图片
imagepng($image);



//end，销毁内存中的image
imagedestroy($image);