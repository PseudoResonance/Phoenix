<?php
$pageError = true;
if (isset($_GET['page'])) {
	$num = $_GET['page'];
	if (is_numeric($num)) {
		$page = intval($num);
		if ($page <= 0) {
			echo "<p>Invalid page number!</p>";
		} else {
			$pageError = false;
		}
	} else {
		echo "<p>Invalid page number!</p>";
	}
} else {
	$page = 1;
	$pageError = false;
}
include "mysql.php";
if ($connection && !$pageError) {
	$sql = "SELECT id FROM `" . $pageID . "` WHERE id='" . $page . "'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$sql = "SELECT * FROM `" . $pageID . "` WHERE id='" . $page . "'";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($result)) {
			echo $row['text'];
		}
		$result = mysqli_query($conn,"SELECT id FROM `" . $pageID . "` ORDER BY id DESC LIMIT 1;");
		if (mysqli_num_rows($result) > 0) {
			$maxID = mysqli_fetch_array($result)['id'];
		}
		$echo = "<br /><hr /><div id=\"navigation\"><h4>Navigation</h4><br /><span>";
		if ($page > 1) {
			$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=1>First</a>&nbsp&nbsp";
			$previous = $page - 1;
			$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $previous . ">Previous</a>&nbsp&nbsp";
		}
		if ($maxID > 11) {
			$low = $page - 5;
			if ($low <= 0) {
				$low = 1;
			}
			$max = $page + 5;
			if ($max > $maxID) {
				$max = $maxID;
			}
			for ($i = $low; $i < $page; $i++) {
				$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
			}
			for ($i = $page + 1; $i <= $max; $i++) {
				$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
			}
		} else {
			for ($i = 1; $i <= $maxID; $i++) {
				if ($i != $page) {
					$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
				}
			}
		}
		if ($page < $maxID) {
			$next = $page + 1;
			$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $next . ">Next</a>&nbsp&nbsp";
			$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $maxID . ">Last</a>&nbsp&nbsp";
		}
		if ($maxID > 1) {
			$echo = rtrim($echo, "&nbsp&nbsp");
			$echo .= "</span></div>";
			echo $echo;
		}
	} else {
		echo "<p>Invalid page number!</p>";
	}
}

$conn->close();
?>