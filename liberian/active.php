<?php
$con = mysqli_connect("localhost","root","","lms");
if (!$con){
    die("Database connection faild");
}
$sid = base64_decode($_GET['sid']);

$query = "UPDATE students SET status = 1 WHERE id = $sid;";
$excute = mysqli_query($con,$query);
if ( $excute){
    header("location:students.php");
}



?>