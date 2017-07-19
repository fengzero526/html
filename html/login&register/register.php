<?php

if(!isset($_SERVER['PHP_AUTH_USER']))
{
	header('WWW-Authenticate: Basic Realm="Book Projects"');
	header("HTTP/1.1 401 Unauthorized");
}else{
	echo "your username : {$_SERVER['PHP_AUTH_USER']}<br />";
	echo "your password : {$_SERVER['PHP_AUTH_PW']}<br />";
}

echo "<br />";
date_default_timezone_set('Asia/Shanghai');//设置时区
$year=date('Y');
$month=date('m');
$day=date('d');
$hour=date('G');
$fen=date('i');
$second=date('s');
echo $year.'-'.$month.'-'.$day.' '.$hour.':'.$fen.':'.$second;
echo "<br />";




?>