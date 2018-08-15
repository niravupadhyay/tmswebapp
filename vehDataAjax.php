<?php 
include("database_connection.php");
$carrno = $_POST['carrno'];
$vehno = $_POST['vehno'];

                    $query1="SELECT * FROM Vehicle where carrier = '$carrno' and vehicle_id='$vehno'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $vehDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $vehDataStr = $value['country'].":::".$value['state'].":::".$value['license_plate'].":::".$value['cert_no'].":::".$value['cert_date'].":::".$value['cert_exp'].":::".$value['ins_no'].":::".$value['ins_date'].":::".$value['ins_exp'].":::".$value['locked'].":::".$value['lockout_date'].":::".$value['hm183_exp'].":::".$value['hm183_exp2'].":::".$value['hm183_exp3'].":::".$value['hm183_exp4'].":::".$value['local_exp1'].":::".$value['local_exp2'].":::".$value['overweight_exp'].":::".$value['no_compartments']
                                                        .":::".$value['size_A1'].":::".$value['size_A2'].":::".$value['size_A3'].":::".$value['size_A4'].":::".$value['size_A5'].":::".$value['size_A6']
                                                        .":::".$value['size_A7'].":::".$value['size_A8'].":::".$value['size_A9'].":::".$value['size_A10'].":::".$value['size_A11'].":::".$value['size_A12']
                                                        .":::".$value['veh_type'];
                                                
                                            }
                                            echo $vehDataStr;
?>
