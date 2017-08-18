<?php 
/**
 * [Qsort description]
 * @param [type] $array [description]
 */
/*
    快速排序
*/

function quickSort($array)
{
//if(!isset($array[1]))
    if(count($array) <= 1)
        return $array;
    $base = $array[0];
    $leftArray = array();
    $rightArray = array();

// 修改部分------------------------
    for($i=1; $i<count($array); $i++)
    {
        if($array[$i] > $base)
            $rightArray[] = $array[$i];
        else
            $leftArray[] = $array[$i];
    }
//------------------------------------

    $leftArray = quickSort($leftArray);
//$leftArray[] = $base;

    $rightArray = quickSort($rightArray);
    return array_merge($leftArray, array($base), $rightArray);

}

//$a = array_rand(range(1, 30000), 10000);
//shuffle($a);
$a = array(4, 2, 8, 3, 2 , 1, 99, 34);
print_r($a);
print_r(quickSort($a));