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

$session=mysqli_query($conn,"SELECT name  FROM admin WHERE id='$id' ");

$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
if(!isset($login_session)){
    header("Location:../../");
}

$conn->close();
?>
<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>


</head>

<body>
<div id="logsession" >
	 
		<p>Logged In As Admin<br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="createExamSchedule.php">Create Exam Schedule</a></div><br>
			<div class="column"><a href="viewExamSchedule.php">View Exam Schedule</a></div><br>
			<div class="column"><a href="updateExamSchedule.php">Update Exam Schedule</a></div><br>
			
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		
		</div>

	
</body>

</html>