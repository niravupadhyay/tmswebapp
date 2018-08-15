<?php

    session_start();
    error_reporting(0);

    //$out_seq_no = $_POST['out_seq_no'];
    
// define some variables
$local_file = "RPT/0595.doc";
$server_file = "/tmp/rpt/0595";

$output = shell_exec('scp tms6@vopakhamilton.dyndns.org:/tmp/rpt/0594 /Applications/XAMPP/htdocs/TMS6/RPT/0594.doc');
echo $output;

?>