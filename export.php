<?php
	session_start();
	error_reporting(0);
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>
    
</script>
 <?php include("header.php");?>

 <style>
 .col-md-12 {
    width: 100% !important;
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
margin-top:1px;
}
.error1 {
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
}
a.buttons-collection {
        margin-left: 1em;
    }
	a.buttons-collection {
        margin-left: 1em;
    }
 </style>

<link rel="stylesheet" href="css/jquery.dataTables.css"></script>
<link rel="stylesheet" href="css/buttons.dataTables.css"></script>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.buttons.js"></script>
<script src="js/buttons.flash.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/fnReloadAjax.js"></script>
<script src="js/dataTables.fixedColumns.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
      
         scrollY:        "true",
        scrollX:        true

      

    } );
} );	
</script>

<script>
$(document).ready(function()
{
	$(".output-success").css("visibility", "xen");
	var term_id=$("#term_id").val();
    $("#addupdate").click(function()
    {
		$(".output-success").css("visibility", "visible");
		$('.success').css("background", "none");
		$('.output-success').html('<images src="images/loading.gif" width="5%"> loading...');
        $.ajax({
		type: "POST",
		url: "add.php",
		data: $("#frm1").serialize() + "&term_id=" + term_id,
		dataType: "html",
		success: function(data) {
				console.log(data); 
				$(".output-success").css("background-color", "#DFF2BF");
				$(".output-success").css("visibility", "visible");
				$('.output-success').html(data);	
		}
	});
   });
   
   $("#min").click(function()
    {
		if ( $("#toggle").hasClass("glyphicon glyphicon-chevron-up") ) {
			$("#abc").show();
			$("#i1").remove();
	
			
		}
		if ( $("#toggle").hasClass("glyphicon glyphicon-chevron-down") ) {
			$("#abc").hide();
			$("#content").append('<images id="i1" width="99%" height="83%" src="images/tms6.png">');
	
		}
	}	
);
	
	$("#close").click(function()
    {
			$("#abc").show();
			$("#i1").remove();
			$("#content").append('<images id="i1" width="99%" height="83%" src="images/tms6.png">');
	}	
);
});
</script>


<div id="result"></div>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner rep">
     <div class="box-header well">
				
				<?php
				    $currentFile = $_SERVER["PHP_SELF"];	
					$input = $currentFile;
					$result = explode('/',$input);
					echo $result[0];
					$file = basename($currentFile);         // $file is set to "index.php"
					$file2 = basename($file, ".php");
					echo $file2;
					?>

				</h2>

                <div class="box-icon">
				
                    <!--<a href="#" id="" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                    <a href="#" id="min" class="btn btn-minimize btn-round btn-default"><i
                            id="toggle" class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" id="close" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content2 row ">
            <div class="box-content2 row">
                <div class="col-lg-7 col-md-12">
                   
    </div>
	
 
  <link rel="stylesheet" href="css/jquery-ui.css">
  
</head>
<body>
<!---section---->
<?php 
	$services = $_POST['services'];
	$tanks = $_POST['tanks'];
	$customers = $_POST['customers'];
	$order = $_POST['order-whole']; 
	$datepicker_from = $_POST['datepicker-from'];
	$new = str_replace("/","-",$datepicker_from);
	$from = date("ymd", strtotime($new));
	//echo $from;
	$datepicker_to = $_POST['datepicker-to'];
	$new2 = str_replace("/","-",$datepicker_to);
	$to = date("ymd", strtotime($new2));
	//echo $to;exit;
	
	$level_date = $_POST['level_date'];
	$level_service = $_POST['level_service'];
	$level_tanks = $_POST['level_tanks'];
	$level_customers = $_POST['level_customers'];

	$order1 = $_POST['order-service'];
	$order2 = $_POST['order-tank'];
	$order3 = $_POST['order-cust'];


?>
		<form action="download.php" method="post" name="downloadfrm" id="downloadfrm">
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="rep1">Customer</th>
                <th class="rep1">CustomerName</th>
                <th class="rep1">Service</th>
				<th class="rep1">Tank</th>
				<th class="rep1">Date</th>
				<th class="rep1">VehicleId</th>
				<th class="rep1">Transaction ID</th>
				<th class="rep1">Quantity</th>
				<th class="rep1">Unit of Measure</th>
            </tr>
        </thead>
        <tbody>
		
				<?php    
				if($level_date){
					$dynamic_value = 'TransHeader.load_start_date';
					//echo $dynamic_value;
				$query1="SELECT DISTINCT * FROM TransValue,TransHeader,Tank,Customer,Product where TransValue.trans_code IN (".implode(',', $services).")
				AND Tank.tank_id IN (".implode(',', $tanks).") AND Customer.cust_no IN (".implode(',', $customers).") AND load_start_date BETWEEN
				$from AND $to group by ".$dynamic_value." ORDER BY load_start_date ".$order.",trans_code ".$order1.",tank_id ".$order2.",Customer.cust_no ".$order3."";
				//echo $query1."<br>";
				}	
				else if($level_service){
					 $dynamic_value = 'TransValue.trans_code';
				$query1="SELECT DISTINCT * FROM TransValue,TransHeader,Tank,Customer,Product where TransValue.trans_code IN (".implode(',', $services).")
				AND Tank.tank_id IN (".implode(',', $tanks).") AND Customer.cust_no IN (".implode(',', $customers).") AND load_start_date BETWEEN
				$from AND $to group by ".$dynamic_value." ORDER BY load_start_date ".$order.",trans_code ".$order1.",tank_id ".$order2.",Customer.cust_no ".$order3."";
				//echo $query1."<br>"; 
				}
				else if($level_tanks){
					$dynamic_value = 'Tank.tank_id';
				$query1="SELECT  DISTINCT * FROM TransValue,TransHeader,Tank,Customer,Product where TransValue.trans_code IN (".implode(',', $services).")
				AND Tank.tank_id IN (".implode(',', $tanks).") AND Customer.cust_no IN (".implode(',', $customers).") AND load_start_date BETWEEN
				$from AND $to group by ".$dynamic_value." ORDER BY load_start_date ".$order.",trans_code ".$order1.",tank_id ".$order2.",Customer.cust_no ".$order3."";
				//echo $query1."<br>";
				}
				else if($level_customers){
					 $dynamic_value = 'Customer.cust_no';
				$query1="SELECT DISTINCT * FROM TransValue,TransHeader,Tank,Customer,Product where TransValue.trans_code IN (".implode(',', $services).")
				AND Tank.tank_id IN (".implode(',', $tanks).") AND Customer.cust_no IN (".implode(',', $customers).") AND load_start_date BETWEEN
				$from AND $to group by ".$dynamic_value." ORDER BY load_start_date ".$order.",trans_code ".$order1.",tank_id ".$order2.",Customer.cust_no ".$order3."";
				//echo $query1."<br>";
				}
				else{
					 $dynamic_value = 'TransHeader.load_start_date';
				$query1="SELECT DISTINCT * FROM TransValue,TransHeader,Tank,Customer,Product where TransValue.trans_code IN (".implode(',', $services).")
				AND Tank.tank_id IN (".implode(',', $tanks).") AND Customer.cust_no IN (".implode(',', $customers).") AND load_start_date BETWEEN
				$from AND $to group by ".$dynamic_value." ORDER BY load_start_date ".$order.",trans_code ".$order1.",tank_id ".$order2.",Customer.cust_no ".$order3."";
				//echo $query1."<br>";
				}
			$result1=$mysqli->query($query1);	
		
		while($value1 = mysqli_fetch_array($result1))
			{
						echo "<tr>";
						echo "<td>".$value1['cust_no']."</td>";
								
						echo "<td>".$value1['cust_name']."</td>";
			
						echo "<td>".$value1['trans_desc']."</td>";
						
						echo "<td>".$value1['tank_id']."</td>";
						
						echo "<td>".$value1['transaction_date']."</td>";
						
						echo "<td>".$value1['trailer1']."</td>";
						
						echo "<td>".$value1['trans_code']."</td>";
						
						echo "<td>".$value1['net_gals']."</td>";
						
						echo "<td>".$value1['uom']."</td>";
						echo "</tr>";
			}

		
				
				?>
				
		</tbody>
    </table>
	</form>
		
  </div> </div> </div> </div> </div> 
  
  <?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
</body>
</html>
	
<?php include("footer.php");?>












