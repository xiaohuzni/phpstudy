<?php
header("Content-Type:text/html;charset=utf-8");
$fb=fopen($_SERVER['DOCUMENT_ROOT']."/../data/lock_test.txt", "w");
flock($fb, LOCK_EX);
fwrite($fb, "test a");
flock($fb, LOCK_UN);
fclose($fb);
?>