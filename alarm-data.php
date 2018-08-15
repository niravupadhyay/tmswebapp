<?php    error_reporting(0);
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');
$ssh = new Net_SSH2('vopakhamilton.dyndns.org');
if (!$ssh->login('tms6', 'toptech')) {
    echo "Cannot able to connect to host";
    exit('Login Failed');
    
}

?>
{
  "data": [
        <?php
        $logdata = $ssh->exec('logtail');
        $date = date("m/d/y");
        $logs = preg_split("/\\r\\n|\\r|\\n/", $logdata);
        //print_r(explode($date,$log,0));
        $resp = "";
       
            $items = array();
            foreach ($logs as $value)
            {
            if (strpos($value, 'PRESET') || strpos($value, 'tvs_opto'))
            {
                $items[] = $value;
            }
        
            }
            //print_r($items);
            
        
        $i= 0;
        $count=count($items);
        //echo $count;
        
        foreach ($items as $value)
    {
            
         $i++;  
         if (strpos($value, 'PRESET') || strpos($value, 'tvs_opto'))
                 {
             $date = substr($value, 0, 8);
             $time = substr($value,9,15);
             $host = substr($value,34,5);
             $type = substr($value,40,15);
             $alarm_desc = substr($value, 50); 
             
            if(($i == $count))
            {
           ?>
            
            [
                "<?php echo $date?>",
                "<?php echo $time?>",
                "<?php echo $host?>",
                "<?php echo $type?>",
                "<?php echo $alarm_desc?>"
            ]
            
          <?php
        }
        else
        {
            
            ?>
            [
                "<?php echo $date?>",
                "<?php echo $time?>",
                "<?php echo $host?>",
                "<?php echo $type?>",
                "<?php echo $alarm_desc?>"
            ],
       <?php
       }
     
    }
   
    
  }
  //echo $i;
    ?>
        
    
   ]
}







