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


$searchKey = $_GET['key'];
echo $searchKey;

$ar = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$searchKey);
$string = "<option>SELECT AN OPTION</option>";

$sql = "SELECT * FROM availablecourse WHERE classid = '$ar[0]'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    
    while($row = $res->fetch_assoc()) {

    $string .= "<option value='".$row['id']."'>".$row['name']."</option>";
}
}
echo $string;
?>
