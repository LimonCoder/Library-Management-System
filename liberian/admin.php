<?php

require_once('include/header.php') ?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Book List :</b></h4>
        <div class="row text-right" style="margin-right: 6px">
            <button class="btn btn-primary">Add Admin</button>
        </div>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No :</th>
                            <th>Image</th>
                            <th>Name : </th>
                            <th>Email :</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody
                            <?php
                            $sl = 1;
                            $resutls = mysqli_query($con, "SELECT * FROM liberian" );


                            while ($row = mysqli_fetch_array($resutls)){ ?>
                                <tr>
                                    <td><?= $sl++; ?></td>
                                    <td><img src="../serverimages/<?= $row['images'] ?>" alt="" width="50" height="50"></td>
                                    <td><?= $row['Name'] ?></td>
                                    <td><?= $row['Email'] ?></td>
                                    <td><?= $row['Username'] ?></td>
                                    <td><?= $row['Password'] ?></td>
                                    <td><?= $row['Number'] ?></td>
                                    <td><?= $row['Address'] ?></td>
                                    <td>
                                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        <a href="" class="btn btn-primary"><i class="fa fa-"></i></a>
                                    </td>
                                </tr>

                       <?php     }
                            ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>
