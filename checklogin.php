<?php
session_start();
		$us=$_SESSION['username'];
$user = $_REQUEST['us'];
echo $user;
$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());

$query="SELECT type from users WHERE u_name=\"".$us."\"";
mysql_query("$query");
mysql_close("$con");

if($us=="ankit")
{
	header('location: map_v3_administer.php?');
}

else
{
		header('location: map_v3_login.php');
}

?>
