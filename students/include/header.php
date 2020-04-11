<?php

    session_start();

    if (!isset($_SESSION['username'])){
        header("location: login.php");
    }


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
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
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
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">

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
            border: 1px solid #e2dddd;
            color: #ffffff;
        }
        ul#main-nav > li.active-item > a {
            /* -webkit-box-shadow: 2px -1px 0 #189279 inset !important; */
            /* box-shadow: 2px -1px 0 #189279 inset !important; */
            /* border-bottom-left-radius: 5px; */
            background: #131313;
            border: 1px solid #e2dddd;
            color: #ffffff;
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

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <h3 class="display-1">LIBERY MANAGMENT SYSTEM</h3>
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
                        <img alt="profile photo" src="../assets/images/avatar/limon.jpg" />
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?= strtoupper($_SESSION['username']);?></span>
                        <span class="user-profile">Admin</span>
                    </div>

                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

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
                            <li class="<?=($activpage == 'Test.php')?'active-item':''?>"><a href="Test.php"><i class="fa fa-home" aria-hidden="true"></i><span>Test</span></a></li>




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