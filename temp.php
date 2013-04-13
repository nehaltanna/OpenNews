<?php
session_start();

$user = $_REQUEST['user'];

if(isset($_GET	['arg']))
{
	header('Location: map_v3.php');
}
$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());
$latlng=$_POST[lat].",".$_POST[lng];
$query="INSERT INTO News values('$latlng','$_SESSION[username]','$_POST[zoomlvl]','$_POST[title]','$_POST[desc]','$_POST[date]','$_POST[link]')";
mysql_query("$query");
mysql_close("$con");
echo"<html><head>";
echo "News inserted successfully";
echo"</head>";
	echo"<h2></br><a href=\"map_v3.php?user=".$user."\">View News</a></h2>";
echo"<body bgcolor=#0c8731> <div id=\"three\" style=\"float:right;\">

			<img src=\"world.png\" alt=\"World\"  height=\"500\" width=\"800\">
			</div></body></html>";

?>
