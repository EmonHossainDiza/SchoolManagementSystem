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
		<script src = "JS/searchForUpdateStaff.js"></script>
        <script src = "JS/newStaffValidation.js"></script>
	</head>

	<body>
<div id="logsession" >
	 
		<p>Looged In As Admin  <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left; ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="newStaff.php">New Staff</a></div><br>
			<div class="column"><a href="viewStaff.php">View Staff</a></div><br>
			<div class="column"><a href="updateStaff.php">Update Staff</a></div><br>
			<div class="column"><a href="deleteStaff.php">Delete Staff</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>

	

		
		<center><b>Search By Id Or Name : </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStaffForUpdate(this.value);"></center>
		<br/>
        <center>
          <h2>Only One staff Can Update in a time.</h2>
            <form action="#" method="post" onsubmit="return newStaffValidation();" enctype="multipart/form-data">
               <table border="1" cellpadding="6" id='updateStaffData'>
                </table>
            </form>
        </center>
		</body>
</html>

<?php

if(!empty($_POST['submit'])){
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
   
   
    $sql = "UPDATE staff SET id='$Id', name='$Name', password='$Password', phone='$Phone', email='$Email', gender='$gender', dob='$DOB', hiredate='$hiredate', address='$Address', salary='$salary' WHERE id='$Id'";
   // $success = mysql_query( $sql,$link );
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>