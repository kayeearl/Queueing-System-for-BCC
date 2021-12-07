<?Php
    @include('includes/session.php');
    @include('includes/profile.php');
    $user_id =  $_SESSION['Stud_Id'];
//       
@session_start();
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
                </div>
            </section>
            <!-- =========================================================== -->

            <!-- Main content -->
            <section class="content">
                <?php
                    if (!empty($_SESSION['alert']))
                    {
                        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        '.$_SESSION['alert'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $_SESSION['alert']="";
                    }
                
                ?>
                 
                <!-- =========================================================== -->
                <!-- Office Queueing Number-->
                <div class="row">
                    
                    <div class="col-lg-3 col-12">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h1>CASHIER</h1>
                                <center>
                                    <hr>
                                    <h4>Transaction Number</h4>
                                    <hr>
                                    <h1 class="queue-number"> <?php 
                                         $id = $_SESSION['Stud_Id'];
                                         $date = date("Y-m-d");
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier' and Stud_Id='$id' and date_transaction='$date'  order by id DESC LIMIT 1";
                                        $result = mysqli_query($connections,$sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           echo $counter  = $row['transaction_id'].'<br>';
                                        }
                                        // $count = mysqli_num_rows($result);
                                        
                                    ?>  </h1>
                                    <br>
                                </center>
                            </div>
                                <form method="POST" action="get_cashier.php">
                                <center><button type="submit" name="cashier" class="btn btn-default">
                                        Get Queue Number
                                    </button></center>
                                <br>
                                </form>
                        
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                                
                            </a>
                        </div>
                    </div>
            <!-- ________________________________________________________ -->
                    <div class="col-lg-3 col-12">
                        <!-- small card -->
                         <div class="small-box bg-success">
                            <div class="inner">
                                <h1>REGISTRAR</h1>
                                <center>
                                    <hr>
                                    <h4>Transaction Number</h4>
                                    <hr>
                                    <h1 class="queue-number"> <?php 
                                         $id = $_SESSION['Stud_Id'];
                                         $date = date("Y-m-d");
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'registrar' and Stud_Id='$id' and date_transaction='$date'  order by id DESC LIMIT 1";
                                        $result = mysqli_query($connections,$sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           echo $counter  = $row['transaction_id'].'<br>';
                                        }
                                        // $count = mysqli_num_rows($result);
                                        
                                    ?>  </h1>
                                    <br>
                                </center>
                            </div>
                                <form method="POST" action="get_cashier.php">
                                <center><button type="submit" name="registrar" class="btn btn-default">
                                        Get Queue Number
                                    </button></center>
                                <br>
                                </form>
                        
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                                
                            </a>
                        </div>
                    </div>
                   <!-- ________________________________________________________ -->
                    <div class="col-lg-3 col-12">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h1>ACCOUNTING</h1>
                                <center>
                                    <hr>
                                    <h4>Transaction Number</h4>
                                    <hr>
                                    <h1 class="queue-number"> <?php 
                                         $id = $_SESSION['Stud_Id'];
                                         $date = date("Y-m-d");
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'accounting' and Stud_Id='$id' and date_transaction='$date'  order by id DESC LIMIT 1";
                                        $result = mysqli_query($connections,$sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           echo $counter  = $row['transaction_id'].'<br>';
                                        }
                                        // $count = mysqli_num_rows($result);
                                        
                                    ?>  </h1>
                                    <br>
                                </center>
                            </div>
                                <form method="POST" action="get_cashier.php">
                                <center><button type="submit" name="accounting" class="btn btn-default">
                                        Get Queue Number
                                    </button></center>
                                <br>
                                </form>
                        
                            <a href="#" class="small-box-footer">
                                <p>Please standby for the next transaction number <i class="fas fa-arrow-circle-right"></i></p>
                                
                            </a>
                        </div>
                    </div>
                    <!-- ________________________________________________________ -->
                 <div class="col-lg-3 col-12">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                             <div class="inner">
                                <h1>ADMISSION</h1>
                                <center>
                                    <hr>
                                    <h4>Transaction Number</h4>
                                    <hr>
                                    <h1 class="queue-number"> <?php 
                                         $id = $_SESSION['Stud_Id'];
                                         $date = date("Y-m-d");
                                        $sql = "SELECT * FROM queueing_list where transaction_type = 'admission' and Stud_Id='$id' and date_transaction='$date'  order by id DESC LIMIT 1";
                                        $result = mysqli_query($connections,$sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           echo $counter  = $row['transaction_id'].'<br>';
                                        }
                                        // $count = mysqli_num_rows($result);
                                        
                                    ?>  </h1>
                                    <br>
                                </center>
                            </div>
                                <form method="POST" action="get_cashier.php">
                                <center><button type="submit" name="admission" class="btn btn-default">
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
            </section>     
   <!-- </form>             -->
        </div>
        <!-- =========================================================== -->
     </div>
    </div>
    
    <?php @include('includes/js.php'); ?>
    <?php @include('includes/queueing.php');?>
</body>

</html>
