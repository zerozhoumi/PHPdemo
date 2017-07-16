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

$image=imagecreatetruecolor(100,30);
$bgcolor=imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$bgcolor);
$captcode='';
for ($i=0;$i<4;$i++){
    $fontsize=6;
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));

   // $fontcontent = rand(0,9);
    $data='qwertyupasdfghjkzxcvbnm23456789';
    $fontcontent=substr($data,rand(0,strlen($data)),1);
    $captcode.=$fontcontent;
    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);

    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
$_SESSION['authcode']=$captcode;
for ($i=0; $i<200; $i++){
    $pointColor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    imagesetpixel($image,rand(0,100),rand(0,30),$pointColor);
}
for ($i=0;$i<3;$i++){
    $linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
    imageline($image,rand(0,100),rand(0,30),rand(1,99),rand(1,29),$pointColor);
}



header('content-type:image/png');
imagepng($image);



//end
imagedestroy($image);