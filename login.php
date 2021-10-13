<?php
session_start();
include("Database.php");
if (isset($_SESSION["Stud_Id"])) {
    $user_id = $_SESSION["Stud_Id"];
    $get_record = mysqli_query($connections, "SELECT * FROM student WHERE Stud_Id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    echo "<script>window.location.href = 'index.php';</script>";
}
$email = $password = "";

if (isset($_POST["logInSubmit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $check_account = mysqli_query($connections, "SELECT * FROM login_credentials WHERE email ='$email' and password = '$password'");
    if (mysqli_num_rows($check_account) > 0) {
        $row = mysqli_fetch_assoc($check_account);
        $user_id = $row["email"];
        $db_password = $row["password"];
        if ($password == $db_password) {
            $_SESSION["Stud_Id"] = $user_id;
            // echo "<script>window.location.href = 'index.php';</script>";

?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                        </h1>
                        <p>Login Successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div>
        <?php }
    } else { ?>

        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Error
                    </h1>
                    <p>Incorrect username/password combination</p>
                    <p>
                        <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                    </p>
            </div>
        </div>
<?php
        // echo "<script>alert('Incorrect Email or Password');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UIIS | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/helper.css">
    <link rel="stylesheet" href="dist/css/chartist.min.css">
    <link rel="stylesheet" href="assets/css/popup_style.css">
    <style>
        .body-bg {
            background-image: url(dist/img/cspccampus.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="hold-transition login-page body-bg">
    <div class="login-box">
        <div class="login-logo">
            <img src="dist/img/logo.png" alt="CSPC" class="brand-image img-circle elevation-10" style="opacity: .8; max-width: 200px;">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body boxx">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Student ID" name="email" value="<?php echo $email; ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <a href="index.php" target="self"><button type="submit" name="logInSubmit" class="btn btn-primary btn-block"> Login</button></a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <div class="footer">

    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="./assets/js/lib/jquery/jquery.min.js"></script>

    <script src="./assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="./assets/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="./assets/js/jquery.slimscroll.js"></script>

    <script src="./assets/js/sidebarmenu.js"></script>

    <script src="./assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="./assets/js/custom.min.js"></script>



</body>

</html>