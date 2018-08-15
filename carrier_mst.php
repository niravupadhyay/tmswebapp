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
function showData(str,dataLevel)
{
 
    //var dataLevel = "carr";   
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
                        if(dataLevel === "carr")
			{
				//var respStr = xmlhttp.responseText;
                            //var dataSrc = respStr.split(",");
                            
                            //$("#selCustomer").autocomplete({
                              //  source:dataSrc
                            //});
                            carrRecordIndex = document.getElementById("selCarrier").selectedIndex;
                            //alert(xmlhttp.responseText);
                            document.getElementById("selVehicle").innerHTML = xmlhttp.responseText;
                            $('#selVehicle-input').focus().val('');
                            
			}
//                        if(dataLevel === "cntry")
//                        {       
//                            //alert(xmlhttp.responseText);
//                            
//                            document.getElementById("state").innerHTML = xmlhttp.responseText;
//                            $('#state-input').focus().val('');
//                        }
//                        else if(dataLevel === "cust")
//                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "carr")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    //alert(str);
                    xmlhttp.send("car_no="+str);
                }
//                if(dataLevel === "cntry")
//                {
//                    $("#loadingDiv").css({"visibility":"visible"});
//                    xmlhttp.send("cntry="+str);
//                }
//                else if(dataLevel === "cust")
//                {
//                    var suppEle = document.getElementById("selCarrier");
//                    var suppno = suppEle.options[suppEle.selectedIndex].value;
//                    //alert(suppno);
//                    $("#loadingDiv").css({"visibility":"visible"});
//                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
//                }
		//alert("transaction_viewer.php" Mithunva");
	}
}


function showDataNxt(str,dataLevel)
{
 
    //var dataLevel = "carr";
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
                        if(dataLevel === "carr")
			{
				//var respStr = xmlhttp.responseText;
                            //var dataSrc = respStr.split(",");
                            
                            //$("#selVehicle").autocomplete({
                              //  source:dataSrc
                            //});
                            carrRecordIndex = document.getElementById("selCarrier").selectedIndex;
                            //alert(carrRecordIndex);
                            document.getElementById("selVehicle").innerHTML = xmlhttp.responseText;
                            //$('#selVehicle-input').focus().val('');
                            var vehEle = document.getElementById("selVehicle");
                            //alert(vehRecordIndex);
                            //alert(document.getElementById("selVehicle").length)
                            alert(document.getElementById("selVehicle").length);
                            if(document.getElementById("selVehicle").length === 1)
                                carrRecordIndex = carrRecordIndex + 1;
                            else
                            {
                                var vehno = document.getElementById("selVehicle").options[1].value;
                                alert(vehno);
                                loadVehData(vehno, str);
                            }
			}
                        
//                        else if(dataLevel === "veh")
//                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selVehicle").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "carr")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("car_no="+str);
                }
                //else if(dataLevel === "veh")
//                {
//                    var suppEle = document.getElementById("selCarrier");
//                    var suppno = suppEle.options[suppEle.selectedIndex].value;
//                    //alert(suppno);
//                    $("#loadingDiv").css({"visibility":"visible"});
//                    xmlhttp.send("veh_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
//                }
		//alert("transaction_viewer.php" Mithunva");
	}
}


function loadCntryStateTxt(str,dataLevel,cntry)
{
 
    //var dataLevel = "carr";   
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
                        //alert(xmlhttp.responseText);
                        if(dataLevel === "cntryTxt")
                        {
                            //$('#country-input').focus().val(xmlhttp.responseText.toString().trim());
                            $("#country").html(xmlhttp.responseText);
                        }
                        else if(dataLevel === "stateTxt")
                        {
                            //alert(xmlhttp.responseText);
                            //$('#state-input').focus().val(xmlhttp.responseText.toString().trim());
                            $("#state").html(xmlhttp.responseText);
                            
                            
                            
                        }
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                //alert(str);
                if(dataLevel === "cntryTxt")
                {
                    //alert(str.trim());
                    xmlhttp.send("cntryCodeVeh="+str.trim());
                }
                else if(dataLevel === "stateTxt")
                {
                    //alert(str);
                    if(cntry.trim() === "US")
                        xmlhttp.send("stateCodeVeh="+str);
                    else if(cntry.trim() === "CA")
                    {
                                
                                str = str.trim();
                                //alert(str);
                                if(str === 'AB')
                                {
                                    $("#state").html("<option name='stte' value='AB --- Alberta'>AB --- Alberta</option>");
                                }
                                else if(str === 'BC')
                                {
                                    $("#state").html("<option name='stte' value='BC --- British Columbia'>BC --- British Columbia</option>");
                                }
                                else if(str === 'MB')
                                {
                                    $("#state").html("<option name='stte' value='MB --- Manitoba'>MB --- Manitoba</option>");
                                }
                                else if(str === 'NB')
                                {
                                    $("#state").html("<option name='stte' value='NB --- New Brunswick'>NB --- New Brunswick</option>");
                                }
                                else if(str === 'NL')
                                {
                                    $("#state").html("<option name='stte' value='NL --- Newfoundland and Labrador'>NL --- Newfoundland and Labrador</option>");
                                }
                                else if(str === 'NS')
                                {
                                    $("#state").html("<option name='stte' value='NS --- Nova Scotia'>NS --- Nova Scotia</option>");
                                }
                                else if(str === 'NT')
                                {
                                    $("#state").html("<option name='stte' value='NT --- Northwest Territories'>NT --- Northwest Territories</option>");
                                }
                                else if(str === 'NU')
                                {
                                    $("#state").html("<option name='stte' value='NU --- Nunavut'>NU --- Nunavut</option>");
                                }
                                else if(str === 'ON')
                                {
                                    //alert("ok");
                                    $("#state").html("<option name='stte' value='ON --- Ontario'>ON --- Ontario</option>");
                                }
                                else if(str === 'PE')
                                {
                                    $("#state").html("<option name='stte' value='PE --- Prince Edward Island'>PE --- Prince Edward Island</option>");
                                }
                                else if(str === 'QC')
                                {
                                    $("#state").html("<option name='stte' value='QC --- Quebec'>QC --- Quebec</option>");
                                }
                                else if(str === 'SK')
                                {
                                    $("#state").html("<option name='stte' value='SK --- Saskatchewan'>SK --- Saskatchewan</option>");
                                }
                                else if(str === 'YT')
                                {
                                    $("#state").html("<option name='stte' value='YT --- Yukon Territories'>YT --- Yukon Territories</option>");
                                }
                    }
                }

	}
}

//function loadStates(str,dataLevel)
//{
// 
//    //var dataLevel = "supp";   
//    if (str === "") 
//    {
//	    document.getElementById("sel"+dataLevel).innerHTML = "";
//            return;
//    }
//    else
//    { 
//                if (window.XMLHttpRequest) 
//                {
//		    // code for IE7+, Firefox, Chrome, Opera, Safari
//                    var xmlhttp = new XMLHttpRequest();
//                }
//		else 
//		{
//		    // code for IE6, IE5
//                    var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//                }
//		xmlhttp.onreadystatechange = function() 
//		{
//                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
//                    {
//                        if(dataLevel === "cntry")
//                        {       
//                            //alert(xmlhttp.responseText);
//                            
//                            document.getElementById("state").innerHTML = xmlhttp.responseText;
//                            //$('#state-input').focus().val('');
//                        }
////                        else if(dataLevel === "cust")
////                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
//                        //document.getElementById("selVehicle").combobox();
//                        $("#loadingDiv").css({"visibility":"hidden"});
//                    }
//		};
//		xmlhttp.open("POST","ajaxMaster.php", true);
//		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//                if(dataLevel === "cntry")
//                {
//                    $("#loadingDiv").css({"visibility":"visible"});
//                    xmlhttp.send("cntry="+str);
//                }
//
//	}
//}

function loadCarData(str)
{
	//alert(str);
    $("#loadingDiv").css({"visibility":"visible"});
    //alert(str);
    //var suppEle = document.getElementById("selCarrier");
    //var suppno = suppEle.options[suppEle.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "carDataAjax.php",
        dataType: 'text',
        cache : false,
        data: ({carrno:str}),
        success: function(data) {
            $("#loadingDiv").css({"visibility":"hidden"});
            //alert(data);
	    var carData = data.split(":::");
            
            //alert(str);
            
            
            // ...then you need to set the display text of the actual autocomplete box.
            //$('#selCarrier').focus().val(suppno);
           // $('select[name=selCarrier]').val(suppno);
            
            //$('#selCarrier').val(str);
            //$('#selCarrier-input').focus().val(str);
            
            //vehRecordIndex = document.getElementById("selCarrier").selectedIndex;
            //alert(vehRecordIndex);
            
            //$("#lblCustName").html(vehData[0]);
	    $("#add").val(carData[0]);
            
            //alert(carData[1]);
            $("#country").val(carData[1]);
            
            //alert(carData[2]);
            $("#state").val(carData[2]);
            
            $("#city").val(carData[3]);
            
            $("#zip").val(carData[4]);
            
            $("#phn").val(carData[5]);
            
            $("#treq").val(carData[6]);
            
            $("#tailreq").val(carData[7]);
            
            $("#access_from").val(carData[8]);
            
            $("#access_to").val(carData[9]);
            
            $("#access_days").val(carData[10]);
            
            $("#etype").val(carData[11]);
            
            $("#ctype").val(carData[12]);
            
            var ins_exp_date = carData[13].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#ixdate").val(ins_exp_date);
            
            $("#scode").val(carData[14]);
            
            var veh_liab_exp = carData[15].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#vlexpdate").val(veh_liab_exp);
            
            $("#vlamt").val(carData[16]);
            
            var excess_liab_exp = carData[17].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#elexpdate").val(excess_liab_exp);
            
            var work_comp_exp = carData[18].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#wcexpdate").val(work_comp_exp);
            
            $("#mlamt").val(carData[19]);
            
            var general_exp = carData[20].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#gexpdate").val(work_comp_exp);
            
            $("#cno").val(carData[21]);
            
            $("#slno").val(carData[22]);
            
            $("#lamt").val(carData[23]);
            
            if(carData[24] === 'Y')
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
            
            
            var lockedDate = carData[25].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = drData[14];
            $("#from1").val(lockedDate);
            
        },
        error: function(data) {
            console.log("error");
        }
   });
    
}


</script>


<script>
    var carrRecordIndex;
    var vehRecordIndex;
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        
        carrRecordIndex = 1;
        vehRecordIndex = 1;
        
        $( "#prev" ).click(function() {
            
                var vehCount = document.getElementById("selCarrier").length - 1;
                
                if(carrRecordIndex === 1)
                {
                    if(vehRecordIndex === 1 || vehCount === -1)
                        alert("First record displayed");
                    else if(vehRecordIndex > 0)
                    {
                        var carrEle = document.getElementById("selCarrier");
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex - 1;
                        var vehEle = document.getElementById("selCarrier");
                        var vehno = vehEle.options[vehRecordIndex].value;
                    
                        loadVehData(vehno, carrno);
                    }
                }
                else if(carrRecordIndex > 0)
                {
                    var carrEle = document.getElementById("selCarrier");
                    if(vehCount === -1)
                    {
                        carrRecordIndex = carrRecordIndex - 1;
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        showData(carrno, "carr");
                        vehCount = document.getElementById("selCarrier").length - 1;
                        if(vehCount === -1)
                        {
//                            carrRecordIndex = carrRecordIndex - 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = document.getElementById("selCarrier").length - 1;
                        
                            var vehEle = document.getElementById("selCarrier");
                            var vehno = vehEle.options[vehRecordIndex].value;

                            loadVehData(vehno, carrno);
                        }
                    }
                    else if(vehRecordIndex === 1)
                    {
                        //if(carrRecordIndex == 0)
                        carrRecordIndex = carrRecordIndex - 1;
                        
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        showData(carrno, "carr");
                        if(vehCount === -1)
                        {
//                            carrRecordIndex = carrRecordIndex - 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = document.getElementById("selCarrier").length - 1;
                        
                            var vehEle = document.getElementById("selCarrier");
                            var vehno = vehEle.options[vehRecordIndex].value;
                    
                            loadVehData(vehno, carrno);
                        }
                        
                    }
                    else if(vehRecordIndex > 0)
                    {
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex - 1;
                        var vehEle = document.getElementById("selCarrier");
                        var vehno = vehEle.options[vehRecordIndex].value;
                    
                        loadVehData(vehno, carrno);
                        
                    }
                }
               
        });
        
        $( "#next" ).click(function() {
            
                var carrCount = document.getElementById("selCarrier").length - 1;
                var vehCount = document.getElementById("selCarrier").length - 1;
                
                //alert(carrCount+":carrin:"+carrRecordIndex);
                
                if(carrRecordIndex === 1 && vehCount === -1)
                {
                    var carrEle = document.getElementById("selCarrier");
                    var carrno = carrEle.options[carrRecordIndex].value;
                    var carrTxt = carrEle.options[carrRecordIndex].text;
                    //alert(carrno);
                    //$('#selCarrier').focus().val(carrno);
                    $('#selCarrier').val(carrno);
                    $('#selCarrier-input').focus().val(carrTxt);
                    showDataNxt(carrno, "carr");
                    
                }
                else if(carrRecordIndex === carrCount)
                {
                    //alert(carrCount+":carrind:"+carrRecordIndex+":cusin"+vehRecordIndex+":"+vehCount);
                    if(vehRecordIndex === vehCount || vehCount === -1)
                        alert("Last record displayed");
                    else if(vehRecordIndex < vehCount)
                    {
                        var carrEle = document.getElementById("selCarrier");
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex + 1;
                        var vehEle = document.getElementById("selCarrier");
                        var vehno = vehEle.options[vehRecordIndex].value;
                        //alert(vehno + carrno);
                        loadVehData(vehno, carrno);
                        
                    }
                }
                else if(carrRecordIndex < carrCount)
                {
                    var carrEle = document.getElementById("selCarrier");
                    if(vehCount === -1)
                    {
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        showData(carrno, "carr");
                        
                        vehCount = document.getElementById("selCarrier").length - 1;
                        if(vehCount === -1)
                        {
                            carrRecordIndex = carrRecordIndex + 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = 1;

                            var vehEle = document.getElementById("selCarrier");
                            var vehno = vehEle.options[vehRecordIndex].value;

                            loadVehData(vehno, carrno);
                        }
                    }
                    if(vehRecordIndex === vehCount)
                    {
                        //if(carrRecordIndex == 0)
                        carrRecordIndex = carrRecordIndex + 1;
                        
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        showData(carrno, "carr");
                        
                        vehCount = document.getElementById("selCarrier").length - 1;
                        if(vehCount === -1)
                        {
                            carrRecordIndex = carrRecordIndex + 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = 1;

                            var vehEle = document.getElementById("selCarrier");
                            var vehno = vehEle.options[vehRecordIndex].value;

                            loadVehData(vehno, carrno);
                        }
                        
                    }
                    else if(vehRecordIndex < vehCount)
                    {
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex + 1;
                        var vehEle = document.getElementById("selCarrier");
                        var vehno = vehEle.options[vehRecordIndex].value;
                    
                        loadVehData(vehno, carrno);
                        
                    }
                }
                
                
        });
        
       
      //$("#selCarrier").change(function(){

  //  showData($("#selCarrier").val());
//});

$( "#selCarrier" ).combobox();
//$( "#selVehicle" ).combobox();
//$( "#country" ).combobox();
//$( "#state" ).combobox();

});

//new code for transprod and transcomp data

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
	$('#car_add').resetForm();
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Carriers </h2>
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
				
                                <form name="car_add" method="post" id="car_add">
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
                            <thead>
				
                                <tr>
                                    <td>Carrier</td><td>
                                        <div class="ui-widget">
					<select id="selCarrier" name="selCarrier">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            $query3="SELECT carr_no, name FROM Carrier";
						$result3=$mysqli->query($query3);
                                                echo "<option name='car'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='car' value=".$value3['carr_no'].">".$value3['carr_no']." --- ".trim($value3['name'])."</option>";
						}
                                            
					?>
					</select>
                                        </div>
					</td>
				</tr>
				<tr>
                                     <td>Address</td>
                                        <td>
                                            <input type="text" id="add" name="add" maxlength="50" readonly="readonly">
					</td>
				</tr>
				
                                
                                <tr>
                                     <td>Country</td>
                                        <td>
                                            <select name="country" id="country" disabled="disabled">
                                                <option value=""></option>
                                                <option value="CA">CA --- Canada</option>
                                                <option value="US">US --- United States</option>
                                                
                                            </select>
                                            
                                            
					</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCntryName'></label> </td>
                                        
                                        
                                        
                                        
				</tr>
                                <tr>
                                     <td>State</td>
                                        <td>
                                            
                                            <select name="state" id="state" disabled="disabled">
                                                    
                                                    <?php
						//$id = $_GET['id']  ;
                                                        $queryState = "SELECT state_code, state FROM State";
                                                            $resultState = $mysqli->query($queryState);
                                                            echo "<option name='state'></option>";
                                                            while($valueState = mysqli_fetch_array($resultState))
                                                            {
                                                                    echo "<option name='state' value=".$valueState['state_code'].">".$valueState['state_code']." --- ".trim($valueState['state'])."</option>";
                                                            }
                                                            echo "<option name='stte' value='AB'>AB --- Alberta</option>";
                                                            echo "<option name='stte' value='BC'>BC --- British Columbia</option>";
                                                            echo "<option name='stte' value='MB'>MB --- Manitoba</option>";
                                                            echo "<option name='stte' value='NB'>NB --- New Brunswick</option>";
                                                            echo "<option name='stte' value='NL'>NL --- Newfoundland and Labrador</option>";
                                                            echo "<option name='stte' value='NS'>NS --- Nova Scotia</option>";
                                                            echo "<option name='stte' value='NT'>NT --- Northwest Territories</option>";
                                                            echo "<option name='stte' value='NU'>NU --- Nunavut</option>";
                                                            echo "<option name='stte' value='ON'>ON --- Ontario</option>";
                                                            echo "<option name='stte' value='PE'>PE --- Prince Edward Island</option>";
                                                            echo "<option name='stte' value='QC'>QC --- Quebec</option>";
                                                            echo "<option name='stte' value='SK'>SK --- Saskatchewan</option>";
                                                            echo "<option name='stte' value='YT'>YT --- Yukon Territory</option>";
                                                            
                                                    ?>
                                                   
                                                </select>
                                            
                                            
					</td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblStateName'></label> </td>
                                        
                                        
                                        
                                        

                                        
                                        
				</tr>
                                
                                <tr>
                                     <td>City</td>
                                        <td>
                                            <input type="text" id="city" name="city" maxlength="50" readonly="readonly">
					</td>
                                        
				</tr>
                                
                                <tr>
                                     <td>Zip</td>
                                        <td>
                                            <input type="text" id="zip" name="zip" maxlength="10" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>Phone</td>
                                        <td>
                                            <input type="text" id="phn" name="phn" maxlength="10" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>Truck Required</td>
                                        <td>
                                            
                                            <select id="treq" name="treq" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value='0'>0 --- Do not Prompt for Truck Number</option>";
                                            echo "<option name='type' value='1'>1 --- Prompt for Truck #/Entry not required</option>";
                                            echo "<option name='type' value='2'>2 --- Prompt for Truck #/Require entry/Do not validate</option>";
                                            echo "<option name='type' value='3'>3 --- Prompt for Truck #/Require entry/Validate</option>";
                                            echo "<option name='type' value='4'>4 --- Positive Truck ID Enabled/Validate</option>";
                                            
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                
                                <tr>
                                     <td>Trailer Required</td>
                                        <td>
                                            
                                            <select id="tailreq" name="tailreq" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value='0'>0 --- Do not Prompt for Trailer Number</option>";
                                            echo "<option name='type' value='1'>1 --- Prompt for Trailer #/Entry not required</option>";
                                            echo "<option name='type' value='2'>2 --- Prompt for Trailer #/Require entry/Do not validate</option>";
                                            echo "<option name='type' value='3'>3 --- Prompt for Trailer #/Require entry/Validate</option>";
                                            echo "<option name='type' value='4'>4 --- Positive Trailer ID Enabled/Validate</option>";
                                            echo "<option name='type' value='5'>5 --- Positive Trailer ID Enabled/Validate (Own Consumption)</option>";
                                            
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
                                     <td>Entry Type</td>
                                        <td>
                                            
                                            <select id="etype" name="etype" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value='A'>A --- Option P, D and R</option>";
                                            echo "<option name='type' value='B'>B --- Both Dispatched Order and Rack Pickup</option>";
                                            echo "<option name='type' value='C'>C --- Option P and R</option>";
                                            echo "<option name='type' value='D'>D --- Dispatched Order Only</option>";
                                            echo "<option name='type' value='L'>L --- Loading Authority</option>";
                                            echo "<option name='type' value='P'>P --- Rack Pickup Only</option>";
                                            echo "<option name='type' value='R'>R --- Returns</option>";
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                <tr>
                                     <td>Carrier Type</td>
                                        <td>
                                            
                                            <select id="ctype" name="ctype" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value='C'>C --- Common Carrier</option>";
                                            echo "<option name='type' value='I'>I --- Independent Carrier</option>";
                                            echo "<option name='type' value='T'>T --- Terminal Carrier</option>";
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                <tr>
					<td>Insurance Expiration Date</td>
					<td>
                                            <input type="text" name="ixdate" data-role="popup" value="" id="ixdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
				</tr>
                                
                                <tr>
                                     <td>SCAC Code</td>
                                        <td>
                                            <input type="text" id="scode" name="scode" maxlength="4" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
					<td>Vehicle Liability Exp. Date</td>
					<td>
                                            <input type="text" name="vlexpdate" data-role="popup" value="" id="vlexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Vehicle Liability Amount</td>
					<td>
                                            <input type="text" name="vlamt" id="vlamt" maxlength="10" readonly="readonly"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Excess Liability Exp. Date</td>
					<td>
                                            <input type="text" name="elexpdate" data-role="popup" value="" id="elexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Work Comp. Exp. Date</td>
					<td>
                                            <input type="text" name="wcexpdate" data-role="popup" value="" id="wcexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
                                     <td>Max Load Amount</td>
                                        <td>
                                            <input type="text" id="mlamt" name="mlamt" maxlength="6" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
					<td>General Exp. Date</td>
					<td>
                                            <input type="text" name="gexpdate" data-role="popup" value="" id="gexpdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
                                     <td>Certification No</td>
                                        <td>
                                            <input type="text" id="cno" name="cno" maxlength="10" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>State Liecense No</td>
                                        <td>
                                            <input type="text" id="slno" name="slno" maxlength="10" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                     <td>Liability Amount</td>
                                        <td>
                                            <input type="text" id="lamt" name="lamt" maxlength="9" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
                                    <td><input type="checkbox" name="isLocked" id="isLocked" value="N" disabled="disabled">&nbsp; Locked Out</td>
                                </tr>
                                
                                <tr>
                                    <td>Locked Out Date</td>
                                    <td>
                                            <input type="text" name="from1" data-role="popup" value="" id="from1" class="tcal required" maxlength="10" disabled="disabled"/>
                                    </td>
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
