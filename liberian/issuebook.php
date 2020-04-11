<?php
require_once('include/header.php') ?>
<?php



if (isset($_POST['issue_save'])){
    if (!empty($_POST['book_id'])){
        $bookid = $_POST['book_id'];
        $studentid = $_POST['student_id'];
        $issuedate = $_POST['issuedate'];

        $bookquery = mysqli_query($con,"SELECT books.avaible_qty as bookquantity FROM books WHERE books.id = $bookid ");

        $results = mysqli_fetch_assoc($bookquery);
        $avaiblebook =  --$results['bookquantity'];



        $query = "INSERT INTO issuebook  VALUES (NULL,  $studentid,  $bookid, '$issuedate', NULL,1, NULL)";
        $success = mysqli_query($con,$query);
        $update = mysqli_query($con,"UPDATE books SET books.avaible_qty = $avaiblebook WHERE books.id = $bookid");
        unset($_POST);

       

    }else{
        $empty_bookid = "*";
    }



}


?>
<div class="row">
    <div class="alert alert-success collapse" id="alertx" style="margin: 5px;"  role="alert">
        <strong>Success !!</strong> Books Transfered Successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
    <div class="alert alert-danger collapse" id="alerty" style="margin: 5px;"  role="alert">
        <strong>Faild !!</strong> Books Transfered Faild <strong>try Again</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->

    <div class="col-sm-12 ">

        <div class="panel" style="padding-bottom: 48px;">

            <div class="panel-content">

                </div>
                <div class="row">

                    <div class="col-md-12 col-md-offset-5">
                        <form class="form-inline" action="" method="POST">

                            <h5 class="mb-lg ">Searching Students :</h5>
                            <div class="form-group">
                                <label class="sr-only" for="email4">Email</label>

                                <select class="form-control" name="student_id">

                                    <option value="">Select Student</option>
                                    <?php
                                    $resutls = mysqli_query($con,"SELECT * FROM students WHERE status = 1");
                                    while ($row = mysqli_fetch_assoc($resutls)){ ?>
                                        <option value="<?= $row['id']?>"
                                            <?php
                                                if (isset($_POST['student_id'])){
                                                    if ($row['id'] == $_POST['student_id'] ){
                                                        echo "selected";
                                                    }
                                                }
                                            ?>

                                        > <?= ucwords($row['fname']." ".$row['lname'])." - (".$row['roll'].")"?></option>
                                    <?php        }
                                    ?>
                                </select>
                                <span style="color: red" id="errorspan"></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="Submit" value="Search" class="btn btn-primary" style="margin-left: 5px;">Search</button>
                            </div>
                        </form>


                    </div>

                    <?php
                    if (isset($_POST['Submit'])){

                        if (!empty($_POST['student_id'])){ ?>
                            <div class=""col-md-12 col-md-offset-5">

                                <div class="panel inlinepanel" style="background: none; border: none; box-shadow: none">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <form class="form-horizontal" action="" method="POST">
                                                    <h3 class="mb-lg text-center">Issue Book</h3>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-4 control-label">Student Name :</label>
                                                        <div class="col-sm-8">
                                                            <?php
                                                            $sid = $_POST['student_id'];
                                                            $resultsone = mysqli_query($con,"SELECT students.fname, students.lname FROM students WHERE id = ' $sid'");
                                                            $row = mysqli_fetch_assoc( $resultsone);
                                                            ?>

                                                            <input  class="form-control" value="<?= ucwords($row['fname']." ".$row['lname']) ?>" readonly >
                                                            <input type="hidden" name="student_id" value="<?= $_POST['student_id']?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password2" class="col-sm-4 control-label">Book Name :</label>
                                                        <?php
                                                            if (isset($empty_bookid)){
                                                                echo '<span style="color: red">'.$empty_bookid.'</span>';
                                                            }
                                                        ?>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="bookid" name="book_id">
                                                                <option value="">Select Book</option>
                                                                <?php
                                                                    $query = "SELECT * FROM books WHERE avaible_qty > 0";
                                                                    $result = mysqli_query($con,$query);
                                                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                                                        <option value="<?= $row['id']?>"><?= $row['book_name']?></option>

                                                                 <?php   }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="issuedate" class="col-sm-4 control-label">Issue Date :</label>
                                                        <div class="col-sm-8">
                                                            <input  class="form-control" id="issuedate" name="issuedate" value="<?= date("Y-m-d")?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <div class="row text-center">
                                                                <button type="submit" name="issue_save" id="isssussave" class="btn btn-primary text-center">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php   }else{ ?>
                            <script type="text/javascript">
                                document.getElementById("errorspan").innerHTML = "*";
                            </script>

                        <?php    }

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>





    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>

<?php
if (isset($success) && isset($update)){
    if ($success && $update) { ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#alertx").show();
                setTimeout(function () {
                    $("#alertx").hide();
                },2000);
            });

        </script>


    <?php    }else{ ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#alerty").show();
                setTimeout(function () {
                    $("#alerty").hide();
                },2000);
            });

        </script>
<?php    }
}

?>


