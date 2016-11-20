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
		<script src = "JS/newStudentValidation.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Logged In As Admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
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
		
		<div id="screen" style="float: left;  overflow:scroll;">
		<p style= "text-align:center;">Student Registration</p><br/>
		
		<form action="#" method="post" enctype="multipart/form-data" onsubmit="return newStudentValidation();" >
		<p style= "text-align:center;">
		
		Student Id:<input id="stuId"type="text" name="studentId" placeholder="Enter Id"></br></br>
		Student Name:<input id="stuName" type="text" name="studentName" placeholder="Enter Name"></br></br>
		Student Password:<input id="stuPassword"type="password" name="studentPassword" placeholder="Enter Password"><br></br>
		Confirm Student Password :<input id="stuconfirmPassword"type="password" name="stuconfirmPassword" placeholder="Enter Password"><br></br>
		Student Phone:<input id="stuPhone"type="text" name="studentPhone" placeholder="Enter Phone Number" onkeypress="return isNumberKey(event)"><br></br>
		Student Email:<input id="stuEmail"type="text" name="studentEmail" placeholder="Enter Email"><br></br>
		Gender:<input type="radio" name="gender" value="Male" onclick="stuGender = this.value;"> Male <input type="radio" name="gender" value="Female" onclick="this.value"> Female<br><br>
		Student DOB:<input id="stuDOB"type="text" name="studentDOB" placeholder="Enter DOB(yyyy-mm-dd)"><br></br>
		Student Addmission Date:<input id="stuAddmissionDate" name="studentAddmissionDate" value = "<?php echo date('d-m-y');?>" readonly><br></br>
		Student Address:<input id="stuAddress" type="text" name="studentAddress" placeholder="Enter Address"><br></br>
		Student Class Id:<input id="stuClassId" type="text" name="studentClassId" placeholder="Enter Class Id"><br></br>
		Student Parent Id:<input id="stuParentId"type="text" name="studentParentId" placeholder="Enter Parent Id"><br></br>
		Student Picture:<input id="file" type="file" name="file"></br></br>
		
		
		<input type="submit" name="submit" value="Submit" ">
		</div>
		
		 </form>

	
</body>

</html>
<?php






if(isset($_POST['submit'])){
$stuId = $_POST['studentId'];
	
$sql="SELECT userid FROM users WHERE userid='$stuId' and type='student'";
$result = $conn->query($sql);

$count=mysqli_num_rows($result);

  
  if($count!=0)   {
      echo "studentid already exists";
	  
  }

  else
  {
	  $stuName = $_POST['studentName'];
	 $stuPassword = $_POST['studentPassword']; 
	 $stuPhone = $_POST['studentPhone'];
	 
	 
	 
    $stuEmail = $_POST['studentEmail'];
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['studentDOB'];
    $stuAddmissionDate = $_POST['studentAddmissionDate'];
    $stuAddress = $_POST['studentAddress'];
    $stuParentId = $_POST['studentParentId'];
	$stuClassId = $_POST['studentClassId'];
	
	$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    move_uploaded_file($filetmp,"../images/".$stuId.".jpg");
	
    
    $sql = "INSERT INTO students VALUES('$stuId','$stuName','$stuPassword','$stuPhone','$stuEmail','$stugender','$stuDOB','$stuAddmissionDate','$stuAddress','$stuParentId','$stuClassId');";
    $success = $conn->query($sql);
	//$success = mysql_query($sql);
    $sql = "INSERT INTO users VALUES('$stuId','$stuPassword','student');";
    //$success = mysql_query($sql);
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
	
    echo "Entered data successfully";
	
}

    
  }
  

?>