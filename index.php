    <?Php
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


    if (isset($_POST["btn_queueRegistrar"])) {
        mysqli_query($connections, "INSERT into cashier_queueing(Stud_Id, Stud_Name)VALUES('$user_id','$fullname')");
    }
    $get_record3 = mysqli_query($connections, "SELECT * FROM cashier_queueing WHERE Stud_Id = '$user_id'");
    $row3 = mysqli_fetch_assoc($get_record3);
    $Q_Cashier = $row3['Queueing_No'];

    // $get_record4= mysqli_query($connections, "SELECT * FROM cashier_queueing");
    // $row4 = mysqli_fetch_assoc($get_record4);
    // $Q_Cashier_Line = $row4['Queueing_No'];



} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Queue number</title>

    <?php @include('includes/css.php'); ?>

</head>

</html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php @include('includes/nav.php'); ?>


        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Queue Number Inline</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- =========================================================== -->

            <!-- Main content -->

            <section class="content">
                <!-- =========================================================== -->
                <!-- Office Queueing Number(Stat card) -->
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h1>CASHIER</h1>
                                <center>
                                    <hr>
                                    <h4>Now Serving</h4>
                                    <hr>
                                    <h1 class="queue-number"><?php echo "$Q_Cashier"; ?></h1>
                                    <br>
                                </center>
                            </div>
                            <form method="POST">
                                <center><button type="button" name="btn_queueRegistrar" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            </form>
                            <a href="get.php" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-12">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h1>REGISTRAR</h1>
                                <center>
                                    <hr>
                                    <h4>Now Serving</h4>
                                    <hr>
                                    <h1 class="queue-number"><?php echo "$Q_Cashier"; ?></h1>
                                    <br>
                                </center>
                            </div>
                            <form method="POST">
                                <center><button type="button" name="btn_queueRegistrar" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            </form>
                            <a href="get.php" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-12">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h1>ACCOUNTING</h1>
                                <center>
                                    <hr>
                                    <h4>Now Serving</h4>
                                    <hr>
                                    <h1 class="queue-number"><?php echo "$Q_Cashier"; ?></h1>
                                    <br>
                                </center>
                            </div>
                            <form method="POST">
                                <center><button type="button" name="btn_queueRegistrar" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            </form>
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-12">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h1>ADMISSION</h1>
                                <center>
                                    <hr>
                                    <h4>Now Serving</h4>
                                    <hr>
                                    <h1 class="queue-number"><?php echo "$Q_Cashier"; ?></h1>
                                    <br>
                                </center>
                            </div>
                            <form method="POST">
                                <center><button type="button" name="btn_queueRegistrar" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            </form>
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- =========================================================== -->
    </div>
    <!-- /.col -->
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-cashier">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 class="modal-title"><?php echo "$Q_Cashier"; ?></h1>
                <!-- <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div> -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Your Code End Here -->


    <?php @include('includes/js.php'); ?>
</body>

</html>