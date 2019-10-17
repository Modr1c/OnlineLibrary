<?php
include('connect.php');
error_reporting(0);
$bookname=$_POST['bookname'];
$price=$_POST['price'];
$type=$_POST['type'];
$total=$_POST['total'];
$leave=$_POST['leave'];
$time=date( "Y-m-d H:i:s", time() );
if ($total) {
	$sql="INSERT INTO yx_books (name, price, uploadtime, type, total, leave_number) values ('{$bookname}', '{$price}','{$time}' ,'{$type}','{$total}','{$leave}')";
}else{
	$sql="DELETE FROM yx_books WHERE name = '{$bookname}'";
}
$db->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>图书馆后台管理</title>
		<style>
		body{
			width:460px;
			margin:0px auto;
		}
		.wrap1{
			float:left;
			width:230px;
			margin:0px auto;
		}
		.wrap2{
			float:right;
			width:230px;
			margin:0px auto;
		}
		</style>
	</head>
	<body bgcolor="#ACD6FF">
		<div class='wrap1' >
			<font color="#FF5151"><strong>添加图书</strong></font>
			<form action="gbook.php" method="post">
			书名：<input type='text' name='bookname' />
			价格：<input type='text' name='price' />
			类型：<input type='text' name='type' />
			总数：<input type='text' name='total' />
			剩余：<input type='text' name='leave' />
			<input type='submit' value='提交'/>
			</form>
		</div>
		<div class='wrap2' >
			<font color="#FF5151"><strong>删除图书</strong></font>
			<form action="gbook.php" method="post">
			书名：<input type='text' name='bookname' />
			<input type='submit' value='提交'/>
			</form>
		</div>
	</body>
</html>