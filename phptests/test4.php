<?php 
header("Content-Type:text/html;charset=utf-8");
$dir_name="tmp_data";
if (mkdir($dir_name)) {
	echo   $dir_name."创建成功！";
	if ($fb=fopen($dir_name."/temp.txt", 'a')) {
		if (fwrite($fb, "Put some Content into Files")) {
			echo "<hr>";
			echo "在目录tmp_data下创建tmp.txt";
		}
	}
}
else
{
	echo "创建目录失败！";
	exit;
}
echo "<hr>";
if (rmdir($dir_name)) {
	echo "删除目录".$dir_name."成功！";
}
else{
	echo "删除目录失败!";
	exit;
}

 ?>
