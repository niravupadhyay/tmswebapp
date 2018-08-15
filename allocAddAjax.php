<?php
	session_start();
        error_reporting(0);
	include "database_connection.php";
        
        $supplier = $_POST['selSupplier'];
        $customer = $_POST['selCustomer'];
        $account =  $_POST['selAccount'];
        $prod = $_POST['selProduct'];
        //$account = $_POST['acctno'];
        $adate = $_POST['adate'];
        $a_date_format1 = explode( '/', $adate);
        $a_date_format2 = $a_date_format1[2]."/".$a_date_format1[1]."/".$a_date_format1[0];
        $a_date = date('ymd',strtotime($a_date_format2));
        
        $cmd = $_POST['cmd'];
        
        if(strcmp($cmd, "save") == 0)
        {
            $effdate = $_POST['effdate'];
            $eff_date_format1 = explode( '/', $effdate);
            $eff_date_format2 = $eff_date_format1[2]."/".$eff_date_format1[1]."/".$eff_date_format1[0];
            $eff_date = date('ymd',strtotime($eff_date_format2));
            
            $expdate = $_POST['expdate'];
            $exp_date_format1 = explode( '/', $expdate);
            $exp_date_format2 = $exp_date_format1[2]."/".$exp_date_format1[1]."/".$exp_date_format1[0];
            $exp_date = date('ymd',strtotime($exp_date_format2));
            
            $pdays = $_POST['pdays'];
            $isLWD = $_POST['isLWD'];
            $wpct = $_POST['wpct'];
            $dpct = $_POST['dpct'];
            
            $isDaily = $_POST['isDaily'];
            $dailyLimit = $_POST['dailyLimit'];
            $dailyLifted = $_POST['dailyLifted'];
            $dailyNL = $_POST['dailyNL'];
            $dailyNA = $_POST['dailyNA'];
            $dailyW = $_POST['dailyW'];
            $dailyD = $_POST['dailyD'];
            
            $isPeriod = $_POST['isPeriod'];
            $periodLimit = $_POST['periodLimit'];
            $periodLifted = $_POST['periodLifted'];
            $periodNL = $_POST['periodNL'];
            $periodNA = $_POST['periodNA'];
            $periodW = $_POST['periodW'];
            $periodD = $_POST['periodD'];
            
            $isMonthly = $_POST['isMonthly'];
            $monthlyLimit = $_POST['monthlyLimit'];
            $monthlyLifted = $_POST['monthlyLifted'];
            $monthlyNL = $_POST['monthlyNL'];
            $monthlyNA = $_POST['monthlyNA'];
            $monthlyW = $_POST['monthlyW'];
            $monthlyD = $_POST['monthlyD'];
            
            $isYearly = $_POST['isYearly'];
            $yearlyLimit = $_POST['yearlyLimit'];
            $yearlyLifted = $_POST['yearlyLifted'];
            $yearlyNL = $_POST['yearlyNL'];
            $yearlyNA = $_POST['yearlyNA'];
            $yearlyW = $_POST['yearlyW'];
            $yearlyD = $_POST['yearlyD'];

            
            $chkQuery = "select key_date from Liftings where rec_type = 'A' and term_id = '0000001' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."' and prod_type = 'P' and prod_id = '".$prod."' and key_date = '".$a_date."'";
            $chkResult=$mysqli->query($chkQuery);
            
            if(mysqli_fetch_array($chkResult))
            {
                $query1 = "update Liftings set eff_date = '".$eff_date."', exp_date = '".$exp_date."', use_upper_level_pct = '".$isLWD."', warning_pct = '".$wpct."', denial_pct = '".$dpct."', "
                        ."daily_flag = '".$isDaily."', daily_limit = '".$dailyLimit."', daily_lifted = '".$dailyLifted."', next_day_limit = '".$dailyNL."', next_day_action = '".$dailyNA."', daily_warning_pct = '".$dailyW."', daily_denial_pct = '".$dailyD."', "
                        ."period_flag = '".$isPeriod."', period_limit = '".$periodLimit."', period_lifted = '".$periodLifted."', period_days = '".$pdays."', next_per_limit = '".$periodNL."', next_per_action = '".$periodNA."', period_warning_pct = '".$periodW."', period_denial_pct = '".$periodD."', "
                        ."monthly_flag = '".$isMonthly."', monthly_limit = '".$monthlyLimit."', monthly_lifted = '".$monthlyLifted."', next_mon_limit = '".$monthlyNL."', next_mon_action = '".$monthlyNA."', month_warning_pct = '".$monthlyW."', month_denial_pct = '".$monthlyD."', "
                        ."yearly_flag = '".$isYearly."', yearly_limit = '".$yearlyLimit."', yearly_lifted = '".$yearlyLifted."', next_year_limit = '".$yearlyNL."', next_year_action = '".$yearlyNA."', year_warning_pct = '".$yearlyW."', year_denial_pct = '".$yearlyD."' "
                        ."where rec_type = 'A' and term_id = '0000001' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."' and prod_type = 'P' and prod_id = '".$prod."' and key_date = '".$a_date."'";
            }
            else
            {
                $query1 = "insert into Liftings(rec_type, term_id, supplier_no, cust_no, acct_no, prod_type, prod_id, key_date, eff_Date, exp_date, use_upper_level_pct, warning_pct, denial_pct, daily_flag, daily_limit, daily_lifted, next_day_limit, next_day_action, daily_warning_pct, daily_denial_pct, "
                        . "period_flag, period_limit, period_lifted, period_days, next_per_limit, next_per_action, period_warning_pct, period_denial_pct, "
                        . "monthly_flag, monthly_limit, monthly_lifted, next_mon_limit, next_mon_action, month_warning_pct, month_denial_pct, "
                        . "yearly_flag, yearly_limit, yearly_lifted, next_year_limit, next_year_action, year_warning_pct, year_denial_pct) "
                              . "values ('A', '0000001', '".$supplier."','".$customer."','".$account."','P','".$prod."','".$a_date."','".$eff_date."','".$exp_date."','".$isLWD."','".$wpct."','".$dpct."','".$isDaily."','".$dailyLimit."','".$dailyLifted."','".$dailyNL."','".$dailyNA."','".$dailyW."','".$dailyD."'"
                              . ",'".$isPeriod."','".$periodLimit."','".$periodLifted."','".$pdays."','".$periodNL."','".$periodNA."','".$periodW."','".$periodD."'"
                              . ",'".$isMonthly."','".$monthlyLimit."','".$monthlyLifted."','".$monthlyNL."','".$monthlyNA."','".$monthlyW."','".$monthlyD."'"
                              . ",'".$isYearly."','".$yearlyLimit."','".$yearlyLifted."','".$yearlyNL."','".$yearlyNA."','".$yearlyW."','".$yearlyD."')";
            }
            //echo $query1;

            if (mysqli_query($mysqli, $query1)) {
                echo "Record saved successfully";
            } else {
                echo "Error saving record: " . mysqli_error($conn);
            }
        }
        else if(strcmp($cmd, "remove") == 0)
        {
            $delQuery = "delete from Liftings where rec_type = 'A' and term_id = '0000001' and supplier_no = '".$supplier."' and cust_no = '".$customer."' and acct_no = '".$account."' and prod_type = 'P' and prod_id = '".$prod."' and key_date = '".$a_date."'";
            //echo $delQuery;
            if (mysqli_query($mysqli, $delQuery)) 
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
?>
	
    
