<?php
header("Content-Type:text/html; charset=utf-8");
$dir_name="tmp";
if (mkdir($dir_name)) {
	if ($fb=fopen($dir_name."/one.txt", 'w')) {
		if (fwrite($fb, "I Love php")) {
			echo "写入成功！";
		}
	}
}
else
{
	echo "创建目录失败！";
}
?>