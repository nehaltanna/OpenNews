<?php
session_start();

$uname = $_POST['txt_uname'];
$passwd =  $_POST['txt_passwd'];
$email =  $_POST['txt_email'];


//echo "$latlng";

$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("open_news") or die(mysql_error());

$query="INSERT INTO users values('".$uname."','".$passwd."','".$email."',0)";
$rs = mysql_query("$query");
mysql_close("$con");
if($rs)
{
	header('location: index.php');
}
else
{
	echo"problem";
}

?>
