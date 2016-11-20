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


$searchKey = $_GET['key'];
$string = "<tr>
    <th>ID</th>
    <th>Name</th>
    
    <th>Phone</th>
    <th>Email</th>
    <th>Gender</th>
    <th>DOB</th>
    <th>Addmission Date</th>
    <th>Address</th>
    <th>Parent Id</th>
    <th>Class Id</th>
    <th>Picture</th>
</tr>";
$sql = "SELECT * FROM students WHERE id like '$searchKey%' OR name like '$searchKey%';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    $string .= "<tr><td><input value='".$row['id']."'name='id' readonly >".
    "</td><td><input type='text' value='".$row['name']."'name='name'>".
    
    "</td><td><input type='text' value='".$row['phone']."'name='phone'>".
    "</td><td><input type='email' value='".$row['email']."'name='email'>".
    "</td><td><input type='text' value='".$row['gender']."'name='gender'>".
    "</td><td><input type='date' value='".$row['dob']."'name='dob'>".
    "</td><td><input type='date' value='".$row['addmissiondate']."'name='addmissiondate'>".
    "</td><td><input type='text' value='".$row['address']."'name='address'>".
    "</td><td><input type='text' value='".$row['parentid']."'name='parentid'>".
    "</td><td><input type='text' value='".$row['classid']."'name='classid'>".
    "<td><input type='file' name='pic' accept='image/*'></td>".
    "</td></tr>";
}
}
echo $string."<input type='submit' name='submit'value='Submit'>";
?>
