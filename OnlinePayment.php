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

            // mysqli_query($connections, "INSERT into demo(id, purpose, quantity,total_amount) 
            //                 VALUES('$user_id', '$cert', '$quantity_Auth_Grades', '$Auth_Grades_Amount')");
            // echo mysqli_error($connections);
            // header("location:OnlinePayment.php");


            mysqli_query($connections, "INSERT into cashier_transaction(Stud_Id, purpose, quantity,total_amount) 
                            VALUES('$user_id', '$cert', '$quantity_Auth_Grades', '$Auth_Grades_Amount')");
            echo mysqli_error($connections);
            header("location:OnlinePayment.php");
            // mysqli_query($connections, "INSERT into cashier transaction(Stud_Id,Transaction_Purpose, No_Of_Copies,Total_Payment) 
            // VALUES('$user_id', '$cert', '$quantity_Auth_Grades','$Auth_Grades_Page')");
            // echo mysqli_error($connections);
            // header("location:OnlinePayment.php");
            // echo mysqli_error($connections);
            // header("location:OnlinePayment.php")
        }
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!--Main content =========================================================== -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <!-- =========================================================== -->
                        <div class="container" style=" border-style: hidden;">
                            <h3><strong>CSPC CASHIER FORM</strong></h3>
                            <p>Please check and choose the quantity needed:</p>

                            <form method="POST" id="request" class="ui form">
                                <div class="row ">
                                    <div class=" col-12">
                                        <div class="card-body p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Certification Needed</th>
                                                        <th>No. of Quantity</th>
                                                        <th>Progress</th>
                                                        <!-- <th style="width: 40px">Total Amount</th> -->
                                                    </tr>
                                                </thead>


                                                <!-- Start of Cashier Form -->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="Authentication of Grades">
                                                                    <label class="form-check-label">Authentication of Grades</label>
                                                                </div>
                                                        </td>
                                                        <td><label for="quantity"></label><input type="number" name="quantity_Auth_Grades" min="1" max="100" value="<?php echo $quantity_Auth_Grades ?>" required></td>
                                                        <td>Php 10.00/Page</td>
                                                        <!-- <td>Php 10.00</td> -->

                                                    </tr>

                                                    <!-- <td><label for="quantity"></label><input type="number" name="quantity_Auth_Grades" min="1" max="100" value="<?php echo $quantity_Auth_Grades ?>" required></td> -->
                                                    <!-- <td>Php 10.00/Page</td> -->

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="Certification of Grades">
                                                                    <label class="form-check-label">Certification of Grades</label>
                                                                </div>
                                                            </div>
                                                        <td><input type="text" class="form-control" placeholder="Semester"></td>
                                                        <td>Php 30.00/Page</td>
                                                        <!-- <td>Php 0.00</td> -->

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
                                                        <!-- <td>Php 0.00</td> -->
                                                    </tr>
                                                    <tr>
                                                        <div class="form-group">
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="Certification - Others">
                                                                    <label class="form-check-label">Certification - Others</label>
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control" placeholder="Enter Certificate Name"></td>
                                                            <td>Php 30.00</td>
                                                            <!-- <td>Php 0.00</td> -->
                                                        </div>
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
                                                        <!-- <td>Php 0.00</td> -->
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
                                                        <!-- <td>Php 0.00</td> -->
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="certificates[]" value="PE Uniform">
                                                                    <label class="form-check-label">PE Uniform</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td>Php 350.00</td>
                                                        <!-- <td>Php 0.00</td> -->
                                                    </tr>


                                                    <tr>
                                                        <td colspan="4">

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