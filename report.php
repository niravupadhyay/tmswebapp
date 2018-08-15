<?php
	session_start();
	error_reporting(0);
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>
    <script type="text/javascript" src="js/jquery.min.js"></script>
			
 <?php include("header.php");?>
 <style>
select {
    background-color: #fff;
    height: 100% !important;
    width: 100% !important;
}
 </style>
 <?php
  require_once './Mobile-Detect-2.8.22/Mobile_Detect.php';
 $detect = new Mobile_Detect;

                                // Any mobile device (phones or tablets).
                                if ( $detect->isMobile() ) {
                                    
                                   ?>
 <style>
     #container,#container2,#container3{
         height:100px !important;
     }
 </style>
                                <?php } ?>
<script>
$(document).ready(function()
{	$(".output-success").css("visibility", "xen");
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
<body>

<div class="row report">
 <div class="box-header well a">
     <h2>	<i class="glyphicon glyphicon-list-alt"></i>	
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


                <!--<div class="box-icon">-->
				
                    <!--<a href="#" id="" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                    <!--<a href="#" id="min" class="btn btn-minimize btn-round btn-default"><i-->
                            <!--id="toggle" class="glyphicon glyphicon-chevron-up"></i></a>-->
                    <!--<a href="#" id="close" class="btn btn-close btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
            </div>
		
		
		<form method="post" name="frm1" id="frm1" action="export.php" method="post" target="_blank">
		<table  class="display report" cellspacing="0" width="100%">
			<thead>
			 	 <?php
              require_once './Mobile-Detect-2.8.22/Mobile_Detect.php';
             $detect = new Mobile_Detect;

                                // Any mobile device (phones or tablets).
                                if ( $detect->isMobile() ) {
                                    ?>
                            
                            <tr>
					<th><input type="text" name="datepicker-from" id="datepicker-from" class="tcal tcalInput"></th>
                            </tr>
                            <tr>
					<th>-TO-
                                        
					<input type="text" name="datepicker-to" id="datepicker-to" class="tcal tcalInput">
                                       </th>
                            </tr>
                            <tr>
						<th><input type="checkbox" name="level_date">Level Break</th>
                            </tr>
                            <tr>
						<th><input type="radio" name="order-whole" value="asc">Ascending</th>
                            </tr>
                            <tr>
						<th><input type="radio" name="order-whole" value="desc">Descending</th>
                            </tr>
                                <?php } else{?>
				<tr>
					<td><input type="text" name="datepicker-from" id="datepicker-from" class="tcal tcalInput"></td>
					<th>-TO-</th>
					<td><input type="text" name="datepicker-to" id="datepicker-to" class="tcal tcalInput"></td>
						<td><input type="checkbox" name="level_date"></td><th>Level Break</th>
						<td><input type="radio" name="order-whole" value="asc"></td><th>Ascending</th>
						<td><input type="radio" name="order-whole" value="desc"></td><th>Descending</th>
				</tr>
                                <?php } ?>
					
			</thead>
			
					<hr>
		</table>
				
<div class="box col-md-12 rep">
        <div class="box-inner">
            <div class="box-header well">
                <h3><i class="glyphicon glyphicon-list-alt"></i> Services <input type="checkbox" name="level_service" id="level_service" value="level_service"> Level Break</h3>
                <!--<div class="box-icon">-->
                    <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-cog"></i></a>-->
                    <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
                    <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
            </div>
			
            <div class="box-content">
                <div id="" class="center" style="">
				<div id="container" style="min-width: 300px; height: 300px; margin: 0 auto">
					<!--<input type="button" id="refresh" value="reload" class="mychart" onclick= "refresh()">-->
						<select multiple class="form-control" size="10" name="services[]">
						<?php $query1="SELECT trans_code,trans_desc FROM TransValue";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1['trans_code'].">".$value1['trans_code']." -- ".$value1['trans_desc']."</option>";
							}
					  ?>
					 </select>
				</div>	
				</div>
			</div>
            
                    
                                    
			<div class="box-header well">
               <h3> <input type="radio" id="order-service" name="order-service" value="asc"> Ascending <input type="radio" value="desc" id="order-service" name="order-service"> Descending</h3>
			</div>
                                  <?php } ?>
        </div>
    </div>
<div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h3><i class="glyphicon glyphicon-list-alt"></i> Tanks <input type="checkbox" id="level_tanks" name="level_tanks" value="level_tanks"> Level Break</h3>

                <!--<div class="box-icon">-->
                    <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-cog"></i></a>-->
                    <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
                    <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
				
            </div>
			
			<div class="box-content">	
            <div id="" class="center" style="">
				
				<div id="container2" style="min-width: 300px; height: 300px; margin: 0 auto">
					<select multiple class="form-control" size="10" name="tanks[]">
						<?php $query1="SELECT tank_id FROM Tank";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1['tank_id'].">".$value1['tank_id']."</option>";
							}
					  ?>
					 </select>
				</div>
				</div>
				
            </div>
			<div class="box-header well">
               <h3> <input type="radio" name="order-tank" id="order-tank" value="asc"> Ascending <input type="radio" value="desc" name="order-tank" id="order-tank"> Descending</h3>
			</div>
        </div>
    </div>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h3><i class="glyphicon glyphicon-list-alt"></i> Customers <input type="checkbox" name="level_customers" id="level_customers" value="level_customers"> Level Break</h3>

                <!--<div class="box-icon">-->
                    <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-cog"></i></a>-->
                    <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
                    <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
            </div>
			<div class="box-content">
            <div id="" class="center" style="">
				
				<div id="container3" style="min-width: 300px; height: 300px; margin: 0 auto">
				
				<select multiple class="form-control" size="10" name="customers[]">
						<?php $query1="SELECT cust_no,cust_name FROM Customer";
							$result1=$mysqli->query($query1);
							while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1['cust_no'].">".$value1['cust_no']." -- ".$value1['cust_name']."</option>";
							}
					  ?>
					 </select>
					  
					  </div>
				</div>
			</div>
			<div class="box-header well">
               <h3> <input type="radio" name="order-cust" value="asc" id="order-cust"> Ascending <input type="radio" value="desc" name="order-cust" id="order-cust"> Descending</h3>
			</div>
    </div>
</div>
<div class="full"><div class="conn"><?php if ($mysqli){
echo "Connection established to TMS server.<br>";
}?>
</div><div><input type="submit" value="Export Service Report"></div></div>
</form>


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
  
    </div>
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
	
<?php include("footer.php");?>