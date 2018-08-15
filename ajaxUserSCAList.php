<?php
	session_start();
        error_reporting(0);
	include "database_connection_web.php";
        
//        $account =  $_POST['selaccount'];
//        $supplier = $_POST['selSupplier'];
//        $customer = $_POST['selCustomer'];
        $userid = $_POST['seluname'];
        /*$account =  "0000000400";
        $supplier = "0000001000";
        $customer = "0000000400";*/
        
        $fieldNames = array("","UserID","Supplier", "Supplier Name", "Customer", "Customer Name", "Account", "Account Name");
	
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
                //"aLengthMenu":  [
                //[10, 15, 30, 50, 100, 200, -1],
                //[10, 15, 30, 50, 100, 200, "All"]
            //],
                //"sScrollX": "100%",
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
        
        
        var tr = $(this).closest('tr');
        var index = tr.index();
        //var index=$(this).attr('index');
        //var tank_id = tr.find("td.details-control>a").html(); 
        var userID = tr.find("td.details-control").find("input").val();
        
        var sup_no = tr.find("td.suppno").html();
        var cust_no = tr.find("td.custno").html();
        var acct_no = tr.find("td.acctno").html();
        
        var sup_name = tr.find("td.suppname").html();
        var cust_name = tr.find("td.custname").html();
        var acct_name = tr.find("td.acctname").html();
        
        //var trdata = tr.find("td.details-control").find("a").html().toString();
        
        //alert(userID + ":::" + sup_no + ":::" + cust_no + ":::" + acct_no);
        
        
        
        $('<div></div>').appendTo('body')
            .html('<div><h6>Are you sure you want to Remove <br/> User-S-C-A :' + userID + ' - ' + sup_name + ' - ' + cust_name + ' - ' + acct_name + ' ?</h6></div>')
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
                            url: "ajaxUserSCA_Remove.php",
                            dataType: 'html',
                            data: ({userID:userID, supno:sup_no, custno:cust_no, acctno:acct_no}),
                            success: function(data) {
                                //alert(data);
                                //$("#load").css({"visibility":"hidden"});
                                $("#loadingDiv").css({"visibility":"hidden"});
                                $("#viewer tbody tr").eq(index).remove("tr");

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
        
        
        //alert("Are you sure you want to remove User-S-C-A :\n" + userID + " - " + sup_name + " - " + cust_name + " - " + acct_name + " ?");
        
        
        
        
        
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
			for($k = 0; $k < sizeof($fieldNames); $k++)
			{
				echo "<th>".$fieldNames[$k]."</th>";
			}?>
            </tr>
        </thead>
	
                
    <?php
    
        //$username = explode(" --- ", $userid);
        $queryUSCA = "select supplier_num, supp_shrt_name, cust_num, cust_shrt_name, acct_num, acct_shrt_name from TWUserSCA where tms_uname = '".$userid."'";
       
        echo $queryAP;
         //echo "from date is ->".$from_date;
          //echo "to date is ->".$to_date;
         $USCAList = $mysqli_web->query($queryUSCA);
         if(!$USCAList)
         {
            echo 'Could not run query: ' . mysqli_error();
         }
	?>
	<tbody>
		<?php
		if(mysqli_num_rows($USCAList))
		{
			while($row = mysqli_fetch_assoc($USCAList))
			{?>
				<tr>
                                        
                                        <td class="details-control"><a>Remove</a><input type="hidden" value="<?php echo $userid;?>"/></td>
                                        <td class="uid"><?php echo $userid;?></td>
                                        <td class="suppno"><?php echo $row['supplier_num'];?></td>
                                        <td class="suppname"><?php echo $row['supp_shrt_name'];?></td>
                                        <td class="custno"><?php echo $row['cust_num'];?></td>
                                        <td class="custname"><?php echo $row['cust_shrt_name'];?></td>
					<td class="acctno"><?php echo $row['acct_num'];?></td>	
                                        <td class="acctname"><?php echo $row['acct_shrt_name'];?></td>
					
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
    