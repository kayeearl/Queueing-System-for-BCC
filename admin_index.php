<?Php
session_start();
@include('includes/session.php');
@include('includes/nav.php');
@include('includes/profile.php');

// $result = mysqli_query($connections, "SELECT * FROM cashier_transaction Where Stud_Id = $user_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Queueing Transaction</title>

    <?php @include('includes/css.php'); ?>


</head>

</html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin_index.php" class="nav-link"> </a>
                </li>
                 <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Queueing Transaction</a>
      </li>
            </ul>
            <!-- =========================================================== -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php" role="button">
                        Logout <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php @include('includes/nav_admin.php'); ?>

        <div class="container-fluid">

            <!--  Start Code Here =========================================================== -->
            <div class="content-wrapper">
                <section class="content-header">
<div class="container-fluid">  
    <div class="col-md-12">  
        <hr>    
        <center><h2>Now Serving </h2></center>
        <hr>    
    </div>        
<div class="row">
    <div class="col-md-4 small-box bg-default" style="padding:10px;">
    <h5>Next Transaction Number</h5>
       <?php 
       $dateTime = new DateTime("NOW", new DateTimeZone('Asia/Manila'));
         $date =$dateTime->format("Y-m-d");
       $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier'  and date_transaction='$date' and status ='1'  order by id ASC LIMIT 1";
       $result = mysqli_query($connections,$sql);
       while($row = mysqli_fetch_array($result))
       {
         echo'<center><h1>'.$counter  = $row['transaction_id'].'</h1></center>';
         $num = $row['id'];
     }

     ?>  
   
     <form method="POST">
     <input type="hidden" name="id" value="<?=$num?>">
     <button type="btn"   name="btn" class="btn btn-primary form-control">Next</button>
     <?php
        if (isset($_POST['btn']))
        {
           $id = $_POST['id'];
           $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier' and id='$id' and date_transaction='$date' and status ='1'  order by id ASC LIMIT 1";
           $result = mysqli_query($connections,$sql);
           
           while($row = mysqli_fetch_array($result))
           {
             $SDI  = $row['Stud_Id'];
             $Student_number  = $row['Stud_Id'];
             $sql2 = mysqli_query($connections,"UPDATE `queueing_list` SET `status`='0' WHERE id='$id'");
           
             if($Student_number == 0){
                 $fullname = $row['fullname']; 

                 $guest = mysqli_query($connections,"SELECT * FROM guest_list where fullname = '$fullname' and date='$date'  order by id DESC LIMIT 1"); 
                  $guest_row = mysqli_fetch_array($guest);
                        $guest_course = $guest_row['course']; 
                        $guest_id = "Guest";         

                 }

             if ($sql2==true)
             {
                  $sql3 = "SELECT * FROM `student` where  Stud_Id ='$SDI'";
                  $result = mysqli_query($connections,$sql3);
                  while ($row = mysqli_fetch_array($result))
                  {
                      $student_id = $row['Stud_Id'];
                      $fname = $row['Stud_Fname'];
                      $lname = $row['Stud_Lname'];
                      $mname = $row['Stud_Mname'];
                      $course = $row['Stud_Program'];
                      $stud_fullname =  $fname." ". $mname." ".$lname;
                    //   $fullname = $row['fullname']; 
                      
                  }

             }
             
            }
        }
     ?>
     </form>
 </div>
           
    <div class="col-md-8 small-box bg-default" style="padding:10px;">
        <label>Student Number </label>
        <input type="text" class="form-control" value="<?=@$guest_id.' '.@$student_id?>"disabled>
        <label>Name</label>
        <input type="text" class="form-control" value="<?=@$stud_fullname."".@$fullname?>"disabled>
        <label>Course</label>
        <input type="text" class="form-control" value="<?=@$guest_course."".@$course?>"disabled>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        <center><h4>Next Queue Transaction</h4></center>
   
       <center>
        <div class="col-md-11">
            <table class="table table-bordered">
            <thead>
                <th style="width: 50%px;">Name</th>
                <th style="width: 15%;">Number</th>
                <th style="width: 35%;">Course</th>
                
            </thead>
            <tbody>
               <tr>
                <?php
              $dateTime = new DateTime("NOW", new DateTimeZone('Asia/Manila'));
             $date =$dateTime->format("Y-m-d");
                $sql1 = "SELECT * FROM queueing_list where transaction_type = 'cashier' and date_transaction='$date' and status ='1'  order by id ASC ";
                $result1 = mysqli_query($connections,$sql1);
                while($row = mysqli_fetch_array($result1))
                {
                    $id_num = $row['transaction_id'];
                    $Student_number  = $row['Stud_Id'];
                   

                    if($Student_number == 0){
                        $fullname = $row['fullname']; 
                        $studen_id = $row['Stud_Id'];

                        
                 $guest = mysqli_query($connections,"SELECT * FROM guest_list where fullname = '$fullname' and date='$date'  order by id DESC LIMIT 1"); 
                  $guest_row = mysqli_fetch_array($guest);
                        $guest_course = $guest_row['course']; 
                        $guest_id = "Guest";   
                    
                        ?>
                    <tr>
                        <td><?php echo $fullname."  (Guest)";?></td>
                        <td><?php echo $id_num; ?></td>
                        <td><?php echo $guest_course; ?></td>
                   </tr>
                   <?php
                 }else{
                        $sql4 = "SELECT * FROM `student` where  Stud_Id ='$Student_number'";
                        $result2 = mysqli_query($connections,$sql4);
                        while ($row = mysqli_fetch_array($result2))
                        {
                            $studen_id = $row['Stud_Id'];
                            $first_name = $row['Stud_Fname'];
                            $last_name = $row['Stud_Lname'];
                            $m_name = $row['Stud_Mname'];
                            $course = $row['Stud_Program'];        
                        
                // }
                ?>
                  <tr>
                   <td><?=@$first_name.' '.@$m_name.' '.@$last_name?></td>
                   <td><?=@$id_num?></td>
                   <td><?=@$course?></td>
                   <?php }}}?>
               </tr>
            </tbody>
        </table>
       </div>
       </center>
    
    </div>
</div>
</section>

    </div>

</div>
<!-- =========================================================== -->

<!-- Code End Here -->

<?php @include('includes/js.php'); ?>
<script src="assets/DataTables/datatables.min.js"></script>
</body>
</html>



                    
                      