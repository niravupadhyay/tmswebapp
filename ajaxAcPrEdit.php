<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        $account =  $_POST['selAccount'];
        $prod = $_POST['selProd'];
        
        $spdcode = $_POST['spd_code'];
        $cn = $_POST['contract_number'];
        $erpType = $_POST['ERPHandlingType'];
        $src = $_POST['source'];
        $ae = $_POST['isae'];
        $oi = $_POST['isoi'];
        $pdt = $_POST['ispd'];
        
        $from = $_POST['from'];
        $from_date_format1 = explode( '/', $from );
        $from_date_format2 = $from_date_format1[2]."/".$from_date_format1[1]."/".$from_date_format1[0];
        $from_date = date('ymd',strtotime($from_date_format2));
        //print_r(explode('/', $from, 2));
        
        //echo $from.":::".$from_date_format2.":::".$from_date."----";
        
        $to = $_POST['to'];
        $to_date_format1 = explode( '/', $to );
        $to_date_format2 = $to_date_format1[2]."/".$to_date_format1[1]."/".$to_date_format1[0];
        $to_date = date('ymd',strtotime($to_date_format2));
        
        
		  $query1 = "update AccountProducts set spd_code = '".$spdcode."', contract_number = '".$cn."', active_enable = '".$ae."', 
                      auth_eff_dt = '".$from_date."', auth_expr_dt = '".$to_date."', source = '".$src."', osp_interface_enabled = '".$oi."', 
                          ERPHandlingType = '".$erpType."', PrintDeliveryTicket = '".$pdt."' where supplier_no = '".$supplier."' and 
                              cust_no = '".$customer."' and acct_no = '".$account."' and prod_id = '".$prod."'";
                  
                  if (mysqli_query($mysqli, $query1)) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                  
?>
