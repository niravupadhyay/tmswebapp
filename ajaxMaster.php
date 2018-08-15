
	<?php
	session_start();
	include "database_connection_web.php";
        
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
        
        if(isset($_POST['cntryCode']))
	{
		//echo "<option value=''></option>";
		$cntry_code = $_POST['cntryCode'];
                //$cntry_code = explode(" --- ", $cntry); 
                //echo "<option name='stte'></option>";
                $query3="SELECT iso_country_code, country_name FROM Country where iso_country_code = '".$cntry_code."'";
                $result3=$mysqli->query($query3);
                    
                while($value3 = mysqli_fetch_array($result3))
                {
                    echo $value3['iso_country_code']." --- ".trim($value3['country_name']);
                }
                
                
	}
        

        if(isset($_POST['stateCode']))
	{
		//echo "<option value=''></option>";
		$state_code = $_POST['stateCode'];
                
                
                $query3="SELECT state_code, state FROM State where state_code = '".$state_code."'";
                $result3=$mysqli->query($query3);
                    
                while($value3 = mysqli_fetch_array($result3))
                {
                    echo $value3['state_code']." --- ".trim($value3['state']);
                }
                
                
	}
        
        if(isset($_POST['cntryCodeVeh']))
	{
		//echo "<option value=''></option>";
		$cntry_code = $_POST['cntryCodeVeh'];
                //$cntry_code = explode(" --- ", $cntry); 
                //echo "<option name='stte'></option>";
                $query3="SELECT iso_country_code, country_name FROM Country where iso_country_code = '".$cntry_code."'";
                $result3=$mysqli->query($query3);
                    
                while($value3 = mysqli_fetch_array($result3))
                {
                    echo "<option name='cntry' value='".$value3['iso_country_code']." --- ".trim($value3['country_name'])."'>".$value3['iso_country_code']." --- ".trim($value3['country_name'])."</option>";
                }
                
                
	}
        
        if(isset($_POST['stateCodeVeh']))
	{
		//echo "<option value=''></option>";
		$state_code = $_POST['stateCodeVeh'];
                
                $query3="SELECT state_code, state FROM State where state_code = '".$state_code."'";
                $result3=$mysqli->query($query3);
                    
                while($value3 = mysqli_fetch_array($result3))
                {
                    echo "<option name='stte' value='".$value3['state_code']." --- ".trim($value3['state'])."'>".$value3['state_code']." --- ".trim($value3['state'])."</option>";
                }
                
                
	}
        
        if(isset($_POST['cntry']))
	{
		//echo "<option value=''></option>";
		$cntry = $_POST['cntry'];
                $cntry_code = explode(" --- ", $cntry); 
                echo "<option name='stte'></option>";
                if(strcmp($cntry_code[0], "US") == 0)
                {
                    $query3="SELECT state_code, state FROM State";
                    $result3=$mysqli->query($query3);
                    
                    while($value3 = mysqli_fetch_array($result3))
                    {
                        echo "<option name='stte' value='".$value3['state_code']." --- ".trim($value3['state'])."'>".$value3['state_code']." --- ".trim($value3['state'])."</option>";
                    }
                }
                else if(strcmp($cntry_code[0], "CA") == 0)
                {
                    echo "<option name='stte' value='AB --- Alberta'>AB --- Alberta</option>";
                    echo "<option name='stte' value='BC --- British Columbia'>BC --- British Columbia</option>";
                    echo "<option name='stte' value='MB --- Manitoba'>MB --- Manitoba</option>";
                    echo "<option name='stte' value='NB --- New Brunswick'>NB --- New Brunswick</option>";
                    echo "<option name='stte' value='NL --- Newfoundland and Labrador'>NL --- Newfoundland and Labrador</option>";
                    echo "<option name='stte' value='NS --- Nova Scotia'>NS --- Nova Scotia</option>";
                    echo "<option name='stte' value='NT --- Northwest Territories'>NT --- Northwest Territories</option>";
                    echo "<option name='stte' value='NU --- Nunavut'>NU --- Nunavut</option>";
                    echo "<option name='stte' value='ON --- Ontario'>ON --- Ontario</option>";
                    echo "<option name='stte' value='PE --- Prince Edward Island'>PE --- Prince Edward Island</option>";
                    echo "<option name='stte' value='QC --- Quebec'>QC --- Quebec</option>";
                    echo "<option name='stte' value='SK --- Saskatchewan'>SK --- Saskatchewan</option>";
                    echo "<option name='stte' value='YT --- Yukon Territory'>YT --- Yukon Territory</option>";
                }
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
			echo "<option name='acctmstr' value=".$value5['acct_num'].">".$value5['acct_num']." --- ".trim($value5['acct_shrt_name'])."</option>";
                    }
                }
                else
                {
                    $query5="SELECT acct_no, short_acct_name FROM Account where cust_no='$cust_no' and supplier_no='$supplier_no' order by acct_no";
                    $result5=$mysqli->query($query5);
                    while($value5 = mysqli_fetch_array($result5))
                    {
			echo "<option name='acctmstr' value=".$value5['acct_no'].">".$value5['acct_no']." --- ".trim($value5['short_acct_name'])."</option>";
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
                            echo "<option name='cust' value=".$value4['cust_no'].">".$value4['cust_no']." --- ".trim($value4['short_cust_name'])."</option>";
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
			echo "<option value=".$value8['driver_no'].">".$value8['driver_no']."</option>";
		}
	}
        
        if(isset($_POST['car_no']))
	{
		echo "<option name='veh' value=''></option>";
		$carr_no = $_POST['car_no'];
		$query8="SELECT vehicle_id FROM Vehicle where carrier='$carr_no'";
		$result8=$mysqli->query($query8);
		while($value8 = mysqli_fetch_array($result8))
		{
			echo "<option name='veh' value=".$value8['vehicle_id'].">".$value8['vehicle_id']."</option>";
		}
	}
	
	if(isset($_POST['driver_no']))
	{
		//echo "<option value=''></option>";
		
	}
	
	//$MOT = $_POST['MOT'];

	
