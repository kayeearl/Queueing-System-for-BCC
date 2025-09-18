<?Php
$connections  = mysqli_connect("localhost", "root", "", "uiis");

$dateTime = new DateTime("NOW", new DateTimeZone('Asia/Manila'));
$date = $dateTime->format("Y-m-d");
// $date = date("Y-m-d");
$total = 0;
$name = "";
$person = "";
$course = "";
$contact_num = "";
$office_transaction = "";
$row_num = "";
$message = "";

if (isset($_POST["btnGuest"])) {
  $name = $_POST['name'];
  $person = $_POST['person'];
  $course = $_POST['course'];
  $contact_num = $_POST['contact_num'];
  $office_transaction = $_POST['office_transaction'];
  $guest_id = 0;


  if (!empty($name) && !empty($course) && !empty($contact_num)) {
    mysqli_query($connections, "INSERT INTO `guest_list`(`fullname`, `guest_type`, `course`, `contact_num`, `office_transaction`) 
    VALUES ('$name','$person','$course','$contact_num','$office_transaction')");
    // $sql = mysqli_query($connections,"SELECT * from queueing_list where transaction_type='$office_transaction' and 
    // date_transaction='$date' order by id desc limit 1 ");
    // if (mysqli_num_rows($sql)>=1)
    // {
    // while ($row = mysqli_fetch_array($sql))
    // {
    //       $counter = $row['transaction_id'];
    //         $row_num = $counter+1;
    // }
    $sql = mysqli_query($connections, "SELECT COUNT(*) AS total FROM queueing_list where transaction_type = '$office_transaction' and date_transaction='$date'");
    $row_count = mysqli_fetch_array($sql);
    $count = $row_count['total'];
    $row_num = $count + 1;

    mysqli_query($connections, "INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`,`status`,`fullname`) 
        VALUES ('$guest_id','$office_transaction','$row_num', '1', '$name')");


    $message = $name . " " . "your transaction number is " . $row_num . " ";


    // }

  } else {
    echo "Try Again";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Get Queue Number</title>
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <?php
  @include('includes/css.php');
  ?>
  <style>
    .boxx {
      background-color: #66ccff;
      margin-top: 55px;
      height: 550px;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.4));
      border-radius: 2rem;
      margin-bottom: 60px;
      font-family: "Times New Roman";
    }

    .body-bg {
      background-image: url(dist/img/Frame\ 1.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>

</head>

</html>

<body class="hold-transition sidebar-mini layout-fixed body-bg ">


  <div class="content-header">
    <!-- <div class="container-fluid "> -->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 col-12 boxx ">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 col-12 col-bg">
              <br><br><br><br><br>
              <style>
                .small-logo {
                  width: 250px;
                  height: auto;
                }
              </style>

              <center>
                <img src="dist/img/bcc.png" alt="BCC"
                  class="brand-image img-circle elevation-10 small-logo">
              </center>

              <br>
              <br><br><br><br><br>

            </div>
            <div class="col-md-7 col-12 col-bg1">
              <br>
              <h3>Transaction Information</h3>
              <?php
              if ($message) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ' . $message . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
              }


              ?>


              <!-- 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= @$name ?> your transaction number is <strong><?= @$row_num ?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->

              <hr>

              <div>

                <!-- <form method="POST"  role="form" id="contact-form"> -->
                <form method="POST" role="form" id="contact-form">
                  <!-- <label>Name: </label>
                  <input type="text" class="form-control" name="name" placeholder="Enter your Name" required> -->
                  <label>Service Type</label>
                  <select name="person" class="form-control">
                    <option name="person" <?php if ($person == "Regular") {
                                            echo "selected";
                                          } ?> value="Regular">Regular</option>
                    <option name="person" <?php if ($person == "PWD") {
                                            echo "selected";
                                          } ?> value="PWD">PWD</option>
                    <option name="person" <?php if ($person == "Pregnant") {
                                            echo "selected";
                                          } ?> value="Pregnant">Pregnant</option>
                    <option name="person" <?php if ($person == "Senior Citizen") {
                                            echo "selected";
                                          } ?> value="Senior Citizen">Senior Citizen</option>
                  </select>

                  <label>Course</label>
                  <input type="text" class="form-control" name="course" placeholder="Enter Course" required>
                  <label>Contact Number</label>
                  <input type="number" class="form-control" name="contact_num" placeholder="Enter your contact number" required>
                  <label>Office Transaction</label>
                  <select name="office_transaction" class="form-control">
                    <option name="office_transaction" <?php if ($office_transaction == "cashier") {
                                                        echo "selected";
                                                      } ?> value="cashier">Cashier</option>
                    <option name="office_transaction" <?php if ($office_transaction == "registrar") {
                                                        echo "selected";
                                                      } ?> value="registrar">Registrar</option>
                    <option name="office_transaction" <?php if ($office_transaction == "admission") {
                                                        echo "selected";
                                                      } ?> value="admission">Admission</option>
                    <option name="office_transaction" <?php if ($office_transaction == "accounting") {
                                                        echo "selected";
                                                      } ?> value="accounting">Accounting</option>
                  </select>
                  <br>
                  <center>
                    <button style="width: 730px;" class="btn btn-primary toastDefaultSuccess" type="submit" name="btnGuest"> Get Queue Number</button>
                  </center>
                </form>



              </div>

              <hr>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  </section>




  <?php @include('includes/js.php'); ?>

</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#contact-form').on('submit', function(e) { //Don't foget to change the id form
      $.ajax({
        url: 'Guest.php', //===PHP file name====
        data: $(this).serialize(),
        type: 'POST',
        success: function(data) {
          console.log(data);
          //Success Message == 'Title', 'Message body', Last one leave as it is
          swal(<?php echo $row_num; ?>, "Your Transaction Number", "success");
        },
        error: function(data) {
          //Error Message == 'Title', 'Message body', Last one leave as it is
          swal("Oops...", "Something went wrong :(", "error");
        }
      });
      e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
    });
  });
</script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

  $('.alert').alert();
</script>

</html>