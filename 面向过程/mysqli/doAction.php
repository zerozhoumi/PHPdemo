<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/12
 * Time: 14:44
 */
header('content-type:text/html;charset=utf-8');

$mysql=new mysqli("localhost","root","","test");
if ($mysql->connect_errno){
    die($mysql->connect_error);
}
$mysql->set_charset('utf8');
$username=$_POST['username'];
//转义用户输入的特殊数据
$username=$mysql->escape_string($username);
$password=md5($_POST['password']);
$age=$_POST['age'];
$act=$_GET['act'];
$id=$_GET['id'];

//根据不同操作完成不同的功能
switch ($act){
    case 'addUser':
//        echo "添加用户";
        $sql="INSERT mysqli (username,password,age) VALUES ('{$username}','{$password}','{$age}')";
        $res=$mysql->query($sql);
        if ($res){
            $insert_id=$mysql->insert_id;
            echo "<script type='text/javascript'>
					alert('添加成功，网站的第{$insert_id}位用户');
					location.href='userList.php';
					</script>";
            exit;
        }
        else{
            echo "<script type='text/javascript'>
			alert('添加失败,重新添加');
			location.href='addUser.php';
			</script>";
            exit;
        }
        break;
    case 'delUser':
        //echo '删除'.$id;
        $sql="DELETE FROM mysqli WHERE id =".$id;
        $res=$mysql->query($sql);
        if ($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url='userList.php';
        echo "<script type='text/javascript'>
			alert('{$mes}');
			location.href='{$url}';
			</script>";
        exit;
        break;
    case 'editUser':
        $sql="UPDATE mysqli SET username='{$username}',password='{$password}',age='{$age}' WHERE id=".$id;
        $res=$mysql->query($sql);
        if($res){
            $mes='更新成功';
        }else{
            $mes='更新失败';
        }
        $url='userList.php';
        echo "<script type='text/javascript'>
		alert('{$mes}');
		location.href='{$url}';
		</script>";
        exit;

        break;
}



