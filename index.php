<?php
$login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
if($login_code=="false"){
    $login_message="Wrong UserId or Password !";
	  $color="red";
}
else{
    $login_message="Please Login !";
	  $color="green";
}
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
	      <script src="source/js/loginValidate.js"></script>
        <title>School Management System</title>
    </head>
    <body>
        <center>
	          <img src="source/Logo.jpeg" /><br/><br/>
	          
            <?php echo "<font size='4' color='$color'>$login_message</font>";?>
            
			<form  action="service/check.access.php" onsubmit="return loginValidate();" method="post"><br/>
               <p>UserId: <input type="text" id="uid" name="uid" placeholder="your id" autofocus=""   /></p>
              <p> Password:<input type="password" id="pass" name="pass" placeholder="your password"  /></p>
               <p> <input type="submit" value="Login" /></p>
				
            </form>
        </center>
    </body>
</html>
