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


$string = "<option>SELECT AN OPTION</option>";
$sql = "SELECT * FROM class";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    
    while($row = $res->fetch_assoc()) {
    $string .= "<option value='".$row['id']."'>".$row['name']." [".$row['section']."]</option>";
}
}
echo $string;
?>
