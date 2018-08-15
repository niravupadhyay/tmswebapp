<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$myfile = '/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt';
//chmod($myfile, 0777);

//$my_file = 'newalarmlog.txt';
$p_date = date('ymd',strtotime("-1 days"));


rename($myfile,'/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/'.$p_date.'.txt');

//$newfile = fopen("/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt", "w");
//$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
//
//
//
//$time=time();
//$file = file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/TMS6/AlarmFiles/newalarmlog.txt", $time. PHP_EOL, FILE_APPEND);

//fclose($newfile);
?>

