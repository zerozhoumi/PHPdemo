<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/14
 * Time: 11:41
 */
//数组元素值从小到大排序
$arr=array(1,42,0,3,15,7,19,26,42,0,3,15,7,19,26,42,0,3,15,7,19,26,42,0,3,15,7,19,26,42,0,3,15,7,19,26,42,0,3,15,7,19,26,42,0,3,15,7,19,26);

echo "After applying sort() <br>";
$ar1=$ar=$arr;
//定义一个中间变量
//echo "sort()用时 <br>";
//runtime();
//sort($ar);
//echo runtime(1);


echo "qsort()用时 <br>";
runtime();
Qsort($ar1);
echo runtime(1);



//function xx($arr){
//    $temp=0;
////外层循环次数
//    for ($i=0;$i<count($arr)-1;$i++){
//        $exchange=false;
//        //内层左右两个数组元素值进行比较
//
//    }
//}



function Qsort($arr){
    if (!is_array($arr)) return false;
    $len=count($arr);
    if ($len<=1){
        return $arr;
    }
    $left=$right=array();
    for ($i=1;$i<$len;$i++){
        if ($arr[$i]<=$arr[0]){
            $left[]=$arr[$i];
        }else{
            $right[]=$arr[$i];
        }
    }
    $left=Qsort($left);
    $right=Qsort($right);
    return array_merge($left,$arr[0],$right);
}

function runtime($mode = 0){
    static $t;
    if (!$mode){
        $t=microtime();
        return;
    }
    $t1=microtime();
    list($m0,$s0)=explode(" ",$t);
    list($m1,$s1)=explode(" ",$t1);
    return sprintf("%.3f ms",($s1+$m1-$s0-$m0)*1000);
}
