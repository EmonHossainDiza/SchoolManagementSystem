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

$sql = "SELECT * FROM staff;";
$result = $conn->query($sql);
$string = "";
$images_dir = "../images/";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

    $picname = $row['id'];
    $string .= '<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td>
	<td>'.$row['phone'].'</td><td>'.$row['email'].
    '</td><td>'.$row['gender'].'</td><td>'.$row['dob'].
    '</td><td>'.$row['hiredate'].'</td><td>'.$row['address'].
    '</td><td>'.$row['salary'].
    "</td><td><img src='".$images_dir.$picname.".jpg' alt='$picname' width='150' height='150'>".'</td></tr>';
}
}

?>

<!doctype html>
<html>
	<head>
		<title> School Management System </title>
		<link rel="stylesheet" type="text/css" href="New Text Document.css"/>
		<script src = "JS/searchStaff.js"></script>
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
		
		<center><b>Search By Id Or Name:  </b>
		<input type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStaff(this.value);"></center>
		
		<center><h2>Staff List</h2></center>
        <center>
            <table border="1" id='staffList'>
               <tr>
                    <th>ID</th>
                    <th>Name</th>
                    
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Hire Date</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Picture</th>
                </tr>
                <?php echo $string;?>
            </table>
        </center></div>
		</body>
</html>