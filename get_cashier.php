<?php
    if (isset($_POST['cashier']))
    {
        session_start();
        require'includes/Database.php';
         $date = date("Y-m-d");
        $id = $_SESSION['Stud_Id'];
        $var = "cashier";
        $sql = mysqli_query($connections,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' order by id desc limit 1 ");
        if (mysqli_num_rows($sql)>=1)
        {
                while ($row = mysqli_fetch_array($sql)){
                    $counter = $row['transaction_id'];
                    $row_num = $counter+1;
                }
                $sql = mysqli_query($conn,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' and Stud_Id = '$id' and status='1'");
                if (mysqli_num_rows($sql)>=1)
                {
                    $_SESSION['alert']="You already have a transaction. Thank you.";
                            echo "<script>
                            window.location.href='index.php'
                            </script>";
                }else
                {
                
                        $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','$row_num')");
                        if ($sql==true)
                        {
                        
                            $_SESSION['alert']="Transaction successfully.";
                            echo "<script>
                            window.location.href='index.php'
                            </script>";
                        }
                }
                        
        
        }else{

            $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','1')");
            if ($sql==true)
            {
               
                $_SESSION['alert']="Transaction successfully";
                echo "<script>
                window.location.href='index.php'
                </script>";
            }
        }
    }

    // ________________________________________________________

    if (isset($_POST['registrar']))
    {
        session_start();
        require'includes/Database.php';
         $date = date("Y-m-d");
        $id = $_SESSION['Stud_Id'];
        $var = "registrar";
        $sql = mysqli_query($connections,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' order by id desc limit 1 ");
        if (mysqli_num_rows($sql)>=1)
        {
        while ($row = mysqli_fetch_array($sql))
        {
             $counter = $row['transaction_id'];
                $row_num = $counter+1;
        }
        $sql = mysqli_query($conn,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' and Stud_Id = '$id' and status='1'");
        if (mysqli_num_rows($sql)>=1)
        {
             $_SESSION['alert']="You already have a transaction. Thank you.";
                    echo "<script>
                    window.location.href='index.php'
                    </script>";
        }else
        {
           
                 $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','$row_num')");
                if ($sql==true)
                {
                   
                    $_SESSION['alert']="Transaction successfully.";
                    echo "<script>
                    window.location.href='index.php'
                    </script>";
                }
        }
                
        
        }else{

            $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','1')");
            if ($sql==true)
            {
               
                $_SESSION['alert']="Transaction successfully";
                echo "<script>
                window.location.href='index.php'
                </script>";
            }
        }
    }
    // ________________________________________________________
     
    if (isset($_POST['accounting']))
    {
        session_start();
        require'includes/Database.php';
         $date = date("Y-m-d");
        $id = $_SESSION['Stud_Id'];
        $var = "accounting";
        $sql = mysqli_query($connections,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' order by id desc limit 1 ");
        if (mysqli_num_rows($sql)>=1)
        {
        while ($row = mysqli_fetch_array($sql))
        {
             $counter = $row['transaction_id'];
                $row_num = $counter+1;
        }
        $sql = mysqli_query($conn,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' and Stud_Id = '$id' and status='1'");
        if (mysqli_num_rows($sql)>=1)
        {
             $_SESSION['alert']="You already have a transaction. Thank you.";
                    echo "<script>
                    window.location.href='index.php'
                    </script>";
        }else
        {
           
                 $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','$row_num')");
                if ($sql==true)
                {
                   
                    $_SESSION['alert']="Transaction successfully.";
                    echo "<script>
                    window.location.href='index.php'
                    </script>";
                }
        }
                
        
        }else{

            $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','1')");
            if ($sql==true)
            {
               
                $_SESSION['alert']="Transaction successfully";
                echo "<script>
                window.location.href='index.php'
                </script>";
            }
        }
    }
 // ________________________________________________________
if (isset($_POST['admission']))
    {
        session_start();
        require'includes/Database.php';
         $date = date("Y-m-d");
        $id = $_SESSION['Stud_Id'];
        $var = "admission";
        $sql = mysqli_query($connections,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' order by id desc limit 1 ");
        if (mysqli_num_rows($sql)>=1)
        {
        while ($row = mysqli_fetch_array($sql))
        {
             $counter = $row['transaction_id'];
                $row_num = $counter+1;
        }
        $sql = mysqli_query($conn,"SELECT * from queueing_list where transaction_type='$var' and date_transaction='$date' and Stud_Id = '$id' and status='1'");
                if (mysqli_num_rows($sql)>=1)
                {
                    $_SESSION['alert']="You already have a transaction. Thank you.";
                            echo "<script>
                            window.location.href='index.php'
                            </script>";
                }else
                {
                
                        $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','$row_num')");
                        if ($sql==true)
                        {
                        
                            $_SESSION['alert']="Transaction successfully.";
                            echo "<script>
                            window.location.href='index.php'
                            </script>";
                        }
                }
                
        
        }else{

            $sql = mysqli_query($conn,"INSERT INTO `queueing_list`(`Stud_Id`, `transaction_type`, `transaction_id`) VALUES ('$id','$var','1')");
            if ($sql==true)
            {
               
                $_SESSION['alert']="Transaction successfully.";
                echo "<script>
                window.location.href='index.php'
                </script>";
            }
        }
    }
 // ________________________________________________________

