<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/14
 * Time: 20:43
 */
require "image.class.php";
$src="00001.jpg";
$source="logo.png";

$local=array(
    'x'=>20,
    'y'=>40
);
$alpha=30;


$image=new Image($src);
$image->imageMark($source,$local,$alpha);
$image->show();
