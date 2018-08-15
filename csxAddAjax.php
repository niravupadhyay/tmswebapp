<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        
        $rt = $_POST['rt'];
        $cargno =  $_POST['cargno'];
        $vgno =  $_POST['vgno'];
        $supplier = $_POST['supno'];
        $customer = $_POST['custno'];
        $account = $_POST['acctno'];
        $cmd = $_POST['cmd'];
        
        if(strcmp($cmd, "save") == 0)
        {
            
            
            $chkQuery = "select cust_no, acct_no from VehicleSupplierXref where file_code = '".$rt."' and term_id = '0000001' and carrier = '".$cargno."' and vehicle_grp = '".$vgno."' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."'";
            $chkResult=$mysqli->query($chkQuery);
            
            if(mysqli_fetch_array($chkResult))
            {
                echo "This Record already exists !";
            }
            else
            {
                $query1 = "insert into VehicleSupplierXref(file_code, term_id, carrier, vehicle_grp, supplier_no, cust_no, acct_no, destination_no) "
                              . "values ('".$rt."', '0000001', '".$cargno."','".$vgno."','".$supplier."','".$customer."','".$account."','0000000000')";
                if (mysqli_query($mysqli, $query1)) {
                    echo "Record saved successfully";
                } else {
                    echo "Error inserting record: " . mysqli_error($conn);
                }
            }
            //echo $query1;

            
        }
        else if(strcmp($cmd, "remove") == 0)
        {
            $delQuery = "delete from VehicleSupplierXref where file_code = '".$rt."' and term_id = '0000001' and carrier = '".$cargno."' and vehicle_grp = '".$vgno."' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."'";
            //echo $delQuery;
            if (mysqli_query($mysqli, $delQuery)) 
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
?>
	
    
