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


if($_POST['submit']){
    $id = $_POST['id'];
    $cdate = date("Y-m-d");
    $sql = "INSERT INTO attendance VALUES('','$cdate','$id')";
   
	$success = $conn->query($sql);
    if(!$success) {
        die('Attendance Error: '.mysql_error());
    }
    echo "Attendance Complete\n";
    header("Location:../admin/teacherAttendance.php");
}
?>
