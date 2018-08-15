<?php

error_reporting(0);
session_start();
//$_SESSION['last_line'] = "";
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');


$ssh = new Net_SSH2('192.168.1.45');
//$ssh = new Net_SSH2('192.168.1.45');
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
{
"data": [
<?php
$datestamp = $ssh->exec('/tms6/scripts/GetDateStamp.sh');

$logdata2 = $ssh->exec('cat /tmp/tracelog.' . trim($datestamp) . '.diff');

$refractorDiff = $ssh->exec('/tms6/scripts/DiffRefractor.sh');

$last_timestamp = "";

$date = date("m/d/y");

$logs = preg_split("/\\r\\n|\\r|\\n/", $logdata2);

$file = fopen("AlarmFiles/newalarmlog.txt", "a");
$resp = "";

$items = array();
foreach ($logs as $value) {
    if (strpos($value, 'ALARM RAISED') || strpos($value, 'ALARM CLEARED') || strpos($value, 'ALARM') || strpos($value, 'alarm') || strpos($value, '*BAY ALARM') || strpos($value, 'FAILED') || strpos($value, 'failed') !== false) {
     
            $file = file_put_contents('AlarmFiles/newalarmlog.txt', $value. PHP_EOL, FILE_APPEND);
            fclose($file);
    }

    }          

////$count_alarm = count($items);



if(isset($logdate)){
    //gettype($logdate);
    $val1 = "------Select------";
    if(strcmp($logdate, $val1) > 0 || strcmp($logdate, $val1) < 0 ){
        $logdate = $_GET['logdate'];
    }
    else{
        $logdate = "newalarmlog.txt"; 
    }
}
 else {
    $logdate = "newalarmlog.txt";
}
    $read_alarm = @fopen("AlarmFiles/".$logdate, "r");
    if ($read_alarm) {
        while (!feof($read_alarm)) {
            $value = fgets($read_alarm);

            if (strcmp($value, "") !== 0) {
                $items[] = $value;
            }
        }
        fclose($read_alarm);
    }

    //print_r($matches);
//}



$i = 0;
$count = count($items);
//echo $count;
?>

<?php

foreach ($items as $value) {

    //$i++;  
    if (strpos($value, 'ALARM RAISED') || strpos($value, 'ALARM CLEARED') !== false) {
        $date = substr($value, 2, 9);
        $time = substr($value, 10, 9);
        $bay = substr($value, 64, 2);
        $ctl = substr($value, 69, 2);
        //$preset =   substr($value, 98,1);
        $meter = substr($value, 106, 1);
        $desc = trim(substr($value, 92, -1));

        if (($i == $count - 1)) {
            ?>


            {
            "date":"<?php echo $date.$logdate; ?>",
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
            "desc":"<?php echo $desc.$logdate ?>"
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
            "desc":"<?php echo $desc.$logdate ?>"
            },
            <?php
        }
    } else if (strpos($value, 'ALARM') || strpos($value, 'alarm') || strpos($value, 'FAILED') || strpos($value, 'failed') || strpos($value, '*BAY ALARM') !== false) {

        if (strpos($value, 'Removing') || strpos($value, 'PRESET:') || strpos($value, 'Matched alarm')) {
            $date = substr($value, 2, 5);
            $time = substr($value, 10, 9);
            $bay = substr($value, 61, 2);
            $ctl = substr($value, 61, 2);
            //$preset =   substr($value, 98,1);
            $meter = substr($value, 106, 1);
            $desc = trim(substr($value, 66, -1));
        } else if (strpos($value, 'ALARM RESET')) {
            $date = substr($value, 2, 9);
            $time = substr($value, 10, 9);
            $bay = substr($value, 64, 2);
            $ctl = substr($value, 67, 2);
            //$preset =   substr($value, 98,1);
            $meter = substr($value, 106, 1);

            $desc = substr($value, 66, 10);
        }
        else if (strpos($value, '*BAY ALARM')) {

            $date = substr($value, 2, 9);
            $time = substr($value, 10, 9);
            $bay = substr($value, 64, 2);
            $ctl = substr($value, 67, 2);
            //$preset =   substr($value, 98,1);
            $meter = substr($value, 106, 1);

            $desc = trim(substr($value, 91, -1));
        } else {


            $date = substr($value, 2, 9);
            $time = substr($value, 10, 9);
            $bay = "-";
            $ctl = substr($value, 67, 2);
            //$preset =   substr($value, 98,1);
            $meter = substr($value, 106, 1);

            $desc = substr($value, 60, 52);
        }
        //echo "value of i is :".$i;
        //echo "value of count is :".($count-1);
        if (($i == $count - 1)) {
            ?>

            {
            "date":"<?php echo $date ?>",
            "time":"<?php echo $time ?>",
            "bay":"<?php echo $bay ?>",
            "ctl":"<?php
            if (is_numeric($ctl)) {
                echo $ctl;
            } else {
                echo "-";
            }
            ?>",
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
            "ctl":"<?php
            if (is_numeric($ctl)) {
                echo $ctl;
            } else {
                echo "-";
            }
            ?>",
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
    $i++;
}

//echo $i;
?>


]
}
<?php


// echo "<h3> PHP List All Session Variables</h3>";
//   foreach ($_SESSION as $key=>$val)
//    echo $key." ".$val."<br/>";




?>
