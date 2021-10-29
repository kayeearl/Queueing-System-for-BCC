<?php  
   
 if(isset($_POST['accounting']))
    {
        $account_id = $_POST['account_id'];
        //echo "accounting";
        $sql = "SELECT * FROM queueing_list where transaction_type = 'accounting'";
        $result = mysqli_query($connections,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count < 1)
        {
            $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('1','$user_id','accounting')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
        }
        else
        {
            $sql = "SELECT * FROM queueing_list where transaction_type = 'accounting'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $total =  $count + 1;

            

            $sql = "SELECT * FROM queueing_list where transaction_type = 'accounting' && Stud_Id = '$account_id'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count > 0)
            {?>
               <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>One Number Per Transaction!</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            }
            else
            {
                $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('$total','$account_id','accounting')";  
            if ($connections->query($sql) === TRUE)
            ?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
            }

            
        }
    // ________________________________________________________

    else if(isset($_POST['admission']))
    {
        $account_id = $_POST['account_id'];
        //echo "accounting";
        $sql = "SELECT * FROM queueing_list where transaction_type = 'admission'";
        $result = mysqli_query($connections,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count < 1)
        {
            $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('1','$user_id','admission')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
        }
        else
        {
            $sql = "SELECT * FROM queueing_list where transaction_type = 'admission'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $total =  $count + 1;

            

            $sql = "SELECT * FROM queueing_list where transaction_type = 'admission' && Stud_Id = '$account_id'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count > 0)
            {?>
               <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>One Number Per Transaction!</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            }
            else
            {
                $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('$total','$account_id','admission')";  
            if ($connections->query($sql) === TRUE)
            ?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
            }

            
        }
    
    else if(isset($_POST['registrar']))
    {
        $account_id = $_POST['account_id'];
        //echo "accounting";
        $sql = "SELECT * FROM queueing_list where transaction_type = 'registrar'";
        $result = mysqli_query($connections,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count < 1)
        {
            $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('1','$account_id','registrar')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
        }
        else
        {
            $sql = "SELECT * FROM queueing_list where transaction_type = 'registrar'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $total =  $count + 1;

            

            $sql = "SELECT * FROM queueing_list where transaction_type = 'registrar' && Stud_Id = '$account_id'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count > 0)
            {?>
               <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>One Number Per Transaction!</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            }
            else
            {
                $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('$total','$account_id','registrar')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
            }

            
        }
    }
    else if(isset($_POST['cashier']))
    {
        $account_id = $_POST['account_id'];
        //echo "accounting";
        $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier'";
        $result = mysqli_query($connections,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count < 1)
        {
            $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('1','$account_id','cashier')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                        </h1>
                        <p><?php echo "$count";?></p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php    
            } 
        }
        else
        {
            $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $total =  $count + 1;

            $sql = "SELECT * FROM queueing_list where transaction_type = 'cashier' && Stud_Id = '$account_id'";
            $result = mysqli_query($connections,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count > 0)
            {?>
               <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>One Number Per Transaction!</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            }
            else
            {
                $sql = "INSERT INTO `queueing_list`(`transaction_id`, `Stud_Id`, `transaction_type`) 
            VALUES ('$total','$account_id','cashier')";  
            if ($connections->query($sql) === TRUE)
            {?>
               <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        <?php echo "$transaction_id";?>
                        </h1>
                        <p>New record created successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div> 
            <?php
            } 
            }

            
        }
    }
?>