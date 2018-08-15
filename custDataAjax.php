<?php 
include("database_connection.php");
$custno = $_POST['custno'];
$suppno = $_POST['supno'];

                    //--old code--$query1="SELECT * FROM Customer where supplier_no = '$suppno' and cust_no='$custno'";
                    $query1="SELECT cust_name, short_cust_name, name1, name2, addr1, addr2, (select concat(iso_country_code, ' --- ', country_name) FROM Country where iso_country_code = (select country from Customer where supplier_no = '$suppno' and cust_no='$custno')) as 'country', state, city, zip, phone, contact_name, cust_type, locked, lockout_date, eff_date, exp_date FROM Customer where supplier_no = '$suppno' and cust_no='$custno'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $custDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $custDataStr = $value['cust_name'].":::".$value['short_cust_name'].":::".$value['name1'].":::".$value['name2'].":::".$value['addr1'].":::".$value['addr2'].":::".$value['country'].":::".$value['state'].":::".$value['city'].":::".$value['zip'].":::".$value['phone'].":::".$value['contact_name'].":::".$value['cust_type'].":::".$value['locked'].":::".$value['lockout_date'].":::".$value['eff_date'].":::".$value['exp_date'];
                                                
                                            }
                                            echo $custDataStr;
?>
