<?php
	session_start();
	$ok=false;
	if (empty($_SESSION['user'])||$_SESSION['user']!='admin') {
		echo '请<a href="login.php">登陆</a>后进行操作';
		exit;
	}
	if (!isset($_GET['entry'])) {
		

		if (!isset($_POST['id'])) {
			 $ok=true;
			 $msg='参数请求错误请返回<a href="index.php">首页</a>';
		}
		else
		{
			$path=substr($_POST['id'], 0,6);
			$entry=substr($_POST['id'], 7,9);
			$file_name='contents/'.$path.'/'.$entry.'.txt';
			if (unlink($file_name)) {
				$ok=true;	
				$msg='删除文件成功，<a href="index.php">返回首页</a>';
			}
			else
			{
				$ok=true;
				$msg='删除文件失败！<a href="index.php">返回首页</a>';
			}
		}
		
	}
	else{
		$form_data='';
		$path=substr($_GET['entry'], 0,6);
		$entry=substr($_GET['entry'], 7,9);
		$file_name='contents/'.$path.'/'.$entry.'.txt';
		if (file_exists($file_name)) {
			$form_data='<input type="hidden"  name="id"   value="'.$_GET['entry'].'">';
		}
		else
		{
			$ok=true;
			$msg='所要删除的文件不存在<a href="index.php">返回首页<a>?';
		}
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
      			<div id="blog_title">删除日志</div>
      		 	<div id="blog_body">
      		 		<?php  echo gettype($ok) ?>
      		 		<?php if ($ok==false) {
      		 			
      		 		 ?>
      				<form method="POST" action="delete.php">
      					<font color="red">删除的日志将无法删除，确定要删除吗？</font><br>
      					<input type="submit" value="确定">
      					<?php echo $form_data; ?>
      				</form>
      				<?php }?>
      				<?php if ($ok==true) {
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
      	</div>
      	<div id="footer">
      	CopyRight 2017
      	</div>
	</div>
</body>
</html>