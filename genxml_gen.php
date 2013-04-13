<?php  

// Start XML file, create parent node


$dom = new DOMDocument("1.0");
$node = $dom->createElement("news");
$parnode = $dom->appendChild($node); 

// Opens a connection to a MySQL server

$connection=mysql_connect (localhost, "root", "dltanna1");
if (!$connection) {  die('Not connected : ' . mysql_error());} 

// Set the active MySQL database

$db_selected = mysql_select_db("open_news", $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
} 

// Select all the rows in the news table

$query = "SELECT news.latlng,u_name,zoom_level,title,description,date,link FROM news WHERE 1";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
} 

header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){  
  // ADD TO XML DOCUMENT NODE  
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("latlng",$row['latlng']);
  $newnode->setAttribute("u_name", $row['u_name']);  
  $newnode->setAttribute("zoom_level", $row['zoom_level']);  
  $newnode->setAttribute("title", $row['title']);  
  $newnode->setAttribute("description", $row['description']);
  $newnode->setAttribute("date", $row['date']);
  $newnode->setAttribute("link", $row['link']);
  $newnode->setAttribute("rating", $row['rating']);
} 

/*
$query1 = "SELECT rating FROM rating WHERE 1";
$result1 = mysql_query($query1);
if (!$result1) {  
  die('Invalid query: ' . mysql_error());
} 
while ($row = @mysql_fetch_assoc($result1))
{  
  // ADD TO XML DOCUMENT NODE  
  //$node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);
	$newnode->setAttribute("rating",$row['rating']);
}
*/

echo $dom->saveXML();

?>
