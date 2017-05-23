<!DOCTYPE html>
<html>
<head>
<?php echo file_get_contents("../configData/head.txt");?>

<title>Home - <?php $title = file_get_contents("../configData/title.txt"); echo $title;?></title>
</head>
<body>
<div id="body">
<div id="content">
<div id="header">
<?php include "../configData/header.php";?>

<?php
$pageID = "";
?>
</div>
<h1 id="pageTitle">Blog</h1>
<?php include "../configData/blog.php";?>

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