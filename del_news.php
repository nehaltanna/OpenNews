<?php
//session_start();

$del_news = $_POST['del_news'];

//$latlng = $_REQUEST['latlng'];

$user = $_REQUEST['user'];

//echo "$latlng";
echo"<h2>News $del_news</h2>";
$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());

$query="DELETE FROM news WHERE title=\"".$del_news."\"";
//echo $query;
$r = mysql_query("$query");
mysql_close("$con");
echo"<html><head>";
echo "News deleted successfully";
echo"</head>";
	echo"<h2></br><a href=\"map_v3_administer.php?user=".$user."\">View News</a></h2>";
echo"<body bgcolor=#0c8731> <div id=\"three\" style=\"float:right;\">

			<img src=\"world.png\" alt=\"World\"  height=\"500\" width=\"800\">
			</div></body></html>";


?>
