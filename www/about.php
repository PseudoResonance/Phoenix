<!DOCTYPE html>
<html>
<head>
<?php echo file_get_contents("../configData/head.txt");?>

<title>About Us - <?php $title = file_get_contents("../configData/title.txt"); echo $title;?></title>
</head>
<body>
<div id="body">
<div id="content">
<div id="header">
<?php include "../configData/header.php";?>

<?php
$pageID = "about";
?>
</div>
<?php include "../configData/page.php";?>

<div id="footer">
<hr />
<?php include "../configData/footer.php";?>

</div>
</div>
<div id="clear"></div>
</div>
</body>
</html>