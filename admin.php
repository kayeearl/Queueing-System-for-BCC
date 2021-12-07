<?Php
@include('includes/session.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Cashier</title>
     <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <?php
     @include('includes/css.php');
      ?>

</head>


<style>

body {
  /* The image used */
  background-image: url(dist/img/cspccampus.jpg);
  
  /* Add the blur effect */
  /* filter: blur(8px); */
  /* -webkit-filter: blur(8px); */
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


</style>


<body>
<section class="content-header">
<div class="container-fluid">                
<div class="row">
    <div class="col-md-4 small-box bg-success" style="padding:10px;">
       <?php 
       $date = date("Y-m-d");
       $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier'  and date_transaction='$date' and status ='1'  order by id ASC LIMIT 1";
       $result = mysqli_query($connections,$sql);
       while($row = mysqli_fetch_array($result))
       {
         echo'<center><h1>'.$counter  = $row['transaction_id'].'</h1></center>';
         $num = $row['id'];
     }

     ?>  
     <br>
     <form method="POST">
     <input type="hidden" name="id" value="<?=$num?>">
     <button type=""   name="btn" class="btn btn-info form-control">Next</button>
     <?php
        if (isset($_POST['btn']))
        {
           $date = date("Y-m-d");
           $id = $_POST['id'];
           $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier' and id='$id' and date_transaction='$date' and status ='1'  order by id ASC LIMIT 1";
           $result = mysqli_query($connections,$sql);
           while($row = mysqli_fetch_array($result))
           {
             $SDI  = $row['Stud_Id'];
             $sql2 = mysqli_query($connections,"UPDATE `queueing_list` SET `status`='0' WHERE id='$id'");
             if ($sql2==true)
             {
                  $sql3 = "SELECT * FROM `student` where  Stud_Id ='$SDI'";
                  $result = mysqli_query($connections,$sql3);
                  while ($row = mysqli_fetch_array($result))
                  {
                      $studen_id = $row['Stud_Id'];
                      $fname = $row['Stud_Fname'];
                      $lname = $row['Stud_Lname'];
                      $mname = $row['Stud_Mname'];
                      $course = $row['Stud_Program'];
                      
                  }

             }
             
            }
        }
     ?>
     </form>
 </div>
           
    <div class="col-md-7 small-box bg-info" style="padding:10px; margin-left:10px;">
    <label>Student Number </label>
    <input type="text" class="form-control" value="<?=@$studen_id?>">
    <label>Student Number </label>
    <input type="text" class="form-control" value="<?=@$fname.' '.@$mname.' '.@$lname?>">
    <label>Course</label>
    <input type="text" class="form-control" value="<?=@$course?>">

</div>
</section>
 

 
</body>

</html>
