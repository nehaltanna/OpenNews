<html>
<head>
    <title></title>
    <style type="text/css">
        .newStyle1
        {
            font-family: Chiller;
            font-size: 72px;
            text-decoration: overline blink;
        }
        .newStyle1
        {
            font-family: Chiller;
            text-decoration: blink;
            font-size: 95px;
        }
    </style>
</head>
<body>

<?php

		$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
		mysql_select_db("open_news") or die(mysql_error());
		
		$flag=0;
		if(isset($_POST['btn_login'])==true)
		{
			$sql="select count(*) from users where u_name='$_POST[txt_uname]' and passwd='$_POST[txt_passwd]'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['txt_uname'];
				header('Location: news.php?login=local');			
			}
			else 
			{
				$flag=1;
			}
		}
?>
    <center>
    <form action="login.php" method="post">
    
    <div style="background-color:green;">
    	<strong class="newStyle1" style="font-size: 95px; font-family: Chiller; text-decoration: blink">OpenNews</strong>
        <br />
    </div>
    <div>     
		<br />
      	Username : <input type="text" name="txt_uname"><br /><br />  
      	Password : <input type="password" name="txt_passwd"><br /><br />
      	<br />
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="Login" name="btn_login">
      	&nbsp;&nbsp;<input type="reset" value="Clear">
		<br /><br />
      	
      	<?php
      		if($flag==1)
	      	{
	      ?>
	     		 <font style="color: red;">
   	       Wrong username or password.
	   	    </font>
	   	    <br />
	      <?php
  	   		}
  	   	?>
      	<br />
        	<a href="sign_up.php">Click here to sign up.</a>
       <br />
       <br />

        <h1>
            <font style="font-weight: 700; color: #000000;">
            Or
            </font>
        </h1>
    
    </div>
    
	<script src="http://connect.facebook.net/en_US/all.js"></script>  
    <script>
        FB.init({ appId:'297143020382777', status: true, cookie: true, xfbml: true });
        FB.Event.subscribe('auth.login', function (response) {
            window.location = "news.php?login=facebook";           
        });  
    </script>  
    <fb:login-button autologoutlink="true">
    Login
    </fb:login-button>
    <script>
            
	</script>      
    </form>
    </center>
</body>
</html>

