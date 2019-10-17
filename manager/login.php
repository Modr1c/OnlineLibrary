<?php
include('connect.php');

session_start();

$user = isset( $_POST['user'] ) ? $_POST['user'] : '';
$pwd = isset( $_POST['pwd'] ) ? $_POST['pwd'] : '';



//如果账号和密码不为空，就进行密码有效性的检查
if( !empty($user) && !empty( $pwd ) ){
	
	$sql = "SELECT * FROM admin WHERE user='{$user}' and pwd='{$pwd}'";
	$mysqli_result = $db->query($sql);
	$row = $mysqli_result->fetch_array( MYSQLI_ASSOC );

	//如果 $row 是数组，就说明取出数据成功，是有效账号
	if( is_array( $row ) ){
		$_SESSION['login'] = 1;
		header("location: gbook.php");
		exit;
	}else{
		die('登陆失败');
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>留言本</title>
		<style>
		.wrap{
			width:600px;
			margin:0px auto;
		}
		</style>
	</head>
	<body>
		<div class='wrap'>
			<form action="login.php" method="post">
			用户：<input type='text' name='user' />
			密码：<input type='text' name='pwd' />
			<input type='submit' value='提交'/>
			</form>
		</div>
	</body>
</html>