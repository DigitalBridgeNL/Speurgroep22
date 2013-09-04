<?php
$filename = 'test.txt'
$arr = unserialize(file_get_contents($filename));
echo $arr['title'];

?>