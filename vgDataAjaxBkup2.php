<?php 
include("database_connection_primary.php");

$cargno = $_POST['cargno'];
$vgno = $_POST['vgno'];


                    //$query1="SELECT vg.group_desc, vg.def_supplier, vg.def_cust, vg.def_acct, c.short_cust_name, a.short_acct_name FROM VehicleGroup vg, Customer c, Account a where vg.carrier = '$cargno' and vg.vehicle_group = '$vgno' and vg.rec_type = 'CVG' and vg.term_id = '0000001' and (vg.def_supplier = c.supplier_no and vg.def_cust = c.cust_no) and (vg.def_supplier = a.supplier_no and vg.def_cust = a.cust_no and vg.def_acct = a.acct_no)";
                    $query1="SELECT vg.group_desc, vg.def_supplier, vg.def_cust, vg.def_acct FROM VehicleGroup vg where vg.carrier = '$cargno' and vg.vehicle_group = '$vgno' and vg.rec_type = 'CVG' and vg.term_id = '0000001'";
                    //
//			echo $query1;

                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $vgDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                if(strcmp(trim($value['def_supplier']),"") == 0 || strcmp(trim($value['def_cust']),"") == 0)
                                                {
                                                    $vgDataStr = $value['group_desc'].":::".$value['def_supplier'].":::".$value['def_cust'].":::".$value['def_acct']."::: ::: ";
                                                }
                                                else
                                                {
                                                    $queryCustName = "SELECT short_cust_name from Customer where supplier_no = '".$value['def_supplier']."' and cust_no = '".$value['def_cust']."'";
                                                    $resultCust=$mysqli->query($queryCustName);
                                                    while($valueCust = mysqli_fetch_array($resultCust))
                                                    {
                                                        $vgDataStr = $value['group_desc'].":::".$value['def_supplier'].":::".$value['def_cust'].":::".$value['def_acct'].":::".$valueCust['short_cust_name'];
                                                        if(strcmp(trim($value['def_acct']),"") == 0)
                                                        {
                                                                $vgDataStr = $vgDataStr."::: ";
                                                        }
                                                        else
                                                        {
                                                            $queryAcctName = "SELECT short_acct_name from Account where supplier_no = '".$value['def_supplier']."' and cust_no = '".$value['def_cust']."' and acct_no = '".$value['def_acct']."'";
                                                            $resultAcct=$mysqli->query($queryAcctName);
                                                            while($valueAcct = mysqli_fetch_array($resultAcct))
                                                            {
                                                                $vgDataStr = $vgDataStr.":::".$valueAcct['short_acct_name'];
                                                            }
                                                        }
                                                    }
                                                }
                                                
                                            }
                                            echo $vgDataStr;
?>
