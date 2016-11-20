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
		<p style= "text-align:center;">Exam Schedule List</p><br/>
		
		<form action="#" method="post">
		<p style= "text-align:center;">
		
		Exam Schedule Id:<input type="text" name="id" placeholder="Exam Schedule ID"><br>
		Exam Date:<input type="text" name="examDate" placeholder="Exam Date(y-m-d)"><br>
		Exam Time:<input type="text" name="examTime" placeholder="Exam Time(H:M - H:M)"><br>
		Course ID:<input type="text" name="courseId" placeholder="Course ID"><br>
		<input type="submit" name="submit"value="Submit"></p>
		</form>
		</div>
		
		
       
		</body>
</html>

<?php

if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $examDate = $_POST['examDate'];
    $examTime = $_POST['examTime'];
    $courseId = $_POST['courseId'];
    $sql = "INSERT INTO examschedule VALUES('$id','$examDate','$examTime','$courseId')";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
    echo "Entered data successfully\n";
}
?>