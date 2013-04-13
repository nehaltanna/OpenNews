
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

   
    function load()
	{
      var map = new google.maps.Map(document.getElementById("map"),
	  {
        center: new google.maps.LatLng(18.5236, 73.8478),
        zoom: 14,
        mapTypeId: 'roadmap'
      });

	 // alert(map);
      var infoWindow = new google.maps.InfoWindow;
		
		 <?php

			 $user = $_REQUEST['user'];
		 $us = $_REQUET['us'];

      // genxml PHP file i/p
	
		$us = $_POST['users'];

	echo" downloadUrl(\"genxml_user.php?user=".$us."\", function(data)";?>

	//var us = "<?php echo $us; ?>";
	{
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++)
		{
			var latlng = markers[i].getAttribute("latlng");
			var latlngStr = latlng.split(",",2);
			var lat = parseFloat(latlngStr[0]);
			var lng = parseFloat(latlngStr[1]);
			var point = new google.maps.LatLng(lat, lng);

//          var point = new google.maps.LatLng(18.515707879796885,73.83516332788088);//markers[i].getAttribute("latlng"));
			//alert(point);
		//	alert(markers[i].getAttribute("latlng"));
			
		  var name = markers[i].getAttribute("u_name");
          var zoomlevel = markers[i].getAttribute("zoom_level");
         
		  var title = markers[i].getAttribute("title");
		  
			 var description = markers[i].getAttribute("description");
			 var date = markers[i].getAttribute("date");
			 var link = markers[i].getAttribute("link");          
        
		  var html = "<b>" + title + "</b> <br/>" +"News: "+description+"<br/>"+"more: <a href=\""+link+"\">"+link+"</a><br/> Submitted by: "+name+"<br>Date: "+date+"<br> Rate this News: <form action=\"rate.php?latlng="+latlng+"&user="+name+"\" method=\"POST\"><select name=\"rate\" id=\"rate\"><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option></select> &nbsp;&nbsp;<input type=submit value=submit></form>";
        // alert(html);

		 				
		  //var icon = customIcons[type] || {};
		  var marker = new google.maps.Marker({
            map: map,
			zoom: zoomlevel,
            position: point,
            animation: google.maps.Animation.DROP
          });
          
		//  alert(marker);
		  bindInfoWindow(marker, map, infoWindow, html);
        }//end of for
      });
		

    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>


  </script>

  </head>

  <body bgcolor=#0c8731 onload="load()">
  <?php
  echo"<h2>Welcome User: ".$user."</h2>";
  ?>
	<div align="right"> <a href="index.php"> <button type="submit"> Logout </button> </a> </div>
	<div id="one" style="float:right;">
	</br>
	<?php
		echo"<a href='news.php?user=onews'> Add news on desired location</a>";
		echo"</br></br>";
		echo"<a href='map_v3_user.php?user=".$user."'> News Submitted by you</a>";

	
		$connection=mysql_connect (localhost, "root", "dltanna1");
		if (!$connection) {  die('Not connected : ' . mysql_error());} 

		// Set the active MySQL database

		$db_selected = mysql_select_db("open_news", $connection);
		if (!$db_selected) 
		{
			 die ('Can\'t use db : ' . mysql_error());
		} 

		// Select all the rows in the news table

		$query = "SELECT u_name FROM users WHERE 1";
		$result = mysql_query($query);
		if (!$result)
		{  
			die('Invalid query: ' . mysql_error());
		} 

		// Iterate through the rows, adding usernames in dropdownlist
		
		echo"<form action=\"map_v3_user_admin.php?user=".$user."\" method=\"POST\">
		</br>News submited by other user:<br> 
		Select a user: <select name=\"users\" id=\"users\"> ";
		while ($row = @mysql_fetch_assoc($result))
		{  
			$user=$row['u_name'];
			echo"<option value=".$user.">".$user."</option>";
		}
		echo"</select></br> <input type=submit value=\"GO\"></form>";

		echo"</br></br>";
		echo"<a href='map_v3.php?user=".$user."'> View all news</a>";

echo"<br>";
		echo"<font color=navy><h2> Administer:	<h2></font>";
		//echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo"<form action=\"del_user.php?user=".$user."\" method=\"POST\">";
		echo"Delete User: <select name=\"del_user\" id=\"del_user\">";
		
		$query = "SELECT u_name FROM users WHERE 1";
		$result = mysql_query($query);
		if (!$result)
		{  
			die('Invalid query: ' . mysql_error());
		}
		while ($row = @mysql_fetch_assoc($result))
		{  
			$user=$row['u_name'];
			echo"<option value=".$user.">".$user."</option>";
		}

		echo"</select>";
		echo"&nbsp;&nbsp;<input type=\"submit\" value=\"GO\"></form>";


		echo"<br><br>";
		
		echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo"<form action=\"del_news.php?user=".$user."\"  method=\"POST\"> Delete News: <select name=\"del_news\" id=\"del_news\">";
		
		$query = "SELECT title FROM news WHERE 1";
		$result = mysql_query($query);
		if (!$result)
		{  
			die('Invalid query: ' . mysql_error());
		}
		while ($row = @mysql_fetch_assoc($result))
		{  
			$title=$row['title'];
			echo"<option value=".$title.">".$title."</option>";
		}

		echo"</select>";
			echo"&nbsp;&nbsp;<input type=\"submit\" value=\"GO\"></form>";


		echo"<br><br>";
		
		
		
		?>
	</div>
    <div id="map" style="width: 1000px; height: 600px"></div>
  </body>

</html>
