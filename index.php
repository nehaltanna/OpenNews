
<html>
	<script language = "Javascript" src="CheckLogin.js"></script>
 <head>
  <title> Desertation Project Sem III MSc(CA) 11030142027</title>
  

  <link rel="stylesheet" type="text/css" href="style1.css" />


 </head>

 <body bgcolor="#0c8731">

<?php

		$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
		mysql_select_db("open_news") or die(mysql_error());
		
		$flag=0;
		if(isset($_POST['btn_login'])==true)
		{
			$sql="select count(*) from Users where u_name='$_POST[txt_uname]' and passwd='$_POST[txt_passwd]'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['txt_uname'];
				header('Location: news_login.php?login=local');			
			}
			else 
			{
				$flag=1;
			}
		}
?>
    <center>
    <form action="index.php" method="post">


	 
	  <h1><center> <font color="gold">Opennews </font></center></h1>
            <div id="three" style="float:left;">

			<img src="world.png" alt="World"  height="500" width="800">
			</div>
			
			<div id="one" style="float:right;">
                <br />
                <table title="Login">
                    <tr>
                        <td>
                           <center> <h2> Login </h2> </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="username"> Username:- </label>
                        </td>
                        <td>
							<input type="text" name="txt_uname">
                            <br/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="password"> Password:- </label>
                        </td>
                        <td>
                            <input type="password" name="txt_passwd">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Login" name="btn_login"> 
                        </td>
						<td>
                            <button type="Reset"> Reset </button>
                        </td>
                    </tr>
                </table>
				<br>
		Note: If you don't have a Login Password, Please register with us.
				<hr>
				</br>
		
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
        	<a href="sign_up.html">Click here to sign up.</a>
       <br />
       <br />

        <h1>
            <font style="font-weight: 700; color: #000000;">
            Or
            </font>
        </h1>
    
    
    
	<script src="http://connect.facebook.net/en_US/all.js"></script>  
    <script>
        FB.init({ appId:'297143020382777', status: true, cookie: true, xfbml: true });
        FB.Event.subscribe('auth.login', function (response) {
            window.location = "map_v3.php?login=facebook";           
        });  
    </script>  
    <fb:login-button autologoutlink="true">
    Login
    </fb:login-button>
    <script>
            
	</script>      

	</div>
   </form>
	</body>
</html>