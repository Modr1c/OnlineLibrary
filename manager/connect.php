<?php
//预先定义数据库链接参数
$host = '127.0.0.1';
$dbuser = 'root';
$pwd  = '123456';
$dbname = 'book';

$db = new mysqli( $host, $dbuser, $pwd, $dbname );
if( $db->connect_errno <> 0 ){
	die('链接数据库失败');
}

//设定数据库数据传输的编码
$db->query("SET NAMES UTF8");
?>