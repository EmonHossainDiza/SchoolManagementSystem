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
	 
		<p>Looged In As Admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left; ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="newStaff.php">New Staff</a></div><br>
			<div class="column"><a href="viewStaff.php">View Staff</a></div><br>
			<div class="column"><a href="updateStaff.php">Update Staff</a></div><br>
			<div class="column"><a href="deleteStaff.php">Delete Staff</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>
		
		<div id="screen" style="float: left; ">
		
		</div>

	
</body>

</html>