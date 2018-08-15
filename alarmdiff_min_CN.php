<?php
error_reporting(0);
//session_start();
//$_SESSION['last_line'] = "";
//--code--set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//--code--include('Net/SSH2.php');
//CN IP 10.73.5.50
//--code--$ssh = new Net_SSH2('184.149.36.41');
//$ssh = new Net_SSH2('192.168.1.45');
//--code--if (!$ssh->login('tms6', 'toptech')) {
//--code--    echo "Cannot able to connect to host";
//--code--    exit('Login Failed');
//--code--}

$search1 = "RAISED";
$search2 = "CLEARED";
$search3 = "INDICATED";
$search4 = "ALARM";
$search5 = "Carding";
$search6 = "CARD PULLED!";
$matches = array();

//$handle = @fopen("alarm/alarm.txt", "r");
//if ($handle)
//{
// while (!feof($handle))
// {
// $buffer = fgets($handle);
// if(strpos($buffer,$search1) || strpos($buffer,$search2)||strpos($buffer,$search3) || strpos($buffer,$searchbay) ||strpos($buffer,$search4)|| strpos($buffer,$search5) ||strpos($buffer,$search6) !== FALSE)
//   $matches[] = $buffer;
//}
// fclose($handle);
//}
//show results:
//print_r($matches);
?>

<?php
//$logdata = $ssh->exec('logtail');

//--code--$datestamp = $ssh->exec('/tms6/scripts/GetDateStamp.sh');

//$logdata2 = $ssh->exec('cat /tmp/tracelog.160905.diff');
//--code--$logdata2 = $ssh->exec('cat /tmp/tracelog.' . trim($datestamp) . '.diff');


//--code--$refractorDiff = $ssh->exec('/tms6/scripts/DiffRefractor.sh');
//echo "ikdam".$datestamp."Stikdam"; exit;
// echo 'cat /tmp/tracelog.'.trim($datestamp).'.diff';
// exit;
//--code--$last_timestamp = "";

 //$last_line = $ssh->exec('tail -1 /tmp/tracelog.' . trim($datestamp) . '.diff');
//$_SESSION['last_line'] = $last_line_val;

//--code--$date = date("m/d/y");
//--code--$logs = preg_split("/\\r\\n|\\r|\\n/", $logdata2);

// exit;
 ////sprint_r($logs);


//--code--$file = fopen("/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt", "a");
//--code--$resp = "";

//--code--$items = array();
//--code--foreach ($logs as $value) {
//--code--    if ((strpos($value, $search1) || strpos($value, $search2) || strpos($value, $search3) && strpos($value, $search4)) || (strpos($value, $search5)|| strpos($value, $search6))!== false) {
        //$items[] = $value;
        //fwrite($file,$value);
       // echo "lastline is ->".$last_line;
       // echo "session last line is ->".$_SESSION['last_line'];
        
      // if (strcmp($last_line, $_SESSION['last_line']) == 0) {
        // echo "if ma jay che";
           //session_destroy();
            
      // } else {
         //   echo "else ";
//--code--            $file = file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt', $value. PHP_EOL, FILE_APPEND);
            
            
    //  }
//--code--    }

//--code--}
//--code--fclose($file);
?>