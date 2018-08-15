<?php   
$ftp_server = "localhost";
$ftp_user = "root";
$ftp_pass = "";
$local_file = 'alarm/alarm.txt';

$matches = array();
$handle = @fopen("alarm/alarm.txt", "r");
?>

{
  "data": [
        <?php
               
            if ($handle)
            {
                 while (!feof($handle))
                {
                      $buffer = fgets($handle);
                      $logs = preg_split("/\\r\\n|\\r|\\n/", $buffer);
                     
                    if (strpos($buffer, 'CLEARED') || strpos($buffer, 'RAISED') || strpos($buffer, 'ALARM')|| strpos($buffer, 'alarm') !== false)        
                    {
                        
                        //$items[] = $value;
                        $matches[] = $buffer;
                    }
                }
                        fclose($handle);
            }
            
        $i= 0;
        $count=count($matches);
        //echo $count;
        
        foreach ($matches as $value)
    {
            
         $i++;  
         if (strpos($value, 'CLEARED') || strpos($value, 'RAISED') || strpos($value, 'ALARM')|| strpos($value, 'alarm') !== false)
        {
             $date = substr($value, 0, 8);
             $time = substr($value,9,15);
             $host = substr($value,34,5);
             $type = substr($value,40,12);
             $alarm_desc = substr($value, 50); 
             
            if(($i == $count))
            {
           ?>
            
            {
                "date":"<?php echo $date?>",
                "time":"<?php echo $time?>",
                "host":"<?php echo $host?>",
                "type":"<?php echo $type?>",
                "alarm":"<?php echo $alarm_desc?>"
            }
            
          <?php
        }
        else
        {
            
            ?>
            {
                "date":"<?php echo $date?>",
                "time":"<?php echo $time?>",
                "host":"<?php echo $host?>",
                "type":"<?php echo $type?>",
                "alarm":"<?php echo $alarm_desc?>"
            },
            
       <?php
       }
     
    }
   
    
  }
  //echo $i;
    ?>
        
    
   ]
}








