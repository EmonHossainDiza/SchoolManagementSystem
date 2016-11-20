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

$password=$_REQUEST['password'];
$Conpassword=$_REQUEST['Conpassword'];
if ($password==$Conpassword){
$mod = "UPDATE students, users SET students.password='$password',users.password = '$password' WHERE students.id = users.userid AND students.id ='$id'";
$result = $conn->query($mod);
header('location:index.php');}

else{
	
	echo "<script>alert('not same password');</script>"; 
	header('location:modify.php');
}
?>
