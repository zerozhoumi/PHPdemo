<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/11
 * Time: 17:08
 */

header("content-type:text/html;charset=utf-8");
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.get_include_path());

require_once "string.func.php";
require_once "image.func.php";
require_once "configs.php";
require_once "mysql.func.php";
require_once "admin.inc.php";
