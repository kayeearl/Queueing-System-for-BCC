<?php
session_start();
include("Database.php");
if (isset($_SESSION["Stud_Id"])) {
    $user_id = $_SESSION["Stud_Id"];
    $get_record = mysqli_query($connections, "SELECT * FROM student WHERE Stud_Id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_firstname = $row['Stud_Fname'];
    $db_middle_name = $row["Stud_Mname"];
    $db_last_name = $row["Stud_Lname"];
    $get_record2 = mysqli_query($connections, "SELECT * FROM login_credentials WHERE email = '$user_id'");
    $row2 = mysqli_fetch_assoc($get_record2);
    $profile_pic = $row2['profile_pic'];


    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_last_name);
} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Queue Number</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- style -->
    <link rel="stylesheet" href="dist/css/style.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.html" class="nav-link">Queueing Section</a>
                </li>
            </ul>
            <!-- =========================================================== -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        Logout
                        <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- =========================================================== -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-color sidebar-dark-blue elevation-4">

            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
                <img src="dist/img/logo.png" alt="CSPC" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">C S P C </span>
            </a>
            <!-- Sidebar UserName -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="profile.html" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Queueing Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="GetQueueNumber.html" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Get Queueing Number</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Check Queue Position</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-money-bill-alt" aria-hidden="true"></i>
                                <p>
                                    Cashier Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="form.html" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pay Online</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="transaction.html" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction History</p>
                                    </a>
                                </li>
                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Start Your Code Here -->
        <!-- =========================================================== -->
        <!-- Main content -->
        <div class="content-wrapper">
            <div>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>My Queue Number</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- =========================================================== -->
                <!-- Main content -->
                <section class="content">
                    <!-- Start of new design -->
                    <div class="center-myqueue">
                        <div class="container">
                            <!-- small card -->
                            <h1>Your Queue Position : 100</h1>
                            <h3>Please wait... We will notify you if its your turn. Thank you</h3>
                        </div>
                    </div>
                </section>
                <!-- =========================================================== -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- Your Code End Here -->


        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
</body>

</html>