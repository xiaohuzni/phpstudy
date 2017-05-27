<?php
$week = array('mo' =>'Monday' ,'tu'=>'Tuesday','we'=>'Wednesday','th'=>'Thursday','fr'=>'Friday','sa'=>'Saturday','su'=>'Sunday' );
$weekend = array('Sa' =>'Saturday' ,'su'=>'Sunday' );
$result=array_intersect($week, $weekend);
echo "<pre>";
print_r($result);
?>