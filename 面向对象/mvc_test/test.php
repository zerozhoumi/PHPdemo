<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/21
 * Time: 20:57
 */
require 'libs\ORG\Smarty\Smarty.class.php';
$smarty = new Smarty();
$smarty->left_delimiter="{";
$smarty->right_delimiter="}";
$smarty->template_dir="tpl";
$smarty->compile_dir="template_c";
$smarty->cache_dir="cache";

$smarty->assign('articletitle','文章标题');
$smarty->display('test.tpl');