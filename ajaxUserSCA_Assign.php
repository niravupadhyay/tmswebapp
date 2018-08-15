<?php
	session_start();
        error_reporting(0);
	include "database_connection_web.php";
        
          $accounts =  $_POST['selaccount'];
          $supplier = $_POST['selSupplier'];
          $customer = $_POST['selCustomer'];
          $userid = $_POST['seluname'];
          /*$account =  "0000000400";
          $supplier = "0000001000";
          $customer = "0000000400";*/
        
          $fieldNames = array("Supplier", "Customer", "Account");
          
          //echo $account;
          //echo $supplier;
          //echo $customer;
          //echo $userid;
	
	?>


 
	
                
    <?php
    
        if(strcmp($userid,"----Select") == 0)
        {
            echo "Select a Username from dropdown !!";
        }
        else
        {
            $supplier_data = explode(" --- ", $supplier);
            $customer_data = explode(" --- ", $customer);
            
            $queryUSCA = "INSERT INTO TWUserSCA (tms_uname, supplier_num, cust_num, acct_num, supp_shrt_name, cust_shrt_name, acct_shrt_name) VALUES (?,?,?,?,?,?,?)";
            $stmt = $mysqli_web->prepare($queryUSCA);
            
            
            $insertOK = 0;
            
            foreach ($accounts as $account) {
                $account_data = explode(" --- ", $account);
                $stmt->bind_param("sssssss",$userid,$supplier_data[0],$customer_data[0],$account_data[0],$supplier_data[1],$customer_data[1],$account_data[1]);
                if($stmt->execute())
                {
                    $insertOK = 1;
                    //echo $insertOK;
                    echo "SCA : ".$supplier_data[1].", ".$customer_data[1].", ".$account_data[1]." has been assigned to Web User - ".$userid."</br></br>";
                }
                else
                {
                    $insertOK = 0;
                    echo "CAN NOT REASSIGN !!</br>SCA : ".$supplier_data[1].", ".$customer_data[1].", ".$account_data[1]." IS ALREADY ASSIGNED to Web User - ".$userid."</br></br>";
                    //break;
                }
            }
            //echo $insertOK;
            /*if($insertOK)
                echo "SCA group has been assigned to selected Web User";
            else
                echo "Some problem occurred while assigning SCA group to Web User, Try Agin !!";
            */
            

            $stmt->close();
        }
        //$username = explode(" --- ", $userid);
        
                 
         
    ?>