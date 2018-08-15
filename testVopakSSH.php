<?php
//echo "1";
error_reporting(0);
//echo "1";
//session_start();
//$_SESSION['last_line'] = "";
echo get_include_path();
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//echo "1";
include('Net/SSH2.php');
//echo "1";
//CN IP 184.149.36.41
//$ssh = new Net_SSH2('10.73.5.50');
$ssh = new Net_SSH2('vopakhamilton.dyndns.org');
//echo "1";
if (!$ssh->login('tms6', 'toptech')) {
    echo "Cannot able to connect to host";
    exit('Login Failed');
}
//echo "1";

//$datestamp = $ssh->exec('/tms6/bin/tmsrpt02 f=F0000001.05003 r=E0010 s=0000000000 c=0000000000 +mtd');
$datestamp = $ssh->exec('mylist Param');
echo "###".$datestamp;

?>       
    