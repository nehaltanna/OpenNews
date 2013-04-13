<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en">

<?php
	if(isset($_POST["btn_logout"])==true)
	{
		header('Location: index.php');	
	}
?>
<head>



<meta charset=utf-8>
<meta name="viewport" content="width=620">
    <style type="text/css">
        .newStyle1
        {
            font-family: Chiller;
            text-decoration: blink;
            font-size: 95px;
        }
        .newStyle1
        {
            font-family: Chiller;
            font-size: 72px;
            text-decoration: overline blink;
            text-align: justify;
        }
    </style>
</head>


<?php
	session_start();
		$us=$_SESSION['username'];
		?>

<body bgcolor=#0c8731>
    <div id="one" style="float:right;">
	</br></br>
		<?php 
			$login = $_POST['txt_uname'];
		echo"<a href='checklogin.php?user=".$us."'> View all news</a>"?>
	</div>
	
	<form action="#" method="POST" name="HomeForm">
<section id="wrapper">
<meta name="viewport" content="width=620" />

<script src="http://connect.facebook.net/en_US/all.js"></script>  
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&key=AIzaSyAg_ivtTvzsDsflmB5OgCo3oMTfqRgZUWk"></script>
    <article>
      <p>
	  
      <?php
    //  $_SESSION['username']=$us;
			$user=$_REQUEST['user'];

		echo"<h2> Welcome User :".$us."</h2>";
		echo"<div id='one' style='float:right;'>";
      if($_GET["login"]=="facebook")
      {
      	
      ?>

        <fb:login-button autologoutlink="true">Logout
        </fb:login-button>


      
      <?php
     	}
     	else 
     	{
     		echo "<input type=submit value=Logout name=btn_logout />";	
     	}
		echo"</div>";
      ?>
      <script>
          FB.init({ appId: '297143020382777', status: true, cookie: true, xfbml: true });
          FB.Event.subscribe("auth.logout", function () { window.location = 'login.php' });
      </script>
          </p>
          Finding your location: <span id="status">checking...</span></p>
          <script type="text/javascript">

			var latlng;
			var map;

			function success(position) 
			{    	  
				//alert(position.coords.latitude);
				//alert(position.coords.longitude);
				latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 

				var s = document.querySelector('#status');

				if (s.className == 'success') 
				{
					return;
				}

				s.innerHTML = "found you!";
				s.className = 'success';

				var mapcanvas = document.createElement('div');
				mapcanvas.id = 'mapcanvas';
				mapcanvas.style.height = '628px';
				mapcanvas.style.width = '1124px';

				document.querySelector('article').appendChild(mapcanvas);
								
				var myOptions = {
					zoom: 15,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				
				map= new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
							
				var marker = new google.maps.Marker({
					position: latlng,
					map: map,
					animation: google.maps.Animation.BOUNCE,
					title: "You are here! (at least within a " + position.coords.accuracy + " meter radius)"
				});        

				var marker;
				var infowindow;
				var user = "<?php echo $user; ?>";
				// alert(user);
				 google.maps.event.addListener(map, 'click', function(event) {
			
					marker = new google.maps.Marker({
					animation: google.maps.Animation.DROP,
					position: event.latLng,
					map: map,
					title: "Add news Here....!!"
				});
				
				
					google.maps.event.addListener(marker, 'click', function() {
						//alert(marker.position.toString());
						infowindow = new google.maps.InfoWindow({
							maxHeight: 400,  //Doesn't work
				         maxWidth: 400,   //Doesn't work
        			      width: 300,      //Doesn't work
        	            height: 300  
							});		
					  infowindow.setContent("<body bgcolor=yellow><form name=f1 action=temp.php?user="+user+" method=post>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title:&nbsp;&nbsp;<input size=27 type=text name=title><br>Description:&nbsp;&nbsp;<textarea cols=35 style='vertical-align:sub;' rows=6 name=desc></textarea><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Link:&nbsp;&nbsp;<input type=text size=27 name=link><input type=hidden name=zoomlvl value="+map.getZoom()+"><input type=hidden name=lat value=" + marker.position.lat().toString() + " /> <input type=hidden name=lng value="+marker.position.lng().toString()+"> <br><br><input type=submit value=submit>&nbsp;&nbsp;<input type=reset value=Clear>&nbsp;&nbsp;<a href=temp.php?arg=true'>Delete</a></form></body>");
					  infowindow.open(map, this);
					});
				
				});		
			}
		
	function error(msg) {
				var s = document.querySelector('#status');
				s.innerHTML = typeof msg == 'string' ? msg : "failed";
				s.className = 'fail';

			}

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(success, error);
			} else {
				error('not supported');
			}
	</script>

</section>
    </form>
	</body>
</html>


