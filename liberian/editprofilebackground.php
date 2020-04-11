<?php
$data = 0;

$con = mysqli_connect("localhost","root","","lms");
if (!$con){
    die("Database connection faild");
}

    if (isset($_POST['pass']) && isset($_POST['lid']) ){
        $id = $_POST['lid'];
        $oldpassword = $_POST['pass'];

        $results = mysqli_query($con,"SELECT * FROM liberian WHERE id = $id AND Password = $oldpassword ");
        if (mysqli_fetch_array($results) > 0)
        {
            $data = 1;
            echo $data;

        }else{
            echo $data;
        }


    }


?>