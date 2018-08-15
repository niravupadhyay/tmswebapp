<?php
	session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>


 <?php include("headerAP.php");?>
 
    <?php	
	$terminal = $_GET['selterminal'];
        $supplier = $_GET['selSupplier'];
        $customer = $_GET['selCustomer'];
        $account =  $_GET['selAccount'];
        //$product = $_GET['p'];        
        
   ?>

 <script src="jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget.js"></script>

<link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="css/jquery-dropdown-widget.css">

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
    
/*function showData(str,dataLevel)
{
    
    if (str === "") 
    {
	    document.getElementById("sel"+dataLevel).innerHTML = "";
            return;
    }
    else 
    { 
                if (window.XMLHttpRequest) 
                {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
                    var xmlhttp = new XMLHttpRequest();
                }
		else 
		{
		    // code for IE6, IE5
                    var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		xmlhttp.onreadystatechange = function() 
		{
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
                    {
                        //alert(dataLevel);
                        if(dataLevel === "supp")
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                        else if(dataLevel === "cust")
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajax.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
                    //alert("Supp:"+str);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("supplier_no="+str);
                }
                else if(dataLevel === "cust")
                {
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppEle.selectedIndex].value;
                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                }
		//alert("transaction_viewer.php" Mithunva");
	}
}*/

</script>

<script>
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        $( "#paging" ).click(function() {	
        
	    if($('#selterminal').val().trim() === "" || $('#selSupplier').val().trim() === "" || $('#selCustomer').val().trim() === "" || $('#selAccount').val().trim() === "" || $('#selProduct-input').val().trim() === "" || $('#selProduct').val().trim() === "")
	    {
		alert("Product information should not be blank !");
		return false;
	    }

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
        url: "ajaxAcPrAdd.php",
        dataType: 'text',
        cache : false,
        data: $('#ap_edit').serialize(),
        //beforeSend: validateForm,
        success: function(data) {
            $("#loadingDiv").css({"visibility":"hidden"});
            alert(data);
            //document.getElementById("source").value = data;
            //$('#selTransactionListing').html(data);
            //initDataTable();
            //attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
    });
    return false;
   
} );

    //$( "#selterminal" ).combobox();
    //$( "#selSupplier" ).combobox();
    //$( "#selCustomer" ).combobox();
   //$( "#selAccount" ).combobox();
   $( "#selProduct" ).combobox();
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Add Account Products </h2>
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
						<select name="selterminal" id="selterminal">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
							//$query1="SELECT term_id, name FROM TerminalProfile";
							//$result1=$mysqli->query($query1);
                                                        //while($value1 = mysqli_fetch_array($result1))
							//{
							//	echo "<option value=".$value1["term_id"].">".$value1['term_id']." --- ".trim($value1['name'])."</option>";
							//}
							echo "<option>".$terminal."</option>";
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
					<select  id="selSupplier" name="selSupplier">
<!--					<option name='supp' value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
					/*	if($restrictSCADisplay)
                                                {
                                                    $query3="SELECT distinct supplier_num, supp_shrt_name FROM TWUserSCA where tms_uname='$user'";
                                                    $result3=$mysqli_web->query($query3);
                                                    echo "<option name='supp'></option>";
                                                    while($value3 = mysqli_fetch_array($result3))
                                                    {
                                                        echo "<option name='supp' value=".$value3['supplier_num'].">".$value3['supplier_num']." --- ".trim($value3['supp_shrt_name'])."</option>";
                                                    }
                                                }
                                                else
                                                {
                                                    $query3="SELECT supplier_no, short_supplier_name FROM Supplier";
                                                    $result3=$mysqli->query($query3);
                                                    echo "<option name='supp'></option>";
                                                    while($value3 = mysqli_fetch_array($result3))
                                                    {
                                                            echo "<option name='supp' value=".$value3['supplier_no'].">".$value3['supplier_no']." --- ".$value3['short_supplier_name']."</option>";
                                                    }
                                                }*/
						echo "<option>".$supplier."</option>";
					
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Customer</td><td>
					<select name="selCustomer" id="selCustomer">
				 	<?php
                                                echo "<option>".$customer."</option>";
                                        ?>	
					</select>
					</td>
				</tr>
				<tr>
					<td>Account</td><td>
					<select class="select" name="selAccount" id="selAccount">
					<?php
						echo "<option>".$account."</option>";
					?>
					</select>
					</td>
				</tr>
                                
				<tr>
					<td>Product</td><td>
					<select name="selProduct" id="selProduct">
					<!--<option value=""></option>-->
					<?php
						$prodQuery="SELECT prod_id, short_name FROM Product";
						$prodResult=$mysqli->query($prodQuery);
                                                echo "<option></option>";
						while($prodValue = mysqli_fetch_array($prodResult))
						{
                                                    echo "<option value=".$prodValue['prod_id'].">".$prodValue['prod_id']." --- ".trim($prodValue['short_name'])."</option>";
						}
					?>
					</select>
					</td>
				</tr>
                                
				<tr>
					<td>SPD Code</td><td>
					<input type="text" class="inputtext" name="spd_code" id="spd_code">
					</td>
				</tr>
				<tr>
					<td>Contract Number</td><td>
					<input type="text" class="inputtext" name="contract_number" id="contract_number">
					</td>
				</tr>
                                
                                <tr>
					<td>Authorized Eff.Date</td>
					<td>
					        <input type="text" name="from" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from" class="tcal required"  readonly required/>
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
					<input type="text" name="to" value="<?php echo $var=date("d/m/Y");?>" id="to" class="tcal required" readonly required/>
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
					<input type="text" class="inputtext" name="ERPHandlingType" id="ERPHandlingType">
					</td>
				</tr>
                                <tr>
					<td>Source</td><td>
					<input type="text" class="inputtext" name="source" id="source">
					 </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="isae" id="isae" value="N"> &nbsp; Active
                                    </td>
                                </tr>
                                <tr>					
                                    <td><input type="checkbox" name="isoi" id="isoi" value="N">&nbsp; Enable OSP Interface</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="ispd" id="ispd" value="N">&nbsp; Print Delivery Ticket</td>
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
