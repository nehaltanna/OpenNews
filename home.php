<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	if(isset($_POST["btn_logout"])==true)
	{
		header('Location: login.php');	
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

<!--<link rel="stylesheet" href="css/html5demos.css">-->
<!--<script src="js/h5utils.js"></script></head>-->
<body>
    <form action="#" method="POST" name="HomeForm">
<section id="wrapper">
<!--<div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div>-->
<!--<script type="text/javascript">                                                                                 var z = document.createElement("script"); z.type = "text/javascript"; z.async = true; z.src = "http://engine.carbonads.com/z/14060/azcarbon_2_1_0_VERT"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div>-->
<!--    <header>
      <h1>geolocation</h1>
    </header> -->
<meta name="viewport" content="width=620" />

<div id="fb-root">
        <center>
        <div style="background-color:green;">
            <strong class="newStyle1" style="font-size: 95px; font-family: Chiller; text-decoration: blink">OpenNews</strong>
        </div>    
        </center>
        <br />
    
        </div>    
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&key=AIzaSyAg_ivtTvzsDsflmB5OgCo3oMTfqRgZUWk"></script>
    <article>
      <p>
      <?php
      
      if($_GET["login"]=="facebook")
      {
      	
      ?>
      
      <?php
     	}
     	else 
     	{
     		echo "<input type=submit value=Logout name=btn_logout />";	
     	}
      ?>
          </p>
          Finding your location: <span id="status">checking...</span></p>
<script type="text/javascript">

	 var latlng;
	 var map;
	 var myradius;
	 var geocoder;


    function success(position) 
    {    	  
		  geocoder = new google.maps.Geocoder();
    	  latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 
        var s = document.querySelector('#status');

        if (s.className == 'success') {
            // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back    
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
            zoom: 9,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map= new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
			
		  var zoomlvl=map.getZoom();               
        myradius=29000-(1900*zoomlvl);
				  	
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            animation: google.maps.Animation.BOUNCE,
            title: "You are here! (at least within a " + position.coords.accuracy + " meter radius)"
        });        
        marker.setMap(map);
        
        google.maps.event.addListener(map, 'mouseup', function() 
        {
       		/*window.setTimeout(function() {
      			location_request();
    			}, 5000);*/
    			location_request();
  		  });

		  google.maps.event.addListener(map, 'zoom_changed', function() 
		  {
		  		var zoomLevel = map.getZoom();
		    	myradius=29000-(1900*zoomLevel);
		  });
  		 
  		 
        
        location_request();        
    }
   
    function location_request()
      {
      	//var lat=parseFloat((new Number(map.getCenter().lat()+'').toFixed(parseInt(4))))
      	//var lng=parseFloat((new Number(map.getCenter().lng()+'').toFixed(parseInt(4))))
      	
      	var request = 
		      {
		          location: map.getCenter(),
		          radius: myradius,
	      	    types : ['political']
	        	};
	        	infowindow = new google.maps.InfoWindow();
	        	var service = new google.maps.places.PlacesService(map);
	        	service.search(request, callback);	
      }

		function callback(results, status) 
		{
        if (status == google.maps.places.PlacesServiceStatus.OK) {
        		
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) 
      {
        //var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          animation: google.maps.Animation.DROP,
          position: place.geometry.location
        });
        
        var flag=0;
		  
        google.maps.event.addListener(marker, 'mouseover', function() {
          infowindow.setContent(place.name);
          //infowindow.setContent();
          infowindow.open(map, this);
          flag=1;
        });
        
        var address;
        google.maps.event.addListener(marker, 'click', function() {
          geocoder.geocode({'latLng': place.geometry.location}, function(results, status) 
        		{ 
        			if (status == google.maps.GeocoderStatus.OK) 
        			{ 
          			address=results[1].formatted_address;
          			address1=address.replace(/\s/g,"%20");
          			infowindow.setContent("<a href=news.php?area="+address1+"&news_type=h>top headlines</a><br/><a href=news.php?area="+address1+"&news_type=w>world</a><br/><a href=news.php?area="+address1+"&news_type=b>business</a><br/><a href=news.php?area="+address1+"&news_type=n>nation</a><br/><a href=news.php?area="+address1+"&news_type=t>science and technology</a><br/><a href=news.php?area="+address1+"&news_type=el>elections</a><br/><a href=news.php?area="+address1+"&news_type=p>politics</a><br/><a href=news.php?area="+address1+"&news_type=e>entertainment</a><br/><a href=news.php?area="+address1+"&news_type=s>sports</a><br/><a href=news.php?area="+address1+"&news_type=m>health</a><br/>");
          			infowindow.open(map, this);
        			} 
        			else 
        			{ 
          			alert("Geocoder failed due to: " + status); 
        			} 
      		});
          
          flag=0;
        });
        
        google.maps.event.addListener(marker, 'mouseout', function() {
        	 if(flag==1)
        	 {
          	infowindow.close();
          }
        });
        
       }

    function error(msg) {
        var s = document.querySelector('#status');
        s.innerHTML = typeof msg == 'string' ? msg : "failed";
        s.className = 'fail';

        // console.log(arguments);
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        error('not supported');
    }
</script></section>
    </form>
    </body>
</html>