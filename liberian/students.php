<?php require_once('include/header.php') ?>
    <div class="row">
        <!-----------------------------------------WIDGETBOX Main Box--------------------->

            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Tables</a></li>
                        <li><a>Data-table</a></li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--SEARCHING, ORDENING & PAGING-->
            <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Students</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Roll No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $resutls = mysqli_query($con,"SELECT * FROM students");
                                        while ($row = mysqli_fetch_assoc($resutls)){ ?>
                                            <tr>
                                                <td><?= $row['roll']?></td>
                                                <td><?= ucwords($row['fname']." ".$row['lname'])?></td>
                                                <td><?= $row['email']?></td>
                                                <td><?= $row['username']?></td>
                                                <td><?= $row['password']?></td>
                                                <td><?= $row['number']?></td>
                                                <td><?= $row['status'] ==1 ? "Active":"Inactive" ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] ==1){?>
                                                        <a href="inactive.php?sid=<?= base64_encode($row['id'])?>" class="btn btn-danger">Inactive</a>
                                                    <?php    }else{ ?>
                                                        <a href="active.php?sid=<?= base64_encode($row['id'])?>" class="btn btn-success" style="padding-right:17px; padding-left: 17px;">Active</a>
                                                    <?php    }
                                                    ?>
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#book-<?= $row['id'] ?>">View</a>
                                                    <a href="" class="btn btn-lighter-1" >Login as</a>


                                                </td>
                                            </tr>
                                <?php        }
                                    ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->







        <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

    </div>
    <!------------------------------ Modal ------------------------------------------------------------------------------------>
<?php
$resutls = mysqli_query($con,"SELECT * FROM students");
while ($row = mysqli_fetch_assoc($resutls)){ ?>
    <div class="modal fade" id="book-<?= $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-user"></i>Student Information</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive table-bordered table-hover">
                        <tr>
                            <th>Roll No :</th>
                            <td><?= $row['roll']?></td>
                        </tr>
                        <tr>
                            <th>Reg No :</th>
                            <td><?= $row['reg no']?></td>
                        </tr>
                        <tr>
                            <th>Name :</th>
                            <td><?= ucwords($row['fname']." ".$row['lname'])?></td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td><?= $row['email']?></td>
                        </tr>
                        <tr>
                            <th>User Name :</th>
                            <td><?= $row['username']?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><?= $row['password']?></td>
                        </tr>
                        <tr>
                            <th>Image :</th>
                            <td><img src="user.jpg" alt="image" width="60" height="60"></td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td><?= $row['status'] ==1 ? "Active":"Inactive" ?></td>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php        }
?>




<?php require_once('include/footer.php') ?>