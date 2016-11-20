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
		<script src = "JS/searchForUpdateStaffSalary.js"></script>
	</head>

	<body>
<div id="logsession" >
	 
		<p>Logged In As Admin<br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left; ">
		
			<div id="menu" style="float: left;  ">
		
			
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="updateTeacherSalary.php">Update Teacher Salary</a></div><br>
			<div class="column"><a href="updateStaffSalary.php">Update Staff Salary</a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>

	

		<div id="screen" style="float: left;  overflow:scroll;">
		<center><b>Search By Id Or Name : </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStaffForUpdateSalary(this.value);"></center>
		<br/>
        <center>
          <h2>Only One Staff Salary Can Update at a time.<br/> Please Search For A Specific Staff</h2>
            <form action="#" method="post">
                <table border="1" cellpadding="6" id='updateStaffSalary'>
                </table>
            </form>
        </center></div>
		</body>
</html>

<?php




if(!empty($_POST['submit'])){
    $Id = $_POST['id'];
    $Name = $_POST['name'];
    $salary = $_POST['salary'];
    $sql = "UPDATE staff SET id='$Id', name='$Name', salary='$salary' WHERE id='$Id'";
    $success = $conn->query($sql);
    if(!$success) {
        die('Could not Update data: '.mysql_error());
    }
    echo "Update data successfully\n";
}
?>