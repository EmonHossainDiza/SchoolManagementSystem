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
		<script src = "JS/searchForUpdateTeacher.js"></script>
	</head>

	<body>
<div id="logsession" >
	 
		<p>Logged In As Admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="newTeacher.php">New Teacher</a></div><br>
			<div class="column"><a href="viewTeacher.php">View Teacher</a></div><br>
			<div class="column"><a href="updateTeacher.php">Update Teacher</a></div><br>
			<div class="column"><a href="deleteTeacher.php">Delete Teacher</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>

	

		
		<div id="screen" style="float: left;  overflow:scroll;">
		<center><b>Search By Id Or Name : </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getTeacherForUpdate(this.value);"></center>
		<br/>
        <center>
          <h2>Only One Teacher Can Update in a time.</h2>
            <form action="#" method="post" onsubmit="return newTeacherValidation();" enctype="multipart/form-data">
                <table border="1" cellpadding="6" id='updateTeacherData'>
                </table>
            </form>
        </center></div>
		</body>
</html>

<?php

if(isset($_POST['submit'])){
    $Id = $_POST['id'];
    $Name = $_POST['name'];
    $Password = $_POST['password'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $gender = $_POST['gender'];
    $DOB = $_POST['dob'];
    $hiredate = $_POST['hiredate'];
    $Address = $_POST['address'];
    $salary = $_POST['salary'];
	
    IF($_FILES['pic']['name']!='')
   {
     $filename = $_FILES['pic']['name'];
    $filetmp =$_FILES['pic']['tmp_name'];
   move_uploaded_file($filetmp,"../images/".$Id.".jpg");}
   
   
    $sql = "UPDATE teachers SET id='$Id', name='$Name', password='$Password', phone='$Phone', email='$Email', address='$Address', gender='$gender', dob='$DOB', hiredate='$hiredate', salary='$salary' WHERE id='$Id'";
   $success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>