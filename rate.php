<?php
session_start();

$rating = $_POST['rate'];

$latlng = $_REQUEST['latlng'];
$user = $_REQUEST['user'];

//echo "$latlng";

$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());

$query="INSERT INTO rating values(DEFAULT,".$rating.",'".$latlng."')";//,'$_POST[title]','$_POST[desc]','$_POST[link]')";
mysql_query("$query");
mysql_close("$con");
echo"<html><head>";
echo "News rated successfully";
echo"</head>";
	echo"<h2></br><a href=\"map_v3_rating.php?user=".$user."\">View News</a></h2>";
echo"<body bgcolor=#0c8731> <div id=\"three\" style=\"float:right;\">

			<img src=\"world.png\" alt=\"World\"  height=\"500\" width=\"800\">
			</div></body></html>";


?>
