<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');

include('Net/SSH2.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "New1";
$ssh = new Net_SSH2('vopakhamilton.dyndns.org');
if (!$ssh->login('tms6', 'toptech')) {
    exit('Login Failed');
}

//while(1)
//{
    $logdata = $ssh->exec('logtail');
    $logs = explode("05/18/16",$logdata);
    $resp = "";
    foreach ($logs as $value)
    {
        if(strpos($value, 'unitmtl') !== false)
        {
           // $resp = $resp."<br/>".$value;
            
        echo "<br/>";
        echo($value);
        
        }
    }
//}
//echo $ssh->exec('ls -la');
  //  echo $resp;
?>
