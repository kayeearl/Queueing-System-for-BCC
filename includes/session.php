<?php
    include('includes/Database.php');
   session_start();
    
   $user_id = $_SESSION["Stud_Id"];
//    $user_check = $_SESSION['login_user'];

   @$get_rec= mysqli_query($connections, "SELECT * FROM student WHERE Stud_Id = '$user_id'");
//    @$ses_sql = mysqli_query($conn,"select username from accounts where username = '$user_check'");
   

    @$row = mysqli_fetch_array($get_rec,MYSQLI_ASSOC);
//    @$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   @$login_session = $row['Stud_Id'];
//    @$login_session = $row['login_user'];
   
   if(!isset($_SESSION['Stud_Id'])){
      header("location:login.php");
      die();
   }
?>