<h1 id="title"><?php echo $title;?></h1>
<div id="hr">
<span>
<?php
$handle = fopen("../configData/header.txt", "r");
$echo = "";
if ($handle) {
	while (($line = fgets($handle)) !== false) {
		$parts = explode(": ", $line);
		if (isset($parts[1])) {
			$url = preg_replace("/\r|\n/", "", $parts[1]);
		} else {
			$url = "/";
		}
		$echo .= "<a href=\"" . $url . "\" class=\"nav\">" . $parts[0] . "</a>&nbsp&nbsp";
	}
	fclose($handle);
	$echo = rtrim($echo, "&nbsp&nbsp");
	echo $echo;
} else {
	echo "A fatal error has occurred! Please contact the site administrator!";
} 
?>
</span>
</div>
<noscript><h1>Please Enable JavaScript! Without it, some features will not work!</h1></noscript>