<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/19
 * Time: 9:39
 */

require_once ("testModel.class.php");
require_once ("testView.class.php");
require_once ("testController.class.php");
$testController=new testController();//控制器实例化
$testController->show();