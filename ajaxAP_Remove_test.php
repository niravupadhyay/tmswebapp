<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
          $account =  $_GET['acctno'];
          $supplier = $_GET['supno'];
          $customer = $_GET['custno'];
          $prodid = $_GET['prod_id'];
          //echo $account;
          //echo $supplier;
          //echo $customer;
          //echo $userid;
	
	?>


 
	
                
    <?php
    
        
        $removeQueryAP = "DELETE FROM AccountProducts where term_id = '0000001' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."' and prod_id = '".$prodid."'";
        
        //$stmt = $mysqli->prepare($removeQueryAP);

        //$stmt->bind_param("sssss","0000001",$supplier,$customer,$account,str_pad($prodid, 6, " ", STR_PAD_RIGHT));

//        if($stmt->execute())
//            echo "1";
//        else
//            echo "0";

        if (mysqli_query($mysqli, $removeQueryAP)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
        //$stmt->close();
        
        //$username = explode(" --- ", $userid);
        
                 
         
    ?>