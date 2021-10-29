<?Php
    @include('includes/session.php');
    @include('includes/profile.php');
    $user_id =  $_SESSION['Stud_Id'];
        $sql1 = "SELECT * FROM accounts where Stud_Id = '$user_id'";
        $result1 = mysqli_query($connections,$sql1);
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $account_type =  $row1['account_type'];
        $account_id = $row1['Stud_Id'];
$sql2 = "SELECT * FROM queueing_list where Stud_Id = '$user_id'";
        $result2 = mysqli_query($connections,$sql2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

        $transaction_id =  $row2['transaction_id'];

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
          <?php
           @include('includes/nav.php'); 
           ?>

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
<form method="post">
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
                                    <h1 class="queue-number"> <?php 
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier'";
                                        $result = mysqli_query($connections,$sql);
                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                    ?>  </h1>
                                    <br>
                                </center>
                            </div>

                                <center><button type="submit" name="cashier" class="btn btn-default">
                                        Get Queue Number
                                    </button></center>
                                <br>
                        
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                                 <p><?php echo  $transaction_id ?></p>
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
                                    <h1 class="queue-number"><?php 
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'registrar'";
                                        $result = mysqli_query($connections,$sql);
                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                    ?></h1>
                                    <br>
                                </center>
                            </div>
                           
                                <center><button name="registrar" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                           
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
                                    <h1 class="queue-number"><?php 
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'accounting'";
                                        $result = mysqli_query($connections,$sql);
                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                    ?></h1>
                                    <br>
                                </center>
                            </div>
                            
                                <center><button name="accounting" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            
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
                                    <h1 class="queue-number"><?php 
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'admission'";
                                        $result = mysqli_query($connections,$sql);
                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                    ?></h1>
                                    <br>
                                </center>
                            </div>
                            
                                <center><button name="admission" class="btn btn-default" data-toggle="modal" data-target="#modal-cashier">
                                        Get Queue Number
                                    </button></center>
                                <br>
                            
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
   </form>             
                <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- =========================================================== -->
     </div>
    </div>
    
    <?php @include('includes/js.php'); ?>
    <?php @include('includes/queueing.php');?>
</body>

</html>
