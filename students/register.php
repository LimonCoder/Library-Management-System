<?php
ob_start();
include ('../include/db_connect.php');


if (isset($_POST['Submit'])){
    $input_errors = array();


    // fast name validation
    if (!empty( $_POST['fname'])){
        $fname = $_POST['fname'];
    }else{
        $input_errors['fname'] = "fast name required";
    }
    // last name validation
    if (!empty( $_POST['lname'])){
        $lname = $_POST['lname'];
    }else{
        $input_errors['lname'] = "last name required";
    }
    // roll validation
    if (!empty($_POST['roll'])){
        if (is_numeric($_POST['roll'])){
            $roll = $_POST['roll'];
        }else{
            $input_errors['rollinvalid'] = "Roll No. must be Number type";
        }
    }else{
        $input_errors['rollempty'] = "Roll No.  required";
    }
    // Reg No. validation
    if (!empty($_POST['Reg'])){
        if (is_numeric($_POST['Reg'])){
            $reg = $_POST['Reg'];
        }else{
            $input_errors['reginvalid'] = "Reg No. must be Number type";
        }
    }else{
        $input_errors['Regempty'] = "Reg No.  required";
    }
    // Email Validation
    if (!empty($_POST['email'])){
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        }else{
            $input_errors['emailinvalid'] = "Email not be valid";
        }
    }else{
        $input_errors['emailempty'] = "Email  required";
    }

    // Username Validation
    if (!empty($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $input_errors['usernameempty'] = "username  required";
    }

    // Number validation
    if (!empty($_POST['number'])){
       if (is_numeric($_POST['number'])){
          if (validate_mobile($_POST['number'])){
              $number = $_POST['number'];
          }else{
              $input_errors['numberinvalid'] = "This is not a number";
          }
       }else{
           $input_errors['numbertype'] = "Phone number Not a Character";
       }
    }else{
        $input_errors['numberempty'] = "Phone Number  required";
    }

    //  password Validation
    if (!empty($_POST['password'])){
        if (strlen($_POST['password']) > 6){
            $password = $_POST['password'];
        }else{
            $input_errors['passwordlength'] = "Password must be grathen than 6";
        }
    }else{
        $input_errors['passwordempty'] = "Password   required";
    }

    // Confirm password Validation
    if (!empty($_POST['cpassword'])){
        $cpassword = $_POST['cpassword'];
    }else{
        $input_errors['confirmpasswordempty'] = "Password Number  required";
    }

    if (count( $input_errors) == 0){
        $email_check = mysqli_query($con,"SELECT * FROM students WHERE email =  '$email' ");
        if (mysqli_num_rows( $email_check) == 0){
            $username_check = mysqli_query($con,"SELECT * FROM students WHERE username =  '$username' ");
            if (mysqli_num_rows($username_check) == 0){
                if ($password ==  $cpassword){
                    $query = "INSERT INTO students VALUES(NULL, '$fname', '$lname', $roll,$reg,'$email','$username','$number','$password',0,NULL)";
                    $success = mysqli_query($con,$query);



                }else{
                    $input_errors['passwordmatch'] = "password don't match";
                }
            }else{
                $input_errors['usernameduplicate'] = "This username Already Registried";
            }
        }else{
            $input_errors['emailduplicate'] = "This Email Already Registried";

        }




    }

}
function validate_mobile($mobile)
{
    return preg_match('/01[3|4|6|7|8|9][0-9]{8}/', $mobile);
}


?>





<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
           <h3 class="display-3 text-center">STUDENT REGISTRATION</h3>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div id="alertx" class="alert alert-success collapse" role="alert" >
              Success !Registration Successfully
            </div>
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="post">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Fast Name" name="fname" value="<?= isset($fname)?$fname:"" ?>">
                                <i class="fa fa-user"></i>

                            </span>
                            <?php
                                 if (isset($input_errors['fname'])){
                                     echo '<span class="input_error">'.$input_errors['fname'].'</span>';
                                 }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Last Name" name="lname" value="<?= isset($lname)?$lname:"" ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['lname'])){
                                echo '<span class="input_error">'.$input_errors['lname'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Roll No" name="roll" value="<?= isset($roll)?$roll:"" ?>">
                                <i class="fa fa-list-ol"></i>
                            </span>
                            <?php
                            if (isset($input_errors['rollempty'])){
                                echo '<span class="input_error">'.$input_errors['rollempty'].'</span>';
                            }elseif (isset($input_errors['rollinvalid'])){
                                echo '<span class="input_error">'.$input_errors['rollinvalid'].'</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Reg No." name="Reg" value="<?= isset($reg)?$reg:"" ?>">
                                 <i class="fa fa-list-ol"></i>
                            </span>
                            <?php
                            if (isset($input_errors['Regempty'])){
                                echo '<span class="input_error">'.$input_errors['Regempty'].'</span>';
                            }elseif (isset($input_errors['reginvalid'])){
                                echo '<span class="input_error">'.$input_errors['reginvalid'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Email" name="email" value="<?= isset($email)?$email:"" ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['emailempty'])){
                                echo '<span class="input_error">'.$input_errors['emailempty'].'</span>';
                            }elseif (isset($input_errors['emailinvalid'])){
                                echo '<span class="input_error">'.$input_errors['emailinvalid'].'</span>';
                            }elseif (isset($input_errors['emailduplicate'])){
                                echo '<span class="input_error">'.$input_errors['emailduplicate'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="User Name" name="username" value="<?= isset($username)?$username:"" ?>">
                                <i class="fa fa-users"></i>
                            </span>
                            <?php
                            if (isset($input_errors['usernameempty'])){
                                echo '<span class="input_error">'.$input_errors['usernameempty'].'</span>';
                            }elseif (isset($input_errors['usernameduplicate'])){
                                echo '<span class="input_error">'.$input_errors['usernameduplicate'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="01*********" name="number" value="<?= isset($number)?$number:"" ?>">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </span>
                            <?php
                            if (isset($input_errors['numberempty'])){
                                echo '<span class="input_error">'.$input_errors['numberempty'].'</span>';
                            }elseif (isset($input_errors['numbertype'])){
                                echo '<span class="input_error">'.$input_errors['numbertype'].'</span>';
                            }elseif (isset($input_errors['numberinvalid'])){
                                echo '<span class="input_error">'.$input_errors['numberinvalid'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?= isset($password)?$password:"" ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if (isset($input_errors['passwordempty'])){
                                echo '<span class="input_error">'.$input_errors['passwordempty'].'</span>';
                            }elseif (isset($input_errors['passwordlength'])){
                                echo '<span class="input_error">'.$input_errors['passwordlength'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword"  value="<?= isset($cpassword)?$cpassword:"" ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if (isset($input_errors['confirmpasswordempty'])){
                                echo '<span class="input_error">'.$input_errors['confirmpasswordempty'].'</span>';
                            }elseif (isset($input_errors['passwordmatch'])){
                                echo '<span class="input_error">'.$input_errors['passwordmatch'].'</span>';
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="Submit" value="Register" class="btn btn-primary btn-block">
                            <button class="btn btn-primary btn-block" onclick="location.reload();" >Reset</button>

                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<script src="../assets/javascripts/main.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>

<?php
    if (isset($success)){ ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#alertx").show();
            setTimeout(function () {
                $("#alertx").hide();
            },2000);
        });

    </script>
<?php

    }else{
    echo "Insert Faild";
}


