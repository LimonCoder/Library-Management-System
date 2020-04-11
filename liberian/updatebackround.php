<?php
$data_success = 0;
$con = mysqli_connect("localhost","root","","lms");
if (!$con){
    die("Database connection faild");
}


if (isset($_POST['bookname']) && isset($_POST['bookpublication']) && isset($_POST['bookauthorname']) && isset($_POST['bookprice']) && isset($_POST['bookdate']) && isset($_POST['bookquantity']) && isset($_POST['avaiblequitity']) && isset($_POST['id'])  ) {
	
	$bookname = $_POST['bookname'];
	$bookpublication = $_POST['bookpublication'];
	$bookauthorname = $_POST['bookauthorname'];
	$bookprice = $_POST['bookprice'];
	$bookdate = date("Y-m-d",strtotime($_POST['bookdate']));
	$bookquantity = $_POST['bookquantity'];
	$avaiblequitity = $_POST['avaiblequitity'];
	$sid = $_POST['id'];



	$query = "UPDATE books SET 	
  book_name= '$bookname', 
  book_authorname= '$bookauthorname' ,
  book_publicationname='$bookpublication',
  book_purchase_date = '$bookdate',
  book_price ='$bookprice',
  book_qty = $bookquantity,
  avaible_qty = $avaiblequitity
     WHERE id = $sid";

	$success = mysqli_query($con, $query);


	if ($success){
        $data_success = 1;
        echo  $data_success;
    }else{
        echo  $data_success;
    }


}

?>