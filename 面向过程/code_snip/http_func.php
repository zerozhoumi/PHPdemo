<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/14
 * Time: 11:33
 */

class Curl{
    public static function get($url, $param = array(), $header = array(), $timeout = 3, $followAction = 0, $gzip = 0, $format = 'html',$log=0)
    {
        $ch=curl_init();
    }
}