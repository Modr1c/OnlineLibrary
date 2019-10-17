<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545480303613&di=d1be885020f2dd3e30767b8cb8022cb0&imgtype=0&src=http%3A%2F%2Fnews.sipac.gov.cn%2Fsipnews%2Fyqzt%2Fyqzt2014%2F201404sipycc5zn%2Fgycg%2F201404%2FW020140417685796601068.jpg" width="780" height="400" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="780" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" background="http://img.php.cn/upload/course/000/000/008/58215f29827c0755.jpg">
          <a href="index.php" title="首页">首页</a></td>
          <td align="center" background="http://img.php.cn/upload/course/000/000/008/58215f29827c0755.jpg">
          <a href="msg/gbook.php" title="问题反馈及讨论">问题反馈及讨论</a></td>
          <td align="center" background="http://img.php.cn/upload/course/000/000/008/58215f29827c0755.jpg">
          <a href="founder.php" title="关于作者">关于作者</a></td>
          <td align="center" background="http://img.php.cn/upload/course/000/000/008/58215f29827c0755.jpg">
          <a href="landing.php"  title="用户登录">用户登录</a><br/>
          <?php
          error_reporting(0);
          if ($_SESSION['id']){
            echo "<a href='landing.php?tj=out' title='退出'>退出</a>";
          }
          ?>  
          </td>
        </tr>
      </table></td>
  </tr>
</table>
</html>
