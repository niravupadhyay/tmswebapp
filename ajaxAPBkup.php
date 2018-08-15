<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $account =  $_POST['selaccount'];
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        //$terminal = $_POST['selterminal'];
        /*$account =  "0000000400";
        $supplier = "0000001000";
        $customer = "0000000400";*/
        
        $fieldNames = array("", "Edit", "Prod ID", "Prod Name", "SPD Code", "Contract Number","Authorized Eff.Date (YY/MM/DD)","Authorized Exp.Date (YY/MM/DD)","ERP Handling Type","Source","Active",
            "Enable OSP Interface","Print Delivery Ticket");
//	$fieldNames = array("", "Edit", "Prod ID", "Prod Name", "SPD Code", "Active", "Authorized Eff.Date (YY/MM/DD)","Authorized Exp.Date (YY/MM/DD)","ERP Handling Type","Source","Enable OSP Interface","Print Delivery Ticket");
	
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
        margin: 0 auto;
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
                "sScrollX": "100%",
                //"sScrollXInner": "110%",
                "bScrollCollapse": true,
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
    
    $('#viewer tbody').on('click', 'td.details-control', function () {
        
        
        //alert("Edit");
        
        
        
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
    
        $queryAP = "select ap.term_id, ap.prod_id, p.short_name, ap.spd_code, ap.contract_number, ap.auth_eff_dt, ap.auth_expr_dt, ap.ERPHandlingType, ap.source, ap.active_enable, ap.osp_interface_enabled, 
            ap.PrintDeliveryTicket from AccountProducts ap, Product p where ap.supplier_no = '$supplier' and ap.cust_no = '$customer' and ap.acct_no = '$account' 
                and ap.prod_id = p.prod_id";
       
        //echo $queryAP;
         //echo "from date is ->".$from_date;
          //echo "to date is ->".$to_date;
         $APList = $mysqli->query($queryAP);
         if(!$APList)
         {
            echo 'Could not run query: ' . mysqli_error();
         }
	?>
	<tbody>
		<?php
		if(mysqli_num_rows($APList))
		{
			while($row = mysqli_fetch_assoc($APList))
			{?>
				<tr>
                                        <?php $getArgs = "ter=".$row['term_id']."&sup=".$supplier."&cust=".$customer."&acct=".$account."&p=".$row['prod_id']."&sc=".$row['spd_code']."&cn=".$row['contract_number']."&aefd=".$row['auth_eff_dt']."&aexd=".$row['auth_expr_dt']."&erp=".$row['ERPHandlingType']."&src=".$row['source']."&ae=".$row['active_enable']."&oi=".$row['osp_interface_enabled']."&pdt=".$row['PrintDeliveryTicket']; ?>
                                        <td class="details-control"><a href='account_products_edit.php?<?php echo $getArgs;?>' target='_blank'>Edit</a></td>
					<td><?php echo $row['prod_id'];?></td>
                                        <td><?php echo $row['short_name'];?></td>
					<td><?php echo $row['spd_code'];?></td>
					<td><?php echo $row['contract_number'];?></td>
                                        <td><?php $l_date = $row['auth_eff_dt'];
                                        echo $newtext2 = wordwrap($l_date, 2, "/", true);?></td>
                                        <td><?php $ls_date = $row['auth_expr_dt'];
                                        echo $newtext3 = wordwrap($ls_date, 2, "/", true);?></td>
					<td><?php echo $row['ERPHandlingType'];?></td>
					<td><?php echo $row['source'];?></td>
					<td><?php echo $row['active_enable'];?></td>
					<td><?php echo $row['osp_interface_enabled'];?></td>
					<td><?php echo $row['PrintDeliveryTicket'];?></td>
					
					
					<?php
					/*foreach($row as $vals)
					{?>
						 <td><?php print_r($vals);?></td><?php
					}*/?>
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
    
