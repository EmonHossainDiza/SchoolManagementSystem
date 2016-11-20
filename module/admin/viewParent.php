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

$sql = "SELECT * FROM parents;";
$result = $conn->query($sql);
$string = "";
$images_dir = "../images/";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

    $string .= '<tr><td>'.$row['id'].'</td><td>'.$row['fathername'].'</td><td>'.$row['mothername'].
    '</td><td>'.$row['fatherphone'].'</td><td>'.$row['motherphone'].
    '</td><td>'.$row['address'].'</td></tr>';
}
}

?>

<!doctype html>
<html>
	<head>
		<title> School Management System </title>
		<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
		<script src = "JS/searchParent.js"></script>
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
			<!--<div class="column"><a href="student.php" >Student</a></div><br>
			<div class="column"><a href="teacher.php" >Teacher</a></div><br>-->
			<div class="column"><a href="parent.php" >Parent</a></div><br>
			<!--<div class="column"><a href="staff.php" >Staff</a></div><br>
			<div class="column"><a href="others.php" >Other</a></div><br>-->
		</div>
	</div>

	

		
		<center><b>Search By Id Or Name:  </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getParent(this.value);"></center>
		
		<center><h2>Parent List</h2></center>
        <center>
            <table border="1" id='parentList'>
                <tr>
                    <th>ID</th>
                    
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Father Phone</th>
                    <th>Mother Phone</th>
                    <th>Address</th>
                </tr>
                <?php echo $string;?>
            </table>
        </center>
		</body>
</html>