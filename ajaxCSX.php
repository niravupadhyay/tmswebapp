<?php
	session_start();
        error_reporting(0);
	include "database_connection_web.php";
        
        $user = $_SESSION["user"];
        $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
        
        $carrier =  $_POST['selCarrier'];
        $vgno = $_POST['selVG'];
        $recType = $_POST['selRT'];
        $supplier = $_POST['selSupplier'];
        //$terminal = $_POST['selterminal'];
        /*$account =  "0000000400";
        $supplier = "0000001000";
        $customer = "0000000400";*/
        
        $fieldNames = array("", "Remove", "Customer", "Customer Name", "Account", "Account Name");
//	$fieldNames = array("", "Edit", "Remove", "Prod ID", "Prod Name", "SPD Code", "Active", "Authorized Eff.Date (YY/MM/DD)","Authorized Exp.Date (YY/MM/DD)","ERP Handling Type","Source","Enable OSP Interface","Print Delivery Ticket");
	
	?>


 <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <link href="css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/buttons.dataTables.css" rel="stylesheet">
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script> 

	<style>
            .ui-widget-header {
    background: #2fa4e7 none repeat scroll 0 0;
    
}
.ui-icon, .ui-widget-content .ui-icon{
    background-image: none;
}
.ui-state-default .ui-icon{
    background-image: none;
}
	div.container {
        width: 80%;
    }
	div.dataTables_wrapper {
        width: 95%;
        margin: 0;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    color: black;

}
    .display {
    margin-left: 10px;
    width: -moz-fit-content;
}
	</style>	

 <script>
  
    var table;
    var htmlString = "InitialVal";
    function initDataTable() {
            table = $('#viewer').dataTable( {
                "iDisplayLength": 15,
                "bPaginate": true,
                //"iCookieDuration": 60,
                "bStateSave": true,
                "searching": true,
                "bAutoWidth": false,
                //true
                "bProcessing": true,
                "bRetrieve": true,

                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'csv'
                ],
                "bJQueryUI": true,
                //"sDom": '<"H"CTrf>t<"F"lip>',
                "aLengthMenu":  [
                [10, 15, 30, 50, 100, 200, -1],
                [10, 15, 30, 50, 100, 200, "All"]
            ],
                //"sScrollX": "100%",
                //"sScrollXInner": "110%",
                //"bScrollCollapse": true,
                "drawCallback": function( data,settings ) {

                        htmlString = $( this ).html();
          //$( '#data' ).text( htmlString );
                        //alert(htmlString);
  

            }	
	} );
}

$(document).ready(function() {
	//$( "#paging" ).click(function() {
	//alert("Transaction generating...");
	initDataTable();
//} );
});
	
function attachClickHandler() {
    
    //alert("hello1");
    
//    $('#viewer tbody').on('click', 'td.details-control', function () {
//        
//        var tr = $(this).closest('tr');
//        var index = tr.index();
//        //var index=$(this).attr('index');
//        //var tank_id = tr.find("td.details-remove>a").html(); 
//        var caVal = tr.find("td.details-remove").find("input").val();
//        
//        var ca = caVal.toString().split(":::");
//        
//        var custNo = ca[4];
//        var custTxt = ca[5];
//        var acctNo = ca[6];
//        var acctTxt = ca[7];
//        
//        $("#selCustomer").val(custNo.toString());
//        $("#selCustomer-input").val(custTxt.toString());
//        
//        $("#selAccount").val(acctNo.toString());
//        $("#selAccount-input").val(acctTxt.toString());
//        
//    });
    
    $('#viewer tbody').on('click', 'td.details-remove', function () {
        
        
        var tr = $(this).closest('tr');
        var index = tr.index();
        //var index=$(this).attr('index');
        //var tank_id = tr.find("td.details-remove>a").html(); 
        var rcvsVal = tr.find("td.details-remove").find("input").val();
        
        var rcvs = rcvsVal.toString().split(":::");
        
        var rt = rcvs[0];
        var carNo = rcvs[1];
        var vgNo = rcvs[2];
        var suppNo = rcvs[3];
        var custNo = rcvs[4];
        var acctNo = rcvs[5];
        //var sup_name = tr.find("td.suppname").html();
        //var cust_name = tr.find("td.custname").html();
        //var acct_name = tr.find("td.acctname").html();
        
        //var trdata = tr.find("td.details-remove").find("a").html().toString();
        
        //alert(prod_id + ":::" + sup_no + ":::" + cust_no + ":::" + acct_no);
        
        
        
        $('<div></div>').appendTo('body')
            .html('<div><h6>Are you sure you want to Remove this CarrierSupplierXref record ?</h6></div>')
            .dialog({
                modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                width: 'auto', resizable: false,
                buttons: {
                    Yes: function () {
//                        $("#load").css({"visibility":"visible"});
//                        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
                         $("#loadingDiv").css({"visibility":"visible"}); 
                        $.ajax({
                            type: "POST",
                            url: "csxAddAjax.php",
                            dataType: 'text',
                            data: ({acctno:acctNo, custno:custNo, supno:suppNo, cargno:carNo, vgno:vgNo, rt:rt, cmd:'remove'}),
                            success: function(data) {
                                //alert(data.toString().trim());
                                //$("#load").css({"visibility":"hidden"});
                                $("#loadingDiv").css({"visibility":"hidden"});
                                if(data.toString().trim() === "1")
                                {
                                    $('<div></div>').appendTo('body')
                                    .html('<div><h6>CarrierSupplierXref record has been removed</h6></div>')
                                    .dialog({
                                        modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                                        width: 'auto', resizable: false,
                                        buttons: {
                                            Ok: function () {
                                                $("#viewer tbody tr").eq(index).remove("tr");
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
                                    .html('<div><h6>Some problem occurred while removing CarrierSupplierXref record, Try Again !!</h6></div>')
                                    .dialog({
                                        modal: true, title: 'Remove Confirmation', zIndex: 10000, autoOpen: true,
                                        width: 'auto', resizable: false,
                                        buttons: {
                                            Ok: function () {
                                                //$("#viewer tbody tr").eq(index).remove("tr");
                                                $(this).dialog("close");
                                            }
                                        },
                                        close: function (event, ui) {
                                            $(this).remove();
                                        }
                                    });
                                }
                                

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
    
    
}

</script>


<html>
	<link rel="stylesheet" type="text/css" href="css/Style.css">
	<body>
	<form>
	<table id="viewer" class="stripe row-border order-column display" name="viewer" cellspacing="0" width="100%">
        <thead>
            <tr>	
			<?php
			for($k = 1; $k < sizeof($fieldNames); $k++)
			{
				echo "<th>".$fieldNames[$k]."</th>";
			}?>
            </tr>
        </thead>
	
                
    <?php
        
        if($restrictSCADisplay)
        {
            $scaQuery = "select distinct concat(supplier_num, ':::', cust_num, ':::', acct_num) as sca from TWUserSCA where tms_uname='$user' and supplier_num = '$supplier'";
            $scaList = $mysqli_web->query($scaQuery);

            $tmp = array();
            while($val = mysqli_fetch_assoc($scaList))
                $tmp[] = "'".$val['sca']."'";
            if(strcmp($vgno, "0000000000") == 0)        
            {
                $queryCSX = "select vsx.cust_no, vsx.acct_no from VehicleSupplierXref vsx where vsx.carrier = '$carrier' and vsx.vehicle_grp = '$vgno' and concat(vsx.supplier_no, ':::', vsx.cust_no, ':::', vsx.acct_no) IN (".implode(', ', $tmp).") and vsx.file_code = '$recType'";
	    }
	    else
	    {
            	$queryCSX = "select vsx.cust_no, vsx.acct_no from VehicleSupplierXref vsx where vsx.carrier = '$carrier' and vsx.vehicle_grp = '$vgno' and concat(vsx.supplier_no, ':::', vsx.cust_no, ':::', vsx.acct_no) IN (".implode(', ', $tmp).") and vsx.file_code = '$recType'";
            }
        }
        else
        {
	    if(strcmp($vgno, "0000000000") == 0)        
            {
                $queryCSX = "select vsx.cust_no, vsx.acct_no from VehicleSupplierXref vsx where vsx.carrier = '$carrier' and vsx.supplier_no = '$supplier' and vsx.file_code = '$recType'";
            }
            else
            {
                $queryCSX = "select vsx.cust_no, vsx.acct_no from VehicleSupplierXref vsx where vsx.carrier = '$carrier' and vsx.vehicle_grp = '$vgno' and vsx.supplier_no = '$supplier' and vsx.file_code = '$recType'";
            }
        }
        //echo $queryAP;
         //echo "from date is ->".$from_date;
          //echo "to date is ->".$to_date;
         $CSXList = $mysqli->query($queryCSX);
         if(!$CSXList)
         {
            echo 'Could not run query: ' . mysqli_error();
         }
	?>
	<tbody>
		<?php
		if(mysqli_num_rows($CSXList))
		{
			while($row = mysqli_fetch_assoc($CSXList))
			{?>
				<tr>
                                        <?php //$getArgs = "ter=".$row['term_id']."&sup=".$supplier."&cust=".$customer."&acct=".$account."&p=".$row['prod_id']."&sc=".$row['spd_code']."&cn=".$row['contract_number']."&aefd=".$row['auth_eff_dt']."&aexd=".$row['auth_expr_dt']."&erp=".$row['ERPHandlingType']."&src=".$row['source']."&ae=".$row['active_enable']."&oi=".$row['osp_interface_enabled']."&pdt=".$row['PrintDeliveryTicket']; ?>
<!--                                        <td class="details-control"><a>Edit</a></td>-->
                                        <td class="details-remove"><a>Remove</a><input type="hidden" value="<?php echo $recType.':::'.$carrier.':::'.$vgno.':::'.$supplier.':::'.$row['cust_no'].':::'.$row['acct_no'];?>"/></td>
					<td><?php echo $row['cust_no'];?></td>
                                        <td><?php 
                                        if(strcmp($row['cust_no'], "0000000000") == 0)
                                        {
                                                echo "All Customers";
                                        }
                                        else
                                        {
                                            $custNameQuery = "select short_cust_name from Customer where supplier_no = '$supplier' and cust_no = '".$row['cust_no']."'";
                                            $cname = $mysqli->query($custNameQuery);
                                            while($cnrow = mysqli_fetch_assoc($cname))
                                            {
                                                echo $cnrow['short_cust_name'];
                                            }
                                        }
                                        ?>
                                        </td>
					<td><?php echo $row['acct_no'];?></td>
					<td><?php 
                                        if(strcmp($row['acct_no'], "0000000000") == 0)
                                        {
                                                echo "All Accounts";
                                        }
                                        else
                                        {
                                            $acctNameQuery = "select short_acct_name from Account where supplier_no = '$supplier' and cust_no = '".$row['cust_no']."' and acct_no = '".$row['acct_no']."'";
                                            $aname = $mysqli->query($acctNameQuery);
                                            while($anrow = mysqli_fetch_assoc($aname))
                                            {
                                                echo $anrow['short_acct_name'];
                                            }
                                        }
                                        ?>
                                        </td>
					
				</tr><?php
			}
		}
		
		?>
		</tbody>
		</table>
	</form>
	</body>
        <script src="js/dataTables.fixedColumns.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>
 </html>
