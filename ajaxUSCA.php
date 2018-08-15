
	<?php
	
        session_start();
	
        include "database_connection.php";
        
        if(isset($_POST['cust_no']))
	{
                //echo "hi";
		$cust_data = $_POST['cust_no'];
                $cdata = explode(" --- ", $cust_data);
		//echo "<option value=''></option>";
		$query5="SELECT acct_no, short_acct_name FROM Account where cust_no='$cdata[0]'";
		$result5=$mysqli->query($query5);
		while($value5 = mysqli_fetch_array($result5))
		{
			echo "<option value='".$value5['acct_no']." --- ".$value5['short_acct_name']."'>".$value5['acct_no']." --- ".$value5['short_acct_name']."</option>";
		}
	}
        else if(isset($_POST['supplier_no']))
	{
		$supplier_data = $_POST['supplier_no'];
		echo $supplier_data;
                $supp_data = explode(" --- ", $supplier_data);
		echo "<option name='cust' value=''></option>";
		$query4="SELECT cust_no, short_cust_name FROM Customer where supplier_no='$supp_data[0]'";
		$result4=$mysqli->query($query4);
		while($value4 = mysqli_fetch_array($result4))
		{
			echo "<option name='cust' value='".$value4['cust_no']." --- ".$value4['short_cust_name']."'>".$value4['cust_no']." --- ".$value4['short_cust_name']."</option>";
		}
	}
	
	
	