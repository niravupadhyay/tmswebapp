<?php

session_start();
        error_reporting(0);
	include "database_connection_primary.php";

                        $query1 = "SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
                        $result = $mysqli->query($query1);
                        // $value = mysqli_fetch_array($result);
                        //echo $row = (mysqli_num_rows($result));
                        ?>
                        <div id="loadingDiv">
                            <div>
                                <h7>Please wait...</h7>
                            </div>
                        </div>
                        <form id="frmemail" name="frmemail" method="POST">
<!--                            <b> Email To:</b><input name="emailto" class="emailto" id="emailto" type="text">
                            <input type="button" id="send" value="Send"></button>-->
                            <table border="1" width="" id="tank-detail" align="center" name="tank-detail" style="float:left">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tank</th>
                                        <th>Product Id</th>
					<th>Short Name</th>
                                        <th>Capacity</th>
                                        <th>Gross Inv</th>
                                        <!--<th>Net Inv</th>-->
                                        <!--<th>Product Level</th>-->
                                        <th>Heel</th>
                                        <th>Height</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $count = 0;
                                    $level = 0;
                                    $ans1 = 1;
                                    $ans2 = 1;
                                    while ($value = mysqli_fetch_array($result)) {
                                        $ans = $ans1;
                                        ?>

                                        <?php echo "<tr>";
                                        $ans1++;
                                        ?>
                                        <?php
                                        if ($value) {
                                            $count++;
                                            $level++;
                                            ?>


                                            <?php
                                            $gross_inv = $value['gross_inv'];
                                            $net_inv = $value['net_inv'];
                                            $capacity = $value['capacity'];
                                            $per = ($gross_inv * 100) / ($capacity);
                                            $pro_percentage = round($per, 2);
                                            $tank_id = $value['tank_id'];
                                            ?>                                                
                                        <td id="tankIDCol<?php echo $level; ?>" class="details-control"> <a>+<?php echo "T-" . $tank_id; ?></a>

                                        </td>
                                        <td id="tankLevelCol<?php echo $level; ?>">
                                            <div value="<?php echo $tank_id ?>" OnClick="//tank(this);" id="outer<?php echo $count ?>" class="outer" width="50%" style="float:right">
                                                
                                                <b id="outerPCT<?php echo $level; ?>"><?php echo $pro_percentage; ?>%</b>
                                                <?php 
                                                if($pro_percentage == 0)
                                                {   
                                                  ?>
                                                <div id="innertank<?php echo $level; ?>" class="inner" data-progress="0%" style="height:0">
                                                <?php 
                                                }
                                                else
                                                {
                                                ?>
                                                   <div id="innertank<?php echo $level; ?>" class="inner" data-progress="<?php echo $pro_percentage; ?>%">
                                                <?php
                                                }
                                                ?>

                                                   <div></div>
                                                </div> 
                                            </div>
                                                
                                                <script>
                                
                                                    var tankDiv = $('#innertank<?php echo $level; ?>');

                                                    var tankPct = tankDiv.attr("data-progress");
                                                    // alert();
                                                    $(tankDiv).animate({
                                                        height: tankPct
                                                    }, 2500);

                                                </script>
                                        </td>

                                        <td id="prodIDCol<?php echo $level; ?>"><?php echo $value['prod_id']; ?> </td>
					<td id="prodSNCol<?php echo $level; ?>"><?php echo $value['short_name']; ?> </td>
                                        
                                        <td id="tankCapCol<?php echo $level; ?>"><?php echo $value['capacity']; ?></td>

                                        <td id="tankGrossCol<?php echo $level; ?>"><?php echo $value['gross_inv']; ?></td>
                                        
                                        <!--<td id="tankNetCol<?php //echo $level; ?>"><?php //echo $value['net_inv']; ?></td>-->

                                        <!--<td><?php //echo $value['prod_level']; ?> </td>-->
                                        <td id="tankHeelCol<?php echo $level; ?>"><?php echo $value['heel_amt']; ?></td>

                                        <td><?php echo $value['height']; ?></td>




                                        </tr>


                                        <?php }
                                    ?>
                                <?php } ?>

                                </tbody></table>
