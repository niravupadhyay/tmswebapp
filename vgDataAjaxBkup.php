<?php 
include("database_connection_primary.php");

$cargno = $_POST['cargno'];
$vgno = $_POST['vgno'];


                    $query1="SELECT vg.group_desc, vg.def_supplier, vg.def_cust, vg.def_acct, c.short_cust_name, a.short_acct_name FROM VehicleGroup vg, Customer c, Account a where vg.carrier = '$cargno' and vg.vehicle_group = '$vgno' and vg.rec_type = 'CVG' and vg.term_id = '0000001' and (vg.def_supplier = c.supplier_no and vg.def_cust = c.cust_no) and (vg.def_supplier = a.supplier_no and vg.def_cust = a.cust_no and vg.def_acct = a.acct_no)";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $vgDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $vgDataStr = $value['group_desc'].":::".$value['def_supplier'].":::".$value['def_cust'].":::".$value['def_acct'].":::".$value['short_cust_name'].":::".$value['short_acct_name'];
                                                
                                            }
                                            echo $vgDataStr;
?>
