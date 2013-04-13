<?php

	$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
		mysql_select_db("open_news") or die(mysql_error());
		
		$query = "SELECT * FROM news";
		
		$result=mysql_query($query,$con);
		
		$row=mysql_fetch_row($result);
		
		$num=mysql_numrows($result);

		
		while($row = mysql_fetch_array($result))
		{	
				//echo "user: ".$row[1];
				echo" Latlang: ".$row[0];
				//echo" zoomlevel: ".$row[2];
				//echo" Title: ".$row[3];
				//echo" Desc: ".$row[4];
				//echo" Link:".$row[5];
				echo"<br/>";
				
		}
		
		mysql_close();
	
?>
	
