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

$attendmon = "SELECT DISTINCT (date) FROM attendance WHERE  date not in (select DISTINCT(date) from attendance where attendedid='$id' )";
$result=$conn->query($attendmon);

echo "<tr> <th>Absent All Dates:</th></tr>";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
 echo "<tr><<td>",$row['date'],"</td></tr>";

}
}
?>
