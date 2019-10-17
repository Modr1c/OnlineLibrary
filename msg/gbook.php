<?php
include('connect.php');
include('page.php');


$sql = "select count(*) as t from msg";
$mysqli_result = $db->query($sql);
$row = $mysqli_result->fetch_array( MYSQLI_ASSOC );


//数据总量
$dataTotal = $row['t'];
//每页显示数量
$pageNum = 5;
//实例化分页类
$p = new Page($dataTotal, $pageNum);

$sql = "SELECT * FROM msg ORDER BY id DESC LIMIT {$p->offset},{$pageNum}";
$mysqli_result = $db->query($sql);
if( $mysqli_result === false ){
	echo "SQL错误";
	exit;
}
$rows = [];
while( $row = $mysqli_result->fetch_array( MYSQLI_ASSOC ) ){
	$rows[] = $row;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>问题反馈及讨论</title>
		<style>
		.wrap{
			width:600px;
			margin:0px auto;
		}
		.add{overflow: hidden;}
		.add .content{
			width:598px;
			margin:0;
			padding:0;
		}
		.add .user{
			float:left;
		}
		.add .btn{
			float:right;
		}

		.msg{margin:20px 0px;background: #ccc;padding:5px;}
		.msg .info{overflow: hidden;}
		.msg .user{float:left;color:blue;}
		.msg .time{float:right;color:#999;}
		.msg .content{width:100%;}

		.page a{
			margin-right: 20px;
			background:#ccc;
			color:blue;
			padding:0px 10px;
			text-decoration:none;
		}
		.page .hover{
			color:red;
		}
		</style>
	</head>
	<body>
		<div class='wrap'>
			<!-- 发表留言 -->
			<div class='add'>
			<form action="save.php" method="post" enctype="multipart/form-data">
				<textarea name='content' class='content' cols='50' rows='5'></textarea>
				<input name='user' class='user' type='text' />
				<input type='file' name='file1' class='user'/>
				<input class='btn' type='submit' value='发表留言'/> 
			</form>
			</div>

			<?php
			foreach( $rows as $row ){
			?>
				<!-- 查看留言 -->
				<div class='msg'>
					<div class='info'>
						<span class='user'><?php echo $row['user'];?></span>
						<span class='time'>
						<?php echo date( "Y-m-d H:i:s", $row['intime'] );?>
							<a onclick='return confirm("确定要删除吗?")' href='delete.php?id=<?php echo $row['id'];?>'>删除</a>
							
						</span>
					</div>
					<div class='content'>
						<?php echo $row['content'];?>
						<hr/>
						<?php
						if( $row['pic'] <> '' ){
							echo "<img src='uploads/{$row['pic']}' />";
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
			<div class='page'>
			<?php
				$p->show();
			?>
			</div>
		</div>
	</body>
</html>