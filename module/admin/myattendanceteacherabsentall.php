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

$sid=$_REQUEST['id'];
$attendmon = "SELECT DISTINCT (date) FROM attendance WHERE  date not in (select DISTINCT(date) from attendance where attendedid='$sid' )";

$resmon= $conn->query($attendmon);
echo "<tr> <th>Absent All Dates:</th></tr>";
while($r = $resmon->fetch_assoc()){

 echo "<tr><<td>",$r['date'],"</td></tr>";

}
?>
