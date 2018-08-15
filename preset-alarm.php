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
            if (strpos($value, 'PRESET') || strpos($value, 'ALARM'))
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
         if (strpos($value, 'PRESET'))
                 {
             $date = substr($value, 0, 8);
             $time = substr($value,9,15);
             $bay = substr($value,34,5);
             $ctl = substr($value,40,15);
             $desc = substr($value, 50); 
             
            if(($i == $count))
            {
           ?>
            
            {
                "$date":"<?php echo $date?>",
                "$time":"<?php echo $time?>",
                "$bay":"<?php echo $bay?>",
                "$ctl":"<?php echo $ctl?>",
                "$desc":"<?php echo $desc?>"
            }
            
          <?php
        }
        else
        {
            
            ?>
            {
                "$date":"<?php echo $date?>",
                "$time":"<?php echo $time?>",
                "$bay":"<?php echo $bay?>",
                "$ctl":"<?php echo $ctl?>",
                "$desc":"<?php echo $desc?>"
            },
       <?php
       }
     
    }
   
    
  }
  //echo $i;
    ?>
        
    
   ]
}







