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

/*$st="SELECT *  FROM staff WHERE id='$id' ";
$result=$conn->query($st);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		$stinfoid= $row['id'];
		$stinfoname= $row['name'];
		$stinfopass= $row['password'];
		$stinfophone= $row['phone'];
		$stinfoemail= $row['email'];
		$stinfogender= $row['gender'];
		$stinfodob=$row['dob'];
		$stinfohiredate= $row['hiredate'];
		$stinfoaddress= $row['address'];
		$stinfosalary= $row['salary'];
	}
}
*/

$count=0;
$st="SELECT *  FROM staff WHERE id='$id' ";
//$stinfo=mysql_fetch_array($st);
$result=$conn->query($st);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		$stinfosalary= $row['salary'];
		
	}
}
$attendmon = "SELECT DISTINCT(date) FROM attendance WHERE attendedid='$id' and  MONTH( DATE ) = MONTH( CURRENT_DATE ) and YEAR( DATE )=YEAR( CURRENT_DATE )";
//$resmon = mysql_query($attendmon);
$result=$conn->query($attendmon);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

 $count+=1;
}
}		
		
?>

<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
<script src = "JS/modifyValidate.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Hi!staff <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="modify.php">Modify Information</a></div><br>
			<!--<div class="column"><a href="salary.php">Salary</a></div><br>-->
			<div class="column"><a href="attendance.php">Attendance</a></div><br>
			
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		
		<center><b>My Information</b>
		
		<table border="1">
			  <tr>
			  
			  <th>Staff Monthly Salary</th>
			  <th>Staff Payable Salary This Month</th>
			  
			  
			  </tr>
			  <tr>
			  
			  <td><?php echo round($stinfosalary);?></td>
			  <td><?php echo round(($stinfosalary/30)*$count,2);?></td>
			  
			  </tr>
			  </table>
		
		</div>
</center>
	
</body>

</html>