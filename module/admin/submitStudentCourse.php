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

echo 'a';
if(!empty($_GET)){
    $courseid = $_GET['courseid'];
    $classid = $_GET['classid'];
    $teacherid = $_GET['teacherid'];
    $courseName = $_GET['coursename'];
    $sql = "SELECT id from students where classid='$classid'";
    $res = $conn->query($sql);
    $row_cnt = mysqli_num_rows(($res));
    echo $row_cnt;
    while($row_cnt && $row = mysqli_fetch_array($res)){
        print_r($row);
        $studentid = $row['id'];
        $sql = "INSERT INTO course VALUES('$courseid','$courseName','$teacherid','$studentid','$classid')";
        $res = $conn->query($sql);
        if(!$res) {
            die('Could not enter data: '.mysql_error());
        }
        echo "Entered data successfully\n";
        $row_cnt = $row_cnt - 1;
    }
    if(!$res) {
        die('Could not enter data: '.mysql_error());
    }
    echo "Entered data successfully\n";
}
?>
