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
		url: "add_product_master.php",
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
		url: "add_customer_master.php",
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
						<select class="select" name="selterminal">
						<?php
							$query1="SELECT supplier_no FROM Customer";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["supplier_no"].">".$value1['supplier_no']."</option>";
							}
						?>
						</select>				
					</td>
					</tr>
					<tr>
					<td>Customer</td>
					<td>
						<select class="select" name="selproduct">
						<?php
							$id = $_GET['cust_no'];
							$query1="SELECT cust_no FROM Customer";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["cust_no"].">".$value1['cust_no']."</option>";
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
    <li><a href="#tabs-2">Profile</a></li> 
	<li><a href="#tabs-3">Validations</a></li>
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
					<td>Short Name</td>
					<td>
					<input type="text" name="short_cust_name" value="<?php
						$query1="SELECT short_cust_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['short_cust_name'];
						}
					?>">
					</td>
				</tr>
						
				<tr>
					<td>Name1</td>
					<td>
					<input type="text" name="name1" value="<?php
						$query1="SELECT name1 FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['name1'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Name2</td>
					<td>
					<input type="text" name="name2" value="<?php
						$query1="SELECT name2 FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['name2'];
						}
					?>">
				</tr>
				<tr>
					<td>Address1</td>
					<td>
					<input type="text" name="addr1" value="<?php
						$query1="SELECT addr1 FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['addr1'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Address2</td>
					<td>
					<input type="text" name="addr2" value="<?php
						$query1="SELECT addr2 FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['addr2'];
						}
					?>">
				</tr>
				<tr>
					<td>Country</td>
					<td>
					<select class="select" id="country" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT country FROM Customer";
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
						$query1="SELECT state FROM Customer";
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
						$query1="SELECT city FROM Customer";
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
					<input type="text" name="zip" value="<?php
						$query1="SELECT zip FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['zip'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
					<input type="text" name="phone" value="<?php
						$query1="SELECT phone FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['phone'];
						}
					?>">
					</td>
				</tr>
				<tr>	
					<td>Contact Name</td><td>
					<input type="text" name="contact_name" value="<?php
						$query1="SELECT contact_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo $value1['contact_name'];
						}
					?>">
					</td>
				</tr>
				
					<td>Customer Type</td>
					<td>
					<select class="select" id="cust_type" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT cust_type FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['cust_type']."</option>";
						}
					?>
					</select>
				</tr>
				<tr>
					<td>ISO Language</td><td>
					<select class="select" id="iso_language" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT iso_language FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>".$value1['iso_language']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>IA Partner</td><td>
					<select class="select" id="ERPHandlingType" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT ERPHandlingType FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo "<option>".$value1['ERPHandlingType']."</option>";
						}
					?>
					</select>
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
					<td>COT Major</td>
						<td>
							<select class="select" id="aux_type" onChange="showCustomer(this.value)">
							<?php
								$query1="SELECT aux_type FROM Customer";
								$result1=$mysqli->query($query1);
								while($value1 = mysqli_fetch_array($result1))
								{
									echo "<option>".$value1['aux_type']."</option>";
								}
							?>
							</select>
						</td>
				</tr>
				<tr>					
					<td>COT Minor<td>
						<select class="select" id="additive_type" onChange="showCustomer(this.value)">
						<?php
							$query1="SELECT additive_type FROM Customer";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option>".$value1['additive_type']."</option>";
							}
						?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>SPLC Code</td>
					<td>
						<input type="text" name="low_range_conduct" value="<?php
							//$query1="SELECT low_range_conduct FROM Product";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								//echo $value1['low_range_conduct'];
							}
						?>">
					</td>
				</tr>
				<tr>					
					<td>Tax Cert No.</td><td>
					<input type="text" name="recipe_flush_volume" value="<?php
						//$query1="SELECT recipe_flush_volume FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['recipe_flush_volume'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Refiner Code</td>
					<td>
					<input type="text" name="high_range_conduct" value="<?php
						//$query1="SELECT high_range_conduct FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo $value1['high_range_conduct'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Emergency Contact</td>
					<td>
					<input type="text" name="nhm_code" value="<?php
						//$query1="SELECT nhm_code FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['nhm_code'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Emrgency Phone</td><td>
					<input type="text" name="price" value="<?php
						//$query1="SELECT price FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo $value1['low_range_conduct'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Credit Status</td>
					<td>
					<input type="text" name="gain_loss_tol" value="<?php
						//$query1="SELECT gain_loss_tol FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['gain_loss_tol'];
						}
					?>">
					</td>
				</tr>				
				<tr>
					<td>Fax Group</td>
						<td>
						<select class="select" id="aux_type" onChange="showCustomer(this.value)">
						<?php
							//$query1="SELECT aux_type FROM Product";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
							 //  	echo "<option>".$value1['aux_type']."</option>";
							}
						?>
						</select>
						</td>
				</tr>
				<tr>
					<td>Email Group</td><td>
					<input type="text" name="Taric" value="<?php
						//$query1="SELECT Taric FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['Taric'];
						}
					?>">
					</td>
					
				</tr>
				<tr>
					<td>Credit ID<td>
					<select class="select" id="aux_type" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT aux_type FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo "<option>".$value1['aux_type']."</option>";
						}
					?>
					</select></td>
					</td>
				</tr>
				<tr>
					<td>Federal ID No.</td>
					<td>
					<input type="text" name="cadd" value="<?php
						//$query1="SELECT cadd FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo $value1['cadd'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>VAT No.</td>
					<td>
					<input type="text"  name="man_name" value="<?php
						//$query1="SELECT man_name FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo $value1['man_name'];
						}
					?>">	
					
					</td>
				</tr>
				<tr>
					<td>Company Reg. No.</td>
					<td>
					<input type="text"  name="ExciseProductCode" value="<?php
						//$query1="SELECT ExciseProductCode FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						 //  	echo $value1['ExciseProductCode'];
						}
					?>">	
					
					</td>
				</tr>
				<tr>
					<td>IRS H637</td>
					<td><input type="text"  name="guage_proc" value="<?php
						//$query1="SELECT guage_proc FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['guage_proc'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Receiv.Account No.</td>
					<td><input type="text"  name="guage_proc" value="<?php
						//$query1="SELECT guage_proc FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['guage_proc'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>Station Id</td>
					<td><input type="text"  name="pct_tolerance" value="<?php
						//$query1="SELECT pct_tolerance FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo $value1['pct_tolerance'];
						}
					?>">
					</td>
				</tr>
				<tr>
					<td>DB Account</td>
					<td><select class="select" id="aux_type" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT aux_type FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						  // 	echo "<option>".$value1['aux_type']."</option>";
						}
					?>
					</select>
					</td>
					</td>
				</tr>
				<tr>
					<td>DB Comment</td>
					<td><input type="text"  name="host_product_id" value="<?php
						//$query1="SELECT host_product_id FROM Product";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo $value1['host_product_id'];
						}
					?>">
					</td>
				</tr>
				</thead>
				</table>
  </div>
  <div id="tabs-3">
    		<table  class="display" cellspacing="0" width="100%">
				<tr>
						<div class="" id="output"></div>
						<div class="success output-success"></div>
				</tr>
				<tr>	
						<td><input type="checkbox" onChange="showCustomer(this.value)">Locked Out
						</td>
				</tr>
				<tr>
					<td>Lockout Date </td>
					<td><select class="select" id="product" onChange="showCustomer(this.value)">
					<?php
						$query1="SELECT prod_id,prod_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	echo "<option>"  .''.  "</option>";
							echo "<option>".$value1['prod_id'].$value1['prod_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Lockout Reason</td>
					<td><input type="text"  name="" value="<?php
						//$query1="SELECT lab_batch_no  FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo $value1[''];
						}
					?>">
					</td>
				</tr>
				<tr>
						<td>Effective Date</td>
						<td><select class="select" id="product" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT prod_id,prod_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   //	echo "<option>"  .''.  "</option>";
							//	echo "<option>".$value1['prod_id'].$value1['prod_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Expiration Date</td>
					<td><select class="select" id="product" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT prod_id,prod_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo "<option>"  .''.  "</option>";
							//echo "<option>".$value1['prod_id'].$value1['prod_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Seasonal Zone</td>
					<td><select class="select" id="product" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT prod_id,prod_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo "<option>"  .''.  "</option>";
							//echo "<option>".$value1['prod_id'].$value1['prod_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" id="product" onChange="showCustomer(this.value)">
					Freight
					</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" id="product" onChange="showCustomer(this.value)">
					Credit Risk
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" id="product" onChange="showCustomer(this.value)">
					Inherit Supplier Products
					</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" id="product" onChange="showCustomer(this.value)">
					Is Cisignor
					</td>
				</tr>	
				
				<tr>
					<td><input type="checkbox" id="product" onChange="showCustomer(this.value)">
					Contact Required	
					</td>
				</tr>

				<tr>
					<td>Suppress Component Type<select class="select" id="product" onChange="showCustomer(this.value)">
					<?php
						//$query1="SELECT prod_id,prod_name FROM Customer";
						$result1=$mysqli->query($query1);
						while($value1 = mysqli_fetch_array($result1))
						{
						   	//echo "<option>"  .''.  "</option>";
							//echo "<option>".$value1['prod_id'].$value1['prod_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
						
			</thead>
		</table>
        </form>
  </div>
</div>
 
 
</body>
</html>
	
<?php include("footer.php");?>