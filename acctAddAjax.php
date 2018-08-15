<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        $account =  $_POST['selAccount'];
        //$prod = $_POST['selProd'];
        //$account = $_POST['acctno'];
        $cmd = $_POST['cmd'];
        
        if(strcmp($cmd, "save") == 0)
        {
            $aname = $_POST['acctname'];
            $asname = $_POST['shrtname'];
            $aname1 = $_POST['name1'];
            $aname2 = $_POST['name2'];
            $addr1 = $_POST['addr1'];
            $addr2 = $_POST['addr2'];
            $cntry = $_POST['country'];
            $state = $_POST['state'];

            $cntry_code = explode(" --- ", $cntry);
            $state_code = explode(" --- ", $state);
            
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $phn = $_POST['phn'];
            $cntname = $_POST['cntname'];
            $type = $_POST['atype'];
            $isLocked = $_POST['isLocked'];

            $from1 = $_POST['from1'];
            if(strcmp($from1, "") == 0)
            {
                $from1_date = "";
            }
            else
            {
                $from1_date_format1 = explode( '/', $from1 );
                $from1_date_format2 = $from1_date_format1[2]."/".$from1_date_format1[1]."/".$from1_date_format1[0];
                $from1_date = date('ymd',strtotime($from1_date_format2));
                //print_r(explode('/', $from, 2));
            }

            //echo $from.":::".$from_date_format2.":::".$from_date."----";
            $from2 = $_POST['from2'];
            if(strcmp($from2, "") == 0)
            {
                $from2_date = "";
            }
            else
            {
                $from2_date_format1 = explode( '/', $from2 );
                $from2_date_format2 = $from2_date_format1[2]."/".$from2_date_format1[1]."/".$from2_date_format1[0];
                $from2_date = date('ymd',strtotime($from2_date_format2));
            }

            $to = $_POST['to'];
            if(strcmp($to, "") == 0)
            {
                $to_date = "";
            }
            else
            {
                $to_date_format1 = explode( '/', $to );
                $to_date_format2 = $to_date_format1[2]."/".$to_date_format1[1]."/".$to_date_format1[0];
                $to_date = date('ymd',strtotime($to_date_format2));
            }

            
            $chkQuery = "select acct_no from Account where supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."'";
            $chkResult=$mysqli->query($chkQuery);
            
            if(mysqli_fetch_array($chkResult))
            {
                $query1 = "update Account set acct_type = '".$type."', acct_name = '".$aname."', short_acct_name = '".$asname."', name1 = '".$aname1."', name2 = '".$aname2."', "
                        ."addr1 = '".$addr1."', addr2 = '".$addr2."', city = '".$city."', state = '".$state_code[0]."', zip = '".$zip."', country = '".$cntry_code[0]."', phone = '".$phn."', "
                        ."contact_name = '".$cntname."', eff_date = '".$from2_date."', exp_date = '".$to_date."', locked = '".$isLocked."', lockout_date = '".$from1_date."' "
                        ."where supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."'";
            }
            else
            {
                $query1 = "insert into Account(supplier_no, cust_no, acct_no, acct_type, acct_name, short_acct_name, name1, name2, addr1, addr2, city, state, zip, country, phone, contact_name, eff_date, exp_date, locked, lockout_date, credit_risk, iso_language, adv_ship_notice, po_req, relno_req, gross_net, special_msg, prnt_reg_doc) "
                              . "values ('".$supplier."','".$customer."','".$account."','".$type."','".$aname."','".$asname."','".$aname1."','".$aname2."','".$addr1."','".$addr2."','".$city."','".$state_code[0]."','".$zip."','"
                              .$cntry_code[0]."','".$phn."','".$cntname."','".$from2_date."','".$to_date."','".$isLocked."','".$from1_date."','N','','N','N','N','G','0','N')";
            }
            //echo $query1;

            if (mysqli_query($mysqli, $query1)) {
                echo "Record saved successfully";
            } else {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        }
        else if(strcmp($cmd, "remove") == 0)
        {
            $delQuery = "delete from Account where supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."'";
            //echo $delQuery;
            if (mysqli_query($mysqli, $delQuery)) 
            {
                echo "Record deleted successfully";
            }
            else
            {
                echo "No such record found to delete";
            }
        }
?>
	
    
