<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        
        $vgno =  $_POST['vgno'];
        $cargno =  $_POST['cargno'];
        
        
        
        $cmd = $_POST['cmd'];
        
        if(strcmp($cmd, "save") == 0)
        {
            $supplier = $_POST['selSupplier'];
            $customer = $_POST['selCustomer'];
            $account = $_POST['selAccount'];
            $vgdesc = $_POST['vgdesc'];
            
            $chkQuery = "select carrier, vehicle_group from VehicleGroup where rec_type = 'CVG' and term_id = '0000001' and carrier = '".$cargno."' and vehicle_group = '".$vgno."'";
            $chkResult=$mysqli->query($chkQuery);
            
            if(mysqli_fetch_array($chkResult))
            {
                $query1 = "update VehicleGroup set group_desc = '".$vgdesc."', def_supplier = '".$supplier."', def_cust = '".$customer."', def_acct = '".$account."' where rec_type = 'CVG' and term_id = '0000001' and carrier = '".$cargno."' and vehicle_group = '".$vgno."'";
            }
            else
            {
                $query1 = "insert into VehicleGroup(rec_type, term_id, carrier, vehicle_group, group_desc, def_supplier, def_cust, def_acct) "
                              . "values ('CVG', '0000001', '".$cargno."','".$vgno."','".$vgdesc."','".$supplier."','".$customer."','".$account."')";
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
            $delQuery = "delete from VehicleGroup where rec_type = 'CVG' and term_id = '0000001' and carrier = '".$cargno."' and vehicle_group = '".$vgno."'";
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
	
    
