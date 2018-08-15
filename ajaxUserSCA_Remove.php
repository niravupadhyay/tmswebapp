<?php
	session_start();
        error_reporting(0);
	include "database_connection_web.php";
        
          $account =  $_POST['acctno'];
          $supplier = $_POST['supno'];
          $customer = $_POST['custno'];
          $userid = $_POST['userID'];
          //echo $account;
          //echo $supplier;
          //echo $customer;
          //echo $userid;
	
	?>


 
	
                
    <?php
    
        
        $removeQueryUSCA = "DELETE FROM TWUserSCA where tms_uname = ? and supplier_num = ? and cust_num = ? and acct_num = ?";
        
        $stmt = $mysqli_web->prepare($removeQueryUSCA);

        $stmt->bind_param("ssss",$userid,$supplier,$customer,$account);

        if($stmt->execute())
            echo "SCA group has been removed for selected Web User";
        else
            echo "Some problem occurred while removing SCA group for selected Web User, Try Again !!";

        $stmt->close();
        
        //$username = explode(" --- ", $userid);
        
                 
         
    ?>