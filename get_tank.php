<?php

include('database_connection_primary.php');
//$mysqli = new mysqli("localhost", "root","", "tms6data");
error_reporting(0);
$tank_id = $_POST['tank_id'];

$sql= "SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank and ta.tank_id = '$tank_id'";
//echo $sql;
$result = $mysqli->query($sql);
//print_r($result);
  $response = '{"success": true,"tankDetail":[';
  while($value =  mysqli_fetch_assoc($result)){
  $net_inv = $value['net_inv'];
  $gross_inv = $value['gross_inv'];
  $capacity = $value['capacity'];
  $per = ($gross_inv * 100)/($capacity);
  $pro_percentage = round($per, 2);
  $term_id = $value['term_id'];
  $tank_group = $value['tank_group'];
  $prod_id = $value['prod_id'];
  $capacity = $value['capacity'];
  $height = $value['height'];
  $short_name = $value['short_name'];
  $temperature = $value['temperature'];
  $grav_density = $value['grav_density'];
  $net_inv = $value['net_inv'];
  //$gross_inv = $value['gross_inv'];
  
  $response = $response
   .'{"pro_percentage": "'.$pro_percentage.'%","term_id": "'.$term_id.'",'
          . '"tank_group": "'.$tank_group.'","tank_id": "'.$tank_id.'",'
          . '"prod_id": "'.$prod_id.'","capacity": "'.$capacity.'",'
          . '"height": "'.$height.'","short_name": "'.$short_name.'",'
          . '"temperature": "'.$temperature.'","grav_density": "'.$grav_density.'",'
          . '"net_inv": "'.$net_inv.'","gross_inv": "'.$gross_inv.'"}';
}
$response = $response.']}';
echo $response;
?>
