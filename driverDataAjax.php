<?php 
include("database_connection.php");
$drno = $_POST['drno'];


                    $query1="SELECT * FROM Driver where driver_no = '$drno'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $drDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $drDataStr = $value['card_no'].":::".$value['card_seq'].":::".$value['license_no'].":::".$value['carrier_no'].":::".$value['def_supplier'].":::".$value['def_cust'].":::".$value['def_acct'].":::".$value['def_destination'].":::".$value['truck_req'].":::".$value['trailer_req'].":::".$value['driver_type'].":::".$value['access_from'].":::".$value['access_to'].":::".$value['access_days'].":::".$value['training_exp'].":::".$value['local_cert_exp1'].":::".$value['local_cert_exp2'].":::".$value['onduty_hrs_exp'].":::".$value['cert_exp']
                                                        .":::".$value['med_exam_exp'].":::".$value['road_test_exp'].":::".$value['review_exp'].":::".$value['inq_agency_exp'].":::".$value['license_no_exp'].":::".$value['pin_required']
                                                        .":::".$value['pin_code'].":::".$value['locked'].":::".$value['lockout_date'].":::".$value['tt_status'].":::".$value['truck_load'].":::".$value['meter_proving'];
                                                
                                            }
                                            echo $drDataStr;
?>
