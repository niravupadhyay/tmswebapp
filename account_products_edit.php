<?php
	session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>


 <?php include("headerAP.php");?>
 
    <?php
        
        $terminal = $_GET['ter'];
        $supplier = $_GET['sup'];
        $customer = $_GET['cust'];
        $account =  $_GET['acct'];
        $product = $_GET['p'];
        
        $spdcode = $_GET['sc'];
        $cn = $_GET['cn'];
                
        $aefd = $_GET['aefd'];
        $aefd_yr = "20".substr($aefd,0,2);
        $aefd_mon = substr($aefd,2,2);
        $aefd_dt = substr($aefd,4,2);
        $aefd_date = $aefd_mon."/".$aefd_dt."/".$aefd_yr;
        $aefd_datetime = strtotime($aefd_date);
                
        $aexd = $_GET['aexd'];
        $aexd_yr = "20".substr($aexd,0,2);
        $aexd_mon = substr($aexd,2,2);
        $aexd_dt = substr($aexd,4,2);
        $aexd_date = $aexd_mon."/".$aexd_dt."/".$aexd_yr;
        $aexd_datetime = strtotime($aexd_date);
        
        $erp = $_GET['erp'];
        $src = $_GET['src'];
        $ae = $_GET['ae'];
        $oi = $_GET['oi'];
        $pdt = $_GET['pdt'];
        
   ?>

 <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <script src="js/dataTables.fixedColumns.js"></script>
 <script src="js/dataTables.fixedColumns.min.js"></script>
 <style>
    
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
#loadingDiv{
  position:fixed;
  visibility:hidden;
  top:0px;
  right:0px;
  width:100%;
  height:100%;
  background-color:#666;
  background-image:url('images/3.gif');
  background-repeat:no-repeat;
  background-position:center;
  z-index:10000000;
  opacity: 0.4;
  filter: alpha(opacity=40); /* For IE8 and earlier */
}
</style>
<script>
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        $( "#paging" ).click(function() {	
        
//        var toggleButton = function() {
//            //alert("sdsjj");
//            $("#load").css({"visibility":"visible"});
//        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
//        }
//        $("#alert-trans").css("visibility", "hidden");
        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("hi");
        //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
        
        $("#loadingDiv").css({"visibility":"visible"});
        
        $.ajax({
        type: "POST",
        url: "ajaxAcPrEdit.php",
        dataType: 'text',
        cache : false,
        data: $('#ap_edit').serialize(),
        //beforeSend: toggleButton,
        success: function(data) {
            //$("#load").css({"visibility":"hidden"});
            $("#loadingDiv").css({"visibility":"hidden"});
            alert(data);
            //$('#selTransactionListing').html(data);
            //initDataTable();
            attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
    });
    return false;
   
} );

});

//new code for transprod and transcomp data

</script>



    
<script>
    $("#from").click(function() {
$('.from').datepicker( {
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

<script>
$(document).ready(function() {

$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
}
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#ap_edit').resetForm();
});

$("#isae").change(function() {
    if(this.checked) 
        this.value = "Y";
    else
        this.value = "N";
    //alert(this.value);
});

$("#isoi").change(function() {
    if(this.checked)
        this.value = "Y";
    else
        this.value = "N";
    //alert(this.value);
});

$("#ispd").change(function() {
    if(this.checked)
        this.value = "Y";
    else
        this.value = "N";
    //alert(this.value);
});
 

});	
</script>


	<style>
	div.container {
        width: 80%;
    }
	div.dataTables_wrapper {
        width: 95%;
        margin: 0 auto;
    }
    h4, .h4 {
    font-size: 20px;
}
	</style>

<div id="loadingDiv">
    <div>
        <h7>Please wait...</h7>
    </div>
</div>        
        
<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Account Products Edit </h2>
<!--            <div class="box-icon">
              <a href="#" class="btn btn-setting btn-round btn-default"><i
                class="glyphicon glyphicon-cog"></i></a>
              <a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i
                class="glyphicon glyphicon-chevron-up"></i></a>
              <a href="#" class="btn btn-close btn-round btn-default"><i
                class="glyphicon glyphicon-remove"></i></a>
            </div>-->
          </div>
            
            
            <div class="box-content2">
            <div id="" class="center" style="">
                <div id="container" class="trans-viewer">
		<!---section---->
			<div>
				
                                <form name="ap_edit" method="post" id="ap_edit">
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
                            <thead>
				<tr>
					<td>Terminal</td>
					<td>
                                            <select class="select" readonly disabled="disabled" name="selterminal">
						<?php
							
							echo "<option value=".$terminal.">".$terminal."</option>";
							
						?>
						</select>
					</td>
					<td width="50px"></td>
					<td>
						<?php
//						$query2= "select name from TerminalProfile";
//						$result2 = $mysqli->query($query2);
//						$value2 = mysqli_fetch_array($result2);
//						echo $value2['name'];
						?>
					</td>
				</tr>
				
                                <tr>
                                    <td>Supplier</td><td>
					<select class="select" id="selSupplier" name="selSupplier">
					
					<?php
						//$id = $_GET['id']  ;
						echo "<option>".$supplier."</option>";
						
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Customer</td><td>
					<select class="select" id="selCustomer" name="selCustomer">
					
					<?php
						//$id = $_GET['id']  ;
						echo "<option>".$customer."</option>";
						
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Account</td><td>
                                         <select class="select" id="selaccount" name="selAccount">
					
					<?php
						//$id = $_GET['id']  ;
						echo "<option>".$account."</option>";
						
					?>
					</select>
					</td>
				</tr>
				<tr>	
					<td>Product</td><td>
					<select class="select" id="selProd" name="selProd">
					
					<?php
						//$id = $_GET['id']  ;
						echo "<option>".$product."</option>";
						
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>SPD Code</td><td>
					<input type="text" class="inputtext" name="spd_code" id="spd_code" value="<?php echo $spdcode; ?>">
					</td>
				</tr>
				<tr>
					<td>Contract Number</td><td>
					<input type="text" class="inputtext" name="contract_number" id="contract_number" value="<?php echo $cn; ?>">
					</td>
				</tr>
                                
                                <tr>
					<td>Authorized Eff.Date</td>
					<td>
					        <input type="text" name="from" data-role="popup" value="<?php echo $var=date("d/m/Y",$aefd_datetime);?>" id="from" class="tcal required"  readonly required/>
<!--						<input class="inputDate" id="inputDate" value="<?php //$var=date("m/d/Y"); echo $var;?>"/>-->
<!--						<label id="closeOnSelect"><input type="checkbox"/> Close on selection</label>-->
					<!--<select name="txtmonth" id="txtmonth" >
						<?php
						/*for($i=01;$i<=12;$i++)
						{
							if($i == intval(date('m')))
							{?>	
								<option value="<?php echo $i;?>" selected ><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							}
							else
							{?>
								<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							}
						} */?>
						</select>
						<select name="txtday" id="txtday" >
						<?php 
						/*for($i=1;$i<=31;$i++)
						{
							if($i == date('j'))
							{?>
								<option value="<?php echo $i;?>" selected ><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>	
							<?php 
							}
							else
							{?>
								<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							} 
						}*/?>
						</select>
						<select name="txtyear" id="txtyear" >
						<?php 
						/*for($i=date('Y');$i>=2000;$i--)
						{?>
							<option value""><?php echo $i; ?></option>
					<?php	}*/?>
							</select>--->
						</td>
						
				</tr>
			
				<tr margin-left:5em>
					<td>Authorized Exp.Date</td>
					<td>
					<input type="text" name="to" value="<?php echo $var=date("d/m/Y",$aexd_datetime);?>" id="to" class="tcal required" readonly required/>
<!--                                                <input class="inputDate1" id="inputDate1" value="<?php //$var=date("m/d/Y"); echo $var;?>"/>-->
<!--						<label id="closeOnSelect1"><input type="checkbox"/> Close on selection</label>-->
					
						<!---<select name="txtmonth" id="txtmonth" >
						<?php 
						/*for($i=01;$i<=12;$i++)
						{
							if($i == intval(date('m')))
							{?>	
								<option value="<?php echo $i;?>" selected ><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							}
							else
							{?>
								<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							}
						 }*/ ?>
						</select>
						<select name="txtday" id="txtday" >
						<?php 
						/*for($i=1;$i<=31;$i++)
						{
							if($i == date('j'))
							{?>
								<option value="<?php echo $i;?>" selected ><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>	
							<?php 
							}
							else
							{?>
								<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
							<?php
							} 
						}*/?>
						</select>
						<select name="txtyear" id="txtyear" >
						<?php 
						/*for($i=date('Y');$i>=2000;$i--)
						{?>
							<option value""><?php echo $i; ?></option>
				<?php	}*/?>
						</select>
						-->
					</td>
                                </tr>
                                
				<tr>
					<td>ERP Handling Type</td><td>
					<input type="text" class="inputtext" name="ERPHandlingType" id="ERPHandlingType" value="<?php echo $erp; ?>">
					</td>
				</tr>
                                <tr>
					<td>Source</td><td>
					<input type="text" class="inputtext" name="source" id="source" value="<?php echo $src; ?>">
					 </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="isae" id="isae" value="<?php echo $ae;?>" <?php 
                                                    if(strcmp($ae,"Y") == 0)
                                                    {?>
                                                        checked="checked"
                                                    <?}?>
                                                    > &nbsp; Active
                                    </td>
                                </tr>
                                <tr>					
                                    <td><input type="checkbox" name="isoi" id="isoi" value="<?php echo $oi;?>" <?php 
                                                    if(strcmp($oi,"Y") == 0)
                                                    {?>
                                                        checked="checked"
                                                    <?}?>
                                                       >&nbsp; Enable OSP Interface</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="ispd" id="ispd" value="<?php echo $pdt;?>" <?php 
                                                    if(strcmp($pdt,"Y") == 0)
                                                    {?>
                                                        checked="checked"
                                                    <?}?>
                                                        >&nbsp; Print Delivery Tickit</td>
                                </tr>
                        <tr>    
                            <td></td><td><input type="button" name="button" id="paging" value="Save" onClick="">
                            </td>
                            <td id="load"></td>
                        </tr>
                            
		<?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
		
		</tbody>
		</table>
                                   
        </form>
                           
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>
