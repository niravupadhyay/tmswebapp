<?php
	session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>


 <?php include("header.php");?>
 
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <style>
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
margin-top:1px;
}
.error1 {
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
}

 </style>
<script>
$(document).ready(function()
{
	
	$(".output-success").css("visibility", "hidden");
	var ld_bay=$("#ld_bay").val();
    $("#addupdate").click(function()
    {
		$(".output-success").css("visibility", "visible");
		$('.success').css("background", "none");
		$('.output-success').html('<img src="img/loading.gif" width="5%"> loading...');
        $.ajax({
		type: "POST",
		url: "add_account_master.php",
		data: $("#frm1").serialize() + "&ld_bay=" + ld_bay,
		dataType: "html",
		success: function(data) {
				console.log(data); 
				$(".output-success").css("background-color", "#DFF2BF");
				$(".output-success").css("visibility", "visible");
				$('.output-success').html(data);	
		}
	});
   });
});
</script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
     <div class="box-header well">
				<a data-toggle="tooltip" title="Add/Update" name="addupdate" id="addupdate" class="glyphicon glyphicon-edit a"></a>
				<?php
				function delete_form()
				{
					$id     = @$_POST['id'];     

					if ($action == "delete")   
			   
						$sql = "DROP DATABASE  WHERE id = '$id' "; 
						$msg = "Record successfully deleted"; 

				$result = conn($sql);
			 
			  if (mysql_errno()==0)
			  {
				confirm($msg);
				list_users();
			  }else{
				$msg = "There was a problem deleting the user to the database. Error is:".mysql_error();
				confirm($msg);
			  }//end if
				}
				?>
				<a class="glyphicon glyphicon-question-sign a" data-toggle="tooltip" title="Help"></a>
				
				<?php
				    $currentFile = $_SERVER["PHP_SELF"];	
					$input = $currentFile;
					$result = explode('/',$input);
					echo $result[0];
					$file = basename($currentFile);         // $file is set to "index.php"
					$file2 = basename($file, ".php");
					echo $file2;
					?>

</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                   
    </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                   
    </div>
</head>
<body>
<!---section---->
			<div>
				<!-- <h3>Surveys</h3>
				<hr>-->
					<h3>Parameters</h3>
					
		
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<td>Supplier</td>
					<td>
						<select class="select" disabled="disabled" name="selterminal">
						<?php
							$query1="SELECT supplier_id FROM Supplier";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["term_id"].">".$value1['term_id']."</option>";
							}
						?>
						</select>			
					</td>
					</tr>
					<tr>
					<td>Customer</td>
					<td>
						<select class="select" disabled="disabled" name="selproduct">
						<?php
							$id = $_GET['id'];
							$query1="SELECT prod_id FROM Product";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["prod_id"].">".$value1['prod_id']."</option>";
							}
						?>
						</select>				
					</td>
					</tr>
					<tr>
					<td>Account</td>
					<td>
						<select class="select" disabled="disabled" name="selproduct">
						<?php
							$id = $_GET['id'];
							$query1="SELECT acct_no FROM Account";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								
							}
						?>
						</select>
						<input type="text">				
					</td>
					</tr>
			</thead>
		</table>
		
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">General</a></li>
    <li><a href="#tabs-2">Profile Page1</a></li> 
	<li><a href="#tabs-3">Profile Page2</a></li>
	<li><a href="#tabs-4">Validations</a></li>
  </ul>
  <div id="tabs-1">
    <form method="post" name="frm1" id="frm1">
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
						<div class="" id="output"></div>
						<div class="success output-success"></div>
				</tr>
				<tr>
					<td>ShortName</td>
					<td>
					<input type="text" name="short_acct_name" value="<?php
						$query1="SELECT short_acct_name FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['short_acct_name'];
						}
					?>">
					</td>
				</tr>
						
				<tr>
					<td>Name Line1</td>
					<td>
					<input type="text" name="name1" value="<?php
						$query1="SELECT name1 FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['name1'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Name Line2</td>
					<td>
					<input type="text" name="name2" value="<?php
						$query1="SELECT name2 FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['name2'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Address Line1</td>
					<td>
					<input type="text" name="addr1" value="<?php
						$query1="SELECT addr1 FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['addr1'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Address Line2</td>
					<td>
					<input type="text" name="addr2" value="<?php
						$query1="SELECT addr2 FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['addr2'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>
					<select class="select" id="country" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT country FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['country']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>State</td>
					<td>
					<select class="select" id="state" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT state FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['state']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>City</td>
					<td>
					<input type="text" name="city" value="<?php
						$query1="SELECT city FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['city'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Zip</td>
					<td>
					<select class="select" id="zip" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT zip FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['zip']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
					<select class="select" id="phone" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT phone FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['phone']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>	
					<td>Contact Name</td><td>
					<select class="select" id="contact_name" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT contact_name FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['contact_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				
					<td>Account Type</td>
					<td>
					<input type="text" name="acct_type" value="<?php
						$query1="SELECT acct_type FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['acct_type'];
						}
					?>">
				</tr>
				<tr>
					<td>ISO Language</td><td>
					<select class="select" id="product_attribute" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT product_attribute FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo "<option>".$value1['product_attribute']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				
				<tr>
					<td>Alternate Supplier</td><td>
					<input type="text" name="ExciseDutyGroupID" value="<?php
						$query1="SELECT ExciseDutyGroupID FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['ExciseDutyGroupID'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>IA Partner</td><td>
					<select class="select" id="SeasonalZone" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT SeasonalZone FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo "<option>".$value1['SeasonalZone']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>EMCS Destination Type</td><td>
					<tr>
					<td></td>
					<td>
					<select class="select" id="SeasonalZone" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT SeasonalZone FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo "<option>".$value1['SeasonalZone']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Transport Arrangement</td><td>
					<tr>
					<td></td>
					<td>
					<select class="select" id="SeasonalZone" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT SeasonalZone FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo "<option>".$value1['SeasonalZone']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>INCO Terms</td><td>
					<tr>
					<td></td>
					<td>
					<input type="text" name="ExciseDutyGroupID" value="<?php
						$query1="SELECT ExciseDutyGroupID FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['ExciseDutyGroupID'];
						}
					?>">
					</td>
				</tr>

		<?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
		
		</tbody>
		</table>
  </div>
  <div id="tabs-2">
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
						<div class="" id="output"></div>
						<div class="success output-success"></div>
				</tr>
				<tr>
				<td>COT Major<td>
					<select class="select" id="cot_major" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT cot_major FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['cot_major']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>					
					<td>COT Minor<td>
					<select class="select" id="cot_minor" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT cot_minor FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['cot_minor']."</option>";
						}
					?>
					</select></td>
				</tr>
				
				<tr>
					<td>SPLC Code</td><td>
					<input type="text" name="dest_splc_code" value="<?php
						$query1="SELECT dest_splc_code FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['dest_splc_code'];
						}
					?>">
					</td>
				</tr>
				<tr>
					
					<td>PO Number</td><td>
					<input type="text" name="po_number" value="<?php
						$query1="SELECT po_number FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['po_number'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Text Cert No.</td>
					<td>
					<input type="text" name="tax_cert_no" value="<?php
						$query1="SELECT tax_cert_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['tax_cert_no'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Credit Status</td>
					<td>
					<input type="text" name="credit_status" value="<?php
						$query1="SELECT credit_status FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['credit_status'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Contract Number</td><td>
					<input type="text" name="contract_number" value="<?php
						$query1="SELECT contract_number FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['contract_number'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Delivery Instructions</td><td>
					<input type="text" name="delv_instr" value="<?php
						$query1="SELECT delv_instr FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['delv_instr'];
						}
					?>">
					</td>
				</tr>
				<tr>
				<td>Equip. Instructions</td><td>
					<input type="text" name="equip_instr" value="<?php
						$query1="SELECT equip_instr FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['equip_instr'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Emergency Phone</td><td>
					<input type="text" name="emergency_no" value="<?php
						$query1="SELECT emergency_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['emergency_no'];
						}
					?>">
					</td>
					
				</tr>
				<tr>
					<td>Emergency Contact<td>
					<select class="select" id="emergency_co" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT emergency_co FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['emergency_co']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Dispatch Text No.</td>
					<td>
					<input type="text"  name="dispatch_test_no" value="<?php
						$query1="SELECT dispatch_test_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['dispatch_test_no'];
						}
					?>">	
					
					</td>
				</tr>
				<tr>
					<td>Company Reg.No</td>
					<td>
					<input type="text"  name="comp_reg_no" value="<?php
						$query1="SELECT comp_reg_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['comp_reg_no'];
						}
					?>">	
					
					</td>
				</tr>
				<tr>
					<td>ULSD EPA Id</td>
					<td><input type="text"  name="ulsd_epa_id" value="<?php
						$query1="SELECT ulsd_epa_id FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['ulsd_epa_id'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Receiv.Account No.</td>
					<td><input type="text"  name="ar_acct_no" value="<?php
						$query1="SELECT ar_acct_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['ar_acct_no'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Station Id</td>
					<td><input type="text"  name="co_station" value="<?php
						$query1="SELECT co_station FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['pct_tolerance'];
						}
					?>">
					</td>
				</tr>
				</thead>
				</table>
  </div>
  <div id="tabs-3">
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
						<div class="" id="output"></div>
						<div class="success output-success"></div>
				</tr>
				<tr>
					<td>Fax Group</td>
					<td>
					<select class="select" id="fax_group" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT fax_group FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['fax_group']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
						
				<tr>
					<td>Email Group</td>
					<td>
					<select class="select" id="email_group" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT email_group FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['email_group']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Federal ID No.</td>
					<td>
					<input type="text" name="name2" value="<?php
						//$query1="SELECT name2 FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['name2'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Host P.O Number</td>
					<td>
					<input type="text" name="host_po_number" value="<?php
						$query1="SELECT host_po_number FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['host_po_number'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Zone</td>
					<td>
					<input type="text" name="zone" value="<?php
						$query1="SELECT zone FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['zone'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Retail SiteNo.</td>
					<td>
					<input type="text" name="retail_site_num" value="<?php
						$query1="SELECT retail_site_num FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['retail_site_num'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Default Trans.ID</td>
					<td>
					<select class="select" id="def_transid" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT def_transid FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['def_transid']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Vehicle Acct Compatibility</td>
					<td>
					<input type="text" name="veh_acct_comp" value="<?php
						$query1="SELECT veh_acct_comp FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['veh_acct_comp'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Refiner Code</td>
					<td>
					<input type="text" name="refiner_code" value="<?php
						$query1="SELECT refiner_code FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['refiner_code'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Credit ID</td>
					<td>
					<input type="text" name="credit_id" value="<?php
						$query1="SELECT credit_id FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['credit_id'];
						}
					?>">
					</td>
				</tr>
				<tr>	
					<td>IRS H637</td><td>
					<input type="text" name="irs_h637" value="<?php
						$query1="SELECT irs_h637 FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['irs_h637'];
						}
					?>">
					</td>
				</tr>
				
					<td>PBL No.</td>
					<td>
					<input type="text" name="pbl_no" value="<?php
						$query1="SELECT pbl_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['pbl_no'];
						}
					?>">
				</tr>
				<tr>
					<td>Haulier Text</td><td>
					<input type="text" name="haulier_test_no" value="<?php
						$query1="SELECT haulier_test_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['haulier_test_no'];
						}
					?>">
					</td>
				</tr>
				
				<tr>
					<td>Vat No.</td><td>
					<input type="text" name="vat_no" value="<?php
						$query1="SELECT vat_no FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['vat_no'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Special Msg.</td><td>
					<input type="text" name="special_msg" value="<?php
						$query1="SELECT special_msg FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['special_msg'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Delivery Method</td><td>
					<select class="select" id="delv_instr" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT delv_instr FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['delv_instr']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Managed Inventory Program</td>
					<td>
					<input type="text" name="ExciseDutyGroupID" value="<?php
						//$query1="SELECT ExciseDutyGroupID FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['ExciseDutyGroupID'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Sales Group</td><td>
					<input type="text" name="ExciseDutyGroupID" value="<?php
						//$query1="SELECT ExciseDutyGroupID FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['ExciseDutyGroupID'];
						}
					?>">
					</td>
				</tr>
		
		</tbody>
		</table>
  </div>
   <div id="tabs-4">
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
						<div class="" id="output"></div>
						<div class="success output-success"></div>
				</tr>
				<tr>
					<td><input type="checkbox" id="aux_type" onChange="showCustomer(this.value)">Locked Out</td>
				</tr>
				<tr>				
					<td>Lockout Date</td>
					<td><select class="select" id="lockout_date" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT lockout_date FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['lockout_date']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Lockout Reason</td><td>
					<input type="text" name="ExciseDutyGroupID" value="<?php
						//$query1="SELECT ExciseDutyGroupID FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['ExciseDutyGroupID'];
						}
					?>">
					</td>
				</tr>
				<tr>				
					<td>Effective Date</td>
					<td><select class="select" id="lockout_date" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT lockout_date FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['lockout_date']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>				
					<td>Expiration Date</td>
					<td>
					<select class="select" id="lockout_date" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT lockout_date FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['lockout_date']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>				
					<td>Print Reg Doc</td>
					<td><select class="select" id="lockout_date" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT lockout_date FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['lockout_date']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>				
					<td>Seasonal Zone</td>
					<td><select class="select" id="lockout_date" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT lockout_date FROM Account";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['lockout_date']."</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>
					<td><input type="checkbox"> Freight</td>
				</tr>
				<tr>
					<td><input type="checkbox"> Credit Risk</td>
				</tr>
				<tr>
					<td><input type="checkbox"> Is Cosignor</td>
				</tr>
				<tr>
					<td><input type="checkbox"> Net Qty Billing</td>
				</tr>
				<tr>
					<td><input type="checkbox"> Adv Ship Notice</td>
				</tr>
				<tr>
					<td><input type="checkbox"> P.O Number Required</td>
				</tr>
				<tr>
					<td><input type="checkbox"> P.O Realease Number Required</td>
				</tr>
				<tr>
					<td><input type="checkbox"> Inherit Customer Products</td>
				</tr>
					
				</thead>
				</table>
			
        </form>
  </div>
</div>
</body>
</html>
	
<?php include("footer.php");?>