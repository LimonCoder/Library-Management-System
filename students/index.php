<?php
require_once('include/header.php');
require_once ('../include/db_connect.php');
$sl = 1;
$id = $_SESSION['userid'];
?>
<div class="row">
    <!--WIDGETBOX Main Box-->
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                    $name = "SELECT books.book_name, students.*, issuebook.issue_date 
                                FROM issuebook
                                JOIN books ON issuebook.book_id = books.id
                                JOIN students ON issuebook.student_id = students.id
                                WHERE student_id = $id AND issuebook.return_date IS NULL";

                    $resutl = mysqli_query($con,$name);

                    $rows = mysqli_fetch_array($resutl); ?>
                    <h3 style="font-family: 'Times New Roman'"><?=$rows['fname']." ".ucfirst($rows['lname'])?></h3>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Author Name</th>
                            <th>Publication Name</th>
                            <th>Recived Date</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT books.*, issuebook.* 
                                    FROM issuebook
                                    JOIN books
                                    ON issuebook.book_id = books.id
                                    WHERE student_id = $id AND issuebook.return_date IS NULL";

                        $resutls = mysqli_query($con, $query);

                        if (mysqli_num_rows($resutls) > 0){
                            $row = mysqli_fetch_assoc($resutls)  ?>
                            <tr>
                                <td><?= $sl++; ?></td>
                                <td><?= $row['book_name'] ?></td>
                                <td><img src="../serverimages/<?= $row['book_image']?>" alt="<?= $row['book_image']?>" width="80" height="80"></td>
                                <td><?= $row['book_authorname'] ?></td>
                                <td><?= $row['book_publicationname'] ?></td>
                                <td><?= $row['issue_date'] ?></td>
                            </tr>
                        <?php
                        }else{  ?>
                           <tr>
                               <td colspan="6" align="center" style="color: red">No Record Found</td>
                           </tr>
                        <?php    }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!--WIDGETBOX Main Box-->


</div>

<?php require_once('include/footer.php'); ?>
