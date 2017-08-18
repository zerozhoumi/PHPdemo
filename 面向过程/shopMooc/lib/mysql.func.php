<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/8/11
 * Time: 14:51
 */
require_once "../include.php";
/**
 * 链接数据库
 * @return resource
 */
function connect(){
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD)or die("数据库连接失败error".mysqli_error());
    mysqli_set_charset(DB_CHARSET);
    mysqli_select_db(DB_DBNAME)or die("指定数据库打开失败");
    return $link;
}

/**
 * 完成记录插入操作
 * @param string $table
 * @param array $array
 * @return int|number
 */
function insert ($table,$array){
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql = "insert {$table}($keys) values({$vals})";
    mysqli_query($sql);
    return mysqli_insert_id();
}

/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */

function updata($table,$array,$where=null){
    $str="";
    foreach($array as $key=>$val){

        if ($str == null){
            $sep = "";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="updata {$table} set {$str} ".($where==null?null:" where ".$where);
    $result = mysqli_query($sql);
    if ($result){
        return mysqli_affected_rows();
    }else{
        return false;
    }
}

/**
 * 删除记录
 * @param $table
 * @param null $where
 * @return int
 */
function deleta($table,$where=null)
{
    $where = $where == null ? null : "where" . $where;
    $sql="DELETE FROM {$table} {$where}";
    mysqli_query($sql);
    return mysqli_affected_rows();
}

/**
 * 得到一条指定记录
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}

/**
 * 得到结果集中的所以记录
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($sql);
    while ($row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;

}

/**
 * 得到结果集的记录条数
 * @param $sql
 * @return int
 */
function getRrsultNum($sql){
    $result= mysqli_query($sql);
    return mysqli_num_rows();
}

/**
 * 得到上一步插入的记录id
 * @return int|string
 */
function getInsertId(){
    return mysqli_insert_id();
}
