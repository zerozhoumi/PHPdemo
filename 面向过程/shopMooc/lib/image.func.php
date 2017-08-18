<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/11
 * Time: 14:51
 */
require_once "string.func.php";
//通过gd库创建验证码

function verifyImage($sess_name = "verify", $type = 3,$length = 4,$pixel=0,$len=0)
{
    session_start();
    $width = 80;
    $height = 30;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
//用矩形填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $fontfile = "../fonts/msyh.ttc";
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
//    像素点,默认关闭
    if ($pixel) {
        for ($i = 0; $i < $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
//    直线,默认关闭
    if ($len) {
        for ($i = 0; $i < $len; $i++) {
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}

