<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        
        ?>


<!-- <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">-->
 
<!-- <link href="css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/buttons.dataTables.css" rel="stylesheet">-->



<!--	<link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <script src="js/dataTables.fixedColumns.js"></script>
 <script src="js/dataTables.fixedColumns.min.js"></script>
 -->
<!-- <style>
    
.display{width:auto !important}
r{
   
    font-weight: bolder;
}
.product{
    background-color: #E5E4E2 !important;
}
.comp{
    background-color: #F5F5DC !important;
}
.red{
    font-color:red;
    font-weight: 2px;
    font-weight: bolder;
}
h1, .h1, h2, .h2, h3, .h3 {
    margin-bottom: -19px;
    margin-top: -28px;
}
.alert-trans{
    border:2px solid red;
}
select {
    background-color: #fff;
    border-radius: 4px;
    width: 152px !important;
}
inputtext {
    background-color: #fff;
    border-radius: 4px;
    width: 152px !important;
}
input, button, select, textarea {
    line-height: normal;
}
.right {
    background: #f5f5f5 none repeat scroll 0 0;
    float: right;
    /*margin-right: 200px;*/
    margin-top: 31px;
}
a {
    cursor: pointer;
}
</style>-->




    
<script>
    $("#from1").click(function() {
$('.from1').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker3').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
 });
 
 $("#from2").click(function() {
$('.from2').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker3').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
 });
 
</script>

<script>
    $("#to").click(function() {
$('.to').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker3').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
 });
</script>

<html>
	<link rel="stylesheet" type="text/css" href="css/Style.css">
	<body>
        
	
	<table id="viewer" class="stripe row-border order-column display" name="viewer" cellspacing="0" width="100%">
        
            
        <?php
                //echo $_POST[selCarrier];
                  
        $query1 = "select * from Customer where supplier_no='".$supplier."' and cust_no='".$customer."'";
       
        
         //echo $final_query;
         //echo "from date is ->".$from_date;
          //echo "to date is ->".$to_date;
         $transactionList = $mysqli->query($query1);
         
        
//                echo "select term_id, folio_mo,folio_no,folio_yr,trans_id,doc_no,rec_type,shipment_no,order_no,trans_ref_no,driver,truck,trailer1,trailer2,
//	carrier,supplier_no,cust_no,acct_no,destination_no,transaction_date,transaction_time,load_start_date,load_start_time,load_stop_date,load_stop_time,
//	cancel_rebill,UserID,ManualDateCreated from TransHeader where carrier ='$carrier' OR acct_no = '$account' OR driver = '$driver' OR doc_no = '$document'
//	OR supplier_no = '$supplier'";
//		
		if(!$transactionList)
		{
			echo 'Could not run query: ' . mysqli_error();
    		
		}
		?>
		<tbody>
		<?php
		if(mysqli_num_rows($transactionList))
		{
			while($row = mysqli_fetch_assoc($transactionList))
			{?>
			
                            <tr>
                                        
					<td>Short Name</td>
                                        <td>
                                            <input type="text" id="shrtname" name="shrtname" value="<?php echo $row['short_cust_name'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Name 1</td>
                                        <td>
                                            <input type="text" id="name1" name="name1" value="<?php echo $row['name1'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Name 2</td>
                                        <td>
                                            <input type="text" id="name2" name="name2" value="<?php echo $row['name2'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Address 1</td>
                                        <td>
                                            <input type="text" id="addr1" name="addr1" value="<?php echo $row['addr1'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Address 2</td>
                                        <td>
                                            <input type="text" id="addr2" name="addr2" value="<?php echo $row['addr2'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Country</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="country" id="country">
                                                    <option name='custCntry' value="<?php echo $row['country'];?>"><?php echo $row['country'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>State</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="state" id="state">
                                                    <option name='custState' value="<?php echo $row['state'];?>"><?php echo $row['state'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>City</td>
                                        <td>
                                            <input type="text" id="city" name="city" value="<?php echo $row['city'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Zip</td>
                                        <td>
                                            <input type="text" id="zip" name="zip" value="<?php echo $row['zip'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Phone</td>
                                        <td>
                                            <input type="text" id="phn" name="phn" value="<?php echo $row['phone'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Contact Name</td>
                                        <td>
                                            <input type="text" id="cntname" name="cntname" value="<?php echo $row['contact_name'];?>">
					</td>
				</tr>
                                <tr>
                                     <td>Customer Type</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="ctype" id="ctype">
                                                    <option name='custType' value="<?php echo $row['cust_type'];?>"><?php echo $row['cust_type'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>ISO Language</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="isolang" id="isolang">
                                                    <option name='custIsoLang' value="<?php echo $row['iso_language'];?>"><?php echo $row['iso_language'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
<!--                                <tr>
                                     <td>IA Partner</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="iap" id="iap">
                                                    <option name='custIap' value="<?php //echo $row[''];?>"><?php //echo $row['iso_language'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>-->
                                
                                <tr>					
                                    <td><input type="checkbox" name="isLocked" id="isLocked" value="<?php echo $row['locked'];?>" <?php 
                                                    if(strcmp($row['locked'],"Y") == 0)
                                                    {
                                                        $aeld = $row['lockout_date'];
                                                        $aeld_yr = "20".substr($aeld,0,2);
                                                        $aeld_mon = substr($aeld,2,2);
                                                        $aeld_dt = substr($aeld,4,2);
                                                        $aeld_date = $aeld_mon."/".$aeld_dt."/".$aeld_yr;
                                                        $aeld_datetime = strtotime($aeld_date);
                                                        
                                                        
                                                        ?>
                                                        checked="checked"
                                                    <?}?>
                                                       >&nbsp; Locked Out</td>
                                </tr>	
				
                                <tr>
					<td>Lockout Date</td>
					<td>
                                            <?php
                                                
                                            ?>
					        <input type="text" name="from1" data-role="popup" value="<?php echo $var=date("d/m/Y",$aeld_datetime);?>" id="from1" class="tcal required"  readonly required/>
                                                </td>
						
				</tr>
                                
                                
                                <tr>
					<td>Effective Date</td>
					<td>
                                            <?php
                                                    $aexd = $row['eff_date'];
                                                        $aexd_yr = "20".substr($aexd,0,2);
                                                        $aexd_mon = substr($aexd,2,2);
                                                        $aexd_dt = substr($aexd,4,2);
                                                        $aexd_date = $aexd_mon."/".$aexd_dt."/".$aexd_yr;
                                                        $aexd_datetime = strtotime($aexd_date);
                                            ?>
					        <input type="text" name="from2" data-role="popup" value="<?php echo $var=date("d/m/Y",$aexd_datetime);?>" id="from2" class="tcal required"  readonly required/>
                                                </td>
						
				</tr>
                                <tr>
					<td>Expiration Date</td>
					<td>
                                            <?php
                                                    $aefd = $row['exp_date'];
                                                        $aefd_yr = "20".substr($aefd,0,2);
                                                        $aefd_mon = substr($aefd,2,2);
                                                        $aefd_dt = substr($aefd,4,2);
                                                        $aefd_date = $aefd_mon."/".$aefd_dt."/".$aefd_yr;
                                                        $aefd_datetime = strtotime($aefd_date);
                                            ?>
					        <input type="text" name="to" data-role="popup" value="<?php echo $var=date("d/m/Y",$aefd_datetime);?>" id="to" class="tcal required"  readonly required/>
                                                </td>
						
				</tr>
                    
                            <?php
			}
		}
		
		?>
		</tbody>
		</table>
	</form>
	</body>
<!--        <script src="js/dataTables.fixedColumns.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>-->
<!--        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.flash.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>-->
	</html>
    