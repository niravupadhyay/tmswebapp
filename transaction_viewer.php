<?php
	session_start();
	include "database_connection_web_primary.php";
	if(isset($_SESSION['global']))
	{
            $user = $_SESSION["user"];
            $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
            ?>


 <?php include("headerRPT.php");?>
 



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
        
//        var toggleButton = function() {
//            //alert("sdsjj");
//            $("#load").css({"visibility":"visible"});
//        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
//        }
//        
//        $("#alert-trans").css("visibility", "hidden");
        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("hi");
        //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
        
        $("#loadingDiv").css({"visibility":"visible"});
        
        $.ajax({
        type: "POST",
        url: "ajax2.php",
        dataType: 'html',
        cache : false,
        data: $('#trans_viewer').serialize(),
        //beforeSend: toggleButton,
        success: function(data) {
            //$("#load").css({"visibility":"hidden"});
            $("#loadingDiv").css({"visibility":"hidden"});
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

$( "#selterminal" ).combobox();
$( "#selSupplier" ).combobox();
$( "#selCustomer" ).combobox();
$( "#selAccount" ).combobox();
$( "#selDestination" ).combobox();
$( "#selDriver" ).combobox();
$( "#selCarrier" ).combobox();
$( "#selDocument" ).combobox();
$( "#selModeOfTransport" ).combobox();
 
$("#from").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            $(this).val(dateText);
           //$('.date-picker').val('setDate', new Date(month, 1));
        },
        onSelect: function(dateText) {
            loadBOLs();
        }
});
 
$("#to").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            $(this).val(dateText);
           //$('.date-picker').val('setDate', new Date(month, 1));
        },
        onSelect: function(dateText) {
            loadBOLs();
        }
});
 
 
});

</script>

<script>
    
    function loadBOLs()
    {
        //alert('ok');
        var from_dt = $("#from").val();
        var to_dt = $("#to").val();
        $("#loadingDiv").css({"visibility":"visible"});
        
        //alert(from_dt + ":::" + to_dt);
        
        $.ajax({
            type: "POST",
            url: "ajaxBOLs.php",
            dataType: 'html',
            data: ({from:from_dt, to:to_dt}),
            success: function(data) {
                
                 $("#selDocument").html(data);
                 $("#loadingDiv").css({"visibility":"hidden"});
                 /*else if(toggleSign === ":-")
                 {
                    $("#viewer tbody tr").eq(index+1).remove("tr");
                    $("#viewer tbody tr").eq(index+1).remove("tr");
                    tr.find("td").find("a").html(strAfterToggle);
                    //initDataTable();
                 }*/
            
            },
            error: function(data) {
                console.log("error");
            }
        });
        
    
    }
    
    
    
    

 
 
 
</script>

<script>
$(document).ready(function() {
    $( "#paging" ).click(function() {
            
	
        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
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
	//$('#trans_viewer').resetForm();
        $( "#selSupplier" ).val('');
        $( "#selSupplier-input" ).val('');
        
        $( "#selCustomer" ).val('');
        $( "#selCustomer-input" ).val('');
        
        $( "#selAccount" ).val('');
        $( "#selAccount-input" ).val('');
        
        $( "#selDestination" ).val('');
        $( "#selDestination-input" ).val('');
        
        $( "#selDriver" ).val('');
        $( "#selDriver-input" ).val('');
        
        $( "#selCarrier" ).val('');
        $( "#selCarrier-input" ).val('');
        
        $( "#selDocument" ).val('');
        $( "#selDocument-input" ).val('');
        
        $( "#selModeOfTransport" ).val('');
        $( "#selModeOfTransport-input" ).val('');
        
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
                            $("#selCustomer").val('');
                            $("#selCustomer-input").val('');
                            document.getElementById("selAccount").innerHTML = "";
                            $("#selAccount").val('');
                            $("#selAccount-input").val('');
                        }
                        else if(dataLevel === "cust")
                        {
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            $("#selAccount").val('');
                            $("#selAccount-input").val('');
                        }
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxRPT.php", true);
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
			xmlhttp.open("POST","ajaxRPT.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("driver_no="+str);
			//alert("transaction_viewer.php" Mithunva");
	}
}*/
function showModeOfTransport(str)
{
	if (str === "") 
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
				if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
				{
					//document.getElementById("selDriver").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","ajaxRPT.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("MOT="+str);
			//alert("transaction_viewer.php" Mithunva");
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
					<td>Date Range - From</td>
					<td>
                                            <input type="text" name="from" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="from" maxlength="10"/>

						</td>
						
				</tr>
			
				<tr margin-left:5em>
					<td>Date Range - To</td>
					<td>
                                            <input type="text" name="to" value="<?php echo $var=date("d/m/Y");?>" id="to" maxlength="10"/>
					</td>
                                       
						
						
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
				<tr>
                                        
					<td>Customer</td><td>
                                        <div class="ui-widget">
					<select  name="selCustomer" id="selCustomer">
					
					</select>
                                        </div>
					</td>
				</tr>
				<tr>
					<td>Account</td><td>
					<select class="select" name="selaccount" id="selAccount">
					
					</select>
					</td>
				</tr>
				<tr>	
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
							
							echo "<option value=".$value7['carr_no'].">".$value7['carr_no']." --- ".trim($value7['name'])."</option>";
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
						  	echo "<option value=".$value8['driver_no'].">".$value8['driver_no']." --- ".trim($value8['name'])."</option>";
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
						$query9= "SELECT distinct doc_no FROM TransHeader where transaction_date='".$date."'";
                                                //echo $query9;
						$result9=$mysqli->query($query9);
                                                echo "<option></option>";
						while($value9 = mysqli_fetch_array($result9))
						{
							
							echo "<option>".trim($value9['doc_no'])."</option>";
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
						$query10="SELECT distinct MOT FROM TransHeader";
						$result10=$mysqli->query($query10);
                                                echo "<option></option>";
						while($value10 = mysqli_fetch_array($result10))
						{
							echo "<option>".trim($value10['MOT'])."</option>";
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
