<?php
header("Content-Type: text/html; charset=utf-8");
$week = array('mo' =>'Monday' ,'tu'=>'Tuesday','we'=>'Wednesday','th'=>'Thursday','fr'=>'Friday','sa'=>'Saturday','su'=>'Sunday' );
echo "排序前：<br>";
foreach ($week as $key => $value) {
	   echo $value;
	   echo "<br>";
}
echo "排序后：<br>";
sort($week);
foreach ($week as $key => $value) {
	echo $value;
	echo "<br>";
}
  ?>