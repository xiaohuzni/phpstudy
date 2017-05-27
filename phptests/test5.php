<?php
header("Content-Type:text/html;charset=utf-8");
$dir_name="tmp_data";
$newfile="temp_new.txt";
if (copy($dir_name."/temp.txt",$newfile)) {
	echo "拷贝成功！";
}
else
{
	echo "拷贝失败！";
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
if (unlink($newfile)) {
	echo $newfile."删除成功！";
}
else
{
	echo $newfile."删除失败!";
}
?>