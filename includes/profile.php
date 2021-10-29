<?php
    $db_firstname = $row['Stud_Fname'];
    $db_middle_name = $row["Stud_Mname"];
    $db_last_name = $row["Stud_Lname"];

    $get_record2 = mysqli_query($connections, "SELECT * FROM accounts WHERE Stud_Id = '$user_id'");
    $row2 = mysqli_fetch_assoc($get_record2);
    $profile_pic = $row2['profile_pic'];

    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_last_name);
?>
