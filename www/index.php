<!DOCTYPE html>
<html>
<head>
<?php include "../configData/head.php";?>

</head>
<body>
<div id="body">
<div id="content">
<div id="header">
<?php include "../configData/header.php";?>

</div>
<?php include "../configData/module.php";?>

<div id="footer">
<hr />
<?php include "../configData/footer.php";?>

</div>
</div>
<div id="clear"></div>
</div>
</body>
</html>
<!--CREATE TABLE IF NOT EXISTS `blog` (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, posted DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, author VARCHAR(64) NOT NULL, title VARCHAR(64) NOT NULL, text TEXT NOT NULL, editTime DATETIME, lastEdit VARCHAR(64))-->
<!--CREATE TABLE IF NOT EXISTS `about` (id INT(6) UNSIGNED PRIMARY KEY, text TEXT NOT NULL)-->
<!--CREATE TABLE IF NOT EXISTS `pages` (page VARCHAR(32) PRIMARY KEY NOT NULL, centerC VARCHAR(100) NOT NULL, leftC VARCHAR(100), rightC VARCHAR(100))-->
<!--CREATE TABLE IF NOT EXISTS `pagenames` (file VARCHAR(32), name VARCHAR(64))-->