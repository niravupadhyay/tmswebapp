<?php
	session_start();
	include "database_connection_web_primary.php";
	if(isset($_SESSION['global']))
	{
            $user = $_SESSION["user"];
            $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
            ?>


 <?php 
    include("headerRPT.php");
    include("reportsList.php");
	//header('Content-Disposition: attachment; filename="report.txt"');


    ?>
 



<!--<script src="js/dataTables.fixedColumns.js"></script>-->
<script src="js/dataTables.fixedColumns.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>

<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
<script src="jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget.js"></script>

<link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="css/jquery-dropdown-widget.css">
<!--<link href="css/dataTables.fixedColumns.css">-->
<link href="css/dataTables.fixedColumns.min.css">
<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/buttons.dataTables.css" rel="stylesheet">
<!--<link rel="stylesheet" href="/resources/demos/style.css">-->


<style>
 
input[type="text"] {
    border-radius: 5px;
    width: 47%;
}
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
input, button, textarea {
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




<script>
    
   // var table;

    

/*function initDataTable() {
  dataTable = $('#tank-detail').dataTable(options);
}*/
    
/*function initDataTable() {
    //table = $('#viewer').dataTable();
    table = $('#viewer').dataTable( {
         "iDisplayLength": 10,
        "bPaginate": true,
        "iCookieDuration": 60,
        "bStateSave": false,
        "bAutoWidth": false,
        //true
        "bProcessing": true,
        "bRetrieve": true,
        "bJQueryUI": true,
        "sDom": '<"H"CTrf>t<"F"lip>',
        "aLengthMenu":  [
        [10, 20, 30, 50, 100, 200, -1],
        [10, 20, 30, 50, 100, 200, "All"]
    ],
        "sScrollX": "100%",
        //"sScrollXInner": "110%",
        "bScrollCollapse": true
		
	} );
    //alert("hello");
}*/


    
$(document).ready(function() {

        //        $("#alert-trans").css("visibility", "hidden");
        $( "#paging" ).click(function() {	
            
            //alert($("#isMTD").prop('checked'));
            
            var isMTD = "";
            if($("#isMTD").prop('checked'))
            {
                isMTD = $("#isMTD").val();
            }
            
            var isDrLocked = "";
            if($("#isDrLocked").prop('checked'))
                isDrLocked = $("#isDrLocked").val();
            
            //$( "#selSupplier" ).val("");
            var rptName = $("#selRptName-input").val();
            
            var termID = $("#selterminal-input").val();
            
            var supp = $('#selSupplier-input').val();
            //$( "#selCustomer" ).val("");
            var cust = $('#selCustomer-input').val();
            //$( "#selAccount" ).val("");
            var acct = $('#selAccount-input').val();
            //$( "#selCarrier" ).val("");
            var carr = $('#selCarrier-input').val();
            //$( "#selProduct" ).val("");
            var prod = $('#selProduct-input').val();
            //$( "#selFolMo" ).val("");
            var folmo = $('#selFolMo-input').val();
            //$( "#selFolNo" ).val("");
            var folno = $('#selFolNo-input').val();
	    //$( "#selFolYr" ).val("");
            var folyr = $('#selFolYr-input').val();
            //$( "#selReportMode" ).val("");
            var rptMode = $('#selReportMode-input').val();
            //$( "#selDrExp" ).val("TRAINING");
            var drExpType = $('#selDrExp-input').val();

            var idleDays = $( "#txtIdleDays" ).val();
            var expDays = $( "#txtExpDays" ).val();

            //$('input:checkbox').removeAttr('checked');
            
            var rptFormat = $("input:radio[name='rptFormat']:checked").val();
            
//            if ($('input.rptFormat1').is(':checked'))
//                rptFormat = $( "#rptFormat1" ).val();
//            else
//                rptFormat = $( "#rptFormat2" ).val();
            
            //alert("selRptName: " + rptName + ", selterminal: " + termID + ", selSupplier: " + supp + ", selCustomer: " + cust + ", selaccount: " + acct + ", selCarrier: " + carr + ", selProduct: " + prod + ", selFolMo: " + folmo + ", selFolNo: " + folno + ", selReportMode: " + rptMode + ", selDrExp: " + drExpType + ", txtIdleDays: " + idleDays + ", txtExpDays: " + expDays + ", isMTD: " + isMTD + ", isDrLocked: " + isDrLocked + ", rptFormat: " + rptFormat);
            
            //return false;
            
            if($("#selRptName").val() === "Driver Expiration Listing Report")
            {
                
                if($("#txtExpDays").val() === "" || !($("#txtExpDays").val().match(/^\d+$/)))
                {
                    alert('Input Proper value for Exp Days');
                    return false;
                }
                
            }
            else if($("#selRptName").val() === "Driver Listing Report" || $("#selRptName").val() === "Carrier Listing Report")
            {
                
            }
            else
            {
                if($("#selFolMo-input").val() === "" || $("#selFolNo-input").val() === "")
                {
                    alert('Select Folio Month and Number values');
                    return false;
                }
            }
            
            
            $("#loadingDiv").css({"visibility":"visible"});
            $.ajax({
                type: "POST",
                url: "rptDownloadNew.php",
                dataType: 'html',
                cache : false,
                data: {selRptName: rptName, selterminal: termID, selSupplier: supp, selCustomer: cust, selaccount:acct, selCarrier: carr, selProduct: prod, selFolMo: folmo, selFolNo: folno, selFolYr: folyr, selReportMode: rptMode, selDrExp: drExpType, txtIdleDays: idleDays, txtExpDays: expDays, isMTD: isMTD, isDrLocked: isDrLocked, rptFormat: rptFormat},
                //--old code--data: $('#rpt_generator').serialize(),
                //beforeSend: toggleButton,
                success: function(data) {

                    //console.log(data);
                    //$('#selTransactionListing').html(data);
                    $("#loadingDiv").css({"visibility":"hidden"});
                    window.open(data,'_blank');
		    //window.location.href = data;
                    //attachClickHandler();
                    //alert(data);
                    //var respTxt = data.toString().split(":::--:::");
                    //alert(respTxt[1]);
                    //window.open(respTxt[1],'_blank');
                    clearReportForm();
                },
                error: function(data) {
                    console.log("error");
                }
            });
            return false;
   
        });

$( "#selRptName" ).combobox();
$( "#selterminal" ).combobox();
$( "#selSupplier" ).combobox();
$( "#selCustomer" ).combobox();
$( "#selAccount" ).combobox();

//$( "#selDestination" ).combobox();

$( "#selCarrier" ).combobox();
$( "#selReportMode" ).combobox();
$( "#selFolMo" ).combobox();
$( "#selFolNo" ).combobox();
$( "#selFolYr" ).combobox();
$( "#selProduct" ).combobox();
$( "#selDrExp" ).combobox();
$( "#selDrExp" ).val("TRAINING");
$('#selDrExp-input').focus().val("TRAINING");
    
$( "#frmDtRow" ).hide();
$( "#toDtRow" ).hide();
$( "#suppRow" ).hide();
$( "#custRow" ).hide();
$( "#acctRow" ).hide();
$( "#carrRow" ).hide();
$( "#rptModeRow" ).hide();
$( "#mtdRow" ).hide();
$( "#folYrRow" ).hide();
$( "#folMoRow" ).hide();
$( "#folNoRow" ).hide();
$( "#prodRow" ).hide();
$( "#idleDaysRow" ).hide();
$( "#expDaysRow" ).hide();
$( "#drExpRow" ).hide();
$( "#lockedRow" ).hide();

//$("#selSupplier").parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
//$("#selSupplier").parent().find("a.ui-button").button("disable");
// 
//$("#selCustomer").parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
//$("#selCustomer").parent().find("a.ui-button").button("disable");
//
//$("#selAccount").parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
//$("#selAccount").parent().find("a.ui-button").button("disable");
//
//$("#selCarrier").parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
//$("#selCarrier").parent().find("a.ui-button").button("disable");
//
//$("#selReportMode").parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
//$("#selReportMode").parent().find("a.ui-button").button("disable");

});

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
    $( "#paging" ).click(function() {
            
	
        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("Transaction generating...");
//	$('#example').DataTable( {
//		"sScrollY": "100%",
//                "bScrollCollapse": true,
//		"paging":         true,
//		"fixedColumns":   true
//	} );
} );
$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
};
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#rpt_generator').resetForm();
});
});	



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
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            $( "#selCustomer" ).val("");
                            $('#selCustomer-input').val("");
                            document.getElementById("selAccount").innerHTML = "";
                            $( "#selAccount" ).val("");
                            $('#selAccount-input').val("");
                        }
                        else if(dataLevel === "cust")
                        {
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            $( "#selAccount" ).val("");
                            $('#selAccount-input').val("");
                        }
                        else if(dataLevel === "fol")
                        {
                            //alert(xmlhttp.responseText);
                            document.getElementById("selFolNo").innerHTML = xmlhttp.responseText;
                            $( "#selFolNo" ).val("");
                            $('#selFolNo-input').val("");
                        }
                        $("#loadingDiv").css({"visibility":"hidden"});
                        //document.getElementById("selCustomer").combobox();
                    }
		};
		xmlhttp.open("POST","ajaxRPT.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("supplier_no="+encodeURIComponent(str));
                }
                else if(dataLevel === "cust")
                {
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppEle.selectedIndex].value;
                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                }
                else if(dataLevel === "fol")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("fol_mo="+encodeURIComponent(str));
                }
		//alert("transaction_viewer.php" Mithunva");
	}
}

function showCarrier(str)
{
	if (str === "") 
	{
	    document.getElementById("selCarrier").innerHTML = "";
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
					document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajaxRPT.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("carr_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}

/*function showDriver(str)
{
	if (str === "") 
	{
	    document.getElementById("selDriver").innerHTML = "";
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
					//document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajax.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("driver_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}*/

function clearReportForm()
{
    $( "#selSupplier" ).val("");
    $('#selSupplier-input').focus().val("");
    $( "#selCustomer" ).val("");
    $('#selCustomer-input').focus().val("");
    $( "#selAccount" ).val("");
    $('#selAccount-input').focus().val("");
    $( "#selCarrier" ).val("");
    $('#selCarrier-input').focus().val("");
    $( "#selProduct" ).val("");
    $('#selProduct-input').focus().val("");
    $( "#selFolMo" ).val("");
    $('#selFolMo-input').focus().val("");
    $( "#selFolNo" ).val("");
    $('#selFolNo-input').focus().val("");
    $( "#selReportMode" ).val("");
    $('#selReportMode-input').focus().val("");
    $( "#selDrExp" ).val("TRAINING");
    $('#selDrExp-input').focus().val("TRAINING");
    
    $( "#txtIdleDays" ).val("");
    $( "#txtExpDays" ).val("30");
    
    $('input:checkbox').removeAttr('checked');
    //$( "#isMTD" ).attr('checked','false');
    //$( "#isDrLocked" ).attr('checked','false');
}

function loadReportUI(str)
{
    
    clearReportForm();
    
    if(str === "Rack Activity Report")
    {
        $( "#suppRow" ).show();
        $( "#custRow" ).show();
        $( "#acctRow" ).show();        
        //$( "#rptModeRow" ).show();
        $( "#frmDtRow" ).show();
        $( "#toDtRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();

        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Rack Activity Summary")
    {
        $( "#frmDtRow" ).show();
        $( "#toDtRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#suppRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Shipping Report (with components)")
    {
        $( "#suppRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
        
    }
    else if(str === "Carrier Activity Report")
    {
        $( "#suppRow" ).show();
        $( "#custRow" ).show();
        $( "#carrRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).show();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        
        $( "#acctRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Customer Activity Report")
    {
        $( "#suppRow" ).show();
        $( "#custRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).show();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        $( "#rptModeRow" ).show();
        
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Account Activity Report")
    {
        $( "#suppRow" ).show();
        $( "#custRow" ).show();
        $( "#acctRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).show();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    
    }
    else if(str === "Meter Detail Report")
    {
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#suppRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#mtdRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
        
    }
    else if(str === "Product Detail Report")
    {
        $( "#suppRow" ).show();
        $( "#custRow" ).show();
        $( "#acctRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        $( "#prodRow" ).show();
        
        $( "#carrRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Tank Detail Report")
    {
        $( "#frmDtRow" ).show();
        $( "#toDtRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        $( "#rptModeRow" ).show();
        
        $( "#prodRow" ).hide();
        $( "#suppRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
        
    }
    else if(str === "Bulk Shipping Report" || str === "Bulk Transaction Report")
    {
        $( "#suppRow" ).show();
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Tank Stock Balance Report")
    {
        $( "#suppRow" ).hide();
        
        $( "#mtdRow" ).hide();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Terminal Balance Report" || str === "Tank Inventory Report" || str === "Product Summary Report" || str === "Additive Mass Balance Report")
    {
        $( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
	if(str === "Additive Mass Balance Report")
	{
		$( "#folYrRow" ).show();
	}
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        
        $( "#suppRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Carrier Listing Report")
    {
        $( "#suppRow" ).hide();
        $( "#mtdRow" ).hide();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).hide();
        $( "#folNoRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Bulk Product Movement Report" || str === "Bulk Stock Report")
    {
	$( "#mtdRow" ).show();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).show();
        $( "#folNoRow" ).show();
        $( "#suppRow" ).show();
        $( "#rptModeRow" ).show();
        
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#carrRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#lockedRow" ).hide();
    }
    else if(str === "Driver Listing Report")
    {
        $( "#carrRow" ).show();
        $( "#idleDaysRow" ).show();
        $( "#lockedRow" ).show();
        
        $( "#suppRow" ).hide();
        $( "#mtdRow" ).hide();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).hide();
        $( "#folNoRow" ).hide();
        $( "#expDaysRow" ).hide();
        $( "#drExpRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
    }
    else if(str === "Driver Expiration Listing Report")
    {
        $( "#carrRow" ).show();
        $( "#expDaysRow" ).show();
        $( "#drExpRow" ).show();
        $( "#lockedRow" ).show();
        
        $( "#suppRow" ).hide();
        $( "#mtdRow" ).hide();
	$( "#folYrRow" ).hide();
        $( "#folMoRow" ).hide();
        $( "#folNoRow" ).hide();
        $( "#prodRow" ).hide();
        $( "#custRow" ).hide();
        $( "#acctRow" ).hide();
        $( "#rptModeRow" ).hide();
        $( "#frmDtRow" ).hide();
        $( "#toDtRow" ).hide();
        $( "#idleDaysRow" ).hide();
    }
}

</script>

<div id="loadingDiv">
    <div>
        <h7>Please wait...</h7>
    </div>
</div>

<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> TMS Report Generator</h2>
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
				
                         <form name="rpt_generator" method="post" id="rpt_generator">
                                
                                    
                                  
                            <table  class="display" cellspacing="0" width="100%">
                                    <thead>
                                            <tr>
                                                <td>Select Report</td>
                                                <td>
						<select name="selRptName" id="selRptName">
<!--                                                    <optgroup label="Transaction Reports">-->
                                                    <option><b>-------------Transaction Reports------------</b></option>
                                                    <?php

                                                            for($k = 0; $k < sizeof($tmsTransReports); $k++)
                                                            {
                                                                    echo "<option name='rpt' value='".$tmsTransReports[$k]."'>".$tmsTransReports[$k]."</option>";
                                                            }
                                                    ?>
<!--                                                    </optgroup>
                                                    <optgroup label="Balancing Reports">-->
                                                    <option><b>-------------Balancing Reports------------</b></option>
                                                    <?php

                                                            for($k = 0; $k < sizeof($tmsBalancingReports); $k++)
                                                            {
                                                                    echo "<option name='rpt' value='".$tmsBalancingReports[$k]."'>".$tmsBalancingReports[$k]."</option>";
                                                            }
                                                    ?>
<!--                                                    </optgroup>
                                                    <optgroup label="Listing Reports">-->
                                                    <option><b>-------------Listing Reports------------</b></option>
                                                    <?php

                                                            for($k = 0; $k < sizeof($tmsListingReports); $k++)
                                                            {
                                                                    echo "<option name='rpt' value='".$tmsListingReports[$k]."'>".$tmsListingReports[$k]."</option>";
                                                            }
                                                    ?>
<!--                                                    </optgroup>-->
						</select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Terminal</td>
                                                <td>
						<select readonly name="selterminal" id="selterminal">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
							$query1="SELECT term_id, name FROM TerminalProfile";
							$result1=$mysqli->query($query1);
                                                        while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["term_id"].">".$value1['term_id']." --- ".trim($value1['name'])."</option>";
							}
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

					    <tr id="folYrRow">
                                                <td>Folio Year</td>
                                                <td>
                                                <select name="selFolYr" id="selFolYr">
                                                <?php
                                                        //echo "hello";
                                                        //$id = $_GET['id']  ;
                                                        $folYrQuery="SELECT distinct folio_yr FROM TransHeader order by folio_yr desc";
                                                        $folYrResult=$mysqli->query($folYrQuery);
                                                        //echo "<option name='folY'></option>";
                                                        while($folYr = mysqli_fetch_array($folYrResult))
                                                        {
                                                                echo "<option name='folY' value=".$folYr["folio_yr"].">".$folYr['folio_yr']."</option>";
                                                        }
                                                ?>
                                                </select>
                                                </td>
                                            </tr>                                            

                                            <tr id="folMoRow">
                                                <td>Folio Mo</td>
                                                <td>
						<select name="selFolMo" id="selFolMo">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
							$folMoQuery="SELECT distinct fol_mo FROM FolioStatus order by fol_mo";
							$folMoResult=$mysqli->query($folMoQuery);
                                                        echo "<option name='fol'></option>";
                                                        while($folMo = mysqli_fetch_array($folMoResult))
							{
								echo "<option name='fol' value=".$folMo["fol_mo"].">".$folMo['fol_mo']."</option>";
							}
						?>
						</select>
                                                </td>
                                            </tr>
                                            
                                            <tr id="folNoRow">
                                                <td>Folio No</td>
                                                <td>
						<select name="selFolNo" id="selFolNo">
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
                                
<!--				<tr id="frmDtRow">
					<td>Date Range - From</td>
					<td>
					        <input type="text" name="from" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from" class="tcal required"  readonly required/>
						</td>
						
				</tr>
			
				<tr id="toDtRow" margin-left:5em>
					<td>Date Range - To</td>
					<td>
					<input type="text" name="to" value="<?php echo $var=date("d/m/Y");?>" id="to" class="tcal required"  readonly required/>
					</td>-->
                                       
						
						
				<tr id="suppRow">
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
                                                    $query3="SELECT supplier_no, short_supplier_name FROM Supplier where supplier_no NOT LIKE '%6401'";
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
				<tr id="custRow">
                                        
					<td>Customer</td><td>
                                        <div class="ui-widget">
					<select name="selCustomer" id="selCustomer">
					</select>
                                        </div>
					</td>
				</tr>
				<tr id="acctRow">
					<td>Account</td><td>
					<select name="selaccount" id="selAccount">
					</select>
					</td>
				</tr>
<!--				<tr>	
					<td>Destination</td><td>
					<select class="select" name="seldestination" id="selDestination">
					//<?php
//						$query6="SELECT destination_no, short_destination_name FROM Destination";
//						$result6=$mysqli->query($query6);
//                                                echo "<option></option>";
//						while($value6 = mysqli_fetch_array($result6))
//						{					
//							echo "<option value=".$value6['destination_no'].">".$value6['destination_no']." --- ".$value6['short_destination_name']."</option>";
//						}
//					?>
					</select>
					</td>
				</tr>-->
                                <tr id="prodRow">
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
				<tr id="carrRow">
					<td>Carrier</td><td>
					<select name="selCarrier" id="selCarrier" onChange="showCarrier(this.value)">
					<!--<option value=""></option>-->
					<?php
						$query7="SELECT carr_no, name FROM Carrier";
						$result7=$mysqli->query($query7);
                                                echo "<option></option>";
						while($value7 = mysqli_fetch_array($result7))
						{
                                                    echo "<option value=".$value7['carr_no'].">".$value7['carr_no']." --- ".trim($value7['name'])."</option>";
						}
					?>
					</select>
					</td>
				</tr>
                                <tr id="rptModeRow">
					<td>Report Mode</td><td>
					<select name="selReportMode" id="selReportMode">
                                            <option value="Full">Full</option>
                                            <option value="Summary">Summary</option>
					</select>
					</td>
				</tr>
                                <tr id="idleDaysRow">
					<td>Idle Days</td><td>
                                            <input type="text" id="txtIdleDays" name="txtIdleDays">
					</td>
				</tr>
                                <tr id="expDaysRow">
					<td>Exp Days</td><td>
                                            <input type="text" id="txtExpDays" name="txtExpDays" value="30" maxlength="3">
					</td>
				</tr>
                                <tr id="drExpRow">
					<td>Driver Exp</td><td>
					<select name="selDrExp" id="selDrExp">
                                            <option value="ALL EXPIRATION">ALL EXPIRATION</option>
                                            <option value="TRAINING">TRAINING</option>
                                            <option value="DRIVER LICENSE">DRIVER LICENSE</option>
                                            <option value="CERTIFICATION 1">CERTIFICATION 1</option>
                                            <option value="CERTIFICATION 2">CERTIFICATION 2</option>
                                            <option value="ON DUTY HOURS">ON DUTY HOURS</option>
                                            <option value="DRIVER CERTIFICATION">DRIVER CERTIFICATION</option>
                                            <option value="DOT MEDICAL EXAM">DOT MEDICAL EXAM</option>
                                            <option value="DRIVER ROAD TEST">DRIVER ROAD TEST</option>
                                            <option value="DRIVER REVIEW">DRIVER REVIEW</option>
                                            <option value="STATE AGENCY">STATE AGENCY</option>
					</select>
					</td>
				</tr>
                                <tr id="lockedRow">
                                    <td>
                                        <input type="checkbox" name="isDrLocked" id="isDrLocked" value="locked"> &nbsp; Locked
                                    </td>
                                </tr>
                                <tr id="mtdRow">
                                    <td>
                                        <input type="checkbox" name="isMTD" id="isMTD" value="mtd"> &nbsp; Month to Date Processing
                                    </td>
                                </tr>
                                <tr id="rType">
                                    <td>
                                        <input type="radio" name="rptFormat" value="txtrpt" checked="checked"> &nbsp; Text
                                    </td>
				    <td>
                                        <input type="radio" name="rptFormat" value="txtpdf"> &nbsp; PDF
                                    </td>	
                                </tr>
                        <tr>    
                            <td></td><td><input type="button" name="button" id="paging" value="Generate" onClick="">
                            <input type="button" name="button" id="refresh" value="Clear" onClick=""></td>
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
<!--                            <hr>
                            <h4><b>Transaction Listing</b></h4>
        <hr>-->
		<div id="selTransactionListing"></div>
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>
