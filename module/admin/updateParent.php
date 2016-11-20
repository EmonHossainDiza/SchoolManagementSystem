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
		<script src = "JS/searchForUpdateParent.js"></script>
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
			<!--<div class="column"><a href="student.php" >Student</a></div><br>
			<div class="column"><a href="teacher.php" >Teacher</a></div><br>-->
			<div class="column"><a href="parent.php" >Parent</a></div><br>
			<!--<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>

	

		
		<center><b>Search By Id Or Name : </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getParentForUpdate(this.value);"></center>
		<br/>
        <center>
          <h2>Only One Teacher Can Update in a time.</h2>
            <form action="#" method="post" onsubmit="return newParentValidation();" enctype="multipart/form-data">
               <table border="1" cellpadding="6" id='updateParentData'>
                </table>
            </form>
        </center>
		</body>
</html>

<?php

if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    $fathename = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];
    $address = $_POST['address'];
    $sql = "UPDATE parents SET id='$id', password='$password', fathername='$fathename', mothername='$mothername', fatherphone='$fatherphone', motherphone='$motherphone', address='$address' WHERE id='$id'";
   // $success = mysql_query( $sql,$link );
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>