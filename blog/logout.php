<?php
session_start();

if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	$msg= '您已成功退出，<a href="index.php">返回首页</a>';
}
else
{
	$msg= '您已退出登陆或者登陆超时!<a>返回首页</a>';
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<Link rel="stylesheet" type="text/css"  href="style.css">
	<title>BLOG</title>
</head>
<body>
	<div id="container">
      	<div id="header">
      	BLOG名称
      	</div>
      	<div id="title">
      	------I have a dream---------
      	</div>
        <div id="left">
      		<div id="blog_entry">
      			<div id="blog_title">退出登陆</div>
      		 	<div id="blog_body">
      				<?php echo $msg; ?>
      		 	</div>
      		</div>
      	</div>
      	<div id="right">
      		<div id="sidebar">
      			<div id="menu_title">关于我</div>
      			<div id="menu_body">我是个php爱好者</div>
      		</div>
                  <div id="sidebar">
                        <div id="menu_title">返回主页</div>
                        <div id="menu_body"><a href="index.php">返回主页</a></div>
                  </div>
      	</div>
      	<div id="footer">
      	CopyRight 2017
      	</div>
	</div>
</body>
</html>