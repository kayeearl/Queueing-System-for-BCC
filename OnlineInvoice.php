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

    $get_record3 = mysqli_query($connections, "SELECT * FROM cashier_transaction WHERE Stud_Id = '$user_id'");
    $row3 = mysqli_fetch_assoc($get_record3);
    $trans_no = $row3['Trans_No'];
    $purpose = $row3['purpose'];
    $quantity = $row3['quantity'];
    $total_amount = $row3['total_amount'];
    $date = $row3['date'];
} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
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


        <!--  Start Your Code Here =========================================================== -->
        <!-- Main content -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5>
                                    <i class="fas fa-info"></i> Note:
                                </h5>
                                This page has been enhanced for printing. Click the print button at the bottom of the invoice to print.
                            </div>


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <small class="float-right">Date: <?php echo "$date"; ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">

                                        <address>
                                            <strong><?php echo "$fullname"; ?></strong>
                                            <br> <b>Student Number:</b> <?php echo "$user_id"; ?>

                                        </address>
                                    </div>


                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <?php if (mysqli_num_rows($get_record3) > 0) {
                                    ?>
                                        <table class="table table-striped">
                                      
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Product</th>
                                                    <th>Transaction Number</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                           

                                                <?php
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Trans_No']; ?></td>
                                                        <td><?php echo $row['purpose']; ?></td>
                                                        <td><?php echo $row['quantity']; ?></td>
                                                        <td><?php echo $row['total_amount']; ?></td>       
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                    
                                        </table>
                                    <?php
                                    } else {
                                        echo "No result found";
                                    }
                                    ?>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="dist/img/credit/visa.png" alt="Visa">
                                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="dist/img/credit/american-express.png" alt="American Express">
                                    <img src="dist/img/credit/paypal2.png" alt="Paypal">

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra.
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
                        <!-- /.invoice -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Your Code End Here -->


    <?php @include('includes/js.php'); ?>
</body>

</html>