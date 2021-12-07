<?Php
session_start();
 @include('includes/session.php');
@include('includes/profile.php');

$result = mysqli_query($connections, "SELECT * FROM cashier_transaction Where Stud_Id = $user_id")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction History</title>

    <?php @include('includes/css.php'); ?>


</head>

</html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php @include('includes/nav.php'); ?>

        <div class="container-fluid">

            <!--  Start Code Here =========================================================== -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </section> -->

                <!--Main content =========================================================== -->

                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper rounded">
                                <nav class="navbar navbar-expand-lg  d-lg-flex align-items-lg-start">
                                    <a class="navbar-brand" href="#">Transactions History
                                        <p class="text-muted pl-1">Welcome to your Transactions History</p>
                                    </a> 
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
                                     </button>
                                </nav>
                                
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <ul class="nav nav-tabs w-75">
                                            <a href="form.html" class="nav-link "></a>
                                        </ul> 
                                        <button class="btn btn-primary">Check Account Balance</button>
                                    </div>
                                    
            <div class="table-responsive">
                <div class="col-sm-12">
                <table class="table table-bordered" id='report-list'>
                    <thead>
                        <tr>
                            <!-- <th class="text-center">#</th> -->
                            <th class="">Transaction No.</th>
                            <th class="">Invoice No.</th>
                            <th class="">Certification</th>
                            <th class="">Price</th>
                            <th class="">Date</th>
                            <th class="">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                ?>
                                                        <?php
                                                       
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        
                                                        ?>
                                                            <tr>
                                                               
                                                                <td > <?php echo $row["Trans_No"]; ?></td>
                                                                <td > <?php echo $row["invoice_no"]; ?></td>
                                                                <td > <?php echo $row["certificate"]; ?></td>
                                                                <td > <?php echo $row["total_amount"]; ?></td>
                                                                <td > <?php echo $row["date"]; ?></td>
                                                                <td>
                        <button class="btn-sm btn-danger" style="width: 100px;" type="button" id="print"><i class="fa fa-file-pdf"></i> Download</button>
                        <button class="btn-sm btn-success" style="width: 100px;"  type="button" id="print"><i class="fa fa-print"></i> Print</button>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                          
                                                        }
                                                        ?>
                                                <?php
                                                } else {?>
                                                <tr>
                                                    <td colspan="6"><center> 
                                                        <?php echo "No result found"; ?>
                                                    </center></td>
                                                </tr>
                                                    
                                                <?php 
                                                    echo "No result found";
                                                }
                                                ?>
                    
			        </tbody>

                    <tfoot>
                        <tr>
                            <!-- <th colspan="5" class="text-right">Total Amount</th> -->
                            
                            
                        </tr>
                    </tfoot>
                </table>
                <hr>
                
            </div>
                               
                                        
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- =========================================================== -->
    
    <!-- Code End Here -->

<?php @include('includes/js.php'); ?>
<script src="assets/DataTables/datatables.min.js"></script>
</body>
</html>