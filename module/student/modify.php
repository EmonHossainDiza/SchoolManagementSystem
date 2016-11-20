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

$sql ="SELECT password  FROM students WHERE id='$id' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
	$picname = $row['password'];}}


?>


<html>
<head>
		<title> School Management System </title>
		<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
		<script src = "JS/login_logout.js"></script>
				<script src = "JS/modifyValidate.js"></script>
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
			<!--<div class="column"><a href="viewProfile.php" >View Profile</a></div><br>
			<div class="column"><a href="updateTeacher.php" >Teacher</a></div><br>
			<div class="column"><a href="parent.php" >Parent</a></div><br>
			<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>

		
			  <div align="center" class="mod">
			  	<h1>Change Password</h1>
				
				<form  onsubmit="return modifyValidate();" action="modifysave.php" method="post">
			  <table border="1">
			  <tr>
			  <th>Student Password</th>
			   <th>Confirm Password</th>
			 </tr>
			  <tr>
			  
			  <td><input type="text"  id="password" name="password" value="<?php echo $picname;?>"/></td>
			  <td><input type="password"  id="Conpassword" name="Conpassword" value=""/></td>
			</table>
			  <br/>
			  <input type="submit" value="Change Password"/>
			  </form>
								
								</div>
		</body>
</html>

