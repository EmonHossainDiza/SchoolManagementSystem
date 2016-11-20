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
			<script src = "JS/studentClassCourse.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Hi!admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="updateAttendence.php">Update Attendence</a></div><br>
			<div class="column"><a href="deleteatt.php">Delete Attendende</a></div><br>
			<div class="column"><a href="viewAttendance.php">view my Attendende</a></div><br>
			<div class="column"><a href="viewAttendancest.php">view students Attendende</a></div><br>
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		
		<center> <h1>Students Attendance</h1></center>
		
		<?php

$cid=$_REQUEST['mycourse'];
$clid=$_REQUEST['myclass'];
echo '<form  action="makeattendance.php" method="post">';

   
  $sql="SELECT studentid FROM course where classid='$clid' and id='$cid' and teacherid='$id'";
 $result=$conn->query($sql);
  
 if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
	echo "<center>";
	echo $row['0'];
    echo "<input type='checkbox' checked='checked' name='attendance[]' value=".$row[0]." /> <br /><br />";
   
   
     }
 }
	 
   echo "<input  type='submit' value='Make Attendance' />";
  echo " </form> ";
  echo "</center>";

?>
		
		</div>

	
</body>

</html>
