<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/19
 * Time: 9:33
 */
//视图的作用是将取得的数据进行组织、美化等，并最终向用户终端输出
class testView{
    function display($data){
        echo "<h1>".$data."</h1>"."add testView";
    }
}