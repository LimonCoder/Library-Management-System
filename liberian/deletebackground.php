<?php

$data_successdelete = 0;

$con = mysqli_connect("localhost","root","","lms");
if (!$con){
	die("Database connection faild");
}

if (isset($_POST['deleteid']))
{
	$id = $_POST['deleteid'];

	$bookimg =mysqli_query($con,"SELECT books.book_image FROM books WHERE id = $id");

	$images = mysqli_fetch_array($bookimg);


	if(file_exists("../serverimages/".$images['book_image'])) {
		unlink("../serverimages/".$images['book_image']);
	}

	$success = mysqli_query($con,"DELETE FROM books WHERE id= $id");

	if ($success){
        $data_successdelete = 1;
        echo $data_successdelete;
    }else{
        echo $data_successdelete;
    }

}
?>

