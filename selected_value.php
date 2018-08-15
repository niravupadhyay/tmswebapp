<?php session_start();
	include "database_connection.php";
	if(isset($_POST['supp_name']))
	{
		$supp_name = $_POST['supp_name'];
		//echo $supplier_no;
		$query4="SELECT distinct TransHeader.cust_no,Customer.short_cust_name FROM TransHeader INNER JOIN 
							Customer ON TransHeader.cust_no = Customer.cust_no
							where TransHeader.supplier_no=".$supp_name;
//		echo "SELECT distinct TransHeader.cust_no,Customer.short_cust_name FROM TransHeader INNER JOIN 
//							Customer ON TransHeader.cust_no = Customer.cust_no
//							where TransHeader.supplier_no=".$supp_name;
//							
		$result4=$mysqli->query($query4);
		while($value4 = mysqli_fetch_array($result4))
		{
			echo "<option value=".$value4['cust_no'].">".$value4['cust_no']."-".$value4['short_cust_name']."</option>";
		}
	}
	
	
	/*
	
	include "database_connection.php";
$supp_name = $_POST["supp_name"]; 
	if (isset($supp_name)) {
		echo $supp_name;
	$query1="SELECT distinct TransHeader.cust_no,Customer.short_cust_name FROM TransHeader INNER JOIN 
							Customer ON TransHeader.cust_no = Customer.cust_no
							where TransHeader.supplier_no=".$supp_name;
							
							echo "SELECT distinct TransHeader.cust_no,Customer.short_cust_name FROM TransHeader INNER JOIN 
							Customer ON TransHeader.cust_no = Customer.cust_no
							where TransHeader.supplier_no=".$_GET['supp_name_val'];
							
							
							echo "SELECT distinct TransHeader.cust_no,Customer.short_cust_name FROM TransHeader INNER JOIN Customer
							ON TransHeader.cust_no = Customer.cust_no
							where TransHeader.supplier_no=$_REQUEST['city_id'])";
						
								$result1=$mysqli->query($query1);
						
	}
	else{
		echo "else";
	}
?>
*/