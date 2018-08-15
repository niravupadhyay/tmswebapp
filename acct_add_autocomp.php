<?php
	session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>


 <?php include("header.php");?>
 
    <?php
        
                
   ?>

 <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <script src="js/dataTables.fixedColumns.js"></script>
 <script src="js/dataTables.fixedColumns.min.js"></script>
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget.js"></script>-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<link rel="stylesheet" href="css/jquery-dropdown-widget.css">-->
 
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
    width: 300px !important;
}
inputtext {
    background-color: #fff;
    border-radius: 4px;
    width: 300px !important;
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
.ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        }
</style>
<script>
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        $( "#paging" ).click(function() {	
        
        var toggleButton = function() {
            //alert("sdsjj");
            $("#load").css({"visibility":"visible"});
        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        }
        $("#alert-trans").css("visibility", "hidden");
        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("hi");
        //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
        $.ajax({
        type: "POST",
        url: "acctAddAjax.php",
        dataType: 'text',
        cache : false,
        data: $('#acct_add').serialize(),
        beforeSend: toggleButton,
        success: function(data) {
            $("#load").css({"visibility":"hidden"});
            alert(data);
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

$("#selSupplier").change(function(){

    showData($("#selSupplier").val(),"supp");
});
$("#selCustomer").change(function(){

    showData($("#selCustomer").val(),"cust");
});

//$( "#selSupplier" ).combobox();
//$( "#selCustomer" ).combobox();
//$( "#selAccount" ).combobox();

});

//new code for transprod and transcomp data

</script>

<script>
function showData(str,dataLevel)
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
                        if(dataLevel === "supp")
			{
			    //var respStr = xmlhttp.responseText;
                            //var dataSrc = respStr.split(",");

                            //$("#selCustomer").autocomplete({
                              //  source:dataSrc
			//	change: function(event, ui){
			//		var custVal = $(this).val();
			//		showData(custVal);
			//	}
                          //  });
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
			}
                        else if(dataLevel === "cust")
			{
			    var respStr = xmlhttp.responseText;
                            var dataSrc = respStr.split(",");

                            $("#selAccount").autocomplete({
                                source:dataSrc,
				select: function( event, ui ) {alert('test');}
                            });	
                            //document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
			}
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		if(dataLevel === "supp")
                {
			xmlhttp.open("POST","ajax.php", true);
		}
		else
		{		
			xmlhttp.open("POST","getAccts.php", true);
		}
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
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
}
/*function loadAcctData(str)
{
    
    alert(str);
}*/
</script>

    
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

<script>
$(document).ready(function() {

$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
}
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#acct_add').resetForm();
});

$("#isLocked").change(function() {
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
        
<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Account Add </h2>
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
				
                                <form name="acct_add" method="post" id="acct_add">
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
                            <thead>
				
                                <tr>
                                    <td>Supplier</td><td>
                                        <div class="ui-widget">
					<select id="selSupplier" name="selSupplier">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            if($restrictSCADisplay)
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
                                            }
					?>
					</select>
                                        </div>
					</td>
				</tr>
				<tr>
                                        
                                    
					<td>Customer</td><td>
                                        <div class="ui-widget">
					<select  name="selCustomer" id="selCustomer">
					
					</select>
                                        </div>
					</td>
					<!--<td>Customer</td><td>
                                                <input id="selCustomer" name="selCustomer"/>
                                        </td>-->
				</tr>
				
                                <tr>
                                        <!--<td>Account</td><td>
                                        <div class="ui-widget">
					<select  name="selAccount" id="selAccount">
					
					</select>
                                        </div>
					</td>-->
					<!--<td>Account No</td>
                                        <td>
                                            <input type="text" id="acctno" name="acctno">
					</td>-->
					<td>Account</td><td>
                                                <input id="selAccount" name="selAccount"/>
                                        </td>
				</tr>
                                
                                <tr>
                                        
					<td>Account Name</td>
                                        <td>
                                            <input type="text" id="acctname" name="acctname">
					</td>
				</tr>
                                
                                <tr>
                                        
					<td>Short Name</td>
                                        <td>
                                            <input type="text" id="shrtname" name="shrtname">
					</td>
				</tr>
                                <tr>
                                     <td>Name 1</td>
                                        <td>
                                            <input type="text" id="name1" name="name1">
					</td>
				</tr>
                                <tr>
                                     <td>Name 2</td>
                                        <td>
                                            <input type="text" id="name2" name="name2">
					</td>
				</tr>
                                <tr>
                                     <td>Address 1</td>
                                        <td>
                                            <input type="text" id="addr1" name="addr1">
					</td>
				</tr>
                                <tr>
                                     <td>Address 2</td>
                                        <td>
                                            <input type="text" id="addr2" name="addr2">
					</td>
				</tr>
                                <tr>
                                     <td>Country</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="country" id="country">
                                                    <option name='acctCntry' value="CA">Canada</option>
                                                    <option name='acctCntry' value="US">USA</option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>State</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="state" id="state">
                                                    <option name='acctState' value="ON">Ontario</option>
                                                    <option name='acctState' value="QC">Quebec</option>
                                                    <option name='acctState' value="MB">Manitoba</option>
                                                    <option name='acctState' value="NS">Nova Scotia</option>
                                                    <option name='acctState' value="NB">New Brunswick</option>
                                                    <option name='acctState' value="AB">Alberta</option>
                                                    <option name='acctState' value="BC">British Columbia</option>
                                                    <option name='acctState' value="NY">New York</option>
                                                    <option name='acctState' value="TN">Tennessee</option>
                                                    
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>City</td>
                                        <td>
                                            <input type="text" id="city" name="city">
					</td>
				</tr>
                                <tr>
                                     <td>Zip</td>
                                        <td>
                                            <input type="text" id="zip" name="zip">
					</td>
				</tr>
                                <tr>
                                     <td>Phone</td>
                                        <td>
                                            <input type="text" id="phn" name="phn">
					</td>
				</tr>
                                <tr>
                                     <td>Contact Name</td>
                                        <td>
                                            <input type="text" id="cntname" name="cntname">
					</td>
				</tr>
                                <tr>
                                     <td>Account Type</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="atype" id="atype">
                                                    <option name='acctType' value="R">Rack Account</option>
                                                    <option name='acctType' value="S">Supplier Account</option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
                                <tr>
                                     <td>ISO Language</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="isolang" id="isolang">
                                                    <option name='acctIsoLang' value="<?php echo $row['iso_language'];?>"><?php echo $row['iso_language'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>
<!--                                <tr>
                                     <td>IA Partner</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="iap" id="iap">
                                                    <option name='acctIap' value="<?php //echo $row[''];?>"><?php //echo $row['iso_language'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>-->
                                
                                <tr>					
                                    <td><input type="checkbox" name="isLocked" id="isLocked" value="N">&nbsp; Locked Out</td>
                                </tr>	
                                
                                <tr>
					<td>Locked Out Date</td>
					<td>
					        <input type="text" name="from1" data-role="popup" value="" id="from1" class="tcal required"  readonly required/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Authorized Eff.Date</td>
					<td>
					        <input type="text" name="from2" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from2" class="tcal required"  readonly required/>
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
