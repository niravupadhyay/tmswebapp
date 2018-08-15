<?php

error_reporting(0);
session_start();
//$_SESSION['last_line'] = "";
//--code--set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//--code--include('Net/SSH2.php');

//10.73.5.50
//CN IP 184.149.36.41
//$ssh = new Net_SSH2('10.73.1.50');
//--code--$ssh = new Net_SSH2('184.149.36.41');
//--code--if (!$ssh->login('tms6', 'toptech')) {
//--code--    echo "Cannot able to connect to host";
//--code--    exit('Login Failed');
//--code--}
$search1 = "RAISED";
$search2 = "CLEARED";
//$search3 = "INDICATED";
$search3 = "CONDITION";
$search4 = "ALARM";
$search5 = "Carding";
$search6 = "CARD PULLED!";
$matches = array();

?>
{
"data": [
<?php
//--code--$datestamp = $ssh->exec('/tms6/scripts/GetDateStamp.sh');

//--code--$logdata2 = $ssh->exec('cat /tmp/tracelog.' . trim($datestamp) . '.diff');

//--code--$refractorDiff = $ssh->exec('/tms6/scripts/DiffRefractor.sh');

//--code--$last_timestamp = "";

//--code--$date = date("m/d/y");

//--code--$logs = preg_split("/\\r\\n|\\r|\\n/", $logdata2);

//--code--$file = fopen("AlarmFiles/newalarmlog.txt", "a");
//--code--$resp = "";

$items = array();
//--code--foreach ($logs as $value) {
//--code--    if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {
     
//--code--            $file = file_put_contents('AlarmFiles/newalarmlog.txt', $value. PHP_EOL, FILE_APPEND);
            
//--code--    }

//--code--    }          
//--code--fclose($file);
//--code--$count_alarm = count($items);


//$logdateold = $_GET['logdate'];  


//gettype($logdate);
//$val1 = "------Select------";
//$logdate = $_GET['logdate'];
//if(strcmp($logdate, $val1) > 0 || strcmp($logdate, $val1) < 0 ){
    $logdate = $_GET['logdate'];
//}
//else{
  //  $logdate = "newalarmlog.txt";   
//}

    $read_alarm = @fopen("AlarmFiles/".$logdate, "r");
    
    
    
    
    if ($read_alarm)
    {
        while (!feof($read_alarm)){
            $value = fgets($read_alarm);
                if (strcmp($value, "") !== 0){
                      if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {
     
                     
                            $items[] = $value;
                        }
                    }
                
            }
       fclose($read_alarm);
    }

$i = 0;
$count = count($items);
//echo $count;
?>

<?php

foreach ($items as $value) {

    //$i++;  
    if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {
      if(strpos($value, '[BAY'))
        {
        $date = substr($value, 0, 9);
        $time = substr($value, 8, 16);
        $bay = substr($value, 62, 2);
        $ctl = "-";
        $pos = strpos($value," - ");
        $desc = trim(substr($value,($pos+2)));
        }
        else{
        $date = substr($value, 0, 9);
        $time = substr($value, 8, 16);
        $bay = substr($value, 59, 2);
        $ctl = substr($value, 61, 2);
        $pos = strpos($value," - ");
        
        $desc = trim(substr($value,($pos+2)));   
        }
    
         if (($i == $count - 1)) {
            ?>


            {
            "date":"<?php echo $date ?>",
            "time":"<?php echo $time ?>",
            "bay":"<?php echo $bay ?>",
            "ctl":"<?php echo $ctl ?>",

            "meter":"<?php
            if (is_numeric($meter)) {
                echo $meter;
            } else {
                echo "-";
            }
            ?>",
            "desc":"<?php echo $desc ?>"
            }

            <?php
        } else {
            ?>
            {
            "date":"<?php echo $date ?>",
            "time":"<?php echo $time ?>",
            "bay":"<?php echo $bay ?>",
            "ctl":"<?php echo $ctl ?>",

            "meter":"<?php
            if (is_numeric($meter)) {
                echo $meter;
            } else {
                echo "-";
            }
            ?>",
            "desc":"<?php echo $desc ?>"
            },
            <?php
        }
    }
    else {
        
    }
    $i++;
}

//echo $i;
?>


]
}
