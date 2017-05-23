<h1 id="title"><?php echo $title;?></h1>
<div id="hr">
<span>
<?php
$ini = parse_ini_file("config.ini",true);
$navigationData = $ini["Navigation"];
$echo = "";
foreach ($navigationData as $key => $value) {
	$echo .= "<a href=\"" . $value . "\" class=\"nav\">" . $key . "</a>&nbsp&nbsp";
}
$echo = rtrim($echo, "&nbsp&nbsp");
echo $echo;
?>
</span>
</div>
<noscript><h1>Please Enable JavaScript! Without it, some features will not work!</h1></noscript>