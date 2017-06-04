<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
$ok=true;
if (isset($_POST['title'])&&isset($_POST['content'])) {
	$ok=true;
	$title=trim($_POST['title']);
	$content=trim($_POST['content']);
	$date=time();
	$blog_str=$title.'|'.$date.'|'.$content;

	$ym=date('Ym',time());
	$d=date('d',time());
	$time=date('His',time());
	$folder='contents/'.$ym;//contents下文件夹名
	$file=$d.'-'.$time;
	$filename=$folder.'/'.$file.'.txt';
	$entry=$ym.'-'.$file;

	if (file_exists($folder)==false) {
		if (!mkdir($folder)) {
			echo "<font color=red>创建目录失败</font>";
		}
	}

	$fb= @fopen($filename, 'w');
	if ($fb) {
		flock($fb, LOCK_EX);
		$result=fwrite($fb,$blog_str);
		flock($fb, LOCK_UN);
		fclose($fb);
	}
	if (strlen($result)>0) {
		$msg='日志添加成功，<a href="post.php?entry='.$entry.'">查看该日志文章</a>';
		echo $msg;
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
				<div id="blog_title">添加一篇新日志</div>
				<div id="blog_body">
					<div id="blg_date"></div>
					<table border="0">
						<form method="post" action="add.php">
						<tr><td>日志标题：</td></tr>
						<tr><td><input type="text" name="title" size="50"></td></tr>
						<tr><td>文档内容：</td></tr>
						<tr><td><textarea name="content" cols="49" rows="10"></textarea></td></tr>
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