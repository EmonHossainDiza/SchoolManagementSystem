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
		<script src = "JS/searchForUpdateStudent.js"></script>
	</head>

	<body>
<div id="logsession" >
	 
		<p>Logged In As Admin  <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left; ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="newstudent.php" >New Student</a></div><br>
			<div class="column"><a href="viewstudent.php" >View Student</a></div><br>
			<div class="column"><a href="updatestudent.php" >Update Student</a></div><br>
			<div class="column"><a href="deletestudent.php" >Delete student</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>

	

		
		<center><b>Search By Id Or Name OR Class Id: </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStudentForUpdate(this.value);"></center>
		<br/>
        <center>
          <h2>Only One Student Can Update in a time.</h2>
            <form action="#" method="post" onsubmit="return newStudentValidation();" enctype="multipart/form-data">
                <table border="1" cellpadding="6" id='updateStudentData'>
                </table>
            </form>
        </center>
		</body>
</html>

<?php

if(!empty($_POST['submit'])){
    $stuId = $_POST['id'];
    $stuName = $_POST['name'];
    
    $stuPhone = $_POST['phone'];
    $stuEmail = $_POST['email'];
	
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['dob'];
    $stuAddmissionDate = $_POST['addmissiondate'];
    $stuAddress = $_POST['address'];
    $stuParentId = $_POST['parentid'];
    $stuClassId = $_POST['classid'];
    
	
	If($_FILES['pic']['name']!='')
   {
     //$filename = $_FILES['pic']['name'];
    $filetmp =$_FILES['pic']['tmp_name'];
   move_uploaded_file($filetmp,"../images/".$stuId.".jpg");}
	 
	
	
	$sql = "UPDATE students SET id='$stuId', name='$stuName',  phone='$stuPhone', email='$stuEmail', gender='$stugender', dob='$stuDOB', addmissiondate='$stuAddmissionDate', address='$stuAddress', parentid='$stuParentId', classid='$stuClassId' WHERE id='$stuId'";
    //$success = mysql_query( $sql,$link );
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>