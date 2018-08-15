<?php 
include("database_connection.php");

$acctno = $_POST['acctno'];
$custno = $_POST['custno'];
$suppno = $_POST['supno'];

                    $query1="SELECT acct_name, short_acct_name, name1, name2, addr1, addr2, (select concat(iso_country_code, ' --- ', country_name) FROM Country where iso_country_code = (select country from Account where supplier_no = '$suppno' and cust_no='$custno' and acct_no='$acctno')) as 'country', state, city, zip, phone, contact_name, acct_type, locked, lockout_date, eff_date, exp_date FROM Account where supplier_no = '$suppno' and cust_no='$custno' and acct_no='$acctno'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $acctDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $acctDataStr = $value['acct_name'].":::".$value['short_acct_name'].":::".$value['name1'].":::".$value['name2'].":::".$value['addr1'].":::".$value['addr2'].":::".$value['country'].":::".$value['state'].":::".$value['city'].":::".$value['zip'].":::".$value['phone'].":::".$value['contact_name'].":::".$value['acct_type'].":::".$value['locked'].":::".$value['lockout_date'].":::".$value['eff_date'].":::".$value['exp_date'];
                                                
                                            }
                                            echo $acctDataStr;
?>
