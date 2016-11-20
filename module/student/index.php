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
			<!--<div class="column"><a href="viewProfile.php" >View Profile</a></div><br>-->
			<div class="column"><a href="modify.php" >Update profile</a></div><br>
			<!--<div class="column"><a href="parent.php" >Parent</a></div><br>
			<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>
		
		<div class ="header">
			<?php
			$st = "SELECT * FROM students WHERE id='$id';";
		$stinfo = $conn->query($st);
		if ($stinfo->num_rows > 0) {
    
    while($row = $stinfo->fetch_assoc()) {
   echo "<center>";
   $picname=$row['id'];
   $images_dir="../images/";
   echo "ID: ".$row['id']."<br />";
   echo "Name: ".$row['name']."<br />";
   echo "Phone: ".$row['phone']."<br />";
   echo "Date of Birth: ".$row['dob']."<br />";
   echo "Phone ".$row['phone']."<br />";
   echo "Email Address: ".$row['email']."<br />";
   echo "gender: ".$row['gender']."<br />";

   echo "<img src='".$images_dir.$picname.".jpg' alt='$picname' width='150' height='150'>";
   echo "</center>";
   
}
}
?>
		</div>
		
	
		</body>
</html>

