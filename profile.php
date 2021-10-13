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
    $db_Stud_ID = $row["Stud_Id"];
    $db_Stud_Prog = $row["Stud_Program"];
    $db_contact = $row["Stud_Contact"];
    $db_address = $row["Stud_Address"];
    $db_email = $row["Stud_Email"];

    $get_record2 = mysqli_query($connections, "SELECT * FROM login_credentials WHERE email = '$user_id'");
    $row2 = mysqli_fetch_assoc($get_record2);
    $profile_pic = $row2['profile_pic'];

    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_last_name);

    if (isset($_POST["btnUpdate"])) {
        $new_email = $_POST['email'];
        $new_address = $_POST['address'];
        $new_contact = $_POST['contact'];
        mysqli_query($connections, "UPDATE student SET Stud_Email = '$new_email', Stud_Address = '$new_address', Stud_Contact = '$new_contact' WHERE Stud_Id = '$user_id'");
    }
} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
        <?php @include('includes/nav.php'); ?>





        <!-- Start Your Code Here -->
        <!-- =========================================================== -->
        <!-- Main content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User's Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- =========================================================== -->

        <!-- Main content -->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body {
                font-family: Arial;
                font-size: 17px;
                padding: 8px;
            }

            * {
                box-sizing: border-box;
            }

            .avatar {
                vertical-align: middle;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }

            .row {
                display: -ms-flexbox;
                /* IE10 */
                display: flex;
                -ms-flex-wrap: wrap;
                /* IE10 */
                flex-wrap: wrap;
                margin: 0 -16px;
            }

            .col-25 {
                -ms-flex: 25%;
                /* IE10 */
                flex: 25%;
            }

            .col-50 {
                -ms-flex: 50%;
                /* IE10 */
                flex: 50%;
            }

            .col-75 {
                -ms-flex: 75%;
                /* IE10 */
                flex: 75%;
            }

            .col-25,
            .col-50,
            .col-75 {
                padding: 0 16px;
            }

            .container {
                background-color: #f2f2f2;
                padding: 5px 20px 15px 20px;
                border: 1px solid lightgrey;
                border-radius: 3px;
            }

            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            label {
                margin-bottom: 10px;
                display: block;
            }

            .icon-container {
                margin-bottom: 20px;
                padding: 7px 0;
                font-size: 24px;
            }

            .btn {
                background-color: #04AA6D;
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 100%;
                border-radius: 3px;
                cursor: pointer;
                font-size: 17px;
            }

            .btn:hover {
                background-color: #45a049;
            }

            a {
                color: #2196F3;
            }

            hr {
                border: 1px solid lightgrey;
            }

            span.price {
                float: right;
                color: grey;
            }

            /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
            @media (max-width: 800px) {
                .row {
                    flex-direction: column-reverse;
                }

                .col-25 {
                    margin-bottom: 20px;
                }
            }

            input[type=submit] {
                width: 100%;
                background-color: #0704aa;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
        </head>

        <body>
            <!-- Content Header (Page header) -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>User's Profile</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo "$profile_pic"; ?>" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?php echo "$fullname"; ?></h3>



                                        <a href="#" class="btn btn-primary btn-block"><b><?php echo "$db_Stud_ID"; ?></b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Course</strong>
                                        <p class="text-muted">
                                            <?php echo "$db_Stud_Prog"; ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Permanent Address</Address></strong>

                                        <p class="text-muted"><?php echo "$db_address"; ?></p>

                                        <hr>

                                        <strong><i class="fas fa-envelope-alt mr-1"></i> Email Address</strong>

                                        <p class="text-muted">
                                            <span class="tag tag-danger"><?php echo "$db_email"; ?></span>

                                        </p>

                                        <hr>

                                        <strong><i class="far fa-file-alt mr-1"></i> Contact Number</strong>

                                        <p class="text-muted"><?php echo "$db_contact"; ?></p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">

                                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                                <!-- Post -->

                                                <!-- END timeline item -->

                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" method="POST">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name </label>
                                                    <label for="inputName" class="col-sm-10 col-form-label"><?php echo "$fullname"; ?></label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Student ID</label>
                                                    <label for="inputName" class="col-sm-10 col-form-label"><?php echo "$db_Stud_ID"; ?></label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Course </label>
                                                    <label for="inputName" class="col-sm-10 col-form-label"><?php echo "$db_Stud_Prog"; ?></label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName2" placeholder="example@cspc.edu.ph" name="email" value="<?php echo $db_email; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" name="address" value="<?php echo $db_address; ?>"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Contact Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputSkills" placeholder="+693" name="contact" value="<?php echo $db_contact; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" name="btnUpdate" class="btn btn-danger" value="Update">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
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