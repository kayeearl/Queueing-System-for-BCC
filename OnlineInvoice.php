<?Php
session_start();
@include('includes/session.php');
@include('includes/profile.php');
$date1 = date("m-d-Y");
    // $get_record = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE Stud_Id = '$user_id'  ");
    $get_record = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE Stud_Id = '$user_id' ORDER BY Trans_No DESC;");
    $row = mysqli_fetch_assoc($get_record);
    $trans_no = $row['Trans_No'];
    $invoice_num = $row['invoice_no'];
    $certificate = $row['certificate'];
    $other = $row['other_cert'];
    $quantity = $row['quantity'];
    $total_amount = $row['total_amount'];
    $date = $row['date'];
   
$date = $date1;
    // $result = mysqli_query($connections,$sql);
      
   


    // `Trans_No`, `Stud_Id`, `invoice_no`, `certificate`, `other_cert`, `quantity`, `total_amount`, `date` 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Payment</title>

    <?php @include('includes/css.php'); ?>


</head>

</html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php @include('includes/nav.php'); ?>


       <!--  Start Code Here =========================================================== -->
    <div class="content-wrapper">
      <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1> Online Invoice</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

      <!--Main content =========================================================== -->
      <section class="content">
        <div class="row">
          <div class="col-lg-1"></div>

          <div class="col-lg-10 card ">
            <!-- =========================================================== -->
            <div class="card-header" style=" border-style: hidden;">
              <h3><strong>Online Invoice</strong></h3>
              <!-- <p>Please check and choose the quantity needed:</p> -->
              <div class="d-flex justify-content-between align-items-center mt-0">
                <ul class="nav nav-tabs w-75">
                </ul> <a href="OnlinePayment.php"> <button class="btn btn-primary">Transaction</button></a>
              </div>
              <br>

                <!-- <div class="row ">
                  <div class=" col-sm-12">
                    <div class="card-body p-0">
                      
                  </div>
                </div>
            </div> -->

             <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-md-10">
                                        <br>
                                        <h6><strong>Camarines Sur Polytechnic </strong></h6>
                                        <h6>Republic of the Philippines</h6>
                                        <h6>Nabua, Camarines</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <center><img src="dist/img/logo.png" style="width:100px;"></center>
                                        
                                    </div>
                                    
                                    <!-- /.col -->
                                </div>
                                <hr>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-8 invoice-col">
                                       
                                        <address>
                                            <strong>Name: </strong><?php echo $fullname; ?>
                                            <br><strong>Student Number: </strong><?php echo $user_id; ?>
                                            <br><strong>Course & Section: </strong>
                                            
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <br><strong>Invoice No.: </strong><?php echo $invoice_num; ?>
                                            <br><strong>Date: </strong><?php echo $date; ?>
                                        </address>
                                    </div>
                                    
                                </div>
                                <!-- /.row -->

                                <!-- // `Trans_No`, `Stud_Id`, `invoice_no`, `certificate`, `other_cert`, `quantity`, `total_amount`, `date`
 -->
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Transaction #</th>      
                                                    <th>Certificate</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                    <?php 
                                                    
                                                    $res = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE invoice_no ='$invoice_num' order by Trans_No desc ");
                                                    //  $check_account =mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE invoice_no ='$invoice_num'  order by Trans_No desc ");
                                                    
                                                    //     if (mysqli_num_rows($check_account)>0) {
                                                    while ($rows = mysqli_fetch_array($res))
                                                        {
                                                            $trans_no = $rows['Trans_No'];
                                                             $invoice_num = $rows['invoice_no'];
                                                              $certificate = $rows['certificate'];
                                                              $other = $rows['other_cert'];
                                                              $quantity = $rows['quantity'];
                                                              $total_amount = $rows['total_amount'];
                                                              $date = $rows['date'];
                                                         ?>
                                                         <td><?php echo $quantity." - ".$invoice_num;?></td>
                                                    <td><?php echo $trans_no;?></td>
                                                    <td><?php echo $certificate;?></td>
                                                    <td><?php echo $total_amount;?></td>
                                                    
                                                     </tr>

<?php
                                                        // }
                                                     }
                                                    ?>
                                                    
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        
                                        
                                        <img src="dist/img/gcash.png" alt="GCash" style="width:35px;">
<button class="btn btn-primary">
    <h6>Gcash</h6>
</button>
<button class="btn btn-default">
    <h6> <i class="fa fa-money-bill-wave"> Over-the-Counter</i></h6>
</button>
    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        
    </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Amount Due 2/22/2014</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>$250.30</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (9.3%)</th>
                                                    <td>$10.34</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping:</th>
                                                    <td>$5.80</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>$265.24</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default">
                                            <i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right">
                                            <i class="far fa-credit-card"></i> Submit Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
          </div>
        </div>
      </div>



    </section>
  </div>
  <!-- =========================================================== -->
</div>
</div>

<!-- Code End Here -->


    <?php @include('includes/js.php'); ?>
</body>

</html>