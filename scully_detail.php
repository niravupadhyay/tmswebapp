<?php

error_reporting(0);
session_start();
include "database_connection_web_3.php";
$fieldNames = array("", "Bay", "Time of Event", "Carrier No", "Driver No", "Carrier Name", "Driver Name", "Scully Event Description");
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
            table = $('#viewer').DataTable( {
                "iDisplayLength": 15,
                "bPaginate": true,
                //"iCookieDuration": 60,
                //"table-layout":fixed,
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
	});
        table.order([2,'asc'],[3,'asc']).draw();
}

$(document).ready(function() {
	//$( "#paging" ).click(function() {
	//alert("Transaction generating...");
	initDataTable();
//} );
});
	


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
	
               
	<tbody>
		<?php
                
                //$search1 = "Carding In Driver";
                $search1 = "DRIVER = ";
                $search2 = "Flow Starting at";
                $search3 = "SCULLY";
                $search30 = "GROUND";
                $search31 = "RAISED";
                $search4 = "Flow Stopping at";
                $search5 = "CARD PULLED";

                $matches = array();

                ?>

                <?php

                $items = array();

                $logdate = $_POST['scdate'];

                $adate_format1 = explode( '/', $logdate);
                $adate_format2 = $adate_format1[2]."/".$adate_format1[1]."/".$adate_format1[0];
                $a_date = date('ymd',strtotime($adate_format2));


                $bayno = $_POST['bayno'];
                
                $carno = $_POST['carno'];

                set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
                //echo "1";
                include('Net/SSH2.php');
                //echo "1";
                //CN IP 184.149.36.41
                //$ssh = new Net_SSH2('10.73.5.50');

                $vopakSSH = new Net_SSH2('192.168.1.3');
                //echo "1";
                if (!$vopakSSH->login('tms6', 'toptech')) {
                    echo "Cannot connect to host";
                    exit('Login Failed');
                }
                
               
                if(strcmp($bayno, "AB") === 0)
                {
                    $query3="SELECT ld_bay, bay_desc from BayProfile";
		    $result3=$mysqli->query($query3);
                                            
                    while($value3 = mysqli_fetch_array($result3))
                    {
                        
                        $baynum = $value3['ld_bay'];
                        $bay_desc = $value3['bay_desc'];
                        $rptCommand = "/tms6/scripts/ScullyRpt.sh ".$a_date." BAY".$baynum." M".$baynum."00";
                        $rptGenExec = $vopakSSH->exec($rptCommand);

                        $macVMSSH = new Net_SSH2('stage2.blendtech.com');
                        if (!$macVMSSH->login('Tms6WebDev', 'W3bD3v@BT')) {
                            echo "Cannot connect to host";
                            exit('Login Failed');
                        }
                        //echo "1";
                        $rptDownloadCmd = "scp tms6@192.168.1.3:/tmp/BAY".$baynum.".".$a_date.".scully"." /Applications/XAMPP/xamppfiles/htdocs/TMS6/ScullyAlarms/BAY".$baynum."_".$a_date."_scully.txt";

                        $rptDownloadExec = $macVMSSH->exec($rptDownloadCmd);

                        $read_alarm = @fopen("ScullyAlarms/BAY".$baynum."_".$a_date."_scully.txt", "r");
                        
                        $items = array();
                        
                        if ($read_alarm)
                        {
                            while (!feof($read_alarm)){
                                $value = fgets($read_alarm);
                                    if (strcmp($value, "") !== 0){
                                          //if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {


                                                $items[] = $value;
                                            //}
                                    }

                                }
                           fclose($read_alarm);
                        }

                        $i = 0;
                        $count = count($items);
                        //echo $count;
                        ?>

                        <?php

                        $prevDesc = "";
                        $desc = "";

                        $prevTime = "";
                        $time = "";

                        $driverScullyConnectErrCount = 0;
                        $driverScullyDisconnectErrCount = 0;
                        $scullyOverfillErrCount = 0;
                        $dNo = "";
                        $dName = "";
                        foreach ($items as $value) {

                            //$i++;
                            if(strpos($value, '[BAY') || strpos($value, 'DRIVER'))
                            {
                                $time = substr($value, 8, 9);
                                $bay = substr($value, 62, 2);
                                $ctl = "-";
                                $pos = strpos($value," - ");
                                $desc = trim(substr($value,($pos+2)));
                                
                                if((strpos($desc, $search1)) !== false)
                                {
                                    $dNo = substr($value, 68, 8);
                                    $queryDr="SELECT d.driver_no AS Dno, d.name AS Dname, d.carrier_no AS Cno, c.name AS Cname from Driver d, Carrier c where d.driver_no = '".$dNo."' and d.carrier_no = c.carr_no order by d.driver_no, d.carrier_no";
                                    $resultDr=$mysqli->query($queryDr);
                                            
                                    while($valueDr = mysqli_fetch_array($resultDr))
                                    {
                                        $dName = $valueDr['Dname'];
                                        $car_no = $valueDr['Cno'];
                                        $car_name = $valueDr['Cname'];
                                    }
                                }
                                if(((strpos($desc, $search3)) !== false || (strpos($desc, $search30)) !== false) && (strpos($desc, $search31)) !== false) {

                                    //$date = substr($value, 0, 9);
                                    if(strcmp($prevDesc,"") !== 0)
                                    {
                                        if((strpos($prevDesc, $search1)) !== false) {
                                            //echo "Driver Scully Connect Error occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Connect Error ";?></td>


                                            </tr>
                                            <?php
                                            $driverScullyConnectErrCount = $driverScullyConnectErrCount + 1;
                                        }
                                        else if((strpos($prevDesc, $search4)) !== false) {
                                            $currTime = strtotime($time);

                                            $prevMsgTime = strtotime($prevTime);
                                            $timeDiff = $currTime - $prevMsgTime;

                                            //echo 'Time diff in sec: '.abs($timeDiff);

                                            if($timeDiff > 1)
                                            {
                                                //echo "Driver Scully Disconnect Error occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Disconnect Error ";?></td>

                                            </tr>
                                            <?php
                                                $driverScullyDisconnectErrCount = $driverScullyDisconnectErrCount + 1;
                                            }
                                            else
                                            {
                                                //echo "Scully Overfill Event occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Scully Event ";?></td>

                                            </tr>
                                            <?php
                                                $scullyOverfillErrCount = $scullyOverfillErrCount + 1;
                                            }
                                        }
                                        else if((strpos($prevDesc, $search5)) !== false) {
                                            //echo "Driver Scully Disconnect Error occurred at time - ". $time."</br>";
                                        ?>
                                        <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Disconnect Error ";?></td>

                                        </tr>    
                                        <?php    
                                            $driverScullyDisconnectErrCount = $driverScullyDisconnectErrCount + 1;
                                        }
                                    }
                        //            else
                        //            {
                        //                $prevDesc = $desc;
                        //                $prevTime = $time;
                        //            }


                              }

                              $prevDesc = $desc;
                              $prevTime = $time;


                       }

                    }

                    //echo $driverScullyConnectErrCount.":::".$driverScullyDisconnectErrCount.":::".$scullyOverfillErrCount;

                            ?>
<!--                                    <tr>

                                            <td><?php //echo $baynum;?></td>
                                            <td><?php //echo $driverScullyConnectErrCount;?></td>
                                            <td><?php //echo $driverScullyDisconnectErrCount;?></td>
                                            <td><?php //echo $scullyOverfillErrCount;?></td>


                                    </tr>-->
                <?php 
                        
                    
                    }
                }
                else
                {
                    $rptCommand = "/tms6/scripts/ScullyRpt.sh ".$a_date." BAY".$bayno." M".$bayno."00";

                    $rptGenExec = $vopakSSH->exec($rptCommand);


                        $macVMSSH = new Net_SSH2('stage2.blendtech.com');
                        if (!$macVMSSH->login('Tms6WebDev', 'W3bD3v@BT')) {
                            echo "Cannot connect to host";
                            exit('Login Failed');
                        }
                        //echo "1";
                        $rptDownloadCmd = "scp tms6@192.168.1.3:/tmp/BAY".$bayno.".".$a_date.".scully"." /Applications/XAMPP/xamppfiles/htdocs/TMS6/ScullyAlarms/BAY".$bayno."_".$a_date."_scully.txt";

                        $rptDownloadExec = $macVMSSH->exec($rptDownloadCmd);

                        $read_alarm = @fopen("ScullyAlarms/BAY".$bayno."_".$a_date."_scully.txt", "r");




                            if ($read_alarm)
                            {
                                while (!feof($read_alarm)){
                                    $value = fgets($read_alarm);
                                        if (strcmp($value, "") !== 0){
                                              //if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {


                                                    $items[] = $value;
                                                //}
                                            }

                                    }
                               fclose($read_alarm);
                            }

                        $i = 0;
                        $count = count($items);
                        //echo $count;
                        ?>

                        <?php

                        $prevDesc = "";
                        $desc = "";

                        $prevTime = "";
                        $time = "";

                        $driverScullyConnectErrCount = 0;
                        $driverScullyDisconnectErrCount = 0;
                        $scullyOverfillErrCount = 0;

                        $baynum = $bayno;
                        
                        $queryBDesc="SELECT bay_desc from BayProfile where ld_bay = '".$bayno."'";
                        $resultBDesc=$mysqli->query($queryBDesc);
                                            
                        while($valueBDesc = mysqli_fetch_array($resultBDesc))
                        {
                            $bay_desc = $valueBDesc['bay_desc'];
                        }
                        
                        foreach ($items as $value) {

                            //$i++;
                            if(strpos($value, '[BAY') || strpos($value, 'DRIVER'))
                            {
                                $time = substr($value, 8, 9);
                                $bay = substr($value, 62, 2);
                                $ctl = "-";
                                $pos = strpos($value," - ");
                                $desc = trim(substr($value,($pos+2)));
                                
                                if((strpos($desc, $search1)) !== false)
                                {
                                    $dNo = substr($value, 68, 8);
                                    $queryDr="SELECT d.driver_no AS Dno, d.name AS Dname, d.carrier_no AS Cno, c.name AS Cname from Driver d, Carrier c where d.driver_no = '".$dNo."' and d.carrier_no = c.carr_no order by d.driver_no, d.carrier_no";
                                    $resultDr=$mysqli->query($queryDr);
                                            
                                    while($valueDr = mysqli_fetch_array($resultDr))
                                    {
                                        $dName = $valueDr['Dname'];
                                        $car_no = $valueDr['Cno'];
                                        $car_name = $valueDr['Cname'];
                                    }
                                }
                                if(((strpos($desc, $search3)) !== false || (strpos($desc, $search30)) !== false) && (strpos($desc, $search31)) !== false) {

                                    //$date = substr($value, 0, 9);
                                    if(strcmp($prevDesc,"") !== 0)
                                    {
                                        if((strpos($prevDesc, $search1)) !== false) {
                                            //echo "Driver Scully Connect Error occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Connect Error ";?></td>


                                            </tr>
                                            <?php
                                            $driverScullyConnectErrCount = $driverScullyConnectErrCount + 1;
                                        }
                                        else if((strpos($prevDesc, $search4)) !== false) {
                                            $currTime = strtotime($time);

                                            $prevMsgTime = strtotime($prevTime);
                                            $timeDiff = $currTime - $prevMsgTime;

                                            //echo 'Time diff in sec: '.abs($timeDiff);

                                            if($timeDiff > 1)
                                            {
                                                //echo "Driver Scully Disconnect Error occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Disconnect Error ";?></td>

                                            </tr>
                                            <?php
                                                $driverScullyDisconnectErrCount = $driverScullyDisconnectErrCount + 1;
                                            }
                                            else
                                            {
                                                //echo "Scully Overfill Event occurred at time - ". $time."</br>";
                                            ?>
                                            <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Scully Event ";?></td>

                                            </tr>
                                            <?php
                                                $scullyOverfillErrCount = $scullyOverfillErrCount + 1;
                                            }
                                        }
                                        else if((strpos($prevDesc, $search5)) !== false) {
                                            //echo "Driver Scully Disconnect Error occurred at time - ". $time."</br>";
                                        ?>
                                        <tr>

                                            <td><?php echo $baynum." - ".$bay_desc;?></td>
                                            <td><?php echo $time;?></td>
                                            <td><?php echo $car_no;?></td>
                                            <td><?php echo $dNo;?></td>
                                            <td><?php echo $car_name;?></td>
                                            <td><?php echo $dName;?></td>
                                            <td><?php echo " Driver Disconnect Error ";?></td>

                                        </tr>    
                                        <?php    
                                            $driverScullyDisconnectErrCount = $driverScullyDisconnectErrCount + 1;
                                        }
                                    }
                        //            else
                        //            {
                        //                $prevDesc = $desc;
                        //                $prevTime = $time;
                        //            }


                              }

                              $prevDesc = $desc;
                              $prevTime = $time;


                           }

                        }

                //echo $driverScullyConnectErrCount.":::".$driverScullyDisconnectErrCount.":::".$scullyOverfillErrCount;
		
			?>
<!--				<tr>
                                        
                                        <td><?php //echo $bayno;?></td>
                                        <td><?php //echo $driverScullyConnectErrCount;?></td>
					<td><?php //echo $driverScullyDisconnectErrCount;?></td>
					<td><?php //echo $scullyOverfillErrCount;?></td>
					
                                        
				</tr>-->
                                    <?php
			
                }
		
		?>
		</tbody>
		</table>
	</form>
	</body>
        <script src="js/dataTables.fixedColumns.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>
 </html>