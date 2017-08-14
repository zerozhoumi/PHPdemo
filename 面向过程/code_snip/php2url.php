<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/14
 * Time: 10:36
 */
//phpinfo();
$url = 'http://www.baidu.com/index.php?m=content&c=index&a=lists&catid=6&area=0&author=0&h=0&region=0&s=1&page=1';

$arr=parse_url($url);
var_dump($arr);
$arr_query=convertUrlQuery($arr['query']);
var_dump($arr_query);
var_dump(getUrlQuery($arr_query));
/**
 * 将字符串参数变为数组
 * @param $query
 * @return array (size=10)
'm' => string 'content' (length=7)
'c' => string 'index' (length=5)
'a' => string 'lists' (length=5)
'catid' => string '6' (length=1)
'area' => string '0' (length=1)
'author' => string '0' (length=1)
'h' => string '0' (length=1)
'region' => string '0' (length=1)
's' => string '1' (length=1)
'page' => string '1' (length=1)
 */
function convertUrlQuery($query){
    $queryParts= explode("&",$query);
    $params=array();
    foreach ($queryParts as $param){
        $items = explode("=",$param);
        $params[$items[0]]=$items[1];
    }
    return $params;
}

/**
 * @param $arr_query
 * @return string 'm=content$c=index$a=lists$catid=6$area=0$author=0$h=0$region=0$s=1$page=1' (length=73)
 */
function getUrlQuery($arr_query){
    $tmp=array();
    foreach ($arr_query as $k=>$param){
        $tmp[]=$k.'='.$param;
    }
    $params=implode('$',$tmp);
    return $params;
}