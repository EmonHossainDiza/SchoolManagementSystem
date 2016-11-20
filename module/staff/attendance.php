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


		
		
?>

<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
<script src = "JS/jquery-1.12.3.js"></script>
<script src = "JS/staffAttendance.js"></script>

</head>

<body  onload="ajaxRequestToGetAttendancePresentThisMonth();">
<div id="logsession" >
	 
		<p>Hi!staff <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="modify.php">Modify Information</a></div><br>
			<div class="column"><a href="salary.php">Salary</a></div><br>
			<div class="column"><a href="attendance.php">Attendance</a></div><br>
			
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		<br>
		Select Attendance that you are present: Current Month:
		<input type="radio"  onclick="ajaxRequestToGetAttendancePresentThisMonth();"   value="thismonth" id="present" name="present" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendancePresentAll();" value="all" id="present" name="present"/>
		<hr/>
<div align="center" >
<table id="mypresent" border="1">

</table>
</div>

<hr/>
<div align="center" style="background-color:gray;">
	
Select Attendance that you are absent : Current Month:<input type="radio"  onclick="ajaxRequestToGetAttendanceAbsentThisMonth();"   value="thismonth" id="absent" name="absent" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendanceAbsentAll();" value="all" id="absent" name="absent"/>
</div>	
<hr/>
<div align="center" >
<table id="myabsent" border="1">

</table>
</div>
		</div>

	
</body>

</html>