<?Php
session_start();
@include('includes/session.php');
@include('includes/profile.php');
$date1 = date("m-d-Y");
    // $get_record = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE Stud_Id = '$user_id'  ");
    $get_record = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE Stud_Id = '$user_id'");
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
                                <!-- <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li> -->
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

      <!--Main content =========================================================== -->
      <section class="content">
        <div class="row">
         
    </section>
  </div>
  <!-- =========================================================== -->
</div>
</div>

<!-- Code End Here -->


    <?php @include('includes/js.php'); ?>
</body>

</html>