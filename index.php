<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>图书管理系统主页面</title>
   <style>
      body,td,th {font-family: 微软雅黑;font-size: 9px;color: #222;}
      body {background-color: #FFFFFF;line-height:20px;}
      a:link {color: #222;text-decoration: none;}
      a:visited {text-decoration: none;color: #222;}
      a:hover {text-decoration: underline;color: #FF0000;}
      a:active {text-decoration: none;color: #999999;}
   </style>
</head>
<body>
<?php include("head.php");?>
<table width="782" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td height="22">
    <?php
     $pagesize=50;  //每页显示10条数据
     error_reporting(0);
     $sql="select * from yx_books order by id desc";  //倒序排列
     error_reporting(0);
     $rs=mysqli_query($link,$sql);
     $recordcount=mysqli_num_rows($rs);  //输出查询的总数
     //mysql_num_rows() 返回结果集中行的数目。此命令仅对 SELECT 语句有效。
     $pagecount=($recordcount-1)/$pagesize+1;  //计算总页数
     $pagecount=(int)$pagecount;
     $pageno=empty($_GET["pageno"])?'':$_GET["pageno"];  //当前页

     if($pageno=="")  //当前页为空时显示第一页
     {
      $pageno=1;
     }
     if($pageno<1)   //当前页小于第一页时显示第一页
     {
      $pageno=1;
     }
     if($pageno>$pagecount)  //当前页数大于总页数时显示总页数
     {
      $pageno=$pagecount;
     }
     $startno=($pageno-1)*$pagesize;  //每页从第几条数据开始显示

       $sql="select * from yx_books order by id desc limit $startno,$pagesize";
     $rs=mysqli_query($link,$sql);
     ?>
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
       <td width="88" height="30" align="center" bgcolor="#FFFFFF" class="line2">ID</td>
       <td width="103" align="center" bgcolor="#FFFFFF" class="line2">书名</td>
       <td width="77" align="center" bgcolor="#FFFFFF" class="line2">价格</td>
       <td width="152" align="center" bgcolor="#FFFFFF" class="line2">入库时间</td>
       <td width="107" align="center" bgcolor="#FFFFFF" class="line2">类别</td>
        <td width="126" align="center" bgcolor="#FFFFFF" class="line2">现有数量(本)</td>
       <td width="121" align="center" bgcolor="#FFFFFF" class="line2">操作</td>
      </tr>
       <?php
         if(!empty($rs)){
             while($rows=mysqli_fetch_array($rs))
          {
        ?>
        <tr>
         <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rows["id"];?></td>
         <td align="center" bgcolor="#FFFFFF"><?php echo $rows["name"];?></td>
         <td align="center" bgcolor="#FFFFFF"><?php echo $rows["price"];?></td>
         <td align="center" bgcolor="#FFFFFF"><?php echo $rows["uploadtime"];?></td>
         <td align="center" bgcolor="#FFFFFF"><?php echo $rows["type"];?></td>
         <td align="center" bgcolor="#FFFFFF"><?php echo $rows["leave_number"];?></td>
          <td align="center" bgcolor="#FFFFFF" class="line2">
        <?php
         $rs2=mysqli_query($link,"select * from lend where book_id='".$rows['id']."' 
         and user_id='".$_SESSION['id']."'");
         $rows2=mysqli_fetch_assoc($rs2);
         if($rows2['book_id']){
          echo "<font color='red'>您已借阅</font>  
          <a href=huanshu.php?book_id=".$rows['id'].">我要还书</a>";
           }else{
          if($rows["leave_number"]==0){
          echo "<font color='#cccc00'>该书已借完</font>";
           }else{
           echo "<a href=jieshu.php?book_id=".$rows['id'].">我要借书</a>";
           }
          }
        ?> </td>
        </tr>
        <?php
          }
         }
         ?>
       </table>
     <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
          <td height="35" align="center" bgcolor="#FFFFFF">
         <?php
          if($pageno==1)
          {
         ?>
         首页 | 上一页 |
      <?php if($pageno+1<= $pagecount) { ?>
       <a href="index.php?pageno=<?php echo $pageno + 1 ?>">下一页</a> |
        <a href="index.php?pageno=<?php echo $pagecount ?>">末页</a>
      <?php
        }
      }
       else if($pageno==$pagecount)
      {
      ?>
      <a href="index.php?pageno=1">首页</a> |
      <a href="index.php?pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
      <?php
       }
          else
       {
      ?>
      <a href="index.php?pageno=1">首页</a> |
      <a href="index.php?pageno=<?php echo $pageno-1?>">上一页</a> |
      <a href="index.php?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> |
      <a href="?pageno=<?php echo $pagecount?>">末页</a>
      <?php
      }
      ?>
       页次：<?php echo $pageno ?>/<?php echo $pagecount ?>
      页 共有<?php echo $recordcount?>条信息</td>
      </tr>
     </table></td></tr>
</table>
<table width="782" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
      <td height="19" align="center"> LIANG </td>
   </tr>
</table>
</body>
</html>