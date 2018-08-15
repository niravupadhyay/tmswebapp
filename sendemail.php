<?php


$dtime=date('Y-m-d H-i-s');
$dtimeFile=date('Y-m-d-H-i-s');
$headerTab ="title \t sdnsj\t sjdnjs\n";
$rowRecords='';
$rowRecords .=preg_replace("/\r|\n|\t/"," ",$Col1)."\t".preg_replace("/\r|\n|\t/", " ",$Col2)."\t".preg_replace("/\r|\n|\t/", " ",Col3). "\t\n";
date_default_timezone_set('America/Los_Angeles');
$filename="Your File Name-".$dtimeFile.".xls";
$path='alarm/alarm.txt';
$csv_handler = fopen ($path.$filename,'w');
fwrite ($csv_handler,$headerTab);
fwrite ($csv_handler,$rowRecords);
fclose ($csv_handler);
$file = $path.$filename;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$headers = "From: urvashidave123@gmail.com"."\r\n";
$headers.= "Bcc: bcc@gmail.com"."\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$headers .= "This is a multi-part message in MIME format.\r\n";
$headers .= "--".$uid."\r\n";
$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
//$headers .= $msg."\r\n\r\n";
$headers .= "--".$uid."\r\n";
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$headers .= "Content-Transfer-Encoding: base64\r\n";
$headers .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$headers .= $content."\r\n\r\n";
$headers .= "--".$uid."--"; 

$date=date("Y-m-d");
if(mail("urvashidave123@gmail.com","Mail heading--".$date,$headers)){
    echo "Mailed successfully";
}
else
{
    echo "Mailed couldn't be sent"; 
}

?>