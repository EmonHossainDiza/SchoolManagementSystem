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
			<script src = "JS/studentClassCourse.js"></script>
	</head>

	<body  onload="ajaxRequestToGetMyCourse();">
<div id="logsession" >
	 
		<p>Hi!admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="student.php" >Student</a></div><br>
			<!--<div class="column"><a href="teacher.php" >Teacher</a></div><br>
			<div class="column"><a href="parent.php" >Parent</a></div><br>
			<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>

	

		<div id="screen" style="float: left; border:2px solid red;">
		
		<form action="atn.php" method="POST">
		
		<div align="center" >
			 Select Class:<select id="myclass" name="myclass" onchange="ajaxRequestToGetMyCourse();">
			 <?php  


$classget = "SELECT  * FROM class where id in(select DISTINCT classid from course where teacherid='$id')";
$result=$conn->query($classget);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
 echo '<option value="',$row['id'],'" >',$row['name'],'</option>';
   
}
}

?>

</select><br /><br />
Select Course<select id="mycourse" onchange="" name="mycourse">

</select> <br />
<br/>




<input  type ="submit" value="Make Attendance" name="update"/>

</div>
</form>
<hr/>



			</div>	
		</body>
</html>
