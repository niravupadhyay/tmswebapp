<?php include("database_connection_web_primary.php"); 
session_start();
$user = $_SESSION["user"];
$restrictSCADisplay = $_SESSION['restrictSCADisplay'];
?>

<style>
    .color{color:red;font-weight: bold}
    #button {
   
    padding: 0px;
    width: 42px;
    background-color:#2FA4E7 !important;
}
    .additive{background-color: #FBF6D9}
    .preset{background-color: #F5F5DC}
    .presethead{background-color: #FFFFFF}
    .subhead{background-color: #E8E8E8 ;font-weight: bold;}
    .colorf{color:#2FA4E7;font-weight: bold}
    .color2{background-color:#A2E47B;font-weight: bold;color:white !important}
    .color22{background-color:#96e16b;font-weight: bold;color:white !important}
    .success {
        color: #4F8A10;
        background-color: #DFF2BF;
        background-image:url('success.png');
        margin-top:1px;
    }

    .row{
        width:auto;
        min-height:650% !important;

    }
    #reload-f-detail{
        float:right;
    }
    #tree2{
        width:100%;
    }
    .container {
        width: 100%;
    }
    .error1 {
        color: #D8000C;
        background-color: #FFBABA;
        background-image: url('error.png');
    }
    .box-inner{
        min-height: 500px}
    </style>

<!--<script type="text/javascript" src="js/cookie.jquery.json.js"></script>-->
    <script>

        $("#button").click(function () {


            window.open("http://10.66.113.78/rcuditto.html","newwindow","resizable=no,top=200,left=200,width=500,height=750");
            //window.open("http://192.168.1.40/rcudittodisplay.html","newwindow","resizable=no,top=200,left=200,width=500,height=450");/rcudittokeypad.html
  
        });
        $(document).ready(function ()
        {
            // $('#tree2').treegrid();

   //        $('#tree2').treegrid({
   //          'initialState': 'collapsed',
   //          'saveState': true
   //        });


            $('#tree2').treegrid({
                //'initialState': 'collapsed',
                //'saveState': 'true',
                //'saveStateMethod': 'cookie'
                'cache':'false'
            });

            $(".output-success").css("visibility", "hidden");
            var term_id = $("#term_id").val();

   //       value2 = 'ALARM';
   //       value3 = 'FAILED';
   //       value4 = 'COMMERROR';
   //  

            $("#tree2 td:contains('ALARM')").each(function () {
                $(this).addClass("color");
            });

            $('#tree2 tr:contains("CARDING_IN")').each(function () {
                $(this).addClass("color2");
            });
	    $('#tree2 tr:contains("AUTHORIZED")').each(function () {
                $(this).addClass("color22");
            });
	    $('#tree2 tr:contains("ACTIVE")').each(function () {
                $(this).addClass("color2");
            });
            $("#tree2 td:contains('FLOWING')").each(function () {
                $(this).addClass("colorf");
            });
            $("#tree2 td:contains('FAILED')").each(function () {
                $(this).addClass("color");
            });
            $("#tree2 td:contains('COMMERROR')").each(function () {
                $(this).addClass("color");
            });

        });

   //if($('#tree:contains("' + value2 + '")'))
   //{
   //    $('#tree td:contains("' + value2 + '")').text().addClass( "color" );
   //}
   //if($('#tree:contains("' + value3 + '")'))
   //{
   //    $('#tree td:contains("' + value3 + '")').text().addClass( "color" );
   //}
   //if($('#tree:contains("' + value4 + '")'))
   //{
   //    $('#tree td:contains("' + value4 + '")').text().addClass( "color" );
   //}
   //  console.log(value);
   //  //do something with value;
   //});
    </script>


<table class="tree table datatable" id="tree2">
    <tr class="heading">
        <td><b>Bay</b></td>
        <td><b>Description</b></td>
        <td><b>Status</b></td>
        <td><b>Driver</b></td>
        <td><b>Carrier</b></td>
        <!--<td><b>Truck</b></td>
        <td><b>Trailer1</b></td>
        <td><b>Trailer2</b></td>-->
        <td><b>Supplier</b></td>
        <td><b>Customer</b></td>
        <td><b>Account</b></td>
        <td><b>Destination</b></td>
        
        
    </tr>

    <?php
    $query = "select distinct trim(bp.ld_bay),trim(bp.bay_desc),trim(LEADING '0' FROM rs.lrcmon_state_status), rs.driver, rs.carrier, rs.supplier, rs.customer, rs.account, rs.destination_no from BayProfile bp, RackStat rs where rs.lrcmon_state_key like 'M%00'
						and rs.lrcmon_state_key = concat('M', bp.ld_bay, '00')";

    $status = array("Igdam Tigdam", "STARTING", "STOPPED", "IDLE", "ACTIVE", "AUTHORIZED", "FLOWING", "ALARM", "COMMERROR", "FAILED", "LOAD START", "LOAD STOP", "DRAINING", "DISABLED", "OPENING", "ONLINE", "OFFLINE", "CARDING_IN", "PRINTING", "PROCESSING", "CUTOFF", "SUSPENDED", "PERMISSIVE", "TRUCKONSCAL", "CANCELLOAD", "CARDPULLED", "PERMISSIVE2", "PERMISSIVE3");
    $result = $mysqli->query($query);
    $ans1 = 1;
    $ans2 = 1;

    //echo $query;
    
    while ($value = mysqli_fetch_array($result)) {
        $ans = $ans1;
        ?>
        <?php echo "<tr class='treegrid-" . $ans1 . " subhead'>"; ?><?php
        $ans1++;
        for ($i = 0; $i < 2; $i++) {
            if ($i == 0) {
                ?>
   
            <td><input value ="<?php echo $value[$i]?>" type="button" id="button"></td>
   
            <!--<td><input  value ="<?php //echo $value[$i]?>" type="button" onclick="window.open('http://192.168.1.40/rcuditto.html', 'newwindow', 'width=500, height=500'); return false;">-->
                                                                
                    
                <?php } else { ?>
                <td><?php echo $value[$i]; ?>                                                        
                </td> 
                <?php }
            ?>
            <?php }
        ?>
        <td><?php echo $status[$value[2]]; ?></td>
        
        <?php 
            
            if($restrictSCADisplay)
            {
                $suppSelected = $value[5];
                $custSelected = $value[6];
                $acctSelected = $value[7];
                
                $queryUSCA = "select tms_uname from TWUserSCA where supplier_num = '$suppSelected' and cust_num = '$custSelected' and acct_num = '$acctSelected'";
       
                //echo $queryAP;
                 //echo "from date is ->".$from_date;
                  //echo "to date is ->".$to_date;
                 $isUserOK = false;
                 $SCAUser = $mysqli_web->query($queryUSCA);
                 if(!$SCAUser)
                 {
                    echo 'Could not run query: ' . mysqli_error();
                 }
                 if(mysqli_num_rows($SCAUser))
                 {
                     while($uvalue = mysqli_fetch_array($SCAUser))
                     {
                        $SCAUname = $uvalue['tms_uname'];
                     
                        if(strcmp($SCAUname, $user) == 0)
                        {
                            $isUserOK = true;
                            for ($i = 3; $i < 9; $i++) { ?>

                               <td><?php echo $value[$i]; ?></td> 

                           <?php }
                        }
                     }
                 }
            }
            else
            {
                for ($i = 3; $i < 9; $i++) { ?>

                    <td><?php echo $value[$i]; ?></td> 

                <?php }
            }
        ?>
        <?php
        
            ?>
            

    </tr>
        
    <?php echo "<tr class='treegrid-" . $ans1 . " treegrid-parent-" . $ans . " presethead'>" ?>
    <?php $ans1++; ?>
    <!-- <tr class="heading">-->
        <td><b>Preset ID</b></td>
        <td><b>Description</b></td>
        <td><b>Status</b></td>
        <td><b>Preset</b></td>
        <td><b>Delivery</b></td>
        <td><b>FlowRate</b></td>
        <td><b>Temperature</b></td>
    </tr>  
        <?php
            $preset = "select distinct trim(pp.ld_ctl),trim(pp.ctl_desc),trim(LEADING '0' FROM rs.lrcmon_state_status), rs.preset_qty, rs.del_qty, rs.flow_rate, rs.temperature
						from PresetProfile pp, BayProfile bp, RackStat rs where rs.lrcmon_state_key = concat('M', '" . $value[0] . "', pp.ld_ctl) and pp.ld_bay = '$value[0]'";

            // echo $preset;
            $result1 = $mysqli->query($preset);
            //print_r($result1);

            while ($value1 = mysqli_fetch_array($result1)) {
                ?>


            <?php echo "<tr class='treegrid-" . $ans1 . " treegrid-parent-" . $ans . " preset'>" ?><?php
            $ans1++;
            //echo count($value1);
            for ($j = 0; $j <= 1; $j++) {
                ?>
                <td><?php echo $value1[$j]; ?></td><?php }
            ?>
            <td><?php echo $status[$value1[2]]; ?></td>
            
            <?php
                if($restrictSCADisplay)
                {
                    if($isUserOK)
                    {
                           ?>
                              <td><?php echo $value1[3]; ?></td>
                              <td><?php echo $value1[4]; ?></td>
                              <td><?php echo $value1[5]; ?></td>
                              <td><?php echo $value1[6]; ?></td>
                           <?php   
                    }
                }
                else
                {
                           ?>
                              <td><?php echo $value1[3]; ?></td>
                              <td><?php echo $value1[4]; ?></td>
                              <td><?php echo $value1[5]; ?></td>
                              <td><?php echo $value1[6]; ?></td>
                           <?php   
                }
                    ?>
                   
                
                
                
            </tr>
             
            <!--<tr class="heading">
                <td><b>Additive ID</b></td>
                <td><b>Description</b></td>
                <td><b>Status</b></td>
            </tr>-->
                <?php
            $meter = "select distinct trim(mp.ld_mtr),trim(mp.mtr_desc),IF(mp.disabled = 'N', 'Enabled', 'Disabled') 
                                                            from MeterProfile mp where mp.ld_bay = '$value[0]' and mp.ld_ctl = '$value1[0]' and mp.ld_mtr like '5%'";

            $result2 = $mysqli->query($meter);

            while ($value2 = mysqli_fetch_array($result2)) {
                $ans2 = $ans1 - 1;
                ?>
                <?php
                echo "<tr class='treegrid-" . $ans1 . " treegrid-parent-" . $ans2 . " additive'>";

                $ans1++;
                for ($k = 0; $k < 2; $k++) {
                    ?>
                    <td><?php echo $value2[$k]; ?></td><?php }
                ?>
                <td><?php echo $value2[2]; ?></td>
                </tr>

                <?php
            }
        }
    }
    ?>
</table>
