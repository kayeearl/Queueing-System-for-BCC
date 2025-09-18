<?php
$db_firstname = $row['Stud_Fname'];
$db_middle_name = $row["Stud_Mname"];
$db_last_name = $row["Stud_Lname"];



$get_record_student = mysqli_query($connections, "SELECT * FROM student WHERE Stud_Id = '$user_id'");
$row_stud = mysqli_fetch_assoc($get_record_student);
$course = $row_stud['Stud_Program'];



$fullname = ucfirst($db_firstname) . " " . ucfirst($db_last_name);
