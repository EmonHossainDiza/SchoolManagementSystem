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
		<script src = "JS/newStaffValidation.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Looged In As Admin <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
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
		
	<div id="screen" style="float: left; overflow:scroll;">
		<p style= "text-align:center;">Staff Registration</p><br/>
		
		<form action="#" method="post" enctype="multipart/form-data" onsubmit="return newStaffValidation();" >
		<p style= "text-align:center;">
		
		Staff Id:<input id="Id"type="text" name="Id" placeholder="Enter Id"></br></br>
		Staff Name:<input id="Name" type="text" name="Name" placeholder="Enter Name"></br></br>
		Staff Password:<input id="Password"type="password" name="Password" placeholder="Enter Password"></br></br>
		Confirm teacher Password :<input id="staconfirmPassword"type="password" name="staconfirmPassword" placeholder="Enter Password"><br></br>
		Staff Phone:<input id="Phone"type="text" name="Phone" placeholder="Enter Phone Number" onkeypress="return isNumberKey(event)"></br></br>
		Staff Email:<input id="Email"type="text" name="Email" placeholder="Enter Email"></br></br>
		Gender:<input type="radio" name="gender" value="Male" onclick="Gender = this.value;"> Male <input type="radio" name="gender" value="Female" onclick="this.value"> Female</br><br>
		Staff DOB:<input id="DOB"type="text" name="DOB" placeholder="Enter DOB(yyyy-mm-dd)"></br></br>
		Staff Hire Date:<input id="HireDate"name="HireDate"value = "<?php echo date('Y-m-d');?>" readonly></br></br>
		Staff Address:<input id="Address" type="text" name="Address" placeholder="Enter Address"></br></br>
		Staff Salary:<input id="Salary"type="text" name="Salary" placeholder="Enter Salary"></br></br>
		
		Staff Picture:<input id="file"type="file" name="file"></br></br>
		
		
		<input type="submit" name="submit"value="Submit">
		</div>
		
		 </form>

	
</body>

</html>
<?php

/*if(isset($_POST['submit'])){
    $Id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $HireDate = $_POST['HireDate'];
    $Address = $_POST['Address'];
    $Salary = $_POST['Salary'];
	
	$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    move_uploaded_file($filetmp,"../images/".$Id.".jpg");
	
    
     $sql = "INSERT INTO staff VALUES('$Id','$Name','$Password','$Phone','$Email','$gender','$DOB','$HireDate','$Address','$Salary')";
    $success = $conn->query($sql);
	//$success = mysql_query($sql);
    $sql = "INSERT INTO users VALUES('$Id','$Password','staff')";
    //$success = mysql_query($sql);
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
	
    echo "Entered data successfully";
	
}
$conn->close();*/

if(isset($_POST['submit'])){
	
	$Id = $_POST['Id'];
	
	$sql="SELECT userid FROM users WHERE userid='$Id' and type='teacher'";
	$result = $conn->query($sql);
	
	$count=mysqli_num_rows($result);

  
  if($count!=0)   {
      echo "staffid already exists";
	  
  }
  else
  {
	  $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $HireDate = $_POST['HireDate'];
    $Address = $_POST['Address'];
    $Salary = $_POST['Salary'];
	
	$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    move_uploaded_file($filetmp,"../images/".$Id.".jpg");
	
    
     $sql = "INSERT INTO staff VALUES('$Id','$Name','$Password','$Phone','$Email','$gender','$DOB','$HireDate','$Address','$Salary')";
    $success = $conn->query($sql);
	//$success = mysql_query($sql);
    $sql = "INSERT INTO users VALUES('$Id','$Password','staff')";
    //$success = mysql_query($sql);
	$success = $conn->query($sql);
    if(!$success) {
        die('Could not enter data: '.mysql_error());
    }
	
    echo "Entered data successfully";
	
}}
?>