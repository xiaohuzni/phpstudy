<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
if (!isset($_GET['entry'])) {
	
}
$file_name='contents/201705/17-5143.txt';
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
echo "<h1>我的BLOG<h1>";
echo "<b>日志标题:<b>".$content_array[0];
echo "<b>发布时间<b>".date('Y-m-d H:i:s',$content_array[1]);
echo "<hr>";
echo $content_array[2];
?>