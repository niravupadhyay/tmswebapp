<?php
	session_start();
	include "database_connection_web.php";
	if(isset($_SESSION['global']))
	{
            $user = $_SESSION["user"];
            $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
            
            ?>


 <?php include("header.php");?>
 
    <?php
        
                
   ?>

 <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <script src="js/dataTables.fixedColumns.js"></script>
 <script src="js/dataTables.fixedColumns.min.js"></script>
 
<script src="jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget-acct.js"></script>
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
inputtext {
    background-color: #fff;
    border-radius: 4px;
    width: 370px !important;
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
    
//    $(document).ready(function() {
////        $("#alert-trans").css("visibility", "hidden");
//            $("#load").css({"visibility":"hidden"});
//        $( "#paging" ).click(function() {	
//        
//        var toggleButton = function() {
//            //alert("sdsjj");
//            $("#load").css({"visibility":"visible"});
//        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
//        }
//        $("#alert-trans").css("visibility", "hidden");
//        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("hi");
        //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
//        $.ajax({
//        type: "POST",
//        url: "acctAddAjax.php",
//        dataType: 'text',
//        cache : false,
//        data: $('#acct_add').serialize(),
//        beforeSend: toggleButton,
//        success: function(data) {
//            $("#load").css({"visibility":"hidden"});
//            alert(data);
//            //$('#selTransactionListing').html(data);
//            //initDataTable();
//            //attachClickHandler();
//        },
//        error: function(data) {
//            console.log("error");
//        }
//    });
//    return false;
//   
//} );

//$("#selSupplier").change(function(){

  //  showData($("#selSupplier").val(),"supp");
//});
//$("#selCustomer").change(function(){

  //  showData($("#selCustomer").val(),"cust");
//});

//$( "#selSupplier" ).combobox();
//$( "#selCustomer" ).combobox();
//$( "#selAccount" ).combobox();
//
//});

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
                            suppRecordIndex = document.getElementById("selSupplier").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            document.getElementById("selAccount").innerHTML = "";
                            $('#selCustomer-input').val('');
                            $('#selCustomer').val('');
                            $('#selAccount-input').val('');
                            $('#selAccount').val('');
			}
                        if(dataLevel === "cust")
			{
			    //var respStr = xmlhttp.responseText;
                            //var dataSrc = respStr.split(",");

                            //$("#selAccount").autocomplete({
                              //  source:dataSrc,
			//	select: function( event, ui ) {alert('test');}
                          //  });	
                            custRecordIndex = document.getElementById("selCustomer").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            $('#selAccount-input').val('');
                            $('#selAccount').val('');
			}
                        if(dataLevel === "cntry")
                        {       
                            //alert(xmlhttp.responseText);
                            
                            document.getElementById("state").innerHTML = xmlhttp.responseText;
                            $('#state-input').focus().val('');
                        }
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		//if(dataLevel === "supp")
                //{
			xmlhttp.open("POST","ajaxMaster.php", true);
		//}
		//else
		//{		
		//	xmlhttp.open("POST","getAccts.php", true);
		//}
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
                if(dataLevel === "cntry")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cntry="+str);
                }
		//alert("transaction_viewer.php" Mithunva");
	}
}


function showDataPrevNxt(str, custTxt, dataLevel,cmd)
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
                        
                        if(dataLevel === "cust")
			{
			    //var respStr = xmlhttp.responseText;
                            //var dataSrc = respStr.split(",");

                            //$("#selAccount").autocomplete({
                              //  source:dataSrc,
			//	select: function( event, ui ) {alert('test');}
                          //  });	
                           var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppEle.selectedIndex].value;
                            
                            $('#selCustomer').val(str);
                            $('#selCustomer-input').focus().val(custTxt);
                            
                            custRecordIndex = document.getElementById("selCustomer").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            //$('#selAccount-input').focus().val('');
                            if(cmd === "prev")
                            {
                                acctRecordIndex = document.getElementById("selAccount").length - 1;

                                var acctEle = document.getElementById("selAccount");
                                var acctno = acctEle.options[acctRecordIndex].value;

                                loadAcctData(acctno, str, suppno);
                            }
                            else if(cmd === "next")
                            {
                                acctRecordIndex = 1;

                                var acctEle = document.getElementById("selAccount");
                                var acctno = acctEle.options[acctRecordIndex].value;
                                //alert(acctno + ":::" + str + ":::" + suppno);
                                loadAcctData(acctno, str, suppno);
                            }
                            
			}
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		//if(dataLevel === "supp")
                //{
			xmlhttp.open("POST","ajaxMaster.php", true);
		//}
		//else
		//{		
		//	xmlhttp.open("POST","getAccts.php", true);
		//}
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "cust")
                {
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppEle.selectedIndex].value;
                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                }
 	}
}


function showDataSave(str,dataLevel)
{
 
    //var dataLevel = "supp";   
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
                            //});
                            suppRecordIndex = document.getElementById("selSupplier").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            //$('#selCustomer-input').focus().val('');
                            
			}
                        else if(dataLevel === "cust")
                        {
                            custRecordIndex = document.getElementById("selCustomer").selectedIndex;
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        }
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
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
//                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                }
		//alert("transaction_viewer.php" Mithunva");
	}
}


function showDataNxt(str,dataLevel)
{
 
    //var dataLevel = "supp";   
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
                            //});
                            suppRecordIndex = document.getElementById("selSupplier").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            //$('#selCustomer-input').focus().val('');
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            //alert(suppno);
                            //$('#selSupplier').focus().val(suppno);
                            //alert('3');
                            $('#selCustomer').val(custno);
                            $('#selCustomer-input').focus().val(custTxt);
                            //var custEle = document.getElementById("selCustomer");
                            //alert(custRecordIndex);
                            loadAccts(str, custno);
                            //alert('4');
                            //alert(document.getElementById("selCustomer").length)
                            //var custno = document.getElementById("selCustomer").options[1].value;
                            //alert(custno);
                            //loadCustData(custno, str);
                            
			}
                        
//                        else if(dataLevel === "cust")
//                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("supplier_no="+str);
                }
                //alert("transaction_viewer.php" Mithunva");
	}
}

function loadAccts(suppno, custno)
{
    if (suppno === "") 
    {
	    document.getElementById("selCustomer").innerHTML = "";
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
                        
                            custRecordIndex = document.getElementById("selCustomer").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            //$('#selCustomer-input').focus().val('');
                            var acctEle = document.getElementById("selAccount");
                            //alert(custRecordIndex);
                            //alert(document.getElementById("selCustomer").length)
                            var acctno = document.getElementById("selAccount").options[1].value;
                            //alert(custno);
                            loadAcctData(acctno, custno,suppno);
                            
                    }
//                        else if(dataLevel === "cust")
//                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                
                $("#loadingDiv").css({"visibility":"visible"});
                xmlhttp.send("cust_no="+encodeURIComponent(custno)+"&supplier_no="+encodeURIComponent(suppno));
                
		//alert("transaction_viewer.php" Mithunva");
	}
}

function loadCntryStateTxt(str,dataLevel,cntry)
{
 
    //var dataLevel = "supp";   
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
                            $('#country-input').focus().val(xmlhttp.responseText.toString().trim());
                            $("#country").val(xmlhttp.responseText.toString().trim());
                        }
                        else if(dataLevel === "stateTxt")
                        {
                            //alert(xmlhttp.responseText);
                            $('#state-input').focus().val(xmlhttp.responseText.toString().trim());
                            $("#state").val(xmlhttp.responseText.toString().trim());
                            
                            
                            
                        }
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                //alert(str);
                if(dataLevel === "cntryTxt")
                {
                    //alert(str+"oo");
                    xmlhttp.send("cntryCode="+str);
                }
                else if(dataLevel === "stateTxt")
                {
                    //alert(str);
                    if(cntry === "US")
                        xmlhttp.send("stateCode="+str);
                    else if(cntry === "CA")
                    {
                                //alert(str);
                                if(str === 'AB')
                                {
                                    $('#state-input').focus().val("AB --- Alberta");
                                    $("#state").val("AB --- Alberta");
                                    $('select[name=state]').val("AB --- Alberta");
                                }
                                else if(str === 'BC')
                                {
                                    $('#state-input').focus().val("BC --- British Columbia");
                                    $("#state").val("BC --- British Columbia");
                                }
                                else if(str === 'MB')
                                {
                                    $('#state-input').focus().val("MB --- Manitoba");
                                    $("#state").val("MB --- Manitoba");
                                }
                                else if(str === 'NB')
                                {
                                    $('#state-input').focus().val("NB --- New Brunswick");
                                    $("#state").val("NB --- New Brunswick");
                                    $('select[name=state]').val("NB --- New Brunswick");
                                }
                                else if(str === 'NL')
                                {
                                    $('#state-input').focus().val("NL --- Newfoundland and Labrador");
                                    $("#state").val("NL --- Newfoundland and Labrador");
                                }
                                else if(str === 'NS')
                                {
                                    $('#state-input').focus().val("NS --- Nova Scotia");
                                    $("#state").val("NS --- Nova Scotia");
                                }
                                else if(str === 'NT')
                                {
                                    $('#state-input').focus().val("NT --- Northwest Territories");
                                    $("#state").val("NT --- Northwest Territories");
                                }
                                else if(str === 'NU')
                                {
                                    $('#state-input').focus().val("NU --- Nunavut");
                                    $("#state").val("NU --- Nunavut");
                                }
                                else if(str === 'ON')
                                {
                                    $('#state-input').focus().val("ON --- Ontario");
                                    $("#state").val("ON --- Ontario");
                                    $('select[name=state]').val("ON --- Ontario");
                                }
                                else if(str === 'PE')
                                {
                                    $('#state-input').focus().val("PE --- Prince Edward Island");
                                    $("#state").val("PE --- Prince Edward Island");
                                }
                                else if(str === 'QC')
                                {
                                    $('#state-input').focus().val("QC --- Quebec");
                                    $("#state").val("QC --- Quebec");
                                }
                                else if(str === 'SK')
                                {
                                    $('#state-input').focus().val("SK --- Saskatchewan");
                                    $("#state").val("SK --- Saskatchewan");
                                }
                                else if(str === 'YT')
                                {
                                    $('#state-input').focus().val("YT --- Yukon Territory");
                                    $("#state").val("YT --- Yukon Territory");
                                }
                    }
                }

	}
}

function loadStates(str,dataLevel)
{
 
    //var dataLevel = "supp";   
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
                        if(dataLevel === "cntry")
                        {       
                            //alert(xmlhttp.responseText);
                            
                            document.getElementById("state").innerHTML = xmlhttp.responseText;
                            //$('#state-input').focus().val('');
                        }
//                        else if(dataLevel === "cust")
//                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxMaster.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "cntry")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cntry="+str);
                }

	}
}


function loadAcctData(str, custno, suppno)
{
    
    //alert(str + ":::" + custno + ":::" + suppno);
    
    $("#loadingDiv").css({"visibility":"visible"});
    //alert(str);
    //var suppEle = document.getElementById("selSupplier");
    //var suppno = suppEle.options[suppEle.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "acctDataAjax.php",
        dataType: 'text',
        cache : false,
        data: ({acctno:str, custno:custno, supno:suppno}),
        success: function(data) {
            $("#loadingDiv").css({"visibility":"hidden"});
            //alert(data);
	    var acctData = data.split(":::");
            
            //alert(str);
            
            
            // ...then you need to set the display text of the actual autocomplete box.
            //$('#selSupplier').focus().val(suppno);
           // $('select[name=selSupplier]').val(suppno);
            
            $('#selAccount').val(str);
            $('#selAccount-input').focus().val(str);
            
            acctRecordIndex = document.getElementById("selAccount").selectedIndex;
            //alert(custRecordIndex);
            
            //$("#lblCustName").html(acctData[0]);
	    $("#acctname").val(acctData[0]);
            $("#shrtname").val(acctData[1]);
            $("#name1").val(acctData[2]);
            $("#name2").val(acctData[3]);
            $("#addr1").val(acctData[4]);
            $("#addr2").val(acctData[5]);
            //alert(acctData[6]);
            
            //$("#country").val(acctData[6]);
            var cntryTxt = acctData[6].split(" --- ");
            
            
            //$("#state").val(custData[7]);
            //alert(custData[7]);
            if(cntryTxt[0] === "US")
                loadCntryStateTxt(acctData[7],"stateTxt","US");
            else if(cntryTxt[0] === "CA")
                loadCntryStateTxt(acctData[7],"stateTxt","CA");
            
            loadStates(cntryTxt[0],"cntry");
            
            //loadCntryStateTxt(acctData[6],"cntryTxt","");
            $('#country-input').focus().val(acctData[6]);
            $("#country").val(acctData[6]);
            
            
            
            //alert(stateTxt);
            
            
            $("#city").val(acctData[8]);
            $("#zip").val(acctData[9]);
//            alert(acctData[10]);
//            if(acctData[10] === "" || acctData[10] === null)
//                $("#phn").val('');
//            else
                $("#phn").val(acctData[10].replace(/(\d{3})(\d{3})(\d{4})/, '($1)$2-$3'));
            //$("#phn").val(acctData[10]);
            $("#cntname").val(acctData[11]);
            //alert(acctData[12]);
            $("#atype").val(acctData[12]);
            //alert(acctData[13]);
            if(acctData[13] === 'Y')
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
            //alert(acctData[14]);
            var lockedDate = acctData[14].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var lockedDate = acctData[14];
            $("#from1").val(lockedDate);
            var effDate = acctData[15].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var effDate = acctData[15];
            $("#from2").val(effDate);
            var expDate = acctData[16].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
            //var expDate = acctData[16];
            $("#to").val(expDate);
            
            //$('#selTransactionListing').html(data);
            //initDataTable();
            //attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
   });
    
    
}

function isDate(txtDate)
{
    var currVal = txtDate;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    
    if (dtArray == null) 
        return false;
    
    //Checks for mm/dd/yyyy format.
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5];        
    
    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    return true;
}

</script>

<script>
    
    var suppRecordIndex;
    var custRecordIndex;
    var acctRecordIndex;
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
        
        suppRecordIndex = 1;
        custRecordIndex = 1;
        acctRecordIndex = 1;
        
        $( "#prev" ).click(function() {
            
                if(suppRecordIndex === 1)
                {
                    if(custRecordIndex === 1)
                    {
                        if(acctRecordIndex === 1)
                            alert("First record displayed");
                        else if(acctRecordIndex > 0)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            acctRecordIndex = acctRecordIndex - 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;

                            loadAcctData(acctno, custno, suppno);
                        }
                    }
                    else if(custRecordIndex > 0)
                    {
                        if(acctRecordIndex === 1)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                        
                            custRecordIndex = custRecordIndex - 1;
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            
                            //$('#selSupplier').focus().val(suppno);
                            showDataPrevNxt(custno, custTxt, "cust","prev");

                            
                            
                        }
                        else if(acctRecordIndex > 0)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            acctRecordIndex = acctRecordIndex - 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;

                            loadAcctData(acctno, custno, suppno);
                        }
                    }
                }
                else if(suppRecordIndex > 0)
                {
                    if(custRecordIndex === 1)
                    {
                        if(acctRecordIndex === 1)
                        {
                            suppRecordIndex = suppRecordIndex - 1;
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //var suppno = suppEle.options[suppRecordIndex].value;
                            var suppTxt = suppEle.options[suppRecordIndex].text;
                            
                            $('#selSupplier').val(suppno);
                            $('#selSupplier-input').focus().val(suppTxt);
                            //$('#selSupplier').focus().val(suppno);
                            showData(suppno, "supp");

                            custRecordIndex = document.getElementById("selCustomer").length - 1;

                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            
                            showDataPrevNxt(custno, custTxt, "cust","prev");

                            
                            
                        }
                        else if(acctRecordIndex > 0)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            acctRecordIndex = acctRecordIndex - 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;

                            loadAcctData(acctno, custno, suppno);
                        }
                    }
                    else if(custRecordIndex > 0)
                    {
                        if(acctRecordIndex === 1)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            
                            custRecordIndex = custRecordIndex - 1;
                            var custEle = document.getElementById("selCustomer");
                            //var custno = custEle.options[custRecordIndex].value;
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            //$('#selSupplier').focus().val(suppno);
                            showDataPrevNxt(custno, custTxt, "cust","prev");

                            
                        }
                        else if(acctRecordIndex > 0)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            acctRecordIndex = acctRecordIndex - 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;

                            loadAcctData(acctno, custno, suppno);
                        }
                        
                    }
                }
               
        });
        
        $( "#next" ).click(function() {
            
                var suppCount = document.getElementById("selSupplier").length - 1;
                var custCount = document.getElementById("selCustomer").length - 1;
                var acctCount = document.getElementById("selAccount").length - 1;
                //alert(suppCount+":suppin:"+suppRecordIndex);
                
                if(suppRecordIndex === 1 && custCount === -1 && acctCount === -1)
                {
                    //alert('1');
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppRecordIndex].value;
                    var suppTxt = suppEle.options[suppRecordIndex].text;
                    //alert(suppno);
                    //$('#selSupplier').focus().val(suppno);
                    $('#selSupplier').val(suppno);
                    $('#selSupplier-input').focus().val(suppTxt);
                    showDataNxt(suppno, "supp");
                    //alert('2');
                    
                    //showDataNxt(custno, "cust");
                    
                }
                else if(suppRecordIndex === suppCount)
                {
                    //alert(suppCount+":suppind:"+suppRecordIndex+":cusin"+custRecordIndex+":"+custCount);
                    if(custRecordIndex === custCount)
                    {
                        if(acctRecordIndex === acctCount)
                        {
                            alert("Last record displayed");
                        }
                        else if(acctRecordIndex < acctCount)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            $('#selCustomer').val(custno);
                            $('#selCustomer-input').focus().val(custTxt);
                            
                            acctRecordIndex = acctRecordIndex + 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;
                            //alert(custno + suppno);
                            loadAcctData(acctno, custno, suppno);

                        }
                    }
                    else if(custRecordIndex < custCount)
                    {
                        if(acctRecordIndex === acctCount)
                        {
                            
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            custRecordIndex = custRecordIndex + 1;
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            //$('#selSupplier').focus().val(suppno);
                            showDataPrevNxt(custno, custTxt, "cust","next");

                            
                        }
                        else if(acctRecordIndex < acctCount)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            $('#selCustomer').val(custno);
                            $('#selCustomer-input').focus().val(custTxt);
                            
                            acctRecordIndex = acctRecordIndex + 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;
                            //alert(custno + suppno);
                            loadAcctData(acctno, custno, suppno);
                        }
                        
                    }
                }
                else if(suppRecordIndex < suppCount)
                {
                    if(custRecordIndex === custCount)
                    {
                        if(acctRecordIndex === acctCount)
                        {
                            suppRecordIndex = suppRecordIndex + 1;
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            var suppTxt = suppEle.options[suppRecordIndex].text;
                            
                            $('#selSupplier').val(suppno);
                            $('#selSupplier-input').focus().val(suppTxt);
                            //$('#selSupplier').focus().val(suppno);
                            showData(suppno, "supp");
                            
                            custRecordIndex = 1;
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            showDataPrevNxt(custno, custTxt, "cust","next");

                            
                        }
                        else if(acctRecordIndex < acctCount)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            $('#selCustomer').val(custno);
                            $('#selCustomer-input').focus().val(custTxt);
                            
                            acctRecordIndex = acctRecordIndex + 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;
                            //alert(custno + suppno);
                            loadAcctData(acctno, custno, suppno);
                        }
                        
                    }
                    else if(custRecordIndex < custCount)
                    {
                        if(acctRecordIndex === acctCount)
                        {
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            custRecordIndex = custRecordIndex + 1;
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;
                            
                            //$('#selSupplier').focus().val(suppno);
                            showDataPrevNxt(custno, custTxt, "cust","next");

                            
                        }
                        else if(acctRecordIndex < acctCount)
                        {
                                
                            var suppEle = document.getElementById("selSupplier");
                            var suppno = suppEle.options[suppRecordIndex].value;
                            //$('#selSupplier').focus().val(suppno);
                            var custEle = document.getElementById("selCustomer");
                            var custno = custEle.options[custRecordIndex].value;
                            //var custno = custEle.options[custRecordIndex].value;
                            var custTxt = custEle.options[custRecordIndex].text;

                            $('#selCustomer').val(custno);
                            $('#selCustomer-input').focus().val(custTxt);

                            acctRecordIndex = acctRecordIndex + 1;
                            var acctEle = document.getElementById("selAccount");
                            var acctno = acctEle.options[acctRecordIndex].value;
                            //alert(custno + suppno);
                            loadAcctData(acctno, custno, suppno);
                        }
                        
                    }
                }
                
                
        });
        
        
        $( "#remove" ).click(function() {
                var supp = $("#selSupplier").val();
                var cust = $("#selCustomer").val();
                var acct = $("#selAccount-input").val();
                $("#loadingDiv").css({"visibility":"visible"});
                $.ajax({
                    type: "POST",
                    url: "acctAddAjax.php",
                    dataType: 'text',
                    cache : false,
                    data: {selSupplier: supp, selCustomer: cust, selAccount:acct, cmd: 'remove'},
                    success: function(data) {
                        $("#loadingDiv").css({"visibility":"hidden"});
                        //$("#load").css({"visibility":"hidden"});
                        alert(data);
                        
                        showData(cust,"cust");
                        
                        //$('#selTransactionListing').html(data);
                        //initDataTable();
                        //attachClickHandler();
                    },
                    error: function(data) {
                        console.log("error");
                    }
                });
                
        });
        
        
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
        
        var supp = $("#selSupplier").val();
        var cust = $("#selCustomer").val();
        var acct = $("#selAccount-input").val();
        if(acct === "")
        {
            alert('Account number cannot be blank !!');
            return false;
        }
        var acctName = $("#acctname").val();
        var shrtName = $("#shrtname").val();
        var name1 = $("#name1").val();
        var name2 = $("#name2").val();
        var addr1 = $("#addr1").val();
        var addr2 = $("#addr2").val();
        var cntry = $("#country").val();
        var state = $("#state-input").val();
        var city = $("#city").val();
        var zip = $("#zip").val();
        var phn = $("#phn").val().toString().replace('(','').replace(')','').replace('-','');
        var cntname = $("#cntname").val();
        var atype = $("#atype").val();
        var locked = $("#isLocked").val();
        var locked_date = $("#from1").val();
        if(locked_date !== "" && !isDate(locked_date))
        {
            alert('Invalid Locked Date');
            return false;
        }
        var eff_date = $("#from2").val();
        if(eff_date !== "" && !isDate(eff_date))
        {
            alert('Invalid Effective Date');
            return false;
        }
        var exp_date = $("#to").val();
        if(exp_date !== "" && !isDate(exp_date))
        {
            alert('Invalid Expiration Date');
            return false;
        }
        
        $("#loadingDiv").css({"visibility":"visible"});
	//alert(custn);
        $.ajax({
        type: "POST",
        url: "acctAddAjax.php",
        dataType: 'text',
        cache : false,
        data: {selSupplier: supp, selCustomer: cust, selAccount: acct, acctname: acctName, shrtname: shrtName, name1: name1, name2: name2, addr1: addr1, addr2: addr2, country: cntry, state: state, city: city, zip: zip, phn: phn, cntname: cntname, atype: atype, isLocked: locked, from1: locked_date, from2: eff_date, to: exp_date, cmd:'save'},
        //beforeSend: toggleButton,
        success: function(data) {
            //$("#load").css({"visibility":"hidden"});
            $("#loadingDiv").css({"visibility":"hidden"});
            alert(data);
            
            showDataSave(cust,"cust");
            
            //$('#selTransactionListing').html(data);
            //initDataTable();
            //attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
    });
    return false;
   
});

//$("#selSupplier").change(function(){

  //  showData($("#selSupplier").val());
//});

$( "#selSupplier" ).combobox();
$( "#selCustomer" ).combobox();
$( "#selAccount" ).combobox();
$( "#country" ).combobox();
$( "#state" ).combobox();

$("#from1").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
$("#from2").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
$("#to").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
$("#phn").mask("(999)999-9999");

});
        
        
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Account Master </h2>
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
							echo "<option name='supp' value=".$value3['supplier_no'].">".$value3['supplier_no']." --- ".trim($value3['short_supplier_name'])."</option>";
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
                                        <td>Account</td><td>
                                        <div class="ui-widget">
					<select  name="selAccount" id="selAccount">
					
					</select>
                                        </div>
					</td>
					<!--<td>Account No</td>
                                        <td>
                                            <input type="text" id="acctno" name="acctno">
					</td>-->
					<!--<td>Account</td><td>
                                                <input id="selAccount" name="selAccount"/>
                                        </td>-->
				</tr>
                                
                                <tr>
                                        
					<td>Account Name</td>
                                        <td>
                                            <input type="text" id="acctname" name="acctname" maxlength="50">
					</td>
				</tr>
                                
                                <tr>
                                        
					<td>Short Name</td>
                                        <td>
                                            <input type="text" id="shrtname" name="shrtname" maxlength="10">
					</td>
				</tr>
                                <tr>
                                     <td>Name 1</td>
                                        <td>
                                            <input type="text" id="name1" name="name1" maxlength="50">
					</td>
				</tr>
                                <tr>
                                     <td>Name 2</td>
                                        <td>
                                            <input type="text" id="name2" name="name2" maxlength="50">
					</td>
				</tr>
                                <tr>
                                     <td>Address 1</td>
                                        <td>
                                            <input type="text" id="addr1" name="addr1" maxlength="50">
					</td>
				</tr>
                                <tr>
                                     <td>Address 2</td>
                                        <td>
                                            <input type="text" id="addr2" name="addr2" maxlength="50">
					</td>
				</tr>
                                <tr>
                                     <td>Country</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="country" id="country">
                                                    <?php
                                                        $query3="SELECT iso_country_code, country_name FROM Country";
                                                        $result3=$mysqli->query($query3);
                                                        echo "<option name='cntry'></option>";
                                                        while($value3 = mysqli_fetch_array($result3))
                                                        {
                                                            echo "<option name='cntry' value='".$value3['iso_country_code']." --- ".trim($value3['country_name'])."'>".$value3['iso_country_code']." --- ".trim($value3['country_name'])."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            
					</td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCntryName'></label> </td>
				</tr>
                                <tr>
                                     <td>State</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="state" id="state">
                                                    <?php
                                                        
                                                    ?>
                                                </select>
                                            </div>
                                            
					</td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblStateName'></label> </td>
				</tr>
                                <tr>
                                     <td>City</td>
                                        <td>
                                            <input type="text" id="city" name="city" maxlength="50">
					</td>
				</tr>
                                <tr>
                                     <td>Zip</td>
                                        <td>
                                            <input type="text" id="zip" name="zip" maxlength="10">
					</td>
				</tr>
                                <tr>
                                     <td>Phone</td>
                                        <td>
                                            <input type="text" id="phn" name="phn" maxlength="10">
					</td>
				</tr>
                                <tr>
                                     <td>Contact Name</td>
                                        <td>
                                            <input type="text" id="cntname" name="cntname" maxlength="50">
					</td>
				</tr>
<!--                                <tr>
                                     <td>Account Type</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="atype" id="atype">
                                                    <option name='acctType' value="R">Rack Account</option>
                                                    <option name='acctType' value="S">Supplier Account</option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>-->
<!--                                <tr>
                                     <td>ISO Language</td>
                                        <td>
                                            <div class="ui-widget">
                                                <select name="isolang" id="isolang">
                                                    <option name='acctIsoLang' value="<?php echo $row['iso_language'];?>"><?php echo $row['iso_language'];?></option>
                                                </select>
                                            </div>
                                            
					</td>
				</tr>-->
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
					        <input type="text" name="from1" data-role="popup" value="" id="from1" class="tcal required" maxlength="10"/>
                                	</td>
						
				</tr>
                                
                                <tr>
					<td>Authorized Eff.Date</td>
					<td>
					        <input type="text" name="from2" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from2" class="tcal required" maxlength="10"/>
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
					<input type="text" name="to" value="<?php echo $var=date("d/m/Y");?>" id="to" class="tcal required" maxlength="10"/>
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
                            <td></td><td>
                                <input type="button" name="button" id="prev" value="Previous" onClick="">
                                <input type="button" name="button" id="next" value="Next" onClick="">
                                <input type="button" name="button" id="paging" value="Save" onClick="">
                                <input type="button" name="button" id="remove" value="Remove" onClick="">
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
