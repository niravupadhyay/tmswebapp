
	<?php
	session_start();
	include "database_connection_web.php";
        
        $user = $_SESSION["user"];
        $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
        
        
	if(isset($_POST['supplier_no']))
	{
		$supplier_no = $_POST['supplier_no'];
		//echo $supplier_no;
		//echo "<option name='cust' value=''></option>";
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
                    $query4="SELECT cust_no, short_cust_name FROM Customer where supplier_no='$supplier_no'";
                    $result4=$mysqli->query($query4);
                    $resp = "";
                    while($value4 = mysqli_fetch_array($result4))
                    {
                            $resp = $resp.trim($value4['cust_no'])." --- ".trim($value4['short_cust_name']).",";
                    }
                    //$resp = $resp."}";
                    echo $resp;
                }
	}
	
	
	//$MOT = $_POST['MOT'];

	?>
