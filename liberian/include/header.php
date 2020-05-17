<?php
    session_start();
    if (!isset($_SESSION['UserName'])){
        header("location: adminlogin.php");
    }
    $con = mysqli_connect("localhost","root","","lms");
    if (!$con){
        die("Database connection faild");
    }
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");

    $pagelocation = $_SERVER['PHP_SELF'];
    $pages = explode("/",$pagelocation);
    $activpage = end($pages);
    $activpage;




?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Super Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/icon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/icon16.png">
    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href=../assets/"vendor/pace/pace-theme-minimal.css" rel="stylesheet" />


    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/cvendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">

<!--    <link href=-->
<!--          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'-->
<!--          rel='stylesheet'>-->
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    <style>
        .page-header {
            height: 89px;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            padding: 12px 5px;
            margin: 0;
            border: none;
        }
        .page-header .leftside-header .logo {
            width: 530px;
            height: 50px;
            position: relative;
            display: inline-block;
        }

        ul#main-nav > li.active-item > a {
            /* -webkit-box-shadow: 2px -1px 0 #189279 inset !important; */
            /* box-shadow: 2px -1px 0 #189279 inset !important; */
            border-bottom-left-radius: 5px;
            background: #131313;

            color: #ffffff;
            background-color: #1fbe9d;
        }



        .logo h3 {
            font-family: "Times New Roman";
            color: #1fbe9d;
            font-size: 33px;
            text-align: center;
            text-shadow: 1px 1px 1px #f5f5f5;
        }
    </style>


</head>

<body style="font-family: 'Times New Roman'">
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <h3 class="display-1">SUPER ADMIN</h3>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->

            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <?php
                        $id =  $_SESSION['Userid'];

                        $resutls = mysqli_query($con, "SELECT * FROM liberian WHERE id = $id");

                        $row = mysqli_fetch_array($resutls);
                        ?>

                        <img alt="profile photo" src="../serverimages/<?=$row['images']?>" width="70" height="50" />
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php
                                $name =explode(" ", $row['Name']);
                                echo $name[0];
                            ?></span>
                        <span class="user-profile">Admin</span>
                    </div>

                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title text-center" style="font-size: 20px; color: whitesmoke ">Menu</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class="<?=($activpage == 'index.php')?'active-item':''?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <li class="<?=($activpage == 'students.php')?'active-item':''?>"><a href="students.php"><i class="fa fa-user" aria-hidden="true"></i><span>Students</span></a></li>
                            <li class="has-child-item <?= ($activpage == "addbook.php" ||$activpage == "booklist.php" || $activpage == "uploadcsv.php" )?"open-item":"close-item"?> ">
                                <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                <ul class="nav child-nav level-1" style="">
                                    <li class="<?= ($activpage == "addbook.php")?"active-item":""?> <?= ($activpage == "addbook.php")?"bg-primary":""?> <?= ($activpage == "addbook.php")?"border border-light":""?> "><a href="addbook.php">Add Book</a></li>
                                    <li class="<?= ($activpage == "booklist.php")?"active-item":""?> <?= ($activpage == "booklist.php")? "bg-primary":""?>"><a href="booklist.php">Book List</a></li>
                                    <li class="<?= ($activpage == "uploadcsv.php")?"active-item":""?> <?= ($activpage == "uploadcsv.php")? "bg-primary":""?>"><a href="uploadcsv.php">Upload Csv</a></li>
                                </ul>
                            </li>
                            <li class="<?=($activpage == 'issuebook.php')?'active-item':''?>"><a href="issuebook.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                            <li class="<?=($activpage == 'returnbook.php')?'active-item':''?>"><a href="returnbook.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                            <li class="<?=($activpage == 'record.php')?'active-item':''?>"><a href="record.php"><i class="fa fa-book" aria-hidden="true"></i><span>Record</span></a></li>
                            <li class="<?=($activpage == 'admin.php')?'active-item':''?>"><a href="admin.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Admin</span></a></li>




                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">
            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header bg-light">
                <!-- leftside content header -->

            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <div class="row">
                <div class="col-sm-12 ">