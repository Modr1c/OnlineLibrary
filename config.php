<?php

ob_start();
if (!session_id())
session_start(); //开启缓存
header("Content-type:text/html;charset=utf-8");

$host = '127.0.0.1';
$dbuser = 'root';
$pwd  = '123456';
$dbname = 'book';
$link = mysqli_connect($host, $dbuser, $pwd, $dbname);
mysqli_set_charset($link, "utf8");
if (!$link) {
  die("连接失败:".mysqli_connect_error());
}
?>