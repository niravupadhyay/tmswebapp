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

function loadVehData(str, carrno)
{
	//alert(str);
    $("#loadingDiv").css({"visibility":"visible"});
    //alert(str);
    //var suppEle = document.getElementById("selCarrier");
    //var suppno = suppEle.options[suppEle.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "vehDataAjax.php",
        dataType: 'text',
        cache : false,
        data: ({vehno:str, carrno:carrno}),
        success: function(data) {
            $("#loadingDiv").css({"visibility":"hidden"});
            //alert(data);
	    var vehData = data.split(":::");
            
            //alert(str);
            
            
            // ...then you need to set the display text of the actual autocomplete box.
            //$('#selCarrier').focus().val(suppno);
           // $('select[name=selCarrier]').val(suppno);
            
            $('#selVehicle').val(str);
            $('#selVehicle-input').focus().val(str);
            
            vehRecordIndex = document.getElementById("selVehicle").selectedIndex;
            //alert(vehRecordIndex);
            
            //$("#lblCustName").html(vehData[0]);
	    $("#lplate").val(vehData[2]);
            $("#cnum").val(vehData[3]);
            
            //alert(vehData[6]);
            
            //$("#country").val(vehData[6]);
            
            //loadStates(vehData[0],"cntry");
            
            //$("#state").val(vehData[7]);
            //alert(vehData[7]);
            //alert(vehData[1]);
            if(vehData[0].toString().trim().length !== 0)
            {
                if(vehData[0].trim() === "US")
                    loadCntryStateTxt(vehData[1].trim(),"stateTxt","US");
                else if(vehData[0].trim() === "CA")
                    loadCntryStateTxt(vehData[1].trim(),"stateTxt","CA");


                loadCntryStateTxt(vehData[0].trim(),"cntryTxt","");        
            }
            
            //alert(stateTxt);
            
            if(vehData[9] === 'Y')
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
            
            var cdate = vehData[4].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#cdate").val(cdate);
            var expdate = vehData[5].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#expdate").val(expdate);
            
            $("#inum").val(vehData[6]);
            
            var idate = vehData[7].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#idate").val(idate);
            var ixdate = vehData[8].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#ixdate").val(ixdate);
            
            var lockedDate = vehData[10].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = vehData[14];
            $("#from1").val(lockedDate);
            var hm1 = vehData[11].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var effDate = vehData[15];
            $("#from2").val(hm1);
            var hm2 = vehData[12].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = vehData[16];
            $("#from3").val(hm2);
            var hm3 = vehData[13].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = vehData[16];
            $("#from4").val(hm3);
            var hm4 = vehData[14].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = vehData[16];
            $("#from5").val(hm4);
            var led1 = vehData[15].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var effDate = vehData[15];
            $("#from6").val(led1);
            var led2 = vehData[16].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = vehData[16];
            $("#from7").val(led2);
            var owed = vehData[17].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = vehData[16];
            $("#from8").val(owed);
            
            $("#compts").val(vehData[18]);
            
            $("#c1size").val(vehData[19]);
            $("#c2size").val(vehData[20]);
            $("#c3size").val(vehData[21]);
            $("#c4size").val(vehData[22]);
            $("#c5size").val(vehData[23]);
            $("#c6size").val(vehData[24]);
            $("#c7size").val(vehData[25]);
            $("#c8size").val(vehData[26]);
            $("#c9size").val(vehData[27]);
            $("#c10size").val(vehData[28]);
            $("#c11size").val(vehData[29]);
            $("#c12size").val(vehData[30]);
            
            $("#vtype").val(vehData[31]);
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
    var carrRecordIndex;
    var vehRecordIndex;
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        
        carrRecordIndex = 1;
        vehRecordIndex = 1;
        
        $( "#prev" ).click(function() {
            
                var vehCount = document.getElementById("selVehicle").length - 1;
                
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
                        var vehEle = document.getElementById("selVehicle");
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
                        vehCount = document.getElementById("selVehicle").length - 1;
                        if(vehCount === -1)
                        {
//                            carrRecordIndex = carrRecordIndex - 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = document.getElementById("selVehicle").length - 1;
                        
                            var vehEle = document.getElementById("selVehicle");
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
                            vehRecordIndex = document.getElementById("selVehicle").length - 1;
                        
                            var vehEle = document.getElementById("selVehicle");
                            var vehno = vehEle.options[vehRecordIndex].value;
                    
                            loadVehData(vehno, carrno);
                        }
                        
                    }
                    else if(vehRecordIndex > 0)
                    {
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex - 1;
                        var vehEle = document.getElementById("selVehicle");
                        var vehno = vehEle.options[vehRecordIndex].value;
                    
                        loadVehData(vehno, carrno);
                        
                    }
                }
               
        });
        
        $( "#next" ).click(function() {
            
                var carrCount = document.getElementById("selCarrier").length - 1;
                var vehCount = document.getElementById("selVehicle").length - 1;
                
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
                        var vehEle = document.getElementById("selVehicle");
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
                        
                        vehCount = document.getElementById("selVehicle").length - 1;
                        if(vehCount === -1)
                        {
                            carrRecordIndex = carrRecordIndex + 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = 1;

                            var vehEle = document.getElementById("selVehicle");
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
                        
                        vehCount = document.getElementById("selVehicle").length - 1;
                        if(vehCount === -1)
                        {
                            carrRecordIndex = carrRecordIndex + 1;
                        }
                        else if(vehCount > 0)
                        {
                            vehRecordIndex = 1;

                            var vehEle = document.getElementById("selVehicle");
                            var vehno = vehEle.options[vehRecordIndex].value;

                            loadVehData(vehno, carrno);
                        }
                        
                    }
                    else if(vehRecordIndex < vehCount)
                    {
                        var carrno = carrEle.options[carrRecordIndex].value;
                        //$('#selCarrier').focus().val(carrno);
                        vehRecordIndex = vehRecordIndex + 1;
                        var vehEle = document.getElementById("selVehicle");
                        var vehno = vehEle.options[vehRecordIndex].value;
                    
                        loadVehData(vehno, carrno);
                        
                    }
                }
                
                
        });
        
       
      //$("#selCarrier").change(function(){

  //  showData($("#selCarrier").val());
//});

$( "#selCarrier" ).combobox();
$( "#selVehicle" ).combobox();
//$( "#country" ).combobox();
//$( "#state" ).combobox();

});

//new code for transprod and transcomp data

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
 
    $("#from3").click(function() {
$('.from3').datepicker( {
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
 
  $("#from4").click(function() {
$('.from4').datepicker( {
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
 
  $("#from5").click(function() {
$('.from5').datepicker( {
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
 
  $("#from6").click(function() {
$('.from6').datepicker( {
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
 
  $("#from7").click(function() {
$('.from7').datepicker( {
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
 
  $("#from8").click(function() {
$('.from8').datepicker( {
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Vehicles </h2>
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
				
                                <form name="veh_add" method="post" id="veh_add">
                                 
                                  
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
                                                echo "<option name='carr'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='carr' value=".$value3['carr_no'].">".$value3['carr_no']." --- ".trim($value3['name'])."</option>";
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
                                        <td>Vehicle</td><td>
                                        <div class="ui-widget">
					<select  name="selVehicle" id="selVehicle">
					
					</select>
                                        </div>
                                        </td>
<!--                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCustName'></label> </td>-->
<!--					<td> <input type="text" id="custname" name="custname"> </td>-->
                                        
<!--                                    <td>Customer No</td>
                                        <td>
                                            <input type="text" id="custno" name="custno">
					</td>-->

				</tr>
				
                                
                                <tr>
                                     <td>Country</td>
                                        <td>
                                            <select name="country" id="country" disabled="disabled">
                                            
                                                </select>
                                            
                                            
					</td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCntryName'></label> </td>
				</tr>
                                <tr>
                                     <td>State</td>
                                        <td>
                                            
                                                <select name="state" id="state" disabled="disabled">
                                                   
                                                </select>
                                            
                                            
					</td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblStateName'></label> </td>
				</tr>
                                
                                <tr>
                                     <td>License Plate</td>
                                        <td>
                                            <input type="text" id="lplate" name="lplate" maxlength="21" readonly="readonly">
					</td>
				</tr>
                                
                                
                                <tr>
                                     <td>Type</td>
                                        <td>
                                            
                                        
					<select id="vtype" name="vtype" disabled="disabled">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''></option>";
                                            echo "<option name='type' value='0'>0 --- Truck(Rigid)</option>";
                                            echo "<option name='type' value='1'>1 --- Tractor(Semi)</option>";
                                            echo "<option name='type' value='2'>2 --- Trailer</option>";
                                            echo "<option name='type' value='3'>3 --- Drawbar(Pup)</option>";
                                            echo "<option name='type' value='4'>4 --- Container</option>";
                                            echo "<option name='type' value='5'>5 --- Chassis</option>";
                                            echo "<option name='type' value='6'>6 --- Railcar</option>";
                                            echo "<option name='type' value='7'>7 --- Vessel</option>";
						
                                            
					?>
					</select>
                                        
					</td>
					
				</tr>
                                
                                
                                <tr>
                                     <td>Certification Number</td>
                                        <td>
                                            <input type="text" id="cnum" name="cnum" maxlength="21" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
					<td>Certificate Date</td>
					<td>
                                            <input type="text" name="cdate" data-role="popup" value="" id="cdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Expiration Date</td>
					<td>
                                            <input type="text" name="expdate" data-role="popup" value="" id="expdate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
                                     <td>Insurance Number</td>
                                        <td>
                                            <input type="text" id="inum" name="inum" maxlength="21" readonly="readonly">
					</td>
				</tr>
                                
                                <tr>
					<td>Insurance Date</td>
					<td>
                                            <input type="text" name="idate" data-role="popup" value="" id="idate" class="tcal required" maxlength="10" disabled="disabled"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Insurance Expiration Date</td>
					<td>
                                            <input type="text" name="ixdate" data-role="popup" value="" id="ixdate" class="tcal required" maxlength="10" disabled="disabled"/>
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
					<td>HM183(V)Exp Date</td>
					<td>
                                            <input type="text" name="from2" data-role="popup" value="" id="from2" class="tcal required" maxlength="10" disabled="disabled"/>

						</td>
						
				</tr>
			
				<tr>
					<td>HM183(I)Exp Date 2</td>
					<td>
                                            <input type="text" name="from3" value="" id="from3" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                </tr>
                                
                                <tr>
					<td>HM183(P)Exp Date 3</td>
					<td>
                                            <input type="text" name="from4" value="" id="from4" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                </tr>
                                
                                <tr>
					<td>HM183(K)Exp Date 4</td>
					<td>
                                            <input type="text" name="from5" value="" id="from5" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                </tr>
                                
                                <tr>
					<td>Local Exp Date 1</td>
					<td>
                                            <input type="text" name="from6" value="" id="from6" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                
					<td>Local Exp Date 2</td>
					<td>
                                            <input type="text" name="from7" value="" id="from7" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                </tr>
                                
                                <tr>
					<td>Overweight Exp Date</td>
					<td>
                                            <input type="text" name="from8" value="" id="from8" class="tcal required" maxlength="10" disabled="disabled"/>

					</td>
                                </tr>
                                
                                <tr>
                                     <td>Comp 1 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c1size" name="c1size" maxlength="5" readonly="readonly">
					</td>
                                      <td>Comp 2 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c2size" name="c2size" maxlength="5" readonly="readonly">
					</td>
                                        <td>Comp 3 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c3size" name="c3size" maxlength="5" readonly="readonly">
					</td>
				</tr>
                                <tr>
                                     <td>Comp 4 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c4size" name="c4size" maxlength="5" readonly="readonly">
					</td>
                                      <td>Comp 5 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c5size" name="c5size" maxlength="5" readonly="readonly">
					</td>
                                        <td>Comp 6 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c6size" name="c6size" maxlength="5" readonly="readonly">
					</td>
				</tr>
                                <tr>
                                     <td>Comp 7 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c7size" name="c7size" maxlength="5" readonly="readonly">
					</td>
                                      <td>Comp 8 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c8size" name="c8size" maxlength="5" readonly="readonly">
					</td>
                                        <td>Comp 9 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c9size" name="c9size" maxlength="5" readonly="readonly">
					</td>
				</tr>
                                <tr>
                                     <td>Comp 10 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c10size" name="c10size" maxlength="5" readonly="readonly">
					</td>
                                      <td>Comp 11 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c11size" name="c11size" maxlength="5" readonly="readonly">
					</td>
                                        <td>Comp 12 Size</td>
                                        <td>
                                            <input type="text" class="cmptxtid" id="c12size" name="c12size" maxlength="5" readonly="readonly">
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
