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


$sql = "SELECT * FROM teachers where id not in (select attendedid from attendance where date=CURDATE())";
$res= $conn->query($sql);
$string = "";

while($row = $res->fetch_assoc()){
    $string .= "<form action='attendTeacher.php' method='post'>".
    "<tr><td><input type='submit' name='submit' value='Present'></td>".
    '<input type="hidden" value="'.$row['id'].'" name="id" />'.
    '<td>'.$row['id'].'</td><td>'.$row['name'].
    '</td><td>'.$row['phone'].'</td><td>'.$row['email'].'</td></tr></form>';
}
?>
<!doctype html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
<script src = "JS/login_logout.js"></script>

</head>

<body>
<div id="logsession" >
	 
		<p>Logged In As Admin  <br><?php echo "  ".$loged_user_name."  ".$id." " ;?> </font><br>
		<a href="logout.php"><button type="button">LogOut!!</button></a>
		</p>
		
	</div>
	

	<div>
		<div id="menu" style="float: left;">
			<div class="column"><a href="index.php" >Home</a></div><br>
			<div class="column"><a href="teacherAttendance.php" >Teacher Attendence</a></div><br>
			<div class="column"><a href="staffAttendance.php" >Staff Attendence</a></div><br>
			<div class="column"><a href="viewAttendance.php" >View Attendence </a></div><br>
			<div class="column"><a href="index.php" >Back</a></div><br>
		</div>
	</div>
		
		<div id="screen" style="float: left; overflow:scroll;">
			<center>
            <h2>Teacher Attandance List</h2><hr/>
              <table border="1">
                <tr>
                    <th>Click For Attendance</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <?php echo $string;?>
              </table>
        </center>
		</div>

	
</body>

</html>
