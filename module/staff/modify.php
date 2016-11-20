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

$st="SELECT *  FROM staff WHERE id='$id' ";
$result=$conn->query($st);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		$stinfoid= $row['id'];
		$stinfoname= $row['name'];
		$stinfopass= $row['password'];
		$stinfophone= $row['phone'];
		$stinfoemail= $row['email'];
		$stinfogender= $row['gender'];
		$stinfodob=$row['dob'];
		$stinfohiredate= $row['hiredate'];
		$stinfoaddress= $row['address'];
		$stinfosalary= $row['salary'];
	}
}
		
		
?>

<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
<script src = "JS/modifyValidate.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Hi!staff <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;  border:2px solid red;">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<!--<div class="column"><a href="modify.php">Modify Information</a></div><br>-->
			<div class="column"><a href="salary.php">Salary</a></div><br>
			<div class="column"><a href="attendance.php">Attendance</a></div><br>
			
		</div>
	</div>
		
		<div id="screen" style="float: left; border:2px solid red;">
		
		<center><b>Edit Information</b></center>
		
		<form  onsubmit="return modifyValidate();" action="modifysave.php" method="post">
		
		<table border="1">
			  <tr>
			  
			  <th>Staff ID</th>
			  <th>Staff Name</th>
			  <th>Staff Password</th>
			  <th>conStaff Password</th>
			  <th>Staff Phone</th>
			  <th>Staff Email</th>
			  <th>Staff Gender</th>
			  <th>Staff DOB</th>
			  <th>Staff Hire Date</th>
			  <th>Staff Address</th>
			  <th>Staff Monthly Salary</th>
			 <th>Staff Picture</th>
			  
			  </tr>
			  <tr>
			  
			  <td><?php echo $stinfoid?></td>
			  <td><?php echo $stinfoname?></td>
			  <td><input type="text"  id="password" name="password" value="<?php echo $stinfopass?>"/></td>
			  <td><input type="password"  id="conpassword" name="conpassword" value=""/></td>
			  <td><input type="text" id="phone" name="phone" value="<?php echo $stinfophone;?>"/></td>
			  <td><input type="email"  id="email" name="email" value="<?php echo $stinfoemail;?>"/></td>
			  <td><?php echo $stinfogender?></td>
			  <td><?php echo $stinfodob?></td>
			  <td><?php echo $stinfohiredate?></td>
			  <td><input type="text"  id="address" name="address" value="<?php echo $stinfoaddress;?>" /></td>
			  <td><?php echo round($stinfosalary);?></td>
			 <td><img src="../images/<?php echo $id.".jpg";?>" height="95" width="95" alt="<?php echo $id." photo";?> "/></td>
			  </tr>
			  </table>
		
		<br/>
			  <input type="submit" value="Modify"/>
			  </form>
								
								</div>
		</body>
</html>
