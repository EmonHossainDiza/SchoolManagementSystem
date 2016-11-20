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



?>
<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
<script src = "JS/jquery-1.12.3.js"></script>
			<script  src = "JS/Attendance.js"></script>
			<script src = "JS/login_logout.js"></script>

</head>

<body  onload="ajaxRequestToGetAttendanceTeacherPresentThisMonth();">
<div id="logsession" >
	 
		<p>Logged In As Admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div <div id="menu" style="float: left;">
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="teacherAttendance.php" >Teacher Attendence</a></div><br>
			<div class="column"><a href="staffAttendance.php" >Staff Attendence</a></div><br>
			<div class="column"><a href="viewAttendance.php" >View Attendence </a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
			
		</div>
	</div>
		
		<div id="screen" style="float: left; overflow:scroll;">
			
			  <div align="center" style="background-color:orange;">
			  
			   Select your Teacher:<select id="teaid" name="teaid" onchange="ajaxRequestToGetAttendanceTeacherPresentThisMonth();" style="background-color:white;">
 <?php  
$classget = "SELECT  * FROM teachers ";

$res= $conn->query($classget);
while($cln=$res->fetch_assoc()){
	
 echo '<option value="',$cln['id'],'" >',$cln['name'],'</option>';
   
}

?>

</select>

	<hr/>
Select Attendance Teacher present: Current Month:<input type="radio"  onclick="ajaxRequestToGetAttendanceTeacherPresentThisMonth();"   value="thismonth" id="teapresent" name="teapresent" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendanceTeacherPresentAll();" value="all" id="teapresent" name="teapresent"/>
</div>	
<hr/>
<div align="center" >
<table id="myteapresent" border="1">

</table>
</div>
<hr/>
<div align="center" style="background-color:gray;">
	
Select Attendance  Teacher absent : Current Month:<input type="radio"  onclick="ajaxRequestToGetAttendanceTeacherAbsentThisMonth();"   value="thismonth" id="teaabsent" name="teaabsent" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendanceTeacherAbsentAll();" value="all" id="teaabsent" name="teaabsent"/>
</div>	
<hr/>
<div align="center" >
<table id="myteaabsent" border="1">

</table>
</div>

	<hr/>
	  <div align="center" style="background-color:orange;">
	Select your Staff:<select id="staffid" name="staffid" onchange="ajaxRequestToGetAttendanceStaffPresentThisMonth();" style="background-color:white;">
	<?php  
$classget = "SELECT  * FROM staff ";
$res= $conn->query($classget);
while($cln=$res->fetch_assoc()){

 echo '<option value="',$cln['id'],'" >',$cln['name'],'</option>';
}
?>

</select>
<hr/>
Select Attendance Staff present: Current Month:<input type="radio"  onclick="ajaxRequestToGetAttendanceStaffPresentThisMonth();"   value="thismonth" id="staffpresent" name="staffpresent" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendanceStaffPresentAll();" value="all" id="staffpresent" name="staffpresent"/>
</div>	
<hr/>
<div align="center" >
<table id="mystaffpresent" border="1">

</table>
</div>
<hr/>
<div align="center" style="background-color:gray;">
	
Select Attendance  Staff absent : Current Month:<input type="radio"  onclick="ajaxRequestToGetAttendanceStaffAbsentThisMonth();"   value="thismonth" id="staffabsent" name="staffabsent" checked="checked"/> ALL : <input type="radio" onclick="ajaxRequestToGetAttendanceStaffAbsentAll();" value="all" id="staffabsent" name="staffabsent"/>
</div>	
<hr/>
<div align="center" >
<table id="mystaffabsent" border="1">

</table>
</div>

		</div>
			
							
		</body>
</html>

