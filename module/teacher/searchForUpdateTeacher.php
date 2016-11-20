<?php
//session_start();
$id=$_SESSION['login_id'];

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "schoolmanagementsystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$session=mysqli_query($conn,"SELECT name  FROM teachers WHERE id='$id' ");

$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];

$string = "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Password</th>
	<th>Confirm Password</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Gender</th>
    <th>DOB</th>
    <th>Address</th>
	
</tr>";

$sql = "SELECT * FROM teachers WHERE id='$id';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    $string .= "<tr><td><input value='".$row['id']."'name='id' readonly >".
    "</td><td><input type='text' value='".$row['name']."'name='name' readonly>".
    "</td><td><input type='password' value='".$row['password']."'name='password'>".
	"</td><td><input type='password' value=''name='conpassword'>".
    "</td><td><input type='text' value='".$row['phone']."'name='phone'>".
    "</td><td><input type='email' value='".$row['email']."'name='email'>".
    "</td><td><input type='text' value='".$row['gender']."'name='gender' readonly>".
    "</td><td><input type='date' value='".$row['dob']."'name='dob' readonly>".
    "</td><td><input type='text' value='".$row['address']."'name='address'>".
	
    "</td></tr>";
}
}
echo $string."<input type='submit' name='submit'value='Submit'>";
?>
<!--<input type="submit" value="Submit">
<input type="text" name="fname"><br>-->
