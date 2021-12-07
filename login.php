<?php
session_start();
 @include("includes/Database.php");

if (isset($_SESSION["Stud_Id"])) {
    $user_id = $_SESSION["Stud_Id"];
    $get_record = mysqli_query($connections, "SELECT * FROM accounts WHERE Stud_Id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);

}
$email = $password = "";

if (isset($_POST["logInSubmit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $check_account = mysqli_query($connections, "SELECT * FROM accounts WHERE Stud_Id ='$email' and password = '$password'");
    if (mysqli_num_rows($check_account) > 0) {
        $row = mysqli_fetch_assoc($check_account);
        $user_id = $row["Stud_Id"];
        $db_password = $row["password"];
        if ($password == $db_password) {
            $_SESSION["Stud_Id"] = $user_id;

           echo '
<div class="popup popup--icon -success js_success-popup">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success Popup
    </h1>
    <p>Lorem Ipsum dolor sit amet!</p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Hide Popup</button>
    </p>
  </div>
</div>
';

    echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; 

 
            // <!-- <div class="popup popup-icon js_success-popup popup-visible">
            //     <div class="popup__background"></div>
            //     <div class="popup__content">
            //         <h3 class="popup__content__title">
            //             Success
            //             </h1>
            //             <p>Login Successfully</p>
            //             <p>
                           
            //             </p>
            //     </div> -->
            // </div>
   
    } else { 
//         echo " <script>
//     Swal.fire({
//   icon: 'error',
//   title: 'Oops...',
//   text: 'Something went wrong!'
// })
// </script>";
    echo ' 
<div class="popup popup--icon -error js_error-popup">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error Popup
    </h1>
    <p>Lorem Ipsum dolor sit amet!</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Hide Popup</button>
    </p>
  </div>
</div>';

        // echo ' <button type="button" class="btn btn-info swalDefaultInfo">
        //           Launch Info Toast
        //         </button>';
        //  echo "<script>alert('Incorrect Email or Password');</script>";
  }
} 
}  
  

        

       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UIIS | Log in</title>
    <?php  @include('includes/css.php');?>
    <?php  @include('includes/js.php');?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
</html>