<?php
chdir("tmp");
echo fileowner("one.txt");
echo "<br>";
echo filesize("one.txt");
echo "<br>";
echo filetype("one.txt");
echo "<br>";
?>