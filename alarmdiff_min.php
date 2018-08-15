<?php
error_reporting(0);
//session_start();
//$_SESSION['last_line'] = "";
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');
//CN IP 184.149.36.41
//$ssh = new Net_SSH2('10.73.5.50');
$ssh = new Net_SSH2('192.168.1.45');
if (!$ssh->login('tms6', 'toptech')) {
    echo "Cannot able to connect to host";
    exit('Login Failed');
}

$search1 = "ALARM RAISED";
$search2 = "ALARM CLEARED";
$searchbay = "*BAY ALARM";
$search3 = "alarm";
$search4 = "ALARM";
$search5 = "FAILED";
$search6 = "failed";
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

$datestamp = $ssh->exec('/tms6/scripts/GetDateStamp.sh');

//$logdata2 = $ssh->exec('cat /tmp/tracelog.160905.diff');
$logdata2 = $ssh->exec('cat /tmp/tracelog.' . trim($datestamp) . '.diff');


$refractorDiff = $ssh->exec('/tms6/scripts/DiffRefractor.sh');
//echo "ikdam".$datestamp."Stikdam"; exit;
// echo 'cat /tmp/tracelog.'.trim($datestamp).'.diff';
// exit;
$last_timestamp = "";

 //$last_line = $ssh->exec('tail -1 /tmp/tracelog.' . trim($datestamp) . '.diff');
//$_SESSION['last_line'] = $last_line_val;

$date = date("m/d/y");
$logs = preg_split("/\\r\\n|\\r|\\n/", $logdata2);

// exit;
 ////sprint_r($logs);


$file = fopen("/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt", "a");
$resp = "";

$items = array();
foreach ($logs as $value) {
    if (strpos($value, 'ALARM RAISED') || strpos($value, 'ALARM CLEARED') || strpos($value, 'ALARM') || strpos($value, 'alarm') || strpos($value, '*BAY ALARM') || strpos($value, 'FAILED') || strpos($value, 'failed') !== false) {
        //$items[] = $value;
        //fwrite($file,$value);
       // echo "lastline is ->".$last_line;
       // echo "session last line is ->".$_SESSION['last_line'];
        
      // if (strcmp($last_line, $_SESSION['last_line']) == 0) {
        // echo "if ma jay che";
           //session_destroy();
            
      // } else {
         //   echo "else ";
            $file = file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt', $value. PHP_EOL, FILE_APPEND);
            fclose($file);
            
            
    //  }
    }

}          
    