<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        //$customer = $_POST['custno'];
        //$account =  $_POST['selAccount'];
        //$prod = $_POST['selProd'];
        $cmd = $_POST['cmd'];
        
        if(strcmp($cmd, "save") == 0)
        {
            $cname = $_POST['custname'];
            $csname = $_POST['shrtname'];
            $cname1 = $_POST['name1'];
            $cname2 = $_POST['name2'];
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
            $type = $_POST['ctype'];
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
            }
            //print_r(explode('/', $from, 2));

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

            $chkQuery = "select cust_no from Customer where supplier_no = '".$supplier."' and cust_no = '".$customer."'";
            $chkResult=$mysqli->query($chkQuery);
            if(mysqli_fetch_array($chkResult))
            {
                $query1 = "update Customer set cust_type = '".$type."', cust_name = '".$cname."', short_cust_name = '".$csname."', name1 = '".$cname1."', name2 = '".$cname2."', "
                        ."addr1 = '".$addr1."', addr2 = '".$addr2."', city = '".$city."', state = '".$state_code[0]."', zip = '".$zip."', country = '".$cntry_code[0]."', phone = '".$phn."', "
                        ."contact_name = '".$cntname."', eff_date = '".$from2_date."', exp_date = '".$to_date."', locked = '".$isLocked."', lockout_date = '".$from1_date."' "
                        ."where supplier_no = '".$supplier."' and cust_no = '".$customer."'";
            }
            else
            {
                $query1 = "insert into Customer(supplier_no, cust_no, cust_type, cust_name, short_cust_name, name1, name2, addr1, addr2, city, state, zip, country, phone, contact_name, eff_date, exp_date, locked, lockout_date, credit_risk, iso_language) "
                        . "values ('".$supplier."','".$customer."','".$type."','".$cname."','".$csname."','".$cname1."','".$cname2."','".$addr1."','".$addr2."','".$city."','".$state_code[0]."','".$zip."','"
                        .$cntry_code[0]."','".$phn."','".$cntname."','".$from2_date."','".$to_date."','".$isLocked."','".$from1_date."','N','en-US')";

            }

                //echo $query1;

                if (mysqli_query($mysqli, $query1)) {
                    echo "Record saved successfully";
                }
                else
                {
                    echo "Error inserting record: " . mysqli_error($conn);
                }
        }
        else if(strcmp($cmd, "remove") == 0)
        {
            $delQuery = "delete from Customer where supplier_no = '".$supplier."' and cust_no = '".$customer."'";
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
	
    
