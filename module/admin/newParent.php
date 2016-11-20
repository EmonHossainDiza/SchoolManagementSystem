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



?>

<!doctype html>
<html>
	<head>
		<title> School Management System </title>
		<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
		<script src = "JS/newParentValidation.js"></script>

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
			<!--<div class="column"><a href="student.php" >Student</a></div><br>
			<div class="column"><a href="teacher.php" >Teacher</a></div><br>-->
			<div class="column"><a href="parent.php" >Parent</a></div><br>
			<!--<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>
	
	<div id="screen" style="float: left; border:2px solid red; overflow:scroll;">
		<p style= "text-align:center;">Parent Registration</p><br/>
		
		<form action="#" method="post" enctype="multipart/form-data" onsubmit="return newParentValidation();" >
		<p style= "text-align:center;">
		
		Parent Id:<input id="id"type="text" name="id" placeholder="Enter Id"><br>
		Parent Password:<input id="password"type="text" name="password" placeholder="Enter Password"><br>
		Father Name:<input id="fathername"type="text" name="fathername" placeholder="Enter Father Name"><br>
		Mother Name:<input id="mothername"type="text" name="mothername" placeholder="Enter Mother Name"><br>
		Father Phone:<input id="fatherphone"type="text" name="fatherphone" placeholder="Enter Father Phone"><br>
		Mother Phone:<input id="motherphone"type="text" name="motherphone" placeholder="Enter Mother Phone"><br>
		Address:<input id="address" type="text" name="address" placeholder="Enter Address"><br>
		
		
		<input type="submit" name="submit"value="Submit">
		
		</div>
		
		</form>
       
		</body>
</html>

<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO parents VALUES('$id','$password','$fathername','$mothername','$fatherphone','$motherphone','$address')";
    $success = $conn->query($sql);
    $sql = "INSERT INTO users VALUES('$id','$password','parent')";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
    echo "Entered data successfully\n";
}
$conn->close();
?>