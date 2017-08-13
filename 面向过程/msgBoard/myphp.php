<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/6/25
 * Time: 21:29
 */
include ("conn.php");
include ("head.php");


    $sql2 = 'SELECT id, title, user,
        content, lastdate
        FROM message';
    mysqli_select_db( $conn, 'msg' );
    $retval2 = mysqli_query( $conn, $sql2 );
    if(! $retval2 )
    {
        die('无法读取数据: ' . mysqli_error($conn));
    }
    echo '<h2> mysqli_fetch_array 测试<h2>';
    echo '<table border="1"><tr><td>ID</td><td>用户名</td><td>标题</td><td>内容</td><td>提交日期</td></tr>';
    while($row = mysqli_fetch_array($retval2, MYSQL_ASSOC))
    {
        echo "<tr><td> {$row['id']}</td> ".
            "<td>{$row['user']} </td> ".
            "<td>{$row['title']} </td> ".
            "<td>{$row['content']} </td> ".
            "<td>{$row['lastdate']} </td> ".
            "</tr>";
    }
    echo '</table>';
    mysqli_close($conn);



?>
