<?Php
session_start();
@include('includes/session.php');
@include('includes/profile.php');

if (isset($_POST["btnRequest"])) {
  // $date = date("Y-m-d");
  $certificates = $_POST['certificates'];
  $auth_cert = $_POST["auth_cert"];
  $cog = $_POST["cog"];
  $other_cert = $_POST["other_cert"];
  $auth_cert_total = 10 * $auth_cert;
  $cog_total = 30 * $cog;
      
  $invoice_query =("SELECT Trans_No FROM cashier_transaction");
   $res = mysqli_query($connections, $invoice_query);
   $last_id = 0;
   while ($row = mysqli_fetch_array($res)){
     $last_id = $row['Trans_No'];
   }
   $next_id = $last_id + 1;
   $prefix = "2020-2021";
   $invoice_num = $prefix ."-".sprintf('%06d',$next_id);
     
if (!EMPTY($certificates)) {
  foreach ($certificates as $cert_name) {
      if($cert_name == "Authentication of Grades"){
        $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`, `quantity`, `total_amount`) 
      VALUES ('$user_id', '$invoice_num', '$cert_name', $auth_cert, $auth_cert_total)";
      $query_insert = mysqli_query($connections, $query); 
      }if($cert_name == "Certification of Grades"){
        $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`,  `quantity`,`total_amount`) 
      VALUES ('$user_id', '$invoice_num', '$cert_name', $cog, $cog_total)";
      $query_insert = mysqli_query($connections, $query); 
      }if($cert_name == "Good Moral"){
        $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`, `quantity`, `total_amount`) 
      VALUES ('$user_id', '$invoice_num', '$cert_name', 1, 30)";
      $query_insert = mysqli_query($connections, $query); 
      }if($cert_name == "ID Cord"){
        $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`, `quantity`,  `total_amount`) 
      VALUES ('$user_id', '$invoice_num', '$cert_name', 1, 100)";
      $query_insert = mysqli_query($connections, $query); 
      } if($cert_name == "ID Fee Renewal"){
            $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`, `quantity`, `total_amount`) 
        VALUES ('$user_id', '$invoice_num', '$cert_name', 1, 150)";
        $query_insert = mysqli_query($connections, $query); 
      } if($cert_name == "Others"){
        $query = "INSERT INTO `cashier_transaction`(`Stud_Id`, `invoice_no`, `certificate`, `other_cert`, `quantity`,`total_amount`) 
      VALUES ('$user_id', '$invoice_num', '$cert_name', $other_cert, 1, 30)";
      $query_insert = mysqli_query($connections, $query); 
      } 
      echo "<script>setTimeout(\"location.href = 'OnlineInvoice.php';\");</script>";    
  }
}else {
  echo "<script>setTimeout(\"location.href = 'OnlinePayment.php';\",10);</script>"; 
}

}
  

?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Payment</title>

  <?php @include('includes/css.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <?php @include('includes/nav.php'); ?>


    <!--  Start Code Here =========================================================== -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
          </div>
        </div>
      </section>

      <!--Main content =========================================================== -->
      <section class="content">
        <div class="row">
          <div class="col-lg-1"></div>

          <div class="col-lg-10 card ">
            <!-- =========================================================== -->
            <div class="card-header" style=" border-style: hidden;">
              <h3><strong>CSPC CASHIER FORM</strong></h3>
              <!-- <p>Please check and choose the quantity needed:</p> -->
              
              <br>
              <hr>

              <form method="POST" id="request" class="ui form">
                <div class="row ">
                  <div class=" col-sm-12">
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Certification Needed</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                          </tr>
                        </thead>

                        <!-- Certification -->
                        <tbody>
                         
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="Authentication of Grades">
                                  <label class="form-check-label">Authentication of Grades</label>    
                                </div>
                              </div>
                            </td>       
                            <td>
                              <input type="number" name="auth_cert" class="form-control-xs pax" value="1">
                            </td>
                            <td>Php 10.00</td>                          
                          </tr>

                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="Certification of Grades">
                                  <label class="form-check-label">Certification of Grades</label>
                                </div>
                              </div>
                            </td>
                            <td>
                              <input type="number" name="cog" class="form-control-xs pax" value="1">
                            </td>
                            <td>Php 30.00</td> 
                          </tr>

                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="Good Moral">
                                  <label class="form-check-label">Good Moral</label>
                                </div>
                              </div>
                            </td>
                             <td></td>
                            <td>Php 30.00</td>    
                          </tr>
                          
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="ID Cord">
                                  <label class="form-check-label">ID Cord</label>
                                </div>
                              </div>
                            </td>
                           <td></td>
                            <td>Php 100.00</td>
                          </tr>

                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="ID Fee Renewal">
                                  <label class="form-check-label">ID Fee Renewal</label>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>Php 150.00</td>
                          </tr>

                            <tr>
                            <td>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="certificates[]" value="Others">
                                  <label class="form-check-label">Others</label>
                                </div>
                              </div>
                            </td>
                            <td><input type="text" name="other_cert" class="form-control" placeholder="Enter Certificate Name"></td>
                            <td>Php 30.00</td>
                          </tr>
                          
                          <tr>
                            <td></td>
                            <td>
                             <center>
                              <button class="btn btn-primary btnSubmit" type="submit" name="btnRequest"> Request</button>
                            </center>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>

              </form>
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