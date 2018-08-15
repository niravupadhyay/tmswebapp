<?php

    session_start();
    error_reporting(0);

    $transrefno = $_POST['transrefno'];
    //$transrefno = "0010158655";
    
// define some variables
$local_file = "BOL/".$transrefno.".pdf";
$server_file = "/tms6/docs/bol/".$transrefno.".pdf";


//echo get_include_path();
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//echo "1";
include('Net/SSH2.php');
//echo "1";
//CN IP 184.149.36.41
//$ssh = new Net_SSH2('10.73.5.50');
$ssh = new Net_SSH2('10.66.24.2');
//echo "1";
if (!$ssh->login('nupadhyay', 'High4$Low')) {
    echo "Cannot connect to host";
    exit('Login Failed');
}
//echo "1";

//$datestamp = $ssh->exec('/tms6/bin/tmsrpt02 f=F0000001.05003 r=E0010 s=0000000000 c=0000000000 +mtd');
$bolTransfer = $ssh->exec("scp tms6@192.168.0.150:".$server_file." /Applications/XAMPP/htdocs/TMS6/".$local_file);

echo "$local_file";


//------------- FTP style file download code (old code)
// set up basic connection

//$conn_id = ftp_connect("184.149.36.41");
//
//// login with username and password
//$login_result = ftp_login($conn_id, "tms6", "toptech");
//ftp_pasv($conn_id, true);
////echo $login_result;
//// try to download $server_file and save to $local_file
//if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
//    echo "$local_file";
//} else {
//    echo "0";
//}
//
//// close the connection
//ftp_close($conn_id);


?>
