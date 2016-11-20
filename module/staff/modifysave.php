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


$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$conpass=$_REQUEST['conpassword'];
$address=$_REQUEST['address'];
if($password==$conpass){
$mod = "UPDATE staff, users SET staff.phone = '$phone', staff.email='$email',staff.password='$password',staff.address='$address',users.password = '$password' WHERE staff.id = users.userid AND staff.id ='$id'";
$result=$conn->query($mod);



header('location:index.php');}
else{
	
	echo "<script>alert('not same password');</script>"; 
	header('location:modify.php');
}
	
?>

