<?php
session_start();

$str = file_get_contents('mots.txt');
$result = explode('', $str);
$result = $result [array_rand($result)];
$_SESSION["word"] = $result;