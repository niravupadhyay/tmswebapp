<?php 
$val_level = "";
$total=$_POST['vol_total'];
$response = '{"success": true,"tankLevels":[';
for($level=1;$level<=$total;$level++){
	$val = 'p'.$level;
	$val_level = $_POST[$val];
	if($level < $total)
		$response = $response.'{"level": "'.$val_level.'"},';
	else
		$response = $response.'{"level": "'.$val_level.'"}';
}
$response = $response.']}';
echo $response;
?>

