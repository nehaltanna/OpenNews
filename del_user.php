<?php
session_start();

$del_user = $_POST['del_user'];

//$latlng = $_REQUEST['latlng'];

$user = $_REQUEST['user'];

//echo "$latlng";
echo"<h2>user $del_user</h2>";
$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());

$query="DELETE FROM users WHERE u_name=\"".$del_user."\"";
$r = mysql_query("$query");
mysql_close("$con");
echo"<html><head>";
echo "User deleted successfully";
echo"</head>";
	echo"<h2></br><a href=\"map_v3_administer.php?user=".$user."\">View News</a></h2>";
echo"<body bgcolor=#0c8731> <div id=\"three\" style=\"float:right;\">

			<img src=\"world.png\" alt=\"World\"  height=\"500\" width=\"800\">
			</div></body></html>";
;

?>
