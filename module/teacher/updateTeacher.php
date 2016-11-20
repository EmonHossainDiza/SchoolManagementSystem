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
		<script src = "JS/searchForUpdateTeacher.js"></script>
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
			<!--<div class="column"><a href="newTeacher.php">New Teacher</a></div><br>--->
			<div class="column"><a href="viewProfile.php">View Teacher</a></div><br>
			<div class="column"><a href="updateTeacher.php">Update Teacher</a></div><br>
			<!--<div class="column"><a href="deleteTeacher.php">Delete Teacher</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">

        </center>
        <br/>
        <center>
          <h2>Update your profile!!!.</h2>
            <form action="#" method="post" onsubmit="return newTeacherValidation();">
                <table border="1" cellpadding="6" id='updateTeacherData'>
				<?php include ('searchForUpdateTeacher.php'); ?>
                </table>
            </form>
        </center>
		
		</div>

	
</body>

</html>
		<?php

if(!empty($_POST['submit'])){
    $teaId = $_POST['id'];
    $teaName = $_POST['name'];
    $teaPassword = $_POST['password'];
	$teaconPassword = $_POST['conpassword'];
    $teaPhone = $_POST['phone'];
    $teaEmail = $_POST['email'];
    $teagender = $_POST['gender'];
    $teaDOB = $_POST['dob'];
    $teaAddress = $_POST['address'];
	
	if($teaPassword==$teaconPassword){
    $sql = "UPDATE teachers SET id='$teaId', name='$teaName', password='$teaPassword', phone='$teaPhone', email='$teaEmail', gender='$teagender', dob='$teaDOB',address='$teaAddress' WHERE id='$teaId'";
	$sql1="UPDATE users SET password='$teaPassword' where userid='$teaId'";
	$success = $conn->query($sql);
	$success1 = $conn->query($sql1);
	
    if(!$success||!$success1) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
	header('location:viewProfile.php');
	}
	
	else{
	
	echo "<script>alert('not same password');</script>"; 
	header('location:updateTeacher.php');
}
	}

?>
