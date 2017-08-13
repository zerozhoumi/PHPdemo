<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/15
 * Time: 9:21
 */
//检验
//phpinfo();
//检测扩展
var_dump(extension_loaded('mysqli'));
var_dump(function_exists('mysqli_connect'));
//得到已经开启的扩展
print_r(get_loaded_extensions());