<?php
include('connect.php');

session_start();

if(  isset( $_SESSION['login'] ) === false ){
	die('需要登陆后操作');
}

//避免注入攻击
$id = (int) $_GET['id'];
if( $id < 1 ){
	die('无效数据');
}

$sql = "DELETE FROM msg WHERE id='{$id}'";
$is = $db->query( $sql );
header("location: gbook.php");