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
    <th>Salary</th>
    <th>Payable Salary</th>
    </tr>";
$sql = "SELECT t.id,t.name,t.salary,ROUND(t.salary*count(a.date)/300) AS currentmonthlysalary FROM teachers t,attendance a WHERE t.id=a.attendedid AND t.id like '$searchKey%' AND MONTH(a.date)=(SELECT month(curdate()) FROM dual) GROUP BY a.attendedid";
$success = $conn->query($sql);

if ($success->num_rows > 0) {
    
    while($row = $success->fetch_assoc()) {
    
	$string .= "<tr><td><input value='".$row['id']."'name='id' readonly>".
    "</td><td><input type='text' value='".$row['name']."'name='name' readonly>".
    "</td><td><input type='text' value='".$row['salary']."'name='salary'>".
    "</td><td>".$row['currentmonthlysalary']."</td></tr>";
}
}
echo $string."<input type='submit' name='submit'value='Submit'>";
?>
