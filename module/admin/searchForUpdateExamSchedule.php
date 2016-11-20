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
    <th>Exam Date</th>
    <th>Exam Time</th>
    <th>Course ID</th>
</tr>";
$sql = "SELECT * FROM examschedule WHERE id like '$searchKey%' OR examdate like '$searchKey%' OR courseid like '$searchKey%' AND MONTH(examdate) = MONTH(CURRENT_DATE) AND YEAR(examdate)=YEAR(CURRENT_DATE)";
$success = $conn->query($sql);


if ($success->num_rows > 0) {
    
    while($row = $success->fetch_assoc()) {
     
	 $string .= "<tr><td><input value='".$row['id']."'name='id' readonly >".
    "</td><td><input type='text' value='".$row['examdate']."'name='examdate'>".
    "</td><td><input type='text' value='".$row['time']."'name='examtime'>".
    "</td><td><input type='text' value='".$row['courseid']."'name='courseid'>"."</td></tr>";
}
}
echo $string."<input type='submit' name='submit'value='Submit'>";
?>
