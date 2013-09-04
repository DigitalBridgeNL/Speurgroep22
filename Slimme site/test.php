<?php
session_start();
$filename = $_SESSION['tempFile'];
$arr = unserialize(file_get_contents($filename));
echo $arr['description'];

?>