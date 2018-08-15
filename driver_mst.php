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
 

<script src="jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget-cust.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>

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
    width: 300px !important;
}
/*input[type="text"] {
    background-color: #fff;
    border-radius: 4px;
    width: 370px !important;
}*/
.cmptxtid
{
    width: 170px !important;
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


function loadDriverData(str)
{
	//alert(str);
    $("#loadingDiv").css({"visibility":"visible"});
    //alert(str);
    //var suppEle = document.getElementById("selCarrier");
    //var suppno = suppEle.options[suppEle.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "driverDataAjax.php",
        dataType: 'text',
        cache : false,
        data: ({drno:str}),
        success: function(data) {
            $("#loadingDiv").css({"visibility":"hidden"});
            //alert(data);
	    var drData = data.split(":::");
            
            //alert(str);
            
            
            // ...then you need to set the display text of the actual autocomplete box.
            //$('#selCarrier').focus().val(suppno);
           // $('select[name=selCarrier]').val(suppno);
            
            //$('#selDriver').val(str);
            //$('#selDriver-input').focus().val(str);
            
            //drRecordIndex = document.getElementById("selDriver").selectedIndex;
            //alert(vehRecordIndex);
            
            //$("#lblCustName").html(drData[0]);
	    $("#dcn").val(drData[0]);
            $("#csnum").val(drData[1]);
            
            $("#lnum").val(drData[2]);
            
            $("#drcarr").val(drData[3]);
            $("#drsupp").val(drData[4]);
            $("#drcust").val(drData[5]);
            $("#dracct").val(drData[6]);
            $("#drdest").val(drData[7]);
            
            $("#treq").val(drData[8]);
            $("#tailreq").val(drData[9]);
            $("#dtype").val(drData[10]);
            
            var fromHr = drData[11].substr(0,2);
            var fromMin = drData[11].substr(2,2);
            $("#afrom").val(fromHr + ":" + fromMin);
            var toHr = drData[12].substr(0,2);
            var toMin = drData[12].substr(2,2);
            $("#ato").val(toHr + ":" + toMin);
            $("#adays").val(drData[13]);
            
            
            var texpdate = drData[14].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#texpdate").val(texpdate);
            
            var c1date = drData[15].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#c1date").val(c1date);
            
            var c2date = drData[16].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#c2date").val(c2date);
            
            var odhexpdate = drData[17].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#odhexpdate").val(odhexpdate);
            
            
            var expdate = drData[18].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#expdate").val(expdate);
            
            var dmeexpdate = drData[19].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#dmeexpdate").val(dmeexpdate);
            
            var drtexpdate = drData[20].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#drtexpdate").val(drtexpdate);
            
            var drevexpdate = drData[21].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#drevexpdate").val(drevexpdate);
            
            var saexpdate = drData[22].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#saexpdate").val(saexpdate);
            
            var dlexpdate = drData[23].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#dlexpdate").val(dlexpdate);
            
            $("#preq").val(drData[24]);
            $("#pcode").val(drData[25]);
            
            
            if(drData[26] === 'Y')
            {
                //alert('hoo');
                $('input[name=isLocked]').prop('checked', true);
                $('input[name=isLocked]').prop('value', 'Y');
            }
            else
            {
                $('input[name=isLocked]').prop('checked', false);
                $('input[name=isLocked]').prop('value', 'N');
            }
            
            
            var lockedDate = drData[27].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#lockdate").val(lockedDate);
            
            
            if(drData[28] === 'Y')
            {
                //alert('hoo');
                $('input[name=isDS]').prop('checked', true);
                $('input[name=isDS]').prop('value', 'Y');
            }
            else
            {
                $('input[name=isDS]').prop('checked', false);
                $('input[name=isDS]').prop('value', 'N');
            }
            
            if(drData[29] === 'Y')
            {
                //alert('hoo');
                $('input[name=isTL]').prop('checked', true);
                $('input[name=isTL]').prop('value', 'Y');
            }
            else
            {
                $('input[name=isTL]').prop('checked', false);
                $('input[name=isTL]').prop('value', 'N');
            }
            
            if(drData[30] === 'Y')
            {
                //alert('hoo');
                $('input[name=isMP]').prop('checked', true);
                $('input[name=isMP]').prop('value', 'Y');
            }
            else
            {
                $('input[name=isMP]').prop('checked', false);
                $('input[name=isMP]').prop('value', 'N');
            }
            
            //$('#selTransactionListing').html(data);
            //initDataTable();
            //attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
   });
    
}


</script>


<script>
    
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        
        
        
        
       
      //$("#selCarrier").change(function(){

  //  showData($("#selCarrier").val());
//});

$( "#selDriver" ).combobox();

//$( "#country" ).combobox();
//$( "#state" ).combobox();

});

//new code for transprod and transcomp data

</script>



    
<script>
    $("#lockdate").click(function() {
$('.lockdate').datepicker( {
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
 
 $("#texpdate").click(function() {
$('.texpdate').datepicker( {
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
 
    $("#c1date").click(function() {
$('.c1date').datepicker( {
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
 
  $("#c2date").click(function() {
$('.c2date').datepicker( {
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
 
  $("#odhexpdate").click(function() {
$('.odhexpdate').datepicker( {
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
 
  $("#expdate").click(function() {
$('.expdate').datepicker( {
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
 
  $("#dmeexpdate").click(function() {
$('.dmeexpdate').datepicker( {
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
 
  $("#drtexpdate").click(function() {
$('.drtexpdate').datepicker( {
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
    $("#drevexpdate").click(function() {
$('.drevexpdate').datepicker( {
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
 
 $("#saexpdate").click(function() {
$('.saexpdate').datepicker( {
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
 
 $("#dlexpdate").click(function() {
$('.dlexpdate').datepicker( {
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
	$('#veh_add').resetForm();
});

$("#isLocked").click(function() {
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
        
<div id="loadingDiv">
    <div>
        <h7>Please wait...</h7>
    </div>
</div>
        
<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Drivers </h2>
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
				
                                <form name="driver_add" method="post" id="veh_add">
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
                            <thead>
				
                                <tr>
                                    <td>Driver</td><td>
                                        <div class="ui-widget">
					<select id="selDriver" name="selDriver">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            $query3="SELECT driver_no, name FROM Driver";
						$result3=$mysqli->query($query3);
                                                echo "<option name='drvr'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='drvr' value=".$value3['driver_no'].">".$value3['driver_no']." --- ".trim($value3['name'])."</option>";
						}
                                            
					?>
					</select>
                                        </div>
					</td>
				</tr>
				<tr>

					<!--<td>Customer</td><td>
                                        	<input id="selCustomer" name="selCustomer"/>
                                    	</td>-->
                                        <td>Card Number</td>
                                        <td>
                                            <input type="text" id="dcn" name="dcn" maxlength="8" readonly="readonly">
					</td>
<!--                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCustName'></label> </td>-->
<!--					<td> <input type="text" id="custname" name="custname"> </td>-->
                                        
<!--                                    <td>Customer No</td>
                                        <td>
                                            <input type="text" id="custno" name="custno">
					</td>-->
                                
                                     
				</tr>
				
                                <tr>
                                     <td>Card Sequence Number</td>
                                        <td>
                                            <input type="text" id="csnum" name="csnum" maxlength="9" readonly="readonly">
					</td>
                                
                                        
                                        
                                     
				</tr>
                                
                                <tr>
                                    <td>Carrier</td>
                                        <td>
                                            <input type="text" id="drcarr" name="drcarr" maxlength="7" readonly="readonly">
					</td>
                                        
                                        
                                        
                                    
                                </tr>
                                        
                                        
                                <tr>
                                     <td>License Number</td>
                                        <td>
                                            <input type="text" id="lnum" name="lnum" maxlength="21" readonly="readonly">
					</td>
                                        
                                        
                                        
				
				</tr>
                                
                                <tr>
                                     <td>Default Supplier</td>
                                        <td>
                                            <input type="text" id="drsupp" name="drsupp" maxlength="10" readonly="readonly">
					</td>
                                        
                                                                                
                                    
                                        
				</tr>
                                
                                <tr>
                                     <td>Default Customer</td>
                                        <td>
                                            <input type="text" id="drcust" name="drcust" maxlength="10" readonly="readonly">
					</td>
                                        
                                        
                                        
				</tr>
                                
                                
                                <tr>
                                     <td>Default Account</td>
                                        <td>
                                            <input type="text" id="dracct" name="dracct" maxlength="10" readonly="readonly">
					</td>
                                        
                                        
				</tr>
                                
                                
                                <tr>
                                     <td>Default Destination</td>
                                        <td>
                                            <input type="text" id="drdest" name="drdest" maxlength="10" readonly="readonly">
					</td>
                                        
				</tr>
                                
                                
                                <tr>
                                     <td>Truck Required</td>
                                        <td>
                                            
                                            <select id="treq" name="treq" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Use Carrier</option>";
                                            echo "<option name='type' value='0'>0 --- Do not Prompt for Truck Number</option>";
                                            echo "<option name='type' value='1'>1 --- Prompt for Truck #/Entry not required</option>";
                                            echo "<option name='type' value='2'>2 --- Prompt for Truck #/Require entry/Do not validate</option>";
                                            echo "<option name='type' value='3'>3 --- Prompt for Truck #/Require entry/Validate</option>";
                                            echo "<option name='type' value='4'>4 --- Positive ID</option>";
                                            
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                
                                <tr>
                                     <td>Trailer Required</td>
                                        <td>
                                            
					<select id="tailreq" name="tailreq" disabled="disabled>
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Use Carrier</option>";
                                            echo "<option name='type' value='0'>0 --- Do not Prompt for Truck Number</option>";
                                            echo "<option name='type' value='1'>1 --- Prompt for Truck #/Entry not required</option>";
                                            echo "<option name='type' value='2'>2 --- Prompt for Truck #/Require entry/Do not validate</option>";
                                            echo "<option name='type' value='3'>3 --- Prompt for Truck #/Require entry/Validate</option>";
                                            echo "<option name='type' value='4'>4 --- Positive ID</option>";
                                            
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                
                                <tr>
                                     <td>Driver Type</td>
                                        <td>
                                            
					<select id="dtype" name="dtype" disabled="disabled>
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- No special type (default setting)</option>";
                                            echo "<option name='type' value='I'>I --- Inbound weighing only</option>";
                                            echo "<option name='type' value='O'>O --- Outbound weighing (tare from)</option>";
                                            
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                
                                
                                <tr>
                                     <td>Access From</td>
                                        <td>
                                            <input type="text" id="afrom" name="afrom" maxlength="5" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>Access To</td>
                                        <td>
                                            <input type="text" id="ato" name="ato" maxlength="5" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>Access Days (SMTWTFS)</td>
                                        <td>
                                            <input type="text" id="adays" name="adays" maxlength="7" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
					<td>Training Exp Date</td>
					<td>
                                            <input type="text" name="texpdate" data-role="popup" value="" id="texpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Certificattion 1 Exp Date</td>
					<td>
                                            <input type="text" name="c1date" data-role="popup" value="" id="c1date" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Certificattion 2 Exp Date</td>
					<td>
                                            <input type="text" name="c2date" data-role="popup" value="" id="c2date" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>On-Duty Hours Expiration Date</td>
					<td>
                                            <input type="text" name="odhexpdate" data-role="popup" value="" id="odhexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Expiration Date</td>
					<td>
                                            <input type="text" name="expdate" data-role="popup" value="" id="expdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>DOT Med. Exam Exp Date</td>
					<td>
                                            <input type="text" name="dmeexpdate" data-role="popup" value="" id="dmeexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Driver Road Test Exp Date</td>
					<td>
                                            <input type="text" name="drtexpdate" data-role="popup" value="" id="drtexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Driving Review Exp Date</td>
					<td>
                                            <input type="text" name="drevexpdate" data-role="popup" value="" id="drevexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>State Agency Exp Date</td>
					<td>
                                            <input type="text" name="saexpdate" data-role="popup" value="" id="saexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Driver License Exp Date</td>
					<td>
                                            <input type="text" name="dlexpdate" data-role="popup" value="" id="dlexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
                                    <td>Pin Required</td>
                                        <td>
                                            
                                            <select id="preq" name="preq" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value='F'>F --- Fingerprint Verification Required</option>";
                                            echo "<option name='type' value='N'>N --- No PIN Required</option>";
                                            echo "<option name='type' value='Y'>Y --- PIN Required</option>";
                                            
					?>
					</select>
                                        
					</td>
                                </tr>
                                
                                <tr>
                                    <td>PIN Code</td>
                                        <td>
                                            <input type="password" id="pcode" name="pcode" maxlength="4" readonly="readonly">
					</td>
                                </tr>
                                
                                <tr>
                                    <td><input type="checkbox" name="isLocked" id="isLocked" value="N" disabled="disabled">&nbsp; Locked Out</td>
                                </tr>
                                
                                <tr>
                                    <td>Locked Out Date</td>
					<td>
                                            <input type="text" name="lockdate" data-role="popup" value="" id="lockdate" class="tcal required" maxlength="10" readonly="readonly" disabled="disabled"/>
                                	</td>
                                </tr>
                                
                                <tr>
                                    <td><input type="checkbox" name="isDS" id="isDS" value="N" disabled="disabled">&nbsp; Driver Status</td>
                                </tr>
                                
                                <tr>
                                    <td><input type="checkbox" name="isTL" id="isTL" value="N" disabled="disabled">&nbsp; Truck Loading</td>
                                </tr>
                                
                                <tr>
                                    <td><input type="checkbox" name="isMP" id="isMP" value="N" disabled="disabled">&nbsp; Meter Proving</td>
                                </tr>
                                
                        <tr>    
                            <td></td>
                            <td>
                                <!--<input type="button" name="button" id="prev" value="Previous" onClick="">
                                <input type="button" name="button" id="next" value="Next" onClick="">-->
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
