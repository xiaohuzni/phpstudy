<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
	session_start();
	$ok=false;

	if (!isset($_GET['entry'])) {
		echo "参数请求错误！";
		exit;
}
	if (empty($_SESSION['user'])||$_SESSION['user']!='admin') {
		echo '请<a href="login.php">登陆</a>后进行操作';
		exit;
	}
		$path=substr($_GET['entry'], 0,6);//文件夹名字
		$entry=substr($_GET['entry'],7,9);//文件名
		$file_name='contents/'.$path.'/'.$entry.'.txt';

	if (file_exists($file_name)) {
		$fb=@fopen($file_name, 'r');
	if ($fb) {
		flock($fb, LOCK_SH);
		$result=fread($fb, filesize($file_name));
	}
	flock($fb, LOCK_UN);
	fclose($fb);
	$content_array=explode('|', $result);
	
	
}
	if (isset($_POST['title'])&&isset($_POST['content'])) {
		$title=trim($_POST['title']);
		$content=trim($_POST['content']);

		if (file_exists($file_name)) {
			$blog_temp=str_replace($content_array[0], $title, $result);
			$bog_str=str_replace($content_array[2], $content, $blog_temp);

			$fb=@fopen($file_name, 'w');
			if ($fb) {
				flock($fb, LOCK_EX);
				$result=fwrite($fb, $bog_str);
				flock($fb, LOCK_UN);
				fclose($fb);
			}
		}
		if (strlen($result)>0) {
			$ok=true;
			$msg='日志修改成功！,<a href="post.php?entry='.$_GET['entry'].'">查看该文章</a>';
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
				<div id="blog_title">编辑日志</div>
				<div id="blog_body">
					<div id="blg_date"></div>
					<?php  if ($ok==false) {
					?>
					<table border="0">
						<form method="post" action="edit.php?entry=<?php echo $_GET['entry']; ?>">
						<tr><td>日志标题：</td></tr>
						<tr><td><input type="text" name="title" size="50" value="<?php echo $content_array[0]; ?>"></td></tr>
						<tr><td>文档内容：</td></tr>
						<tr><td><textarea name="content" cols="49" rows="10"><?php echo $content_array[2]; ?></textarea></td></tr>
						<tr><td>创建于:<?php echo date('Y-m-d H:i:s',$content_array[1]); ?></td></tr>
						<tr><td><input type="submit" value="提交" ></td></tr>
						</form>
					</table>
					<?php }?>
					<?php if ($ok) {
						echo $msg;
					} ?>
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