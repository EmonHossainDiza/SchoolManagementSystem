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
$sql = "SELECT DISTINCT(date) FROM attendance WHERE attendedid='$sid' and  MONTH( DATE ) = MONTH( CURRENT_DATE ) and YEAR( DATE )=YEAR( CURRENT_DATE )";

$resmon= $conn->query($sql);

echo "<tr> <th>Attend Current Month Date:</th></tr>";
if ($resmon->num_rows > 0) {
    
    while($row = $resmon->fetch_assoc()) {

	echo $id,"<br/>";
 echo "<tr><td>",$row['date'],"</td></tr>";

}
}
?>
