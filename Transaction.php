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
    $result = mysqli_query($connections, "SELECT * FROM cashier_transaction Where Stud_Id = $user_id");
} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
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
                            <div class="wrapper rounded">
                                <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start">
                                    <a class="navbar-brand" href="#">Transactions
                                        <p class="text-muted pl-1">Welcome to your Transactions History</p>
                                    </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span> </button>
                                </nav>
                                <section class="content">
                                    <div class="row mt-2 pt-2">
                                        <div class="col-md-6" id="income">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <p class="fa fa-long-arrow-down"></p>
                                                <p class="text mx-3">Current Balance</p>
                                                <p class="ml-4 money">Php 0.00</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-md-end align-items-center">
                                                <div class="fa fa-long-arrow-up"></div>
                                                <div class="text mx-3">Payment</div>
                                                <div class="ml-4 money"> Php 0.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <ul class="nav nav-tabs w-75">
                                            <a href="form.html" class="nav-link ">
                                        </ul> <button class="btn btn-primary">New Transaction</button>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-dark table-borderless">
                                            <thead>
                                                <th>
                                                    <td scope="col">Certification</td>
                                                    <td scope="col">Transaction Number</td>
                                                    <td scope="col">Total Amount</td>
                                                    <td scope="col">Date</td>

                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                ?>
                                                        <?php
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                            <tr>
                                                                <td > </td>
                                                                <td > <?php echo $row["purpose"]; ?></td>
                                                                <td > <?php echo $row["Trans_No"]; ?></td>
                                                                
                                                                <td > <?php echo $row["total_amount"]; ?></td>
                                                                <td > <?php echo $row["date"]; ?></td>
                                                               
                                                              
                                                            </tr>

                                                        <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                <?php
                                                } else {
                                                    echo "No result found";
                                                }
                                                ?>




                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- =========================================================== -->
    <!-- Your Code End Here -->

    <?php @include('includes/js.php'); ?>
</body>

</html>