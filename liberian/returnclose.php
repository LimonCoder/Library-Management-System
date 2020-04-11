<?php
$con = mysqli_connect("localhost","root","","lms");
if (!$con){
	die("Database connection faild");
}
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");


$issueid = base64_decode($_GET['issueid']);
$bookpicesresults = mysqli_query($con,"SELECT issuebook.Pices as bookpices FROM issuebook WHERE id = $issueid");
$bookpices = mysqli_fetch_assoc($bookpicesresults);
$pices = --$bookpices['bookpices'];

$avaiblequnitity = mysqli_query($con,"SELECT books.avaible_qty as quintity FROM issuebook JOIN books ON issuebook.book_id = books.id WHERE issuebook.id = $issueid");
$finalqunitity = mysqli_fetch_assoc($avaiblequnitity);
$qunity = ++$finalqunitity['quintity'];

$currentdate = date("Y-m-d");
$updatequery = "UPDATE issuebook SET return_date =' $currentdate', Pices = $pices  WHERE issuebook.id = $issueid";
$updatequintity = "UPDATE books JOIN issuebook ON books.id = issuebook.book_id SET books.avaible_qty = $qunity WHERE issuebook.id = $issueid";

$issueupdate = mysqli_query($con,$updatequery);
$bookquintity = mysqli_query($con,$updatequintity);

if ($issueupdate && $bookquintity ){
    header("location: returnbook.php");
}

?>