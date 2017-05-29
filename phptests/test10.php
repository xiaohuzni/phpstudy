<?php
header("Content-Type:text/html; charset=utf-8");
$da=$_POST['mydata'];
if (checkdate(substr($da,4,2), substr($da,6,2), substr($da,0,4))) {
	echo $da."是一个正确的日期格式";
}
else
{
	echo "非法日期";
}
?>