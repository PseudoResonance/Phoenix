<?php
$centerModules = explode(",", $center);
$centerMods = array();
foreach ($centerModules as $module) {
	$centerParts = explode("?", $module);
	if (isset($centerParts[1])) {
		$centerVariables = explode("&", $centerParts[1]);
		$centerVars = array();
		foreach ($centerVariables as $var) {
			$parts = explode("=", $var);
			$centerVars[$parts[0]] = $parts[1];
		}
		$centerMods[$centerParts[0]] = $centerVars;
	} else {
		$centerMods[$centerParts[0]] = array();
	}
}
if (!empty($left)) {
	$leftModules = explode(",", $left);
	$leftMods = array();
	foreach ($leftModules as $module) {
		$leftParts = explode("?", $module);
		if (isset($leftParts[1])) {
			$leftVariables = explode("&", $leftParts[1]);
			$leftVars = array();
			foreach ($leftVariables as $var) {
				$parts = explode("=", $var);
				$leftVars[$parts[0]] = $parts[1];
			}
			$leftMods[$leftParts[0]] = $leftVars;
		} else {
			$leftMods[$leftParts[0]] = array();
		}
	}
}
if (!empty($right)) {
	$rightModules = explode(",", $right);
	$rightMods = array();
	foreach ($rightModules as $module) {
		$rightParts = explode("?", $module);
		if (isset($rightParts[1])) {
			$rightVariables = explode("&", $rightParts[1]);
			$rightVars = array();
			foreach ($rightVariables as $var) {
				$parts = explode("=", $var);
				$rightVars[$parts[0]] = $parts[1];
			}
			$rightMods[$rightParts[0]] = $rightVars;
		} else {
			$rightMods[$rightParts[0]] = array();
		}
	}
}
if (!empty($leftMods)) {
	echo "<div id=\"left\">";
	foreach ($leftMods as $module => $variables) {
		if (!empty($variables)) {
			$ARGUMENTS = $variables;
		} else {
			$ARGUMENTS = array();
		}
		include "modules/" . $module . ".php";
		unset($ARGUMENTS);
	}
	echo "</div>";
}
echo "<div id=\"center\">";
foreach ($centerMods as $module => $variables) {
	if (!empty($variables)) {
		$ARGUMENTS = $variables;
	} else {
		$ARGUMENTS = array();
	}
	include "modules/" . $module . ".php";
	unset($ARGUMENTS);
}
echo "</div>";
if (!empty($rightMods)) {
	echo "<div id=\"right\">";
	foreach ($rightMods as $module => $variables) {
		if (!empty($variables)) {
			$ARGUMENTS = $variables;
		} else {
			$ARGUMENTS = array();
		}
		include "modules/" . $module . ".php";
		unset($ARGUMENTS);
	}
	echo "</div>";
}
?>