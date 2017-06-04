<?php
include 'config/auth.php';
session_start();
if (isset($_POST['user'])&&isset($_POST['passwd'])) {
	$user=$_POST['user'];
	$passwd=$_POST['passwd'];
	$passwd=md5($passwd);
	if ($user!=$AUTH['user']||$passwd!=$AUTH['passwd']) {
		echo "<strong><font color="."red".">用户名和密码错误！</font></strong>";
	}
	else
	{
		$_SESSION['user']=$user;
		header("location:index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>基于文本的简易BLOG</title>
	<Link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div id="heard">
			<h1>我的BOLOG</h1>
		</div>
		<div id="title">
			---I have a dream---
		</div>
		<div id="left">
			<div id="blog_entry">
				<div id="blog_title">用户登录</div>
				<div id="blog_body">
					<div id="blg_date"></div>
					<table border="0">
						<form method="post" action="login.php">
						<tr><td>用户名称：<td><input type="text" name="user" size="15"></td></td></tr>
						<tr><td>用户密码：<td><input type="password" name="passwd" size="15"></td></td></tr>
						<tr><td><input type="submit" value="提交" ></td></tr>
						</form>
					</table>
				</div>
			</div>
		</div>
		<div id="right">
			<div id="sidebar">
				<div id="menu_title">关于我</div>
				<div id="menu_body">我是个php爱好者</div>
			</div>
		</div>
		<div id="footer">
			CopyRight 2017
		</div>
	</div>
</body>
</html>