<?php
	session_start();
        error_reporting(0);
        
        $user = $_SESSION["user"];
        $restrictSCADisplay = $_SESSION['restrictSCADisplay'];

	include "database_connection_web_primary.php";
        
        $carrier = $_POST['selCarrier'];
        $account =  $_POST['selaccount'];
        $driver = $_POST['seldriver'];
        $document = $_POST['selDocument'];
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        $destination = $_POST['selDestination'];
        $date_criteria = $_POST['transactiondate'];
        
        $from = $_POST['from'];
        $from_date_format1 = explode( '/', $from );
        $from_date_format2 = $from_date_format1[2]."/".$from_date_format1[1]."/".$from_date_format1[0];
        $from_date = date('ymd',strtotime($from_date_format2));
        //print_r(explode('/', $from, 2));
        
        //echo $from.":::".$from_date_format2.":::".$from_date."----";
        
        $to = $_POST['to'];
        $to_date_format1 = explode( '/', $to );
        $to_date_format2 = $to_date_format1[2]."/".$to_date_format1[1]."/".$to_date_format1[0];
        $to_date = date('ymd',strtotime($to_date_format2));
        
        //echo $to.":::".$to_date_format2.":::".$to_date."----";
        
        //$interval = date_diff($from, $to_date);
       // echo $interval;
  
       // $mot =   $_POST['selmot'];
        
		$fieldNames = array("","Terminal", "Folio Month", "Folio Number","Folio Year","Trans ID","Document","Type","Shipment","Order","TransRef No","Driver","Truck",
	"Trailer1","Trailer2","Carrier","CarrierName","Supplier","SupplierName","Customer","CustName","Account","AcctName","Destination","TransDate","Trans Time",
	"Load Start","Start Time","Load Stop","Stop Time","Cancel Rebill","User ID","Manual Date Created");
	
	?>


<!-- <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">-->
 
<!-- <link href="css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/buttons.dataTables.css" rel="stylesheet">-->



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
	.dataTables_scroll {
	    overflow: auto;
	    height: 400px;
	}

</style>	

 <script>
  
	var table;
	var htmlString = "InitialVal";
	function initDataTable() {
		table = $('#viewer').dataTable( {
	        //"iDisplayLength": 15,
	        "bPaginate": false,
        	"iCookieDuration": 60,
	        "bStateSave": true,
	        "searching": true,
	        "bAutoWidth": false,
	        //true
	        "bProcessing": true,
	        "bRetrieve": true,
	        dom: 'Bfrtip',
	        buttons: [
	            'copy',
	            'excel',
	            'csv'
	        ],
	        "bJQueryUI": true,
        	//"sDom": '<"H"CTrf>t<"F"lip>',
	        "aLengthMenu":  [
        		[10, 15, 30, 50, 100, 200, -1],
		        [10, 15, 30, 50, 100, 200, "All"]
		],
        	//"sScrollX": true,
	        //"sScrollY": ($(window).height() - 100),
        	//"sScrollXInner": "110%",
	        //"bScrollCollapse": true,
		"drawCallback": function( data,settings ) {
            
        	        htmlString = $( this ).html();
			  //$( '#data' ).text( htmlString );
                	//alert(htmlString);
  

            	}	
	} );
	jQuery('.dataTable').wrap('<div class="dataTables_scroll" />');
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
        //alert("hello2");
        //disable click right here.....
        
        var tr = $(this).closest('tr');
        var index = tr.index();
        //var index=$(this).attr('index');
        //var tank_id = tr.find("td.details-control>a").html(); 
        var trans_ref_no = tr.find("td.transrefno").html();
        
        var trdata = tr.find("td.details-control").find("a").html().toString();
        var toggleSign = "";
        var terminalIdStr = "";
        var strAfterToggle = "";
        var firstChar = trdata.substr(0, 1);
        if(firstChar === "+" || firstChar === "-")
        {
            toggleSign = firstChar;
            var terminalIdStr = trdata.substr(1);
            if(firstChar === "+")
            {
                strAfterToggle = "-"+terminalIdStr;
            }
            else
            {
                strAfterToggle = "+"+terminalIdStr;
            }
        }
        else if(firstChar === ":")
        {
            toggleSign = ":-";
            var terminalIdStr = trdata.substr(2);
            strAfterToggle = "+"+terminalIdStr;
        }
        
        $("#loadingDiv").css({"visibility":"visible"});
        
        //alert(terminalIdStr + ":::" + strAfterToggle + ":::" + toggleSign);
        if(toggleSign === "+")
        {
            $.ajax({
                type: "POST",
                url: "trans_prod_detail.php",
                dataType: 'html',
                data: ({transrefno:trans_ref_no, index:index}),
                success: function(data) {

                     var buttons = [];

                    /*$.each(table.buttons()[0].inst.s.buttons,
                            function () {
                                buttons.push(this);
                    });
                    $.each(buttons,
                            function () {
                                table.buttons()[0].inst.remove(this.node);
                    });

                    table.destroy();*/
                    //table.DataTable().destroy();

                    if(toggleSign === "+")
                    {
                        var resp = data.split(":::");
                        var newRow = resp[0];
                        //alert(newRow);
                        //alert(index);

                        $("#viewer tbody tr").eq(index).after(newRow);
                        initDataTable();
                        tr.find("td.details-control").find("a").html(strAfterToggle);
                        tr.find("td.details-control").find("a").attr('id',resp[1]);
                        $("#loadingDiv").css({"visibility":"hidden"});
                     }
                     /*else if(toggleSign === ":-")
                     {
                        $("#viewer tbody tr").eq(index+1).remove("tr");
                        $("#viewer tbody tr").eq(index+1).remove("tr");
                        tr.find("td").find("a").html(strAfterToggle);
                        //initDataTable();
                     }*/
                    $("#loadingDiv").css({"visibility":"hidden"});
                },
                error: function(data) {
                    console.log("error");
                    $("#loadingDiv").css({"visibility":"hidden"});
                }
            });
        }
        else if(toggleSign === "-")
        {
            //var noOfProdRows = tr.find("td").find("a").attr('id');
            //alert(noOfProdRows);
            tr.find("td.details-control").find("a").html(strAfterToggle);
            var tdStr = $("#viewer tbody tr").eq(index+1).find("td").html();
            var isProdThere = tdStr.indexOf("Product");
            var isCompThere = tdStr.indexOf("Component");
            //alert(tdStr + ":::" + isProdThere + ":::" + isCompThere);
            while(isProdThere > 0 || isCompThere > 0)
            {
                $("#loadingDiv").css({"visibility":"visible"});
                $("#viewer tbody tr").eq(index+1).remove("tr");
                $("#loadingDiv").css({"visibility":"hidden"});
                tdStr = $("#viewer tbody tr").eq(index+1).find("td").html();
                isProdThere = tdStr.indexOf("Product");
                isCompThere = tdStr.indexOf("Component");
                //alert(tdStr + ":::" + isProdThere + ":::" + isCompThere);
            }
            /*for(i = 0; i < noOfProdRows; i++) {
                alert($("#viewer tbody tr").eq(index+1).find("td").html())
                $("#viewer tbody tr").eq(index+1).remove("tr");
            }*/

            initDataTable();
            $("#loadingDiv").css({"visibility":"hidden"});
        }
        //$("#loadingDiv").css({"visibility":"hidden"});
    });
    
    
    $('#viewer tbody').on('click', 'td.compdetail', function () {
        //alert("hello2");
        var tr = $(this).closest('tr');
        var index = tr.index();
        //var index=$(this).attr('index');
        //var tank_id = tr.find("td.details-control>a").html();
        var prodTagID = tr.find("td").find("a").attr("id").toString();
        //alert(prodTagID);
        
        var prodNo = prodTagID.substring(prodTagID.indexOf('P')+1);
        //alert("prodNo:"+prodNo);exit
        
        
        var trdata = tr.find("td").find("a").html().toString();
        var toggleSign = trdata.substring(0, 1);
        var prodStr = trdata.substring(1);
        
        
        //if(prodNo === "0")
        //{
        
        //}
        
        var teminalIdStr = "";
        var strAfterToggle2 = "";
        var strAfterToggle = "-"+prodStr;
        
        $("#loadingDiv").css({"visibility":"visible"});
        
        if(toggleSign === "+")
        {
            
            //var termIdStr = $("#viewer tbody tr").eq(transRefRowIndex).find("a").html().toString();
            //teminalIdStr = termIdStr.substring(1);
            //strAfterToggle2 = ":-"+teminalIdStr;
            
            //--var tranHeaderRowIndex = prodTagID.substring(prodTagID.indexOf('H')+1, prodTagID.indexOf('P'));
            //--var transRefRowIndex = parseInt(tranHeaderRowIndex);
            //--alert("TransRefRowIndex:"+transRefRowIndex);
            //--var trans_ref_no = $("#viewer tbody tr").eq(transRefRowIndex).find("td.transrefno").html();
            var trans_ref_no = prodTagID.substring(prodTagID.indexOf('H')+1, prodTagID.indexOf('P'));
        
            //alert("TransRef:"+trans_ref_no);
            
            $.ajax({
                type: "POST",
                url: "trans_comp_detail.php",
                dataType: 'html',
                data: ({transrefno:trans_ref_no, prodNo:prodNo}),
                success: function(data) {

                     var buttons = [];

                    /*$.each(table.buttons()[0].inst.s.buttons,
                            function () {
                                buttons.push(this);
                    });
                    $.each(buttons,
                            function () {
                                table.buttons()[0].inst.remove(this.node);
                    });*/

                    //table.DataTable().destroy();

                    if(toggleSign === "+")
                    {
                        //var newRow = '<tr>'+data+'</tr>';
                        //alert(index);
                        var resp = data.split(":::");
                        var newRow = resp[0];
                        //alert(resp[0]);
                        //alert(index);
                        $("#viewer tbody tr").eq(index).after(newRow);
                        initDataTable();
                        tr.find("td").find("a").html(strAfterToggle);
                        var oldProdTagID = tr.find("td").find("a").attr('id');
                        //append prodId with no of components as new id of a tag
                        var newProdTagID = oldProdTagID.toString() + "C" + resp[1].toString();
                        //alert(newProdTagID);
                        tr.find("td").find("a").attr('id',newProdTagID);

                        //$("#viewer tbody tr").eq(index-1).find("a").html(strAfterToggle2);
                        
                     }
                     //else
                     //{
                        
                     //}
                     $("#loadingDiv").css({"visibility":"hidden"});

                },
                error: function(data) {
                    console.log("error");
		    $("#loadingDiv").css({"visibility":"hidden"});
                }
            });
            
        }
        else if(toggleSign === "-")
        {
            //var termIdStr = $("#viewer tbody tr").eq(transRefRowIndex).find("a").html().toString();
            //teminalIdStr = termIdStr.substring(2);
            //strAfterToggle2 = "-"+teminalIdStr;
            
            var tranComps = prodTagID.substring(prodTagID.indexOf('C')+1);
            var noOfCompRows = parseInt(tranComps);
            //var noOfCompRows = tr.find("td").find("a").attr('id');
            //alert(noOfCompRows);
            
            //table.DataTable().destroy();
            
            for (i = 0; i < noOfCompRows; i++) {
                $("#viewer tbody tr").eq(index+1).remove("tr");
            }
            tr.find("td").find("a").html("+"+prodStr);
            //$("#viewer tbody tr").eq(index-1).find("a").html(strAfterToggle2)
            
            var newProdTagID = prodTagID.substring(prodTagID.indexOf('H'), prodTagID.indexOf('C'));
            //alert(newProdTagID);
            tr.find("td").find("a").attr('id',newProdTagID);
            initDataTable();
            $("#loadingDiv").css({"visibility":"hidden"});
        }
        
        //$("#loadingDiv").css({"visibility":"hidden"});
        
    });
    
    
    $('#viewer tbody').on('click', 'td.openbol', function () {
        //alert("hello2");
        //disable click right here.....
        
        //$("#load").css({"visibility":"visible"});
        //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        $("#loadingDiv").css({"visibility":"visible"});
        var tr = $(this).closest('tr');
        
        //var trdata = tr.find("td").find("a").html().toString();
        var trans_ref_no = tr.find("td.transrefno").html();
        //alert(trans_ref_no);
        
        $.ajax({
            type: "POST",
            url: "downloadBOL.php",
            dataType:'text',
            data: ({transrefno:trans_ref_no}),
            success: function(data) {
                 //alert(data)
                 //$("#load").css({"visibility":"hidden"});
                 $("#loadingDiv").css({"visibility":"hidden"});
                 window.open(data,'_blank');
            
            },
            error: function(data) {
                console.log("error");
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
                //echo $_POST[selCarrier];
        if($date_criteria == 1) 
        {
            $value = "transaction_date";
        }
        if($date_criteria == 2) 
        {
            $value = "load_start_date";
        }
        if($date_criteria == 3) 
        {
            $value = "load_end_date";
        }
        
        
        
                           
//		$transactionList = $mysqli->query("select term_id, folio_mo,folio_no,folio_yr,trans_id,doc_no,rec_type,shipment_no,order_no,trans_ref_no,driver,truck,trailer1,trailer2,
//	carrier,supplier_no,cust_no,acct_no,destination_no,transaction_date,transaction_time,load_start_date,load_start_time,load_stop_date,load_stop_time,
//	cancel_rebill,UserID,ManualDateCreated from TransHeader <?php where carrier ='$carrier' OR acct_no = '$account' OR driver = '$driver' OR doc_no = '$document'");
//                
        $query1 = "(select th.term_id, th.folio_mo,th.folio_no,th.folio_yr,th.trans_id,th.doc_no,th.rec_type,th.shipment_no,th.order_no,th.trans_ref_no,th.driver,th.truck,th.trailer1,th.trailer2,
	th.carrier,cr.name,th.supplier_no,s.supplier_name,th.cust_no,c.cust_name,th.acct_no,a.acct_name,th.destination_no,th.transaction_date,th.transaction_time,th.load_start_date,th.load_start_time,th.load_stop_date,th.load_stop_time,
	th.cancel_rebill,th.UserID,th.ManualDateCreated from TransHeader th, Supplier s, Customer c, Account a, Carrier cr where th.$value BETWEEN ('$from_date') AND ('$to_date') 
            AND s.supplier_no = th.supplier_no AND (c.supplier_no = th.supplier_no AND c.cust_no = th.cust_no) AND 
            (a.supplier_no = th.supplier_no AND a.cust_no = th.cust_no AND a.acct_no = th.acct_no) AND 
            cr.carr_no = th.carrier";
       
        
        if($account){
           $query3 = " AND ";
           $a = "th.acct_no = '$account'";
        }
        if($carrier){
            $ca = "th.carrier = '$carrier'";
            $query2 = " AND ";
        }
        if($driver){
           $query4 = " AND ";
           $d = "th.driver = '$driver'";
        }
         if($document){
            $query5 = " AND ";
            $doc = "th.doc_no = '$document'";
        }
        if($supplier){
            $query6 = " AND ";
            $s= "th.supplier_no = '$supplier'";
        }
        if($customer){
            $query7 = " AND ";
            $cust = "th.cust_no = '$customer'";
            
        }
        if($destination){
            $query8 = " AND ";
            $des = "th.destination_no = '$destination'";
        }
     
        $final_query = $query1.$query2.$ca.$query3.$a.$query4.$d.$query5.$doc.
                       $query6.$s.$query7.$cust.$query8.$des.")";
        
        if($restrictSCADisplay)
        {
            $scaQuery = "select distinct concat(supplier_num, ':::', cust_num, ':::', acct_num) as sca from TWUserSCA where tms_uname='$user'";
            $scaList = $mysqli_web->query($scaQuery);
            
            $tmp = array();
            while($val = mysqli_fetch_assoc($scaList))
                $tmp[] = "'".$val['sca']."'";
            
            $query9 = " AND concat(th.supplier_no, ':::', th.cust_no, ':::', th.acct_no) IN (".implode(', ', $tmp).")";
            
            $final_query = $query1.$query2.$ca.$query3.$a.$query4.$d.$query5.$doc.
                       $query6.$s.$query7.$cust.$query8.$des.$query9.")";
        }
        
         
         //echo $final_query;
         //echo "from date is ->".$from_date;
          //echo "to date is ->".$to_date;
         $transactionList = $mysqli->query($final_query);
         
        
//                echo "select term_id, folio_mo,folio_no,folio_yr,trans_id,doc_no,rec_type,shipment_no,order_no,trans_ref_no,driver,truck,trailer1,trailer2,
//	carrier,supplier_no,cust_no,acct_no,destination_no,transaction_date,transaction_time,load_start_date,load_start_time,load_stop_date,load_stop_time,
//	cancel_rebill,UserID,ManualDateCreated from TransHeader where carrier ='$carrier' OR acct_no = '$account' OR driver = '$driver' OR doc_no = '$document'
//	OR supplier_no = '$supplier'";
//		
		if(!$transactionList)
		{
			echo 'Could not run query: '.mysqli_error();
    		
		}
		?>
		<tbody>
		<?php
		if(mysqli_num_rows($transactionList))
		{
			while($row = mysqli_fetch_assoc($transactionList))
			{?>
				<tr>
					<td class="details-control"><a>+<?php echo $row['term_id'];?></a></td>
					<td><?php echo $row['folio_mo'];?></td>
					<td><?php echo $row['folio_no'];?></td>
					<td><?php echo $row['folio_yr'];?></td>
					<td><?php echo $row['trans_id'];?></td>
					<td class="openbol"><a><?php echo $row['doc_no'];?></a></td>
					<td><?php echo $row['rec_type'];?></td>
					<td><?php echo $row['shipment_no'];?></td>
					<td><?php echo $row['order_no'];?></td>
					<td class="transrefno"><?php echo $row['trans_ref_no'];?></td>
					<td><?php echo $row['driver'];?></td>
					<td><?php echo $row['truck'];?></td>
					<td><?php echo $row['trailer1'];?></td>
					<td><?php echo $row['trailer2'];?></td>
					<td><?php echo $row['carrier'];?></td>
                                        <td><?php echo $row['name'];?></td>
					<td><?php echo $row['supplier_no'];?></td>
                                        <td><?php echo $row['supplier_name'];?></td>
					<td><?php echo $row['cust_no'];?></td>
                                        <td><?php echo $row['cust_name'];?></td>
					<td><?php echo $row['acct_no'];?></td>
                                        <td><?php echo $row['acct_name'];?></td>
					<td><?php echo $row['destination_no'];?></td>
					<td><?php $t_date =  $row['transaction_date'];  
                                         
                                        $newtext = wordwrap($t_date, 2, "/", true);
					$tdates = explode("/", $newtext);
					echo $t_date_new = $tdates[2]."/".$tdates[1]."/".$tdates[0];

                                        ?></td>
					<td><?php echo $row['transaction_time'];?></td>
                                        
                                        <td><?php $l_date = $row['load_start_date'];
                                        
					$newtext2 = wordwrap($l_date, 2, "/", true);
					$ldates = explode("/", $newtext2);
                                        echo $l_date_new = $ldates[2]."/".$ldates[1]."/".$ldates[0];
					
					?></td>
                                        
					<td><?php echo $row['load_start_time'];?></td>
                                        
					<td><?php $ls_date = $row['load_stop_date'];
                                        
					$newtext3 = wordwrap($ls_date, 2, "/", true);
					$lsdates = explode("/", $newtext3);
                                        echo $ls_date_new = $lsdates[2]."/".$lsdates[1]."/".$lsdates[0];

					?></td>
                                        
					<td><?php echo $row['load_stop_time'];?></td>
					<td><?php echo $row['cancel_rebill'];?></td>
					<td><?php echo $row['UserID'];?></td>
					<td><?php echo $row['ManualDateCreated'];?></td>
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
<!--        <script src="js/dataTables.fixedColumns.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>-->
<!--        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.flash.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>-->
	</html>
    
