<?php
$ini = parse_ini_file("config.ini",true);
$mysqlData = $ini["MySQL"];
$server = $mysqlData["Server"];
$user = $mysqlData["Username"];
$pass = $mysqlData["Password"];
$db = $mysqlData["Database"];
$connection = false;
$conn = new mysqli($server, $user, $pass, $db);
unset($ini, $mysqlData, $server, $user, $pass);
if ($conn->connect_error) {
	die("Connection to Database Failed: " . $conn->connect_error);
} else {
	$connection = true;
}
?>