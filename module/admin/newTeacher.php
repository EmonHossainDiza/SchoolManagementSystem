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
		<script src = "JS/newTeacherValidation.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Hi!admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left; ">
		
			
				<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="newTeacher.php">New Teacher</a></div><br>
			<div class="column"><a href="viewTeacher.php">View Teacher</a></div><br>
			<div class="column"><a href="updateTeacher.php">Update Teacher</a></div><br>
			<div class="column"><a href="deleteTeacher.php">Delete Teacher</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>
	
	<div id="screen" style="float: left;  overflow:scroll;">
		<p style= "text-align:center;">Teacher Registration</p><br/>
		
		<form action="#" method="post" enctype="multipart/form-data" onsubmit="return newTeacherValidation();" >
		<p style= "text-align:center;">
		
		Teacher Id:<input id="teaId"type="text" name="teacherId" placeholder="Enter Id"><br><br>
		Teacher Name:<input id="teaName" type="text" name="teacherName" placeholder="Enter Name"><br><br>
		Teacher Password:<input id="teaPassword"type="password" name="teacherPassword" placeholder="Enter Password"><br><br>
		Confirm teacher Password :<input id="teaconfirmPassword"type="password" name="teaconfirmPassword" placeholder="Enter Password"><br></br>
		Teacher Phone:<input id="teaPhone"type="text" name="teacherPhone" placeholder="Enter Phone Number" onkeypress="return isNumberKey(event)"><br><br>
		
		Teacher Email:<input id="teaEmail"type="text" name="teacherEmail" placeholder="Enter Email"><br><br>
		Teacher Address:<input id="teaAddress" type="text" name="teacherAddress" placeholder="Enter Address"><br><br>
		Gender:<input type="radio" name="gender" value="Male" onclick="teaGender = this.value;"> Male <input type="radio" name="gender" value="Female" onclick="teaGender = this.value;"> Female<br><br>
		Teacher DOB:<input id="teaDOB"type="text" name="teacherDOB" placeholder="Enter DOB(yyyy-mm-dd)"><br><br>
		Teacher Hire Date:<input id="teaHireDate"name="teacherHireDate"value = "<?php echo date('d-m-Y');?>" readonly><br><br>
		Salary:<input id="teaSalary"type="text" name="teacherSalary" placeholder="Enter Salary"><br><br>
		Teacher Picture:<input id="file"type="file" name="file"><br><br>
		
		<input type="submit" name="submit"value="Submit">
		
		</div>
		
		</form>
       
		</body>
</html>

<?php

/*if(isset($_POST['submit'])){
    $teaId = $_POST['teacherId'];
    $teaName = $_POST['teacherName'];
    $teaPassword = $_POST['teacherPassword'];
    $teaPhone = $_POST['teacherPhone'];
    $teaEmail = $_POST['teacherEmail'];
    $teaGender = $_POST['gender'];
    $teaDOB = $_POST['teacherDOB'];
    $teaHireDate = $_POST['teacherHireDate'];
    $teaAddress = $_POST['teacherAddress'];
    $teaSalary = $_POST['teacherSalary'];
    //$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    //echo $filename;
    move_uploaded_file($filetmp,"../images/".$teaId.".jpg");
    $sql = "INSERT INTO teachers VALUES('$teaId','$teaName','$teaPassword','$teaPhone','$teaEmail','$teaAddress','$teaGender','$teaDOB','$teaHireDate','$teaSalary');";
    $success = $conn->query($sql);
    $sql = "INSERT INTO users VALUES('$teaId','$teaPassword','teacher');";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
    echo "Entered data successfully\n";
}
$conn->close();*/
if(isset($_POST['submit'])){
	$teaId = $_POST['teacherId'];
	$sql="SELECT userid FROM users WHERE userid='$teaId' and type='teacher'";
	$result = $conn->query($sql);
	
	$count=mysqli_num_rows($result);

  
  if($count!=0)   {
      echo "teacherid already exists";
	  
  }
  else
  {
	  $teaName = $_POST['teacherName'];
    $teaPassword = $_POST['teacherPassword'];
    $teaPhone = $_POST['teacherPhone'];
    $teaEmail = $_POST['teacherEmail'];
    $teaGender = $_POST['gender'];
    $teaDOB = $_POST['teacherDOB'];
    $teaHireDate = $_POST['teacherHireDate'];
    $teaAddress = $_POST['teacherAddress'];
    $teaSalary = $_POST['teacherSalary'];
	
	//$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    //echo $filename;
    move_uploaded_file($filetmp,"../images/".$teaId.".jpg");
    $sql = "INSERT INTO teachers VALUES('$teaId','$teaName','$teaPassword','$teaPhone','$teaEmail','$teaAddress','$teaGender','$teaDOB','$teaHireDate','$teaSalary');";
    $success = $conn->query($sql);
    $sql = "INSERT INTO users VALUES('$teaId','$teaPassword','teacher');";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
    echo "Entered data successfully\n";
}}

?>