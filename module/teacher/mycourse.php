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


 $emn = $_REQUEST['classid'];


$courses = "SELECT distinct id , name FROM course WHERE classid='$emn' and teacherid='$id'";
$result=$conn->query($courses);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
 echo '<option value="',$row['id'],'" >',$row['name'],'</option>';

}
}


?>
