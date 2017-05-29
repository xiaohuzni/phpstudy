<?php
header("Content-Type:text/html; charset=utf-8");
$time_old=mktime(0,0,0,9,8,1994);
$time_new=mktime();
$time_cha=$time_new-$time_old;
$time_year=floor($time_cha/(365*24*60*60));
echo "出生了".$time_year."年";

?>