<?php

require_once('include/header.php') ?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Book List :</b></h4>
        <div class="row text-right" style="margin-right: 6px">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add Admin</button>
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
                                        <a href="editprofile.php" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger" style="margin-top: -10px;"><i class="fa fa-trash-o"></i></button>

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

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add User</h3>

                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" placeholder="Email :">
                        </div>
                        <div class="form-group">
                            <label for="username">User Name :</label>
                            <input type="email" class="form-control" id="username" placeholder="Username :">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confrim Password :</label>
                            <input type="password" class="form-control" id="cpassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>
