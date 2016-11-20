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
<script src = "JS/login_logout.js"></script>
<script src = "JS/currentDate.js"></script>
        <script src = "JS/getClassName.js"></script>
        <script src = "JS/getCourseIdAndNAme.js"></script>
</head>

<body onload="getClassNameAndId();">
<div id="logsession" >
	 
		<p>Hi!admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="addCourse.php" >Add course</a></div><br>
			<div class="column"><a href="viewCourse.php" >View Course</a></div><br>
			<div class="column"><a href="deleteCourse.php" >Delete Course </a></div><br>
			
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		<center>
            <h2>Course Registration For Student.</h2><hr/>
            <form action="#" method="post">
                <table cellpadding="6">
                    <tr>
                        <td>Class ID:</td>
                        <td><select id="className" onchange="getCourseNameAndId();"></select></td>
                    </tr>
                    <tr>
                        <td>Course Name:</td>
                        <td><select id="courseName" onchange="setCourseId()"></select></td>
                    </tr>
                    <tr>
                        <td><input id="courseId"type="hidden" name="name" placeholder="Enter Name"></td>
                    </tr>
                    <tr>
                        <td>Teacher ID:</td>
                        <td><select id="teacherId" onchange=""></select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" name="submit"value="Submit" onclick="getAllCourseStudentAndSubmit();"></td>
                    </tr>
                </table>
            </form>
        </center>
		</div>

	
</body>
<html>