<?php
	session_start();
    $con =  mysqli_connect("localhost","root","","lms");
    if(!$con){
        die("connection Faild");
    }

    if(isset($_POST['searchdate'])){
        if (!empty($_POST['from'])){
            $fromdate = date("Y-m-d",strtotime($_POST['from']));
        }else{
            $_SESSION['emptyfromdate'] = "*";
            echo ' <script type="text/javascript"> window.open("record.php","_self")</script>';

        }
        if (!empty($_POST['to'])){
            $todate = date("Y-m-d",strtotime($_POST['to']));
        }else{
            $_SESSION['emptytodate'] = "*";
            echo ' <script type="text/javascript"> window.open("record.php",,"_self")</script>';
        }



    }


?>

<?php

if (isset($fromdate) && isset($todate)){

    $query = "SELECT STD.roll, STD.fname, STD.lname, STD.number, BK.book_name, ISST.issue_date, ISST.return_date FROM issuebook ISST JOIN students STD ON ISST.student_id = STD.id JOIN books BK ON ISST.book_id = BK.id WHERE ISST.issue_date >= '$fromdate' AND ISST.issue_date <= '$todate'";
    $results = mysqli_query($con,$query);
    if(mysqli_fetch_array($results)>0) { ?>


        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title></title>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <style type="text/css">
                body {
                    font-family: kalpurush;
                    margin: 0;
                }

                .print-area {
                    width: 750px;
                    height: 1050px;

                    margin: auto;
                    box-sizing: border-box;
                    page-break-after: always;
                    border: 2px solid #b5b3b3;
                    padding: 8px;
                    border-radius: 5px;
                }

                .header, .page-footer {
                    text-align: center;
                    margin-bottom: 8px;
                }

                .data-info {
                }

                .data-info table {
                    width: 100%;
                }

                .data-info table th, .data-info table td {
                    border: 1px solid black;
                    padding: 7px;
                }

            </style>


        <body>
        <div style="margin-bottom: 10px;"></div>
        <div class="print-area">
            <div class="header">
                <h2 style="font-weight: bold;">InnovationIT, Cumilla</h2>
                <h4 style="font-weight: bold;">ইনোভেশনআইটি, কুমিল্লা</h4>
                <span style="font-weight: bold;">Mobile No:</span>
                <span> 01838723408</span><br>
                <span style="font-weight: bold;">Email : limon@innovationit.com.bd</span>
            </div>
            <div class="data-info">
                <table>
                    <thead>
                    <th>Roll No.</th>
                    <th>Student Name</th>
                    <th>Mobile Number</th>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>


                    </thead>
                    <tbody>
                    <?php

                    if (isset($fromdate) && isset($todate)) {

                        $query = "SELECT STD.roll, STD.fname, STD.lname, STD.number, BK.book_name, ISST.issue_date, ISST.return_date FROM issuebook ISST JOIN students STD ON ISST.student_id = STD.id JOIN books BK ON ISST.book_id = BK.id WHERE ISST.issue_date >= '$fromdate' AND ISST.issue_date <= '$todate'";
                        $results = mysqli_query($con, $query);


                            while ($row = mysqli_fetch_array($results)) { ?>
                                <tr style="background:  <?= ($row['return_date'] == null) ? "#b3b2b2" : " " ?>">
                                    <td><?= $row['roll'] ?></td>
                                    <td><?= ucwords($row['fname'] . " " . $row['lname']) ?></td>
                                    <td><?= $row['number'] ?></td>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><?= $row['issue_date'] ?></td>
                                    <td><?php
                                        if ($row['return_date'] != null) {
                                            echo $row['return_date'];
                                        } else {
                                            echo "এখনো জমা দেয় নি";
                                        }

                                        ?></td>

                                </tr>


                                <?php

                            }



                    }


                    ?>


                    </tbody>
                </table>
            </div>
            <div class="page-footer">
                Page :- 1
            </div>
        </div>


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
        </body>
        </html>


        <?php
    }else{
        echo '<span style="color: red">' . 'No record found to update' . '</span>';
    }

    }else{
	header("location: record.php");
} ?>