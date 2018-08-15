<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $terminal = $_POST['selterminal'];
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        $account =  $_POST['selAccount'];
        $prod = $_POST['selProduct'];
        
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
        
        
		  $query1 = "insert into AccountProducts(term_id, supplier_no, cust_no, acct_no, prod_id, spd_code, contract_number, active_enable, auth_eff_dt, auth_expr_dt, source, osp_interface_enabled, ERPHandlingType, PrintDeliveryTicket) values "
                          . "('".$terminal."','".$supplier."','".$customer."','".$account."','".$prod."','".$spdcode."','".$cn."','".$ae."','".$from_date."','".$to_date."','".$src."','".$oi."','".$erpType."','".$pdt."')";
                  
//                  echo $query1;
                  
                  if (mysqli_query($mysqli, $query1)) {
                        echo "Record inserted successfully";
                    } else {
                        echo "Error inserting record: This AccountProduct might already exist, please verify..." . mysqli_error($conn);
                    }
                  
?>
