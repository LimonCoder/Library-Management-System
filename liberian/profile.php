<?php

require_once('include/header.php');

$userid =  $_SESSION['Userid'];

$resutls = mysqli_query($con, "SELECT * FROM liberian WHERE id = $userid");

$row = mysqli_fetch_array($resutls);


?>
<div class="row ">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->






        <div class="col-md-8 col-lg-6 col-md-offset-3">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--PROFILE-->
                   <div class="row text-center">
                       <div>
                           <div class="profile-photo">
                               <?php
                               if (empty($row['images'])){ ?>
                                   <img alt="User photo" src="../serverimages/userprofile.png" />
                               <?php    }else { ?>
                                   <img alt="User photo" src="../serverimages/<?= $row['images']?>" height="150" width="150" style="border-radius: 50%" />
                               <?php }
                               ?>
                           </div>
                           <div class="user-header-info d-block" style="margin-bottom: 2px">
                               <h2 class="user-name"><?= $row['Name']; ?></h2>
                               <h5 class="user-position"><?= $row['Username'];?></h5>

                           </div>
                           <div class="user-social-media" style="margin-left: 20px">
                               <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                           </div>
                       </div>
                   </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-md-offset-2">
                            <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                                <div class="panel-content">
                                    <h4 class=""><b>Contact Information</b></h4>
                                    <ul class="user-contact-info ph-sm">
                                        <li><b><i class="color-primary mr-sm fa fa-envelope"></i><?= $row['Email']; ?></b></li>
                                        <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> <?= $row['Number']; ?></li>
                                        <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> <?= $row['Address']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <a href="editprofile.php" class="btn btn-warning">Edit Profile</a>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->

                </div>
    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>
