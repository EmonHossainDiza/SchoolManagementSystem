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
$images_dir = "../images/";
$string = "<tr>
    <th>ID</th>
    <th>Password</th>
    <th>Father Name</th>
    <th>Mother Name</th>
    <th>Father Phone</th>
    <th>Mother Phone</th>
    <th>Address</th>
</tr>";
$sql = "SELECT * FROM parents WHERE id like '$searchKey%' OR fathername like '$searchKey%' OR mothername like '$searchKey%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
	$string .= '<tr><td>'.$row['id'].'</td><td>'.$row['password'].
    '</td><td>'.$row['fathername'].'</td><td>'.$row['mothername'].
    '</td><td>'.$row['fatherphone'].'</td><td>'.$row['motherphone'].
    '</td><td>'.$row['address'].'</td></tr>';
}
}
echo $string;
$conn->close();
?>
