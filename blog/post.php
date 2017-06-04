<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
if (!isset($_GET['entry'])) {
	echo "请求参数错误！";
	exit;
}
$path=substr($_GET['entry'], 0,6);
$entry=substr($_GET['entry'], 7,9);
$file_name='contents/'.$path.'/'.$entry.'.txt';
if (file_exists($file_name)) {
	$fb=@fopen($file_name, 'r');
	if ($fb) {
		flock($fb, LOCK_SH);
		$result=fread($fb, 1024);
	}
	flock($fb, LOCK_UN);
	fclose($fb);
}
$content_array=explode('|', $result);
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
      			<div id="blog_title"><?php echo $content_array[0];?></div>
      		 	<div id="blog_body">
      				<div id="blog_date"><?php echo date('Y-m-d H:i:s',$content_array[1]); ?></div>
      				<?php echo $content_array[2]; ?>
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
