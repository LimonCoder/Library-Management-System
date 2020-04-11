<?php

require_once('include/header.php');
$userid =  $_SESSION['Userid'];
$passrequried = false;

$resutls = mysqli_query($con, "SELECT * FROM liberian WHERE id = $userid");

$row = mysqli_fetch_array($resutls);

$input_erros = array();




if (isset($_POST['Submit'])){
    if (!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $input_erros['name'] = "fillup this field";
    }

    if (!empty($_FILES['profileimage']['name'])){

        $imageextension = explode(".",$_FILES['profileimage']['name']);
        $allowextension = ['jpg','jpeg','png'];
        if (in_array(end($imageextension),$allowextension)){

            $imagename = rand(11111,999999).".".end($imageextension);
            $imagetmp = $_FILES['profileimage']['tmp_name'];

        }else{
            $input_erros['invalidimage'] = "Only jpg, png, jpeg image uploaded";
        }


    }

    if (!empty($_POST['username']))
    {
        $username = $_POST['username'];
    }else{
        $input_erros['username'] = "fillup this field";
    }

    if (!empty($_POST['number'])){

        if (strlen($_POST['number']) == 11){
            if (preg_match('/01[3|4|6|7|8|9][0-9]{8}/' ,$_POST['number'])){

                $number = $_POST['number'];

            }else{
                $input_erros['invalidnumber'] = "Invaild number";

            }
        }else{
            $input_erros['invalidcountnumber'] = "Number must be 11 digit";

        }
    }else{
        $input_erros['emptynumber'] = "fillup this field";

    }
    if (!empty($_POST['address'])){
        $address = $_POST['address'];
    }else{
        $input_erros['emptyadress'] = "fillup this field";
    }

    if(!empty($_POST['oldpassword'])){
        $input_erros['unemptypass'] = "*";

        $oldpass = trim($_POST['oldpassword']);
        $results = mysqli_query($con,"SELECT * FROM liberian WHERE id = $userid AND Password = $oldpass");
        if (mysqli_fetch_array($results) > 0)
        {
            $passrequried = true;

        }else{
            $oldpassmatch = "Password Don't match";
        }

        if ($passrequried){
            if (!empty($_POST['newpassword'])){
                $newpassword = trim($_POST['newpassword']);
            }else{
                $errornewpass = "fillup this field";
            }

            if (!empty($_POST['confrimpassword'])){

                if(!empty($_POST['newpassword'])){
                    if ($_POST['confrimpassword'] == $_POST['newpassword']){
                        if ($passrequried){
                            $confirmpassword = trim($_POST['confrimpassword']);
                        }
                    }else{
                        $notmatchcon = "Password don't match";
                    }
                }



            }else{
                $erroconapss = "fillup this field";
            }



        }




    }

















}





?>
<div class="row">
    <!-----------------------------------------WIDGETBOX Main Box--------------------->
    <div class="col-sm-12 col-md-12">
        <div class="col-sm-6 col-md-6 col-md-offset-3">

            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data" >

                                <div id="alertx" class="alert alert-success collapse">
                                    <strong>Success!</strong> Update profile Successfully.
                                </div>
                                <h3 class="mb-md bg-info text-center" style="padding: 10px 10px">Update Profile</h3>

                                <div class="form-group ">
                                    <label for="name">Name : </label>
                                    <span style="color: red"><?=(isset($input_erros['name']))?$input_erros['name']:''?></span>
                                    <input type="text" class="form-control" id="name" name="name" value="<?=(isset($name)) ? $name : (isset($row['Name']))?$row['Name']:'';?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image : </label>
                                    <span style="color: red"><?php
                                        if(isset($input_erros['invalidimage'])){
                                            echo $input_erros['invalidimage'];
                                        }

                                        ?></span>
                                   <div>
                                       <img src="../serverimages/<?=(isset($row['images']))?$row['images']:'userprofile.png'?>" alt="image" id="uploadPreview" width="100" height="70" style="margin-bottom: 5px; margin-left: 10px">
                                       <input type="file" class="form-control" id="profileimage" name="profileimage" onchange="PreviewImage();">
                                   </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <span style="color: red"><?=(isset($input_erros['username']))?$input_erros['username']:''?></span>
                                    <input type="text" class="form-control" id="username" name="username" value="<?=(isset($row['Username'])?$row['Username']:'')?>" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" class="form-control"  id="email" value="<?=(isset($row['Email'])?$row['Email']:'')?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="number">Number :</label>
                                    <span style="color: red"><?php
                                        if(isset($input_erros['emptynumber'])){
                                            echo $input_erros['emptynumber'];
                                        }elseif(isset($input_erros['invalidcountnumber'])){
                                            echo $input_erros['invalidcountnumber'];
                                        }elseif (isset($input_erros['invalidnumber'])){
                                            echo $input_erros['invalidnumber'];
                                        }

                                        ?></span>
                                    <input type="text" class="form-control" name="number" id="number" value="<?=(isset($row['Number'])?$row['Number']:'')?>" >
                                </div>
                                <div class="form-group">
                                    <label for="adress">Address :</label>
                                    <span style="color: red"><?php
                                        if(isset($input_erros['emptyadress'])){
                                            echo $input_erros['emptyadress'];
                                        }
                                        ?></span>
                                    <input type="text" class="form-control" name="address" id="address"  >
                                </div>
                                <div class="form-group ">
                                    <label for="oldpassword">Old Password :</label>
                                    <span id="results" style="color: red">
                                        <?php
                                            if (isset($oldpassmatch)){
                                                echo $oldpassmatch;
                                            }
                                        ?>
                                    </span>
                                    <div>

                                        <input type="password"    class="form-control" id="oldpassword" name="oldpassword" >
                                        <input type="checkbox" style="margin-top: 9px" id="passwords" onclick="passwordshow()"><span style="margin: 4px">Show Password</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="oldpassword">New Password :</label>
                                    <span id="results" style="color: red">
                                        <?php
                                            if (isset($errornewpass)){
                                                echo $errornewpass;
                                            }
                                        ?>
                                    </span>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword" >
                                </div>
                                <div class="form-group">
                                    <label for="oldpassword">Confrim Password :</label>
                                    <span id="results" style="color: red">
                                        <?php
                                        if (isset($erroconapss)){
                                            echo $erroconapss;
                                        }elseif (isset($notmatchcon)){
                                             echo $notmatchcon;
                                        }
                                        ?>
                                    </span>
                                    <input type="password" class="form-control" id="confrimpassword" name="confrimpassword" >
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="Submit"  class="btn btn-primary btn-block" id="delete" value="<?=$userid?>">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------WIDGETBOX Main Box----------------------------------------------------------->

</div>

<?php require_once('include/footer.php') ?>


<?php
    if (count($input_erros) == 0 && isset($_POST['Submit'])  ){

        $query = "UPDATE liberian SET Name = '$name', Username='$username',  Number = '$number', Address = '$address' WHERE id = $userid";

        if (isset($imagename)){
            $queryimage = "UPDATE liberian SET images = '$imagename' WHERE id = $userid";
            $imagesuccess = mysqli_query($con, $queryimage);
            move_uploaded_file($imagetmp,'../serverimages/'.$imagename);
        }
        if(isset($confirmpassword)){
            $queryp = "UPDATE liberian SET Password = $confirmpassword WHERE id = $userid";
            $pass =  mysqli_query($con,$queryp);
        }

        if (mysqli_query($con,$query)){

            ?>
            <script>
                $(document).ready(function () {
                    $("#alertx").show();
                    setTimeout(function () {
                        $("#alertx").hide();
                    },1500);

                    setTimeout(function () {
                        window.open("profile.php","_self");
                    },2000);
                })
            </script>

<?php        }

    }

?>

<script>



    function PreviewImage() {
        var oFReader = new FileReader();
        
        oFReader.readAsDataURL(document.getElementById("profileimage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function oldpassvalid(val) {
        var oldpassword = val;

        var id = document.getElementById('delete').value;


    //     $(document).ready(function () {
    //         $.ajax({
    //             url:'editprofilebackground.php',
    //             type:'post',
    //             data:{
    //                 pass : oldpassword,
    //                 lid:id
    //             },
    //             success:function (res) {
    //
    //
    //
    //                 if(res == 1){
    //                     $("#results").text("Valid");
    //                     // $("#oldpassword").closest(".form-group").addClass("has-success");
    //                     // $("#oldpassword").closest(".form-group").removeClass("has-error");
    //                 }else{
    //                     // $("#oldpassword").closest(".form-group").addClass("has-error");
    //                     $("#results").text("Invalid Password");
    //                 }
    //
    //
    //             }
    //         });
    //     })
    //
    // }



    }

    function passwordshow() {
        var pass = document.getElementById("passwords");

        if (pass.checked){
            document.getElementById('oldpassword').type = 'text';
        }else {
            document.getElementById('oldpassword').type = 'password';
        }

    }



</script>
