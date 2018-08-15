
	<?php
	session_start();
	include "database_connection_web_primary.php";
        
        $user = $_SESSION["user"];
        $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
        
        if (isset($_POST['selCarrier'])){
        $carrier = $_POST['selCarrier'];
        }
        if (isset($_POST['selaccount'])){
        $account =  $_POST['selaccount'];
        }
        if (isset($_POST['seldriver'])){
            $driver = $_POST['seldriver'];
        }
        if (isset($_POST['selmot'])){
        $mot =   $_POST['selmot'];
        }
        
        if(isset($_POST['destination_no']))
	{
		echo "<option value=''></option>";
		$destination_no = $_POST['destination_no'];
	}
        else if(isset($_POST['acct_no']))
	{
		echo "<option name='dest' value=''></option>";
		$acct_no = $_POST['acct_no'];
		$query6="SELECT destination_no, short_destination_name FROM Destination where acct_no='$acct_no'";
		$result6=$mysqli->query($query6);
		while($value6 = mysqli_fetch_array($result6))
		{
			echo "<option name='dest' value=".$value6['destination_no'].">".$value6['destination_no']." --- ".$value6['short_destination_name']."</option>";
		}
	}
        else if(isset($_POST['cust_no']))
	{
                //echo "hi";
		$cust_no = $_POST['cust_no'];
                $supplier_no = $_POST['supplier_no'];
		echo "<option name='acct' value=''></option>";
                if($restrictSCADisplay)
                {
                    $query5="SELECT acct_num, acct_shrt_name FROM TWUserSCA where cust_num='$cust_no' and supplier_num='$supplier_no' and tms_uname='$user'";
                    $result5=$mysqli_web->query($query5);
                    while($value5 = mysqli_fetch_array($result5))
                    {
			echo "<option name='acct' value=".$value5['acct_num'].">".$value5['acct_num']." --- ".trim($value5['acct_shrt_name'])."</option>";
                    }
                }
                else
                {
                    $query5="SELECT acct_no, short_acct_name FROM Account where cust_no='$cust_no' and supplier_no='$supplier_no' order by acct_no";
                    $result5=$mysqli->query($query5);
                    while($value5 = mysqli_fetch_array($result5))
                    {
			echo "<option name='acct' value=".$value5['acct_no'].">".$value5['acct_no']." --- ".$value5['short_acct_name']."</option>";
                    }
                }
		
	}
        else if(isset($_POST['custx_no']))
	{
                //echo "hi";
		$cust_no = $_POST['custx_no'];
                $supplier_no = $_POST['supplierx_no'];
		echo "<option name='acct' value=''></option>";
                echo "<option name='acct' value='0000000000'>0000000000 --- All Accounts</option>";
                if($restrictSCADisplay)
                {
                    $query5="SELECT acct_num, acct_shrt_name FROM TWUserSCA where cust_num='$cust_no' and supplier_num='$supplier_no' and tms_uname='$user'";
                    $result5=$mysqli_web->query($query5);
                    while($value5 = mysqli_fetch_array($result5))
                    {
			echo "<option name='acct' value=".$value5['acct_num'].">".$value5['acct_num']." --- ".trim($value5['acct_shrt_name'])."</option>";
                    }
                }
                else
                {
                    $query5="SELECT acct_no, short_acct_name FROM Account where cust_no='$cust_no' and supplier_no='$supplier_no' order by acct_no";
                    $result5=$mysqli->query($query5);
                    while($value5 = mysqli_fetch_array($result5))
                    {
			echo "<option name='acct' value=".$value5['acct_no'].">".$value5['acct_no']." --- ".$value5['short_acct_name']."</option>";
                    }
                }
		
	}
	else if(isset($_POST['supplier_no']))
	{
		$supplier_no = $_POST['supplier_no'];
		//echo $supplier_no;
		echo "<option name='cust' value=''></option>";
                if($restrictSCADisplay)
                {
                    $query4="SELECT distinct cust_num, cust_shrt_name FROM TWUserSCA where supplier_num='$supplier_no' and tms_uname='$user'";
                    $result4=$mysqli_web->query($query4);
                    while($value4 = mysqli_fetch_array($result4))
                    {
                            echo "<option name='cust' value=".$value4['cust_num'].">".$value4['cust_num']." --- ".trim($value4['cust_shrt_name'])."</option>";
                    }
                }
                else
                {
                    $query4="SELECT cust_no, short_cust_name FROM Customer where supplier_no='$supplier_no' order by cust_no";
                    $result4=$mysqli->query($query4);
                    while($value4 = mysqli_fetch_array($result4))
                    {
                            echo "<option name='cust' value=".$value4['cust_no'].">".$value4['cust_no']." --- ".$value4['short_cust_name']."</option>";
                    }
                }
	}
	else if(isset($_POST['supplierx_no']))
	{
		$supplier_no = $_POST['supplierx_no'];
		//echo $supplier_no;
		echo "<option name='cust' value=''></option>";
                echo "<option name='cust' value='0000000000'>0000000000 --- All Customers</option>";
                if($restrictSCADisplay)
                {
                    $query4="SELECT distinct cust_num, cust_shrt_name FROM TWUserSCA where supplier_num='$supplier_no' and tms_uname='$user'";
                    $result4=$mysqli_web->query($query4);
                    while($value4 = mysqli_fetch_array($result4))
                    {
                            echo "<option name='cust' value=".$value4['cust_num'].">".$value4['cust_num']." --- ".trim($value4['cust_shrt_name'])."</option>";
                    }
                }
                else
                {
                    $query4="SELECT cust_no, short_cust_name FROM Customer where supplier_no='$supplier_no' order by cust_no";
                    $result4=$mysqli->query($query4);
                    while($value4 = mysqli_fetch_array($result4))
                    {
                            echo "<option name='cust' value=".$value4['cust_no'].">".$value4['cust_no']." --- ".$value4['short_cust_name']."</option>";
                    }
                }
	}
	
	if(isset($_POST['carr_no']))
	{
		echo "<option value=''></option>";
		$carr_no = $_POST['carr_no'];
		$query8="SELECT driver_no, name FROM Driver where carrier_no='$carr_no'";
		$result8=$mysqli->query($query8);
		while($value8 = mysqli_fetch_array($result8))
		{
			echo "<option value=".$value8['driver_no'].">".$value8['driver_no']." --- ".trim($value8['name'])."</option>";
		}
	}
        
        if(isset($_POST['carg_no']))
	{
		echo "<option name='vgmstr' value=''></option>";
		$carg_no = $_POST['carg_no'];
                
                if($restrictSCADisplay)
                {
                    $scaQuery = "select distinct concat(supplier_num, ':::', cust_num, ':::', acct_num) as sca from TWUserSCA where tms_uname='$user'";
                    $scaList = $mysqli_web->query($scaQuery);

                    $tmp = array();
                    while($val = mysqli_fetch_assoc($scaList))
                        $tmp[] = "'".$val['sca']."'";
                    
                    $query88="SELECT vehicle_group, group_desc FROM VehicleGroup where carrier='$carg_no' AND concat(def_supplier, ':::', def_cust, ':::', def_acct) IN (".implode(', ', $tmp).")";
                    $result88=$mysqli->query($query88);
                    while($value88 = mysqli_fetch_array($result88))
                    {
                            echo "<option name='vgmstr' value=".$value88['vehicle_group'].">".$value88['vehicle_group']." --- ".trim($value88['group_desc'])."</option>";
                    }
                }
                else
		{
                    $query88="SELECT vehicle_group, group_desc FROM VehicleGroup where carrier='$carg_no'";
                    $result88=$mysqli->query($query88);
                    while($value88 = mysqli_fetch_array($result88))
                    {
                            echo "<option name='vgmstr' value=".$value88['vehicle_group'].">".$value88['vehicle_group']." --- ".trim($value88['group_desc'])."</option>";
                    }
                }
                
	}
        if(isset($_POST['cargx_no']))
	{
		echo "<option name='vgmstr' value=''></option>";
                echo "<option name='vgmstr' value='0000000000'>0000000000 --- All Groups</option>";
		$carg_no = $_POST['cargx_no'];
                
                if($restrictSCADisplay)
                {
                    $scaQuery = "select distinct concat(supplier_num, ':::', cust_num, ':::', acct_num) as sca from TWUserSCA where tms_uname='$user'";
                    $scaList = $mysqli_web->query($scaQuery);

                    $tmp = array();
                    while($val = mysqli_fetch_assoc($scaList))
                        $tmp[] = "'".$val['sca']."'";
                    
                    $query88="SELECT vehicle_group, group_desc FROM VehicleGroup where carrier='$carg_no' AND concat(def_supplier, ':::', def_cust, ':::', def_acct) IN (".implode(', ', $tmp).")";
                    $result88=$mysqli->query($query88);
                    while($value88 = mysqli_fetch_array($result88))
                    {
                            echo "<option name='vgmstr' value=".$value88['vehicle_group'].">".$value88['vehicle_group']." --- ".trim($value88['group_desc'])."</option>";
                    }
                }
                else
		{
                    $query88="SELECT vehicle_group, group_desc FROM VehicleGroup where carrier='$carg_no'";
                    $result88=$mysqli->query($query88);
                    while($value88 = mysqli_fetch_array($result88))
                    {
                            echo "<option name='vgmstr' value=".$value88['vehicle_group'].">".$value88['vehicle_group']." --- ".trim($value88['group_desc'])."</option>";
                    }
                }
                
	}
	
        if(isset($_POST['fol_mo']))
	{
		//echo "<option value=''></option>";
		$fol_mo = $_POST['fol_mo'];
		$query9="SELECT distinct fol_no FROM FolioStatus where fol_mo='$fol_mo' order by fol_no";
		$result9=$mysqli->query($query9);
		while($value9 = mysqli_fetch_array($result9))
		{
                    echo "<option value=".$value9['fol_no'].">".$value9['fol_no']."</option>";
		}
	}
        
	if(isset($_POST['driver_no']))
	{
		//echo "<option value=''></option>";
		
	}
	
	//$MOT = $_POST['MOT'];

	
