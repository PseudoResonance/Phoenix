<?php
echo file_get_contents("../configData/head.txt");
include "mysql.php";
$title = "";
if ($connection) {
	$URI = ltrim(rtrim($_SERVER['SCRIPT_NAME'], ".php"), "/");
	$sql = "SELECT name FROM `pagenames` WHERE file='" . $URI . "'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$title = $row['name'];
		}
	}
	$sql = "SELECT centerC,leftC,rightC FROM `pages` WHERE page='" . $URI . "'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$center = $row['centerC'];
			if (!empty($row['left'])) {
				$left = $row['left'];
			}
			if (!empty($row['right'])) {
				$right = $row['right'];
			}
		}
	}
}
if ($URI == "login") {
	$ini = parse_ini_file("config.ini",true);
	$loginData = $ini["Login"];
	$google = $loginData["Google"];
	echo "\n<script src=\"https://apis.google.com/js/platform.js\" async defer></script>\n<meta name=\"google-signin-client_id\" content=\"" . $google . "\">";
}
echo "\n<title>" . $title . " - " . file_get_contents("../configData/title.txt") . "</title>";
?>