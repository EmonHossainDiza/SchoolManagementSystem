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
		<script src = "JS/searchForUpdateExamSchedule.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Logged In As Admin<br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
				<div id="menu" style="float: left; ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="createExamSchedule.php">Create Exam Schedule</a></div><br>
			<div class="column"><a href="viewExamSchedule.php">View Exam Schedule</a></div><br>
			<div class="column"><a href="updateExamSchedule.php">Update Exam Schedule</a></div><br>
			
			<div class="column"><a href="index.php" >Back</a></div><br>
			</div>
	</div>
	
	<div id="screen" style="float: left;  overflow:scroll;">
		<center><b>Search By Id Or Name: </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getExamScheduleForUpdate(this.value);"></center>
		<br/>
        <center>
          <h2>Only One Exam Schedule Can Update at a time.</h2>
            <form action="#" method="post">
                <table border="1" cellpadding="6" id='updateExamSchedule'>
                </table>
            </form>
        </center>
		</body>
</html>

<?php

if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $examdate = $_POST['examdate'];
    $examtime = $_POST['examtime'];
    $courseid = $_POST['courseid'];
    $sql = "UPDATE examschedule SET id='$id', examdate='$examdate', time='$examtime', courseid='$courseid' WHERE id='$id'";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>
