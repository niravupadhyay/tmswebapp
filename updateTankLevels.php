<?php

session_start();
        error_reporting(0);
	include "database_connection_primary.php";

                        $query1 = "SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
                        $result = $mysqli->query($query1);
                        // $value = mysqli_fetch_array($result);
                        //echo $row = (mysqli_num_rows($result));
                        ?>
                        
                                    <?php
                                    $count = 0;
                                    $level = 0;
                                    
                                    $pctString = "";
                                    
                                    $jsonResp = '{"Tanks":[';
                                    
                                    while ($value = mysqli_fetch_array($result)) {
                                        
                                        ?>

                                        <?php 
                                        
                                        ?>
                                        <?php
                                        if ($value) {
                                            $count++;
                                            $level++;
                                            ?>


                                            <?php
                                            
                                            $tank_id = $value['tank_id'];
                                            
                                            $gross_inv = $value['gross_inv'];
                                            $net_inv = $value['net_inv'];
                                            $capacity = $value['capacity'];
                                            $per = ($gross_inv * 100) / ($capacity);
                                            $pro_percentage = round($per, 2);
                                            
                                            //$pctString = $pctString.$pro_percentage.",";
                                            $prod_id = $value['prod_id'];
					    $sname = $value['short_name'];
                                        
                                            $capacity = $value['capacity'];

                                            $gross_inv = $value['gross_inv'];
                                        
                                            $net_inv = $value['net_inv'];

                                            $heel_amt = $value['heel_amt'];

                                            $height = $value['height'];
                                            
                                            
                                            $jsonResp = $jsonResp.'{"TankID":"'.$tank_id.'","TankPct":"'.$pro_percentage.'","ProdID":"'.$prod_id.'","SN":"'.$sname.'","Gross":"'.$gross_inv.'","Net":"'.$net_inv.'","Capacity":"'.$capacity.'","Heel":"'.$heel_amt.'","Height":"'.$height.'"},';
                                            
                                        
                                        }
                                   
                                }
                                
                                $jsonResp = rtrim($jsonResp,',');
                                $jsonResp = $jsonResp.']}';
                                
                                echo $jsonResp;
                                
                                ?>
