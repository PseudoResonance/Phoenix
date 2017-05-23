<h1 id="pageTitle">Blog</h1>
<?php
$pageError = true;
if (isset($_GET['page'])) {
	$num = $_GET['page'];
	if (is_numeric($num)) {
		$page = intval($num);
		if ($page <= 0) {
			echo "<br /><hr /><p>Invalid page number!</p>";
		} else {
			$pageError = false;
		}
	} else {
		echo "<br /><hr /><p>Invalid page number!</p>";
	}
} else {
	$page = 1;
	$pageError = false;
}
if ($connection && !$pageError) {
	$sql = "SELECT COUNT(*) FROM `blog`";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$totalPages = $row['COUNT(*)'];
		}
		$queryPage = $page - 1;
		$sql = "SELECT * FROM `blog` ORDER BY id DESC LIMIT " . $queryPage . "0, 10";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$dateText = "date stuff coming soon";
				if (isset($row['editTime'])) {
					$edit = explode(" ", $row['editTime']);
					$dateText = "<script>document.write(toTimeZone(\"" . $row['posted'] . "\"));</script> by " . $row['author'] . " - Last Edited <script>document.write(toTimeZone(\"" . $row['editTime'] . "\"));</script> by " . $row['lastEdit'];
				} else {
					$date = explode(" ", $row['posted']);
					$dateText = "<script>document.write(toTimeZone(\"" . $row['posted'] . "\"));</script> by " . $row['author'];
				}
				echo "<div class=\"article\">\n<hr />\n<h2>" . $row['title'] . "</h2>\n<h6>" . $dateText . "</h6>\n" . $row['text'] . "\n</div>";
			}
			$maxID = ceil($totalPages / 10);
			$echo = "<br /><hr /><div id=\"navigation\"><h4>Navigation</h4><br /><span>";
			if ($page > 1) {
				$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=1>First</a>&nbsp&nbsp";
				$previous = $page - 1;
				$echo .=  "<a class=\"navigation\" href=/" . $pageID . "?page=" . $previous . ">Previous</a>&nbsp&nbsp";
			}
			$URI = ltrim(rtrim($_SERVER['SCRIPT_NAME'], ".php"), "/");
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
					$echo .=  "<a class=\"navigation\" href=/" . $URI . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
				}
				for ($i = $page + 1; $i <= $max; $i++) {
					$echo .=  "<a class=\"navigation\" href=/" . $URI . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
				}
			} else {
				for ($i = 1; $i <= $maxID; $i++) {
					if ($i != $page) {
						$echo .=  "<a class=\"navigation\" href=/" . $URI . "?page=" . $i . ">" . $i . "</a>&nbsp&nbsp";
					}
				}
			}
			if ($page < $maxID) {
				$next = $page + 1;
				$echo .=  "<a class=\"navigation\" href=/" . $URI . "?page=" . $next . ">Next</a>&nbsp&nbsp";
				$echo .=  "<a class=\"navigation\" href=/" . $URI . "?page=" . $maxID . ">Last</a>&nbsp&nbsp";
			}
			if ($maxID > 1) {
				$echo = rtrim($echo, "&nbsp&nbsp");
				$echo .= "</span></div>";
				echo $echo;
			}
		} else {
			echo "<br /><hr /><p>Invalid page number!</p>";
		}
	} else {
		echo "<br /><hr /><p>Invalid page number!</p>";
	}
}
?>