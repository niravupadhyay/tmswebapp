<?php
	session_start();
	include "database_connection_web.php";
	if(isset($_SESSION['global']))
	{
            $user = $_SESSION["user"];
            ?>


 <?php include("header.php");?>
 
<link href="css/dataTables.fixedColumns.css">
<link href="css/dataTables.fixedColumns.min.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/dataTables.fixedColumns.js"></script>
<script src="js/dataTables.fixedColumns.min.js"></script>

 
 <style>
 
.ui-menu-item {font-size:8pt;}
.demo{font-size:8pt;}
.ui-button { margin-left: 0px; padding-top: 2px;padding-bottom: 2px;}
.ui-button-icon-only .ui-button-text { padding: 0.35em; }
.ui-autocomplete-input { margin: 0; padding: 0.2em 0 0.47em 0.45em;height:20px;}
.ui-button.ui-widget .ui-button-text{ line-height:12px; font-size:1.5pt; }
 
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
            $("#load").css({"visibility":"hidden"});
        $( "#paging" ).click(function() {	
//        var x = document.getElementById("selSupplier").value;
//	  var y = document.getElementById("selCustomer").value;
//	
//    if (x == null || x == "") {
//		$("#alert-trans").css("visibility", "visible");
//		document.getElementById("alert-trans").innerHTML="Please Enter Supplier Name";
//		document.getElementById("selSupplier").style.borderColor = "red";
//		document.getElementById("selSupplier").focus();
//		return false;
//    }
//    else if (y == null || y == "") {
//		$("#alert-trans").css("visibility", "visible");
//		document.getElementById("alert-trans").innerHTML="Please Enter Customer Name";
//		document.getElementById("selCustomer").style.borderColor = "red";
//		document.getElementById("selCustomer").focus();
//		return false;
//    }
//    else{
//        document.getElementById("selSupplier").style = "none";
//        document.getElementById("selCustomer").style = "none";
	//document.getElementById("selSupplier").blur();
        
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
        url: "ajax2.php",
        dataType: 'html',
        cache : false,
        data: $('#trans_viewer').serialize(),
        beforeSend: toggleButton,
        success: function(data) {
            $("#load").css({"visibility":"hidden"});
            console.log(data);
            $('#selTransactionListing').html(data);
            //initDataTable();
            attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
    });
    return false;
   
});

(function( $ ) {
    $.widget( "ui.combobox", {
        _create: function() {
            var self = this,
            select = this.element.hide(),
            selected = select.children( ":selected" ),
            value = selected.val() ? selected.text() : "";
            var input = this.input = $( "<input>" )
            .insertAfter( select )
            .val( value )
            .autocomplete({
                delay: 0,
                minLength: 0,
                source: function( request, response ) {
                    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                    response( select.children( "option" ).map(function() {
                        var text = $( this ).text();
                        if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text.replace(
                            new RegExp(
                            "(?![^&;]+;)(?!<[^<>]*)(" +
                            $.ui.autocomplete.escapeRegex(request.term) +
                            ")(?![^<>]*>)(?![^&;]+;)", "gi"
                            ), "<strong>$1</strong>" ),
                            value: text,
                            option: this
                        };
                    }) );
                },
            select: function( event, ui ) {
                ui.item.option.selected = true;
                self._trigger( "selected", event, {
                item: ui.item.option
                });
            },
            change: function( event, ui ) {
                if ( !ui.item ) {
                    var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
                    valid = false;
                    select.children( "option" ).each(function() {
                        if ( $( this ).text().match( matcher ) ) {
                            this.selected = valid = true;
                            return false;
                        }
                    });
                    if ( !valid ) {
                    // remove invalid value, as it didn't match anything
                        $( this ).val( "" );
                        select.val( "" );
                        input.data( "autocomplete" ).term = "";
                        return false;
                    }
                }
            }
            })
        .addClass( "ui-widget ui-widget-content ui-corner-left" );
        input.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
        };
        this.button = $( "<button type='button'>&nbsp;</button>" )
        .attr( "tabIndex", -1 )
        .attr( "title", "Show All Items" )
        .insertAfter( input )
        .button({
            icons: {
                primary: "ui-icon-triangle-1-s"
            },
            text: false
        })
        .removeClass( "ui-corner-all" )
        .addClass( "ui-corner-right ui-button-icon" )
        .click(function() {
            // close if already visible
            if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                input.autocomplete( "close" );
                return;
            }
            // work around a bug (likely same cause as #5265)
            $( this ).blur();
            // pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
            input.focus();
        });
        },
        destroy: function() {
            this.input.remove();
            this.button.remove();
            this.element.show();
            $.Widget.prototype.destroy.call( this );
        }
    });
 })( jQuery );
 
 $(function() {
    $( "#selSupplier" ).combobox();
 });

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
            
	
        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("Transaction generating...");
	$('#example').DataTable( {
		"sScrollY": "100%",
                "bScrollCollapse": true,
		"paging":         true,
		"fixedColumns":   true
	} );
} );
$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
}
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#trans_viewer').resetForm();
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
<script>

function showSupplier(str)
{/*
$(document).ready(function() {
  $('#selSupplier').change(function() {
var selected=$(this).val();
  $.get("transaction_viewer.php?selected="+selected, function(data){
      $('.result').html(data);

    });
    });
});
*/
	//alert(str + "Mithun");
    if (str == "") 
	{
	    document.getElementById("selSupplier").innerHTML = "";
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
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                        document.getElementById("selCustomer").editableSelect();
                    }
		}
		xmlhttp.open("POST","ajax.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("supplier_no="+str);
		//alert("transaction_viewer.php" Mithunva");
	}
}
function showCustomer(str)
{
	if (str == "") 
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
		xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                        document.getElementById("selAccount").editableSelect();
                    }
                }
		xmlhttp.open("POST","ajax.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var suppEle = document.getElementById("selSupplier");
                var suppno = suppEle.options[suppEle.selectedIndex].value;
                //alert(suppno);
		xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                //alert(str);
		//alert("transaction_viewer.php" Mithunva");
			
			
			
    }
}
function showAccount(str)
{
	if (str == "") 
	{
	    document.getElementById("selAccount").innerHTML = "";
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
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					document.getElementById("selDestination").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajax.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("acct_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}
function showCarrier(str)
{
	if (str == "") 
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
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajax.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("carr_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}
function showDestination(str)
{
	if (str == "") 
	{
	    document.getElementById("selDestination").innerHTML = "";
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
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					//document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajax.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("destination_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}
/*function showDriver(str)
{
	if (str == "") 
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
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
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
function showModeOfTransport(str)
{
	if (str == "") 
	{
	    document.getElementById("selModeOfTransport").innerHTML = "";
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
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					//document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajax.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("MOT="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}
//function showTransactionListing(str)
//{
//	if (str == "") 
//	{
//            alert(str);
//	    document.getElementById("selModeOfTransport").innerHTML = "";
//        return;
//    }
//	else 
//	{ 
//		if (window.XMLHttpRequest) 
//		{
//		    // code for IE7+, Firefox, Chrome, Opera, Safari
//            var xmlhttp = new XMLHttpRequest();
//        }
//		else 
//		{
//		    // code for IE6, IE5
//            var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//        }
//			xmlhttp.onreadystatechange = function() 
//			{
//				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
//				{
//					document.getElementById("selTransactionListing").innerHTML = xmlhttp.responseText;
//				}
//			}
//			xmlhttp.open("POST","ajax.php", true);
//			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//			xmlhttp.send("var="+str);
//			//alert("transaction_viewer.php" Mithunva");
//	}
//}	

</script>

<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Transaction Viewer</h2>
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
				
                                <form name="trans_viewer" method="post" id="trans_viewer">
                                 <?php              
                                    if ( $detect->isMobile() ) {?>    
                                    <table class="right" border="1px">
                    
                                        <tr>
                                            <td style="font-size:16px" colspan="6">Date Search Criteria</td>  
                                        </tr>
                                        <tr>
                                                    <td style="font-size:14px">
                                                        <select name="transactiondate">
                                                            <option  value="1">Transaction Date</option>
                                                            <option  value="2">Load Start Date</option>
                                                            <option  value="3">Load End Date</option>
                                                        </select>
                                                    </td>
                                        </tr>
                                    </table>
                                    
                   <?php } else{ ?>    
                 <table class="right" border="1px">
                    
                                        <tr>
                                            <td style="font-size:16px" colspan="6">Date Search Criteria</td>  
                                        </tr>
                                        <tr>
                                            <td style="font-size:14px"><input type="radio" name="transactiondate" value="1" checked="checked">Transaction Date</td>
                                            <td style="font-size:14px"><input type="radio" name="transactiondate" value="2">Load Start Date</td>
                                            <td style="font-size:14px"><input type="radio" name="transactiondate" value="3">Load End Date</td>
                                        </tr>
                </table>
                   <?php } ?>
                                  
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Terminal</td>
					<td>
						<select class="select" readonly disabled="disabled" name="selterminal">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
							$query1="SELECT term_id FROM TerminalProfile";
							$result1=$mysqli->query($query1);
                                                        while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["term_id"].">".$value1['term_id']."</option>";
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
					<td>Date Range - From</td>
					<td>
					        <input type="text" name="from"  data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from" class="tcal required"  readonly required/>
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
					<td>Date Range - To</td>
					<td>
					<input type="text" name="to" value="<?php echo $var=date("d/m/Y");?>" id="to" class="tcal required"  readonly required/>
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
                                       
						
						
				<tr>
                                    <td>Supplier</td><td>
                                        <div class="ui-widget">
					<select id="selSupplier" name="selSupplier" onChange="showSupplier(this.value)">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
						$query3="SELECT distinct supplier_num, supp_shrt_name FROM TWUserSCA where tms_uname='$user'";
						$result3=$mysqli_web->query($query3);
                                                echo "<option></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
                                                    echo "<option value=".$value3['supplier_num'].">".$value3['supplier_num']." --- ".$value3['supp_shrt_name']."</option>";
						}
					?>
					</select>
                                        </div>
					</td>
				</tr>
				<tr>
					<td>Customer</td><td>
					<select  name="selCustomer" id="selCustomer" onChange="showCustomer(this.value)">
					<?php
						/*$query4="SELECT cust_no, short_cust_name FROM Customer";
						$result4=$mysqli->query($query4);
                                                echo "<option></option>";
						while($value4 = mysqli_fetch_array($result4))
						{
						   	echo "<option value=".$value4['cust_no'].">".$value4['cust_no']." --- ".$value4['short_cust_name']."</option>";
						}*/
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Account</td><td>
					<select class="select" name="selaccount" id="selAccount" onChange="showAccount(this.value)">
					<?php
						$id = $_GET['id']  ;
						/*$query5="SELECT acct_no, short_acct_name FROM Account";
						$result5=$mysqli->query($query5);
                                                echo "<option></option>";
						while($value5 = mysqli_fetch_array($result5))
						{
						  	echo "<option value=".$value5['acct_no'].">".$value5['acct_no']." --- ".$value5['short_acct_name']."</option>";
						}*/
					?>
					</select>
					</td>
				</tr>
				<tr>	
					<td>Destination</td><td>
					<select class="select" name="seldestination" id="selDestination" onChange="showDestination(this.value)">
					<?php
						$query6="SELECT destination_no, short_destination_name FROM Destination";
						$result6=$mysqli->query($query6);
                                                echo "<option></option>";
						while($value6 = mysqli_fetch_array($result6))
						{					
							echo "<option value=".$value6['destination_no'].">".$value6['destination_no']." --- ".$value6['short_destination_name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Carrier</td><td>
					<select class="select" name="selCarrier" id="selCarrier" onChange="showCarrier(this.value)">
					<!--<option value=""></option>-->
					<?php
						$query7="SELECT carr_no, name FROM Carrier";
						$result7=$mysqli->query($query7);
                                                echo "<option></option>";
						while($value7 = mysqli_fetch_array($result7))
						{
							
							echo "<option value=".$value7['carr_no'].">".$value7['carr_no']." --- ".$value7['name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Driver</td><td>
					<select class="select" name="seldriver" id="selDriver">
					<?php
						$id = $_GET['id']  ;
						$query8="SELECT driver_no, name FROM Driver";
						$result8=$mysqli->query($query8);
                                                echo "<option></option>";
						while($value8 = mysqli_fetch_array($result8))
						{
						  	echo "<option value=".$value8['driver_no'].">".$value8['driver_no']." --- ".$value8['name']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Document</td><td>
					<select class="select" name="selDocument" id="selDocument">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                                $date = date("ymd");
                                                //$today = date("ymd", strtotime($originalDate));
						$query9= "SELECT doc_no FROM TransHeader where transaction_date = $date";
                                                //echo $query9;
						$result9=$mysqli->query($query9);
                                                echo "<option></option>";
						while($value9 = mysqli_fetch_array($result9))
						{
							
							echo "<option>".$value9['doc_no']."</option>";
						}
					?>
					</select>
					</td>
				</tr>
            <tr>
					<td>MOT</td><td>
					<select class="select" name="selmot" id="selModeOfTransport" onSelect="showModeOfTransport(this.value)">
					<!--<option value=""></option>-->
					<?php
//						echo "hello";
						//$id = $_GET['id']  ;
						$query10="SELECT MOT FROM TransHeader";
						$result10=$mysqli->query($query10);
                                                echo "<option></option>";
						while($value10 = mysqli_fetch_array($result10))
						{
							echo "<option>".$value10['MOT']."</option>";
						}
					?>
					</select>
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
                            <hr>
                            <h4><b>Transaction Listing</b></h4>
        <hr>
		<div id="selTransactionListing"></div>
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>