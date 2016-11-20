<?php
session_start();
$id=$_SESSION['login_id'];

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "schoolmanagementsystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$session=mysqli_query($conn,"SELECT name  FROM teachers WHERE id='$id' ");

$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];


$atten=$_REQUEST['attendance'];
//print_r($_REQUEST);
 $d=date("Y-m-d");

  
   foreach($atten as $a)
   {
	   
	   $sql="insert into attendance(date,attendedid) values('$d','$a')";
	   $result=$conn->query($sql);
   }
   
   
   
   
   
  


  

?>


<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>


</head>

<body>
<div id="logsession" >
	 
		<p>Hi!admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="updateAttendence.php">Update Attendence</a></div><br>
			<div class="column"><a href="deleteatt.php">Delete Attendende</a></div><br>
			<div class="column"><a href="viewAttendance.php">view my Attendende</a></div><br>
			<div class="column"><a href="viewAttendancest.php">view students Attendende</a></div><br>
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		
		<center>
 <h4>Attendance Successfully.</h4>
  <p>go home page.<br>click Home button.<p>
 </center>
		
		</div>

	
</body>

</html>