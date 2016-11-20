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

$stringTeacher = "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Payable Salary</th>
    </tr>";
$sql = "SELECT t.id,t.name,t.salary,ROUND(t.salary*count(a.date)/300) AS currentmonthlysalary FROM teachers t,attendance a WHERE t.id=a.attendedid AND MONTH(a.date)=(SELECT month(curdate()) FROM dual) GROUP BY a.attendedid";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

   $stringTeacher .= "<tr><td>".$row['id'].
    "</td><td>".$row['name']."</td><td>".$row['salary'].
    "</td><td>".$row['currentmonthlysalary']."</td></tr>";
}
}

$stringStaff = "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Payable Salary</th>
    </tr>";
$sql = "SELECT s.id,s.name,s.salary,ROUND(s.salary*count(a.date)/300) AS currentmonthlysalary FROM staff s,attendance a WHERE s.id=a.attendedid AND MONTH(a.date)=(SELECT month(curdate()) FROM dual) GROUP BY a.attendedid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

    $stringStaff .= "<tr><td>".$row['id'].
    "</td><td>".$row['name']."</td><td>".$row['salary'].
    "</td><td>".$row['currentmonthlysalary']."</td></tr>";
}
}

?>

<!doctype html>
<html>
	<head>
		<title> School Management System </title>
		<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
		<script src = "JS/searchParent.js"></script>
	</head>

	<body>
<div id="logsession" >
	 
		<p>Logged In As Admin<br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="updateTeacherSalary.php">Update Teacher Salary</a></div><br>
			<div class="column"><a href="updateStaffSalary.php">Update Staff Salary</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>

	

		
	<div id="screen" style="float: left;  overflow:scroll;">
		<center>
            <h1>Teacher Salary List</h1>
            <table border="1">
                <?php echo $stringTeacher;?>
            </table>
        </center><br/><hr/><br/>
        <center>
            <h1>Staff Salary List</h1>
            <table border="1">
                <?php echo $stringStaff;?>
            </table>
        </center></div>
		</body>
</html>