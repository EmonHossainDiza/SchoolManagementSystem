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
$string = "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Teacher ID</th>
    <th>Student ID</th>
    <th>Class ID</th>
</tr>";
$sql = "SELECT * FROM course WHERE id like '$searchKey%' OR name like '$searchKey%' OR teacherid like '$searchKey%' OR classid = '$searchKey' OR studentid like '$searchKey%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    $string .= '<tr><td>'.$row['id'].'</td><td>'.$row['name'].
    '</td><td>'.$row['teacherid'].'</td><td>'.$row['studentid'].
    '</td><td>'.$row['classid'].'</td></tr>';
}
echo $string;
?>
