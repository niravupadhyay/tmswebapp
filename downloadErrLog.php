<?php

    session_start();
    error_reporting(0);?>

<?php $errfiledate = $_GET['filedate'];
    //$errfiledate =  substr($errlogdate,0, strpos($errlogdate, "."));
// define some variables
$local_file = "ErrLog/errlog".$errfiledate.".txt";
$server_file = "/tms6/log/err/errlog.".$errfiledate;

// set up basic connection

$conn_id = ftp_connect("184.149.36.41");

// login with username and password
$login_result = ftp_login($conn_id, "tms6", "toptech");
ftp_pasv($conn_id, true);
//echo $login_result;
// try to download $server_file and save to $local_file?>

<?php if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {?>
    <a href='<?php echo "$local_file"?>'>Right click to Save As File</a>;
<?php } else {
    echo "File download aborted, close this window and please try again";
}

// close the connection
ftp_close($conn_id);

?>