<?Php
session_start();
@include('includes/session.php');
@include('includes/profile.php');
 
    if (isset($_POST["btnRequest"])) {
        $certificates = $_POST['certificates'];
        $quantity_Auth_Grades = $_POST['quantity_Auth_Grades'];

        function Authentication_of_Grades($var1, $var2) //$var1 and $var2 is an Argument
        {
            $total_Amount = $var1 * $var2;
            return $total_Amount;
        }
        $Auth_Grades_Amount = Authentication_of_Grades($quantity_Auth_Grades, "10"); //$quantity_Auth_Grades, "10" are parameters


        foreach ($certificates as $cert) {

            mysqli_query($connections, "INSERT into cashier_transaction(Stud_Id, purpose, quantity,total_amount) 
                            VALUES('$user_id', '$cert', '$quantity_Auth_Grades', '$Auth_Grades_Amount')");
            echo mysqli_error($connections);
            header("location:OnlinePayment.php");

        }
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
        <!-- Preloader -->
        <?php @include('includes/nav.php'); ?>


        <!--  Start Your Code Here =========================================================== -->
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
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <!-- =========================================================== -->
                        <div class="container" style=" border-style: hidden;">
                            <h3><strong>CSPC CASHIER FORM</strong></h3>
                            <!-- <p>Please check and choose the quantity needed:</p> -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                        <ul class="nav nav-tabs w-75">
                            
                                        </ul> <button class="btn btn-primary">New Transaction</button>
                                    </div>
                            <form method="POST" id="request" class="ui form">
                                <div class="row ">
                                    <div class = "col-sm-1"></div>
                                    <div class=" col-10">
                                        <div class="card-body p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Certification Needed</th>
                                                        <th style="width: 40px;">Quantity</th>
                                                        <th>Amount</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="Authentication of Grades">
                                                                    <label class="form-check-label">Authentication of Grades</label>
                                                                </div>
                                                        </td>
                                                        <td><div class="d-flex">
                      <span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span>
                        <input type="number" name="pax[3]" class="form-control-xs pax" value="0">
                      <span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span>
                    </div>
                
                </td>
                                                        <td><input type="hidden" name="price[1]" class="form-control-xs" value="0">
                    <small class="price" id="price_adult"></small></td>
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
                                                        <td><input type="number" name="quantity_Auth_Grades" min="1" max="100" value="<?php echo $quantity_Auth_Grades ?>" required</td>
                                                        <td>Php 30.00/Page</td>
                                                        <td>Php 0.00</td>

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
                                                        <td>Php 0.00</td>
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
                                                        <td>Php 100.00/Page</td>
                                                        <td>Php 0.00</td>
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
                                                        <td>Php 150.00/Page</td>
                                                        <td>Php 0.00</td>
                                                    </tr>
                                                   <tr>
                                                        <div class="form-group">
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="Others">
                                                                    <label class="form-check-label">Others</label>
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control" placeholder="Enter Certificate Name"></td>
                                                            <td>Php 30.00</td>
                                                            <td>Php 0.00</td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <div class="form-group">
                                                            <td></td>
                                                            <td></td>
                                                            <td><b>Total Amount</b></td>
                                                            <td><b> 0.00</b></td>
                                                        </div>
                                                    </tr>


                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2">

                                                            <button type="submit" name="btnRequest"> <a href="OnlineInvoice.php">Request</a></button>
                                                           
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>



            </section>
        </div>
        <!-- =========================================================== -->
    </div>
    </div>

    <!-- Your Code End Here -->


    <?php @include('includes/js.php'); ?>

</body>
</html>

<?php 
if(isset($_GET['id'])):
$order = $connections->query("SELECT * FROM orders where id = {$_GET['id']}");
foreach($order->fetch_array() as $k => $v){
    $$k= $v;
}
$items = $connections->query("SELECT o.*,p.name FROM order_items o inner join products p on p.id = o.product_id where o.order_id = $id ");
endif;
?>
<div class="container">
  <form action="" id="manage-ticket">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            
            <?php 
            if($_SESSION['login_station_id'] = 1): 
             endif;
            ?>
          </div>
          <div class="card-body station-field">
              <?php 
            
            if($_SESSION['login_station_id'] == 2):
                  $station = $connections->query("SELECT * FROM stations  order by station asc");
                  while($row=$station->fetch_assoc()):
                  echo $row['id'];
                  echo ucwords($row['station']) ;
                 endwhile; 
             
               else: ?>
                <input type="hidden" id="origin_station" name="origin_station" value="<?php echo $_SESSION['login_station_id'] ?>">

               <?php
               endif; 
                  $station = $connections->query("SELECT * FROM stations ".($_SESSION['login_station_id'] > 0 ? " where id!={$_SESSION['login_station_id']} ":"")." order by station asc");
                  while($row= $station->fetch_assoc()):
                ?>
                <div class="row">
                <div class="col-md-4 py-2">
                  <div class="card bg-gradient-primary border item" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['station'] ?>">
                    <div class="card-body">
                      <div class="row justify-content-center align-center">
                        <h5 class="text-white"><b><?php echo ucwords($row['station']) ?></b></h5>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
              <div class="row">
                <div id="msg" class="col-md-12"></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            <b>List</b>
          </div>
          <div class="card-body reserved">
            <div class="d-flex w-100 ">
              <input type="hidden" name="destination_id" value="">
              <span><b>Destination: <span id="dname"></span></b></span>
            </div>
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>Pax</th>
                  <th>Passenger</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex">
                      <span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span>
                        <input type="number" name="pax[1]" class="form-control-xs pax" value="0">
                      <span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span>
                    </div>
                  </td>
                  <td>
                    <p>Adult</p>
                    <input type="hidden" name="price[1]" class="form-control-xs" value="0">
                    <small class="price" id="price_adult"></small>
                  </td>
                  <td>
                    <p class="text-right amount" id="amount_adult">0.00</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex">
                      <span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span>
                        <input type="number" name="pax[2]" class="form-control-xs pax" value="0">
                      <span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span>
                    </div>
                  </td>
                  <td>
                    <p>Student</p>
                    <input type="hidden" name="price[2]" class="form-control-xs" value="0">
                    <small class="price" id="price_student"></small>
                  </td>
                  <td>
                    <p class="text-right amount" id="amount_student">0.00</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex">
                      <span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span>
                        <input type="number" name="pax[3]" class="form-control-xs pax" value="0">
                      <span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span>
                    </div>
                  </td>
                  <td>
                    <p>Senior</p>
                    <input type="hidden" name="price[3]" class="form-control-xs" value="0">
                    <small class="price" id="price_senior"></small>
                  </td>
                  <td>
                    <p class="text-right amount" id="amount_senior">0.00</p>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Total</td>
                  <td>
                    <input type="hidden" name="total_amount" value="0">
                    <p class="text-right" id="tamount">0.00</p>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer">
            <div class="col-lg-12 d-flex justify-content-center align-center">
              <button class="btn btn-primary" type="button" id="pay_now">Pay</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>