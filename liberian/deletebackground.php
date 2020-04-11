<?php

$data_successdelete = 0;

$con = mysqli_connect("localhost","root","","lms");
if (!$con){
	die("Database connection faild");
}

if (isset($_POST['deleteid']))
{
	$id = $_POST['deleteid'];

	$success = mysqli_query($con,"DELETE FROM books WHERE id= $id");

	if ($success){
        $data_successdelete = 1;
        echo $data_successdelete;
    }else{
        echo $data_successdelete;
    }

}
?>

