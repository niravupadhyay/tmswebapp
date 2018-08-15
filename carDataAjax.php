<?php 
include("database_connection.php");
$carrno = $_POST['carrno'];


                    $query1="SELECT * FROM Carrier where carr_no = '$carrno'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $carDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $carDataStr = $value['address'].":::".$value['country'].":::".$value['state'].":::".$value['city'].":::".$value['zip'].":::".$value['phone'].":::".$value['truck_req'].":::".$value['trailer_req'].":::".$value['access_from'].":::".$value['access_to'].":::".$value['access_days'].":::".$value['entry_type'].":::".$value['carrier_type'].":::".$value['ins_exp_date'].":::".$value['scac_code'].":::".$value['veh_liab_exp'].":::".$value['veh_liab_amt'].":::".$value['excess_liab_exp'].":::".$value['work_comp_exp']
                                                        .":::".$value['max_load_amt'].":::".$value['general_exp'].":::".$value['cert_no'].":::".$value['st_license'].":::".$value['liab_amt'].":::".$value['locked']
                                                        .":::".$value['lockout_date'];
                                                
                                            }
                                            echo $carDataStr;
?>
