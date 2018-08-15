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
<script src="js/jquery-dropdown-widget.js"></script>
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
    width: 200px !important;
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
//        data: $('#alloc_add').serialize(),
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
                            $('#selProduct-input').val('');
                            $('#selProduct').val('');
                            //$('#adate').val('');
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
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		//if(dataLevel === "supp")
                //{
			xmlhttp.open("POST","ajax.php", true);
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
                
	}
}


//function loadAcctData(str, custno, suppno)
//{
//    
//    //alert(str + ":::" + custno + ":::" + suppno);
//    
//    $("#loadingDiv").css({"visibility":"visible"});
//    //alert(str);
//    //var suppEle = document.getElementById("selSupplier");
//    //var suppno = suppEle.options[suppEle.selectedIndex].value;
//    $.ajax({
//        type: "POST",
//        url: "acctDataAjax.php",
//        dataType: 'text',
//        cache : false,
//        data: ({acctno:str, custno:custno, supno:suppno}),
//        success: function(data) {
//            $("#loadingDiv").css({"visibility":"hidden"});
//            //alert(data);
//	    var acctData = data.split(":::");
//            
//            //alert(str);
//            
//            
//            // ...then you need to set the display text of the actual autocomplete box.
//            //$('#selSupplier').focus().val(suppno);
//           // $('select[name=selSupplier]').val(suppno);
//            
//            //$('#selAccount').val(str);
//            //$('#selAccount-input').focus().val(str);
//            
//            acctRecordIndex = document.getElementById("selAccount").selectedIndex;
//            //alert(custRecordIndex);
//            
//            //$("#lblCustName").html(acctData[0]);
//	    $("#acctname").val(acctData[0]);
//            $("#shrtname").val(acctData[1]);
//            $("#name1").val(acctData[2]);
//            $("#name2").val(acctData[3]);
//            $("#addr1").val(acctData[4]);
//            $("#addr2").val(acctData[5]);
//            //alert(acctData[6]);
//            
//            //$("#country").val(acctData[6]);
//            var cntryTxt = acctData[6].split(" --- ");
//            
//            
//            //$("#state").val(custData[7]);
//            //alert(custData[7]);
//            if(cntryTxt[0] === "US")
//                loadCntryStateTxt(acctData[7],"stateTxt","US");
//            else if(cntryTxt[0] === "CA")
//                loadCntryStateTxt(acctData[7],"stateTxt","CA");
//            
//            loadStates(cntryTxt[0],"cntry");
//            
//            //loadCntryStateTxt(acctData[6],"cntryTxt","");
//            $('#country-input').focus().val(acctData[6]);
//            $("#country").val(acctData[6]);
//            
//            
//            
//            //alert(stateTxt);
//            
//            
//            $("#city").val(acctData[8]);
//            $("#zip").val(acctData[9]);
////            alert(acctData[10]);
////            if(acctData[10] === "" || acctData[10] === null)
////                $("#phn").val('');
////            else
//                $("#phn").val(acctData[10].replace(/(\d{3})(\d{3})(\d{4})/, '($1)$2-$3'));
//            //$("#phn").val(acctData[10]);
//            $("#cntname").val(acctData[11]);
//            //alert(acctData[12]);
//            $("#atype").val(acctData[12]);
//            //alert(acctData[13]);
//            if(acctData[13] === 'Y')
//            {
//                //alert('hoo');
//                $('input[name=isLocked]').prop('checked', true);
//                $('input[name=isLocked]').prop('value', 'Y');
//            }
//            else
//            {
//                $('input[name=isLocked]').prop('checked', false);
//                $('input[name=isLocked]').prop('value', 'N');
//            }
//            //alert(acctData[14]);
//            var lockedDate = acctData[14].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
//            //var lockedDate = acctData[14];
//            $("#from1").val(lockedDate);
//            var effDate = acctData[15].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
//            //var effDate = acctData[15];
//            $("#from2").val(effDate);
//            var expDate = acctData[16].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
//            //var expDate = acctData[16];
//            $("#to").val(expDate);
//            
//            //$('#selTransactionListing').html(data);
//            //initDataTable();
//            //attachClickHandler();
//        },
//        error: function(data) {
//            console.log("error");
//        }
//   });
//    
//    
//}

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
            

               
        });
        
        $( "#next" ).click(function() {
            
                
        });
        
        function getAllocationDetails()
        {
            $('#alloc_add').resetForm();
            
            if($('#selSupplier-input').val() === "")
            {
                alert("Select Supplier number");
                return false;
            }
            else if($('#selCustomer-input').val() === "")
            {
                alert("Select Customer number");
                return false;
            }
            if($('#selAccount-input').val() === "")
            {
                alert("Select Account number");
                return false;
            }
            if($('#selProduct-input').val() === "")
            {
                alert("Select Product");
                return false;
            }
            if($('#adate').val() === "" || !isDate($('#adate').val()))
            {
                alert("Input valid allocation date");
                return false;
            }
        
            $("#loadingDiv").css({"visibility":"visible"});
            
            //alert(str);
            var suppno = document.getElementById('selSupplier').value;
            var custno = document.getElementById('selCustomer').value;
            var acctno = document.getElementById('selAccount').value;
            var prodID = document.getElementById('selProduct').value;
            
            var allocDate = $('#adate').val();
            
            //var suppno = suppEle.options[suppEle.selectedIndex].value;
            $.ajax({
                type: "POST",
                url: "allocDataAjax.php",
                dataType: 'text',
                cache : false,
                data: ({acctno:acctno, custno:custno, supno:suppno, prodid:prodID, adate:allocDate}),
                success: function(data) {
                    $("#loadingDiv").css({"visibility":"hidden"});
                    //alert(data);
                    if(data.toString().indexOf(":::") === -1)
                    {
                        alert("No Allocation record found for criterias specified !");
                        return;
                    }
                    
                    var acctData = data.split(":::");

                    //alert(str);


                    // ...then you need to set the display text of the actual autocomplete box.
                    //$('#selSupplier').focus().val(suppno);
                   // $('select[name=selSupplier]').val(suppno);

                    //$('#selAccount').val(str);
                    //$('#selAccount-input').focus().val(str);

                    //acctRecordIndex = document.getElementById("selAccount").selectedIndex;
                    //alert(custRecordIndex);
                    
                    var effDate = acctData[0].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
                    //var lockedDate = acctData[14];
                    $("#effdate").val(effDate);
                    var expDate = acctData[1].replace(/(\d\d)(\d\d)(\d\d)/g, '$3/$2/20$1');
                    //var effDate = acctData[15];
                    $("#expdate").val(expDate);
                    
                    $("#pdays").val(acctData[2]);
                    $("#lwpct").val(acctData[3]);
                    $("#ldpct").val(acctData[4]);
                    
                    if(acctData[5] === 'Y')
                    {
                        //alert('hoo');
                        $('input[name=isLWD]').prop('checked', true);
                        $('input[name=isLWD]').prop('value', 'Y');
                    }
                    else
                    {
                        $('input[name=isLWD]').prop('checked', false);
                        $('input[name=isLWD]').prop('value', 'N');
                    }
                    
                    if(acctData[6] === 'Y')
                    {
                        //alert('hoo');
                        $('input[name=isDaily]').prop('checked', true);
                        $('input[name=isDaily]').prop('value', 'Y');
                    }
                    else
                    {
                        $('input[name=isDaily]').prop('checked', false);
                        $('input[name=isDaily]').prop('value', 'N');
                    }
                    //$("#isDaily").val(acctData[6]);
                    $("#txtLimitDaily").val(acctData[7]);
                    $("#txtLiftedDaily").val(acctData[8]);
                    $("#txtNextLimitDaily").val(acctData[9]);
                    $("#selNxtActionDaily").val(acctData[10]);
                    $("#txtWarningDaily").val(acctData[11]);
                    $("#txtDenialDaily").val(acctData[12]);
                    
                    if(acctData[13] === 'Y')
                    {
                        //alert('hoo');
                        $('input[name=isPeriod]').prop('checked', true);
                        $('input[name=isPeriod]').prop('value', 'Y');
                    }
                    else
                    {
                        $('input[name=isPeriod]').prop('checked', false);
                        $('input[name=isPeriod]').prop('value', 'N');
                    }
                    $("#txtLimitPeriod").val(acctData[14]);
                    $("#txtLiftedPeriod").val(acctData[15]);
                    $("#txtNextLimitPeriod").val(acctData[16]);
                    $("#selNxtActionPeriod").val(acctData[17]);
                    $("#txtWarningPeriod").val(acctData[18]);
                    $("#txtDenialPeriod").val(acctData[19]);
                    
                    if(acctData[20] === 'Y')
                    {
                        //alert('hoo');
                        $('input[name=isMonthly]').prop('checked', true);
                        $('input[name=isMonthly]').prop('value', 'Y');
                    }
                    else
                    {
                        $('input[name=isMonthly]').prop('checked', false);
                        $('input[name=isMonthly]').prop('value', 'N');
                    }
                    $("#txtLimitMonthly").val(acctData[21]);
                    $("#txtLiftedMonthly").val(acctData[22]);
                    $("#txtNextLimitMonthly").val(acctData[23]);
                    $("#selNxtActionMonthly").val(acctData[24]);
                    $("#txtWarningMonthly").val(acctData[25]);
                    $("#txtDenialMonthly").val(acctData[26]);
                    
                    if(acctData[27] === 'Y')
                    {
                        //alert('hoo');
                        $('input[name=isYearly]').prop('checked', true);
                        $('input[name=isYearly]').prop('value', 'Y');
                    }
                    else
                    {
                        $('input[name=isYearly]').prop('checked', false);
                        $('input[name=isYearly]').prop('value', 'N');
                    }
                    $("#txtLimitYearly").val(acctData[28]);
                    $("#txtLiftedYearly").val(acctData[29]);
                    $("#txtNextLimitYearly").val(acctData[30]);
                    $("#selNxtActionYearly").val(acctData[31]);
                    $("#txtWarningYearly").val(acctData[32]);
                    $("#txtDenialYearly").val(acctData[33]);
                    //alert(acctData[6]);

//                    if(acctData[13] === 'Y')
//                    {
//                        //alert('hoo');
//                        $('input[name=isLocked]').prop('checked', true);
//                        $('input[name=isLocked]').prop('value', 'Y');
//                    }
//                    else
//                    {
//                        $('input[name=isLocked]').prop('checked', false);
//                        $('input[name=isLocked]').prop('value', 'N');
//                    }
                    
                    //initDataTable();
                    //attachClickHandler();
                    $('#remove').prop('disabled', false);
                },
                error: function(data) {
                    console.log("error");
                }
           });
        }
        
        $( "#remove" ).click(function() {
            
                if($('#selSupplier-input').val() === "")
                {
                    alert("Select Supplier number");
                    return false;
                }
                else if($('#selCustomer-input').val() === "")
                {
                    alert("Select Customer number");
                    return false;
                }
                if($('#selAccount-input').val() === "")
                {
                    alert("Select Account number");
                    return false;
                }
                if($('#selProduct-input').val() === "")
                {
                    alert("Select Product");
                    return false;
                }
                if($('#adate').val() === "" || !isDate($('#adate').val()))
                {
                    alert("Input valid allocation date");
                    return false;
                }
                
                $('<div></div>').appendTo('body')
            .html('<div><h6>Are you sure you want to Remove this Allocation record ?</h6></div>')
            .dialog({
                modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                width: 'auto', resizable: false,
                buttons: {
                    Yes: function () {
//                        $("#load").css({"visibility":"visible"});
//                        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
                        var supp = $("#selSupplier").val();
                        var cust = $("#selCustomer").val();
                        var acct = $("#selAccount").val();
                        var prod = $("#selProduct").val();
                        var adate = $('#adate').val();

                        $("#loadingDiv").css({"visibility":"visible"});
                        $.ajax({
                            type: "POST",
                            url: "allocAddAjax.php",
                            dataType: 'text',
                            cache : false,
                            data: {selSupplier: supp, selCustomer: cust, selAccount:acct, selProduct: prod, adate: adate, cmd: 'remove'},
                            success: function(data) {
                                
                                $("#loadingDiv").css({"visibility":"hidden"});
                                //$("#load").css({"visibility":"hidden"});
                                //alert(data);
                                
                                if(data.toString().trim() === "1")
                                {
                                    $('#remove').prop('disabled', true);
                                    $('#alloc_add').resetForm();
                                    
                                    $('<div></div>').appendTo('body')
                                    .html('<div><h6>Allocation record has been removed</h6></div>')
                                    .dialog({
                                        modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                                        width: 'auto', resizable: false,
                                        buttons: {
                                            Ok: function () {
                                                
                                                $(this).dialog("close");
                                            }
                                        },
                                        close: function (event, ui) {
                                            $(this).remove();
                                        }
                                    });
                                }
                                else
                                {
                                    $('<div></div>').appendTo('body')
                                    .html('<div><h6>Some problem occurred while removing Allocation record, Try Again !!</h6></div>')
                                    .dialog({
                                        modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                                        width: 'auto', resizable: false,
                                        buttons: {
                                            Ok: function () {
                                                
                                                $(this).dialog("close");
                                            }
                                        },
                                        close: function (event, ui) {
                                            $(this).remove();
                                        }
                                    });
                                }

                                //$('#selTransactionListing').html(data);
                                //initDataTable();
                                //attachClickHandler();
                            },
                            error: function(data) {
                                console.log("error");
                            }
                        }); 
                        
                        $(this).dialog("close");
                    },
                    No: function () {
                        //alert("No");
                        $(this).dialog("close");
                    }
                },
                close: function (event, ui) {
                    $(this).remove();
                }
          });
                
                
                
        });
        
        $( "#btnGetDetails" ).click(function() {
            
            getAllocationDetails();
        
        });
        
        function pad_with_zeroes(number, length) {

            var my_string = '' + number;
            while(my_string.length < length) {
                my_string = '0' + my_string;
            }

            return my_string;

        }
        
        
        $( "#paging" ).click(function() {	
        
            if($('#selSupplier-input').val() === "")
            {
                alert("Select Supplier number");
                return false;
            }
            else if($('#selCustomer-input').val() === "")
            {
                alert("Select Customer number");
                return false;
            }
            if($('#selAccount-input').val() === "")
            {
                alert("Select Account number");
                return false;
            }
            if($('#selProduct-input').val() === "")
            {
                alert("Select Product");
                return false;
            }
            if($('#adate').val() === "" || !isDate($('#adate').val()))
            {
                alert("Input valid allocation date");
                return false;
            }
            if($('#effdate').val() === "" || !isDate($('#effdate').val()))
            {
                alert("Input valid effective date");
                return false;
            }
            if($('#expdate').val() === "" || !isDate($('#expdate').val()))
            {
                alert("Input valid expiration date");
                return false;
            }
            
            var effdate = $('#effdate').val();
            var effdate_arr = effdate.split("/");
            var effdate_cmp = effdate_arr[2]+"-"+effdate_arr[1]+"-"+effdate_arr[0];
            
            var expdate = $('#expdate').val()
            var expdate_arr = expdate.split("/");
            var expdate_cmp = expdate_arr[2]+"-"+expdate_arr[1]+"-"+expdate_arr[0];
            
            if(expdate_cmp < effdate_cmp)
            {
                alert("Expiration date can not be less than Effective date !!");
                return false;
            }
            
            var warning_pct = $("#lwpct").val();
            var denial_pct = $("#ldpct").val();
            //alert(warning_pct + ":" + denial_pct);
            
            if(parseInt(warning_pct, 10) > parseInt(denial_pct, 10))
            {
                alert("Load Warning can not be greater than Denial !!");
                return false;
            }
            
            var supp = $("#selSupplier").val();
            var cust = $("#selCustomer").val();
            var acct = $("#selAccount").val();
            var prod = $("#selProduct").val();
            
            var adate = $('#adate').val();
            var pdays = $('#pdays').val();
            
            if(warning_pct === "")
                warning_pct = "000";
            if(denial_pct === "")
                denial_pct = "000";
            
            var isLWD = $('input[name=isLWD]').prop('checked') ? "Y" : "N";
            
            var isDaily = $('input[name=isDaily]').prop('checked') ? "Y" : "N";
            var dailyLimit = ($('#txtLimitDaily').val() === "") ? "000000000" : pad_with_zeroes($('#txtLimitDaily').val(), 9);
            var dailyLifted = ($('#txtLiftedDaily').val() === "") ? "000000000" : pad_with_zeroes($('#txtLiftedDaily').val(), 9);
            var dailyNextLimit = ($('#txtNextLimitDaily').val() === "") ? "000000000" : pad_with_zeroes($('#txtNextLimitDaily').val(), 9);
            var dailyNextAction = $('#selNxtActionDaily').val();
            var dailyWarning = ($('#txtWarningDaily').val() === "") ? "000" : $('#txtWarningDaily').val();
            var dailyDenial = ($('#txtDenialDaily').val() === "") ? "000" : $('#txtDenialDaily').val();
            
            var isPeriod = $('input[name=isPeriod]').prop('checked') ? "Y" : "N";
            var periodLimit = ($('#txtLimitPeriod').val() === "") ? "000000000" : pad_with_zeroes($('#txtLimitPeriod').val(), 9);
            var periodLifted = ($('#txtLiftedPeriod').val() === "") ? "000000000" : pad_with_zeroes($('#txtLiftedPeriod').val(), 9);
            var periodNextLimit = ($('#txtNextLimitPeriod').val() === "") ? "000000000" : pad_with_zeroes($('#txtNextLimitPeriod').val(), 9);
            var periodNextAction = $('#selNxtActionPeriod').val();
            var periodWarning = ($('#txtWarningPeriod').val() === "") ? "000" : $('#txtWarningPeriod').val();
            var periodDenial = ($('#txtDenialPeriod').val() === "") ? "000" : $('#txtDenialPeriod').val();
            
            var isMonthly = $('input[name=isMonthly]').prop('checked') ? "Y" : "N";
            var monthlyLimit = ($('#txtLimitMonthly').val() === "") ? "000000000" : pad_with_zeroes($('#txtLimitMonthly').val(), 9);
            var monthlyLifted = ($('#txtLiftedMonthly').val() === "") ? "000000000" : pad_with_zeroes($('#txtLiftedMonthly').val(), 9);
            var monthlyNextLimit = ($('#txtNextLimitMonthly').val() === "") ? "000000000" : pad_with_zeroes($('#txtNextLimitMonthly').val(), 9);
            var monthlyNextAction = $('#selNxtActionMonthly').val();
            var monthlyWarning = ($('#txtWarningMonthly').val() === "") ? "000" : $('#txtWarningMonthly').val();
            var monthlyDenial = ($('#txtDenialMonthly').val() === "") ? "000" : $('#txtDenialMonthly').val();
            
            var isYearly = $('input[name=isYearly]').prop('checked') ? "Y" : "N";
            var yearlyLimit = ($('#txtLimitYearly').val() === "") ? "000000000" : pad_with_zeroes($('#txtLimitYearly').val(), 9);
            var yearlyLifted = ($('#txtLiftedYearly').val() === "") ? "000000000" : pad_with_zeroes($('#txtLiftedYearly').val(), 9);
            var yearlyNextLimit = ($('#txtNextLimitYearly').val() === "") ? "000000000" : pad_with_zeroes($('#txtNextLimitYearly').val(), 9);
            var yearlyNextAction = $('#selNxtActionYearly').val();
            var yearlyWarning = ($('#txtWarningYearly').val() === "") ? "000" : $('#txtWarningYearly').val();
            var yearlyDenial = ($('#txtDenialYearly').val() === "") ? "000" : $('#txtDenialYearly').val();
            
            $("#loadingDiv").css({"visibility":"visible"});
            //alert(custn);
            $.ajax({
            type: "POST",
            url: "allocAddAjax.php",
            dataType: 'text',
            cache : false,
            data: {selSupplier: supp, selCustomer: cust, selAccount: acct, selProduct: prod, adate: adate, effdate: effdate, expdate: expdate, pdays: pdays, wpct: warning_pct, dpct: denial_pct, isLWD: isLWD, isDaily: isDaily, dailyLimit: dailyLimit, dailyLifted: dailyLifted, dailyNL: dailyNextLimit, dailyNA: dailyNextAction, dailyW: dailyWarning, dailyD: dailyDenial, isPeriod: isPeriod, periodLimit: periodLimit, periodLifted: periodLifted, periodNL: periodNextLimit, periodNA: periodNextAction, periodW: periodWarning, periodD: periodDenial, isMonthly: isMonthly, monthlyLimit: monthlyLimit, monthlyLifted: monthlyLifted, monthlyNL: monthlyNextLimit, monthlyNA: monthlyNextAction, monthlyW: monthlyWarning, monthlyD: monthlyDenial, isYearly: isYearly, yearlyLimit: yearlyLimit, yearlyLifted: yearlyLifted, yearlyNL: yearlyNextLimit, yearlyNA: yearlyNextAction, yearlyW: yearlyWarning, yearlyD: yearlyDenial, cmd:'save'},
            //beforeSend: toggleButton,
            success: function(data) {
                //$("#load").css({"visibility":"hidden"});
                $("#loadingDiv").css({"visibility":"hidden"});
                alert(data);
                $('#remove').prop('disabled', false);
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

$( "#selterminal" ).combobox();
$( "#selSupplier" ).combobox();
$( "#selCustomer" ).combobox();
$( "#selAccount" ).combobox();
$( "#selProduct" ).combobox();

$("#adate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
$("#effdate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
$("#expdate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});

$("#pdays").mask("99",{placeholder:"", autoclear: false});
$("#lwpct").mask("999",{placeholder:"", autoclear: false});
$("#ldpct").mask("999",{placeholder:"", autoclear: false});

$("#txtLimitDaily").mask("999999999",{placeholder:"", autoclear: false});
$("#txtLiftedDaily").mask("999999999",{placeholder:"", autoclear: false});
$("#txtNextLimitDaily").mask("999999999",{placeholder:"", autoclear: false});
$("#txtWarningDaily").mask("999",{placeholder:"", autoclear: false});
$("#txtDenialDaily").mask("999",{placeholder:"", autoclear: false});

$("#txtLimitPeriod").mask("999999999",{placeholder:"", autoclear: false});
$("#txtLiftedPeriod").mask("999999999",{placeholder:"", autoclear: false});
$("#txtNextLimitPeriod").mask("999999999",{placeholder:"", autoclear: false});
$("#txtWarningPeriod").mask("999",{placeholder:"", autoclear: false});
$("#txtDenialPeriod").mask("999",{placeholder:"", autoclear: false});

$("#txtLimitMonthly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtLiftedMonthly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtNextLimitMonthly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtWarningMonthly").mask("999",{placeholder:"", autoclear: false});
$("#txtDenialMonthly").mask("999",{placeholder:"", autoclear: false});

$("#txtLimitYearly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtLiftedYearly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtNextLimitYearly").mask("999999999",{placeholder:"", autoclear: false});
$("#txtWarningYearly").mask("999",{placeholder:"", autoclear: false});
$("#txtDenialYearly").mask("999",{placeholder:"", autoclear: false});

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
	$('#alloc_add').resetForm();
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Allocations </h2>
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
				
                                
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
    
                                <tr>
					<td>Terminal</td>
					<td>
						<select readonly disabled="disabled" name="selterminal" id="selterminal">
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
                                        
					<td>Product ID</td>
<!--                                        <td><div class="ui-widget">
					<select  name="selAType" id="selAType">
					
					</select>
                                        </div>
					</td>-->
                                        <td>
                                        <div class="ui-widget">
					<select  name="selProduct" id="selProduct">
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
                                        </div>
					</td>
                                        
				</tr>
                                
                                <tr>
                                        
					<td>Allocation Date</td>                                        
					<td>
					        <input type="text" name="adate" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="adate" class="tcal required" maxlength="10"/>
                                	</td>
                                        <td><input type="button" name="button" id="btnGetDetails" value="Get Details" onClick=""></td>
				</tr>
                            
                        </table>
                         
                        
                        <form name="alloc_add" method="post" id="alloc_add">
            
                        <div class="box-header well">
                            <h2><i class="glyphicon glyphicon-list-alt"></i> Allocation Details </h2>

                        </div>
                        
                        
                                    
                        <table class="display" cellspacing="0" width="100%">
                            
                                <tr>
                                        <td>Effective Date</td>                                        
					<td>
					        <input type="text" name="effdate" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="effdate" class="tcal required" maxlength="10"/>
                                	</td>
				</tr>
                                
                                <tr>
                                        <td>Expiration Date</td>                                        
					<td>
					        <input type="text" name="expdate" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="expdate" class="tcal required" maxlength="10"/>
                                	</td>
				</tr>
                                
                                <tr>
                                     <td>Days In Period</td>
                                        <td>
                                            <input type="text" id="pdays" name="pdays" maxlength="2">
					</td>
				</tr>
                                <tr>
                                     <td>Load Warning %</td>
                                        <td>
                                            <input type="text" id="lwpct" name="lwpct" maxlength="3">
					</td>
				</tr>
                                <tr>
                                     <td>Load Denial %</td>
                                        <td>
                                            <input type="text" id="ldpct" name="ldpct" maxlength="3">
					</td>
				</tr>
                                <tr>					
                                    <td></td>
                                    <td><input type="checkbox" name="isLWD" id="isLWD" value="N">&nbsp; Use Load Warning/Denial</td>
                                </tr>
                        
                        </table>
                        
                        
                        
            
                        <div class="box-header well">
                            <h2><i class="glyphicon glyphicon-list-alt"></i> Schedule </h2>

                        </div>
                        
                        
                        
                        
                        <table class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td><b>Daily</b></td>
                                    <td><b>Period</b></td>
                                    <td><b>Monthly</b></td>
                                    <td><b>Yearly</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" name="isDaily" id="isDaily" value="N">&nbsp; Enable</td>
                                    <td><input type="checkbox" name="isPeriod" id="isPeriod" value="N">&nbsp; Enable</td>
                                    <td><input type="checkbox" name="isMonthly" id="isMonthly" value="N">&nbsp; Enable</td>
                                    <td><input type="checkbox" name="isYearly" id="isYearly" value="N">&nbsp; Enable</td>
                                </tr>
                                <tr>
                                    <td>Limit</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLimitDaily" name="txtLimitDaily" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLimitPeriod" name="txtLimitPeriod" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLimitMonthly" name="txtLimitMonthly" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLimitYearly" name="txtLimitYearly" maxlength="9">
				    </td>
                                      
				</tr>
                                <tr>
                                     <td>Lifted</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLiftedDaily" name="txtLiftedDaily" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLiftedPeriod" name="txtLiftedPeriod" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLiftedMonthly" name="txtLiftedMonthly" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtLiftedYearly" name="txtLiftedYearly" maxlength="9">
				    </td>
                                     
				</tr>
                                <tr>
                                     <td>Next Limit</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtNextLimitDaily" name="txtNextLimitDaily" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtNextLimitPeriod" name="txtNextLimitPeriod" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtNextLimitMonthly" name="txtNextLimitMonthly" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtNextLimitYearly" name="txtNextLimitYearly" maxlength="9">
				    </td>
                                     
				</tr>
                                <tr>
                                     <td>Next Action</td>
                                     
                                    <td>
                                        <select id="selNxtActionDaily" name="selNxtActionDaily">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Current limit is retained (just like '1')</option>";
                                            echo "<option name='type' value='1'>1 --- Current limit is retained</option>";
                                            echo "<option name='type' value='2'>2 --- Curr limit less amt lifted inc next day limit</option>";
                                            echo "<option name='type' value='3'>3 --- Curr limit replaced by next daily alloc limit</option>";
                                            echo "<option name='type' value='4'>4 --- Curr limit increased by amt of next daily limit</option>";
                                            
					?>
					</select>
				    </td>
                                    <td>
                                        <select id="selNxtActionPeriod" name="selNxtActionPeriod">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Current limit is retained (just like '1')</option>";
                                            echo "<option name='type' value='1'>1 --- Current limit is retained</option>";
                                            echo "<option name='type' value='2'>2 --- Curr limit less amt lifted inc next period limit</option>";
                                            echo "<option name='type' value='3'>3 --- Curr limit replaced by next period alloc limit</option>";
                                            echo "<option name='type' value='4'>4 --- Curr limit increased by amt of next period limit</option>";
                                            
					?>
					</select>
				    </td>
                                    <td>
                                        <select id="selNxtActionMonthly" name="selNxtActionMonthly">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Current limit is retained (just like '1')</option>";
                                            echo "<option name='type' value='1'>1 --- Current limit is retained</option>";
                                            echo "<option name='type' value='2'>2 --- Curr limit less amt lifted inc next month limit</option>";
                                            echo "<option name='type' value='3'>3 --- Curr limit replaced by next monthly alloc limit</option>";
                                            echo "<option name='type' value='4'>4 --- Curr limit increased by amt of next monthly limit</option>";
                                            
					?>
					</select>
				    </td>
                                    <td>
                                        <select id="selNxtActionYearly" name="selNxtActionYearly">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            echo "<option name='type' value=''>   --- Current limit is retained (just like '1')</option>";
                                            echo "<option name='type' value='1'>1 --- Current limit is retained</option>";
                                            echo "<option name='type' value='2'>2 --- Curr limit less amt lifted inc next year limit</option>";
                                            echo "<option name='type' value='3'>3 --- Curr limit replaced by next yearly alloc limit</option>";
                                            echo "<option name='type' value='4'>4 --- Curr limit increased by amt of next yearly limit</option>";
                                            
					?>
					</select>
				    </td>
				</tr>
                                <tr>
                                    <td>Warning %</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtWarningDaily" name="txtWarningDaily" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtWarningPeriod" name="txtWarningPeriod" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtWarningMonthly" name="txtWarningMonthly" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtWarningYearly" name="txtWarningYearly" maxlength="9">
				    </td>
                                      
				</tr>
                                <tr>
                                     <td>Denial %</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtDenialDaily" name="txtDenialDaily" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtDenialPeriod" name="txtDenialPeriod" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtDenialMonthly" name="txtDenialMonthly" maxlength="9">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtDenialYearly" name="txtDenialYearly" maxlength="9">
				    </td>
                                     
				</tr>
                                <tr>
                                     <td>Actual Limit</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtActualLimit" name="txtActualLimit" maxlength="9" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtActualLimit" name="txtActualLimit" maxlength="5" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtActualLimit" name="txtActualLimit" maxlength="5" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtActualLimit" name="txtActualLimit" maxlength="5" readonly="readonly">
				    </td>
                                    
				</tr>
                                <tr>
                                     <td>Balance Remaining</td>
                                     
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtBalanceRemaining" name="txtBalanceRemaining" maxlength="9" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtBalanceRemaining" name="txtBalanceRemaining" maxlength="9" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtBalanceRemaining" name="txtBalanceRemaining" maxlength="9" readonly="readonly">
				    </td>
                                    <td>
                                        <input type="text" class="cmptxtid" id="txtBalanceRemaining" name="txtBalanceRemaining" maxlength="9" readonly="readonly">
				    </td>
				</tr>
                                
				
                        <tr>    
                            <td></td><td>
                                <!--<input type="button" name="button" id="prev" value="Previous" onClick="">
                                <input type="button" name="button" id="next" value="Next" onClick="">-->
                                <input type="button" name="button" id="paging" value="Save" onClick="">
                                <input type="button" name="button" id="remove" value="Remove" onClick="" disabled="true">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
                </table>  
                </form>            
		<?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
		
		</tbody>
		</table>
                                   
        
                           
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>
