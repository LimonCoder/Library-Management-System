<?php session_start();

if (isset($_SESSION['username'])){
    header("location: index.php");
}


?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
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
            <h3 class="text-center">STUDENT LOGIN</h3>
        </div>

        <div class="box">
            <div id="alertx" class="alert alert-success collapse" role="alert" >
                <strong>Success!</strong> Sign-up Successfully
            </div>
            <div id="alerty" class="alert alert-danger collapse" role="alert">
                <strong>Failed</strong> ! Email  Incorrect
            </div>
            <div id="alertd" class="alert alert-danger collapse" role="alert">
                <strong>Failed</strong> ! Password  Incorrect
            </div>
            <div id="alertz" class="alert alert-warning collapse">
                <strong>Pending !</strong> Student Registration Not Active
            </div>
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="POST">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Email or Username" name="email">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Submit" value="Sign in" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group text-center">
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a>
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
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:37 GMT -->
</html>

<?php
require_once ('../include/db_connect.php');

if (isset($_POST['Submit'])){
    $signin_errors = array();
    if (!empty($_POST['email'])){
        $email = trim($_POST['email']);
    }else{
        $signin_errors['email'] = "*";
    }

    if (!empty($_POST['password'])){
        $password = trim($_POST['password']);
    }else{
        $signin_errors['password'] = "*";
    }

    if (count($signin_errors) == 0){
        $query1 = "SELECT * FROM students WHERE email = '$email' OR username = '$email'";
        $results = mysqli_query($con,$query1);
        $row = mysqli_fetch_assoc($results);
        $useremail = $row['email'];
        $username = $row['username'];
        $id = $row['id'];

        $query2 = "SELECT students.password FROM students WHERE email = '$useremail' OR username = '$username' ";
        $result2 = mysqli_query($con,$query1);
        $row2 = mysqli_fetch_assoc($results);
        $userpasswrod = $row['password'];


        if (( strcasecmp($email,$useremail) == 0 || strcasecmp($email,$username) == 0 ) ){

            if ( strcasecmp($password, $userpasswrod) == 0){

            if ( $row['status'] == 1){
                    $_SESSION['username'] =  $username ;
                    $_SESSION['userid'] =$id;
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#alertx").show();
                        setTimeout(function () {
                            $("#alertx").hide();
                        },3000);

                        setTimeout(function () {
                            window.open("index.php","_self");
                        },3000);
                    });

                  //  response.setIntHeader("Refresh", 1);

                </script>

        <?php    }else{ ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#alertz").show();
                        setTimeout(function () {
                            $("#alertz").hide();
                        },3000);
                    });

                </script>



         <?php   }



            }else{ ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#alertd").show();
                        setTimeout(function () {
                            $("#alertd").hide();
                        },2000);
                    });

                </script>

        <?php    }

            ?>


        <?php    }else{
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#alerty").show();
                    setTimeout(function () {
                        $("#alerty").hide();
                    },2000);
                });

            </script>
     <?php   }

    }

}

?>

