<?php
$emailval = 0;
$datainsert = 0;

$con = mysqli_connect("localhost","root","","lms");
if (!$con){
    die("Database connection faild");
}

    if (isset($_POST['nam']) && isset($_POST['uemail']) && isset($_POST['username']) && isset($_POST['cpass']) ){
         $name = $_POST['nam'];
         $email = $_POST['uemail'];
         $username = $_POST['username'];
         $password = $_POST['cpass'];

         $result = mysqli_query($con,"INSERT INTO liberian (Name, Username, Email, Password) VALUES ('$name','$username','$email','$password')");

         if ($result){
             $datainsert = 1;
             echo $datainsert;
         }else{
             echo $datainsert;
         }

    }


    

    if (isset($_POST['eid'])) {
    	$email = $_POST['eid'];

    	$result = mysqli_query($con,"SELECT * FROM liberian WHERE Email = '$email' ");

    	if (mysqli_num_rows($result) > 0){
            $emailval = 1;
            echo $emailval;

        }else{
            echo $emailval;
        }
    }

?>