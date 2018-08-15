<?php 
include("database_connection.php");

$acctno = $_POST['acctno'];
$custno = $_POST['custno'];
$suppno = $_POST['supno'];
$prodid = $_POST['prodid'];
$adate = $_POST['adate'];
$adate_format1 = explode( '/', $adate );
$adate_format2 = $adate_format1[2]."/".$adate_format1[1]."/".$adate_format1[0];
$a_date = date('ymd',strtotime($adate_format2));

                    $query1="SELECT eff_date, exp_date, period_days, warning_pct, denial_pct, use_upper_level_pct, daily_flag, daily_limit, daily_lifted, next_day_limit, next_day_action, daily_warning_pct, daily_denial_pct, period_flag, period_limit, period_lifted, next_per_limit, next_per_action, period_warning_pct, period_denial_pct, monthly_flag, monthly_limit, monthly_lifted, next_mon_limit, next_mon_action, month_warning_pct, month_denial_pct, yearly_flag, yearly_limit, yearly_lifted, next_year_limit, next_year_action, year_warning_pct, year_denial_pct FROM Liftings where supplier_no = '$suppno' and cust_no='$custno' and acct_no='$acctno' and rec_type = 'A' and term_id = '0000001' and prod_type = 'P' and prod_id = '$prodid' and key_date = '$a_date'";
//			echo $query1;
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                   ///         $count = 0;
                                            $allocDataStr = "";
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                $allocDataStr = $value['eff_date'].":::".$value['exp_date'].":::".$value['period_days'].":::".$value['warning_pct'].":::".$value['denial_pct'].":::".$value['use_upper_level_pct'].":::".$value['daily_flag'].":::".$value['daily_limit'].":::".$value['daily_lifted'].":::".$value['next_day_limit'].":::".$value['next_day_action'].":::".$value['daily_warning_pct'].":::".$value['daily_denial_pct'].":::".$value['period_flag'].":::".$value['period_limit'].":::".$value['period_lifted'].":::".$value['next_per_limit'].":::".$value['next_per_action'].":::".$value['period_warning_pct'].":::".$value['period_denial_pct'].":::".$value['monthly_flag'].":::".$value['monthly_limit'].":::".$value['monthly_lifted'].":::".$value['next_mon_limit'].":::".$value['next_mon_action'].":::".$value['month_warning_pct'].":::".$value['month_denial_pct'].":::".$value['yearly_flag'].":::".$value['yearly_limit'].":::".$value['yearly_lifted'].":::".$value['next_year_limit'].":::".$value['next_year_action'].":::".$value['year_warning_pct'].":::".$value['year_denial_pct'];
                                                
                                            }
                                            echo $allocDataStr;
?>
