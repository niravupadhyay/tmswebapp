<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//error_reporting(0);
include("database_connection.php");
$widget1 = $_POST['value1'];
$widget2 = $_POST['value2'];
$widget3 = $_POST['value3'];

$sql = "update settings set widget1=$widget1,widget2=$widget2,widget3=$widget3";
echo $sql;
$result = $mysqli->query($sql);
print_r($result);

?>

