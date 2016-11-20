
<?php
session_start();
$id=$_POST["uid"];
$passw=$_POST["pass"];

$_SESSION["id"] = $_POST["uid"];
$_SESSION["passw"] = $_POST["pass"];
$_SESSION['login_id']=$_POST["uid"];

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


$sql="SELECT type FROM users WHERE userid='$id' and password='$passw'";
$result = $conn->query($sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);
$control=$type['type'];
echo $control;

if($count!=1 || !isset($control)){
    header("Location:../index.php?login=false");
}
else if($count==1 && $control=="admin"){
    header("Location:../module/admin");
}
else if($count==1 && $control=="teacher"){
    header("Location:../module/teacher");
}

else if($count==1 && $control=="student"){
    header("Location:../module/student");
}
else if($count==1 && $control=="staff"){
    header("Location:../module/staff");
}
else if($count==1 && $control=="parent"){
	 
    header("Location:../module/parent");
}
else {
    header("Location:../index.php?login=false");
}
$conn->close();
?>

