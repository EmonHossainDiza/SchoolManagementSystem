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
    $sql = "DELETE FROM students WHERE id = '$id';";
    
	$result = $conn->query($sql);
    $sql = "DELETE FROM users WHERE userid = '$id';";
    $result = $conn->query($sql);
    if(!$result) {
        die('Could not Delete data: '.mysql_error());
    }
    unlink('../images/'.$id.'.jpg');
    echo "Delete data successfully\n";
    header("Location:../admin/deleteStudent.php");
}
?>
