<?php include('database_connection_primary.php');
?>
{
  "data": [
	<?php
					$query = "select distinct trim(bp.ld_bay),trim(bp.bay_desc),trim(LEADING '0' FROM rs.lrcmon_state_status) from BayProfile bp, RackStat rs where rs.lrcmon_state_key like 'M%00'
						and rs.lrcmon_state_key = concat('M', bp.ld_bay, '00')";						
					
					$status = array("Igdam Tigdam","STARTING","STOPPED","IDLE","ACTIVE","AUTHORIZED","FLOWING","ALARM","COMMERROR","FAILED","LOAD START","LOAD STOP","DRAINING","DISABLED","OPENING","ONLINE","OFFLINE","CARDING_IN","PRINTING","PROCESSING","CUTOFF","SUSPENDED","PERMISSIVE","TRUCKONSCAL","CANCELLOAD","CARDPULLED","PERMISSIVE2","PERMISSIVE3");
					$result = $mysqli->query($query);
                                        $ans1=1;
					$ans2=1;
					$count =0;				
					while($value = mysqli_fetch_array($result))
					{
                                            $count++;
                                           $items = array();
                                           $items[] = $value;
                                           $total= mysqli_num_rows($result);
                                           
                                         if($count == $total){
                                                     $ans=$ans1;
					
							$ans1++;
							?>
								
                                                        
							 <?php $rackstatus = $status[$value[2]];?> 
                                                          {
                                                            "Bay":"<?php echo $value[0];?>",
                                                            "Status":"<?php echo $rackstatus?>",
                                                            "Name":"<?php echo $value[1];?>"
                                                            
                                                          }
                                        <?php }
                                        else
                                        {
                                           
                                                       $ans=$ans1;
					
							$ans1++;
							?>
								
                                                        
							 <?php $rackstatus = $status[$value[2]];?> 
                                                          {
                                                            "Bay":"<?php echo $value[0];?>",                                                            
                                                            "Status":"<?php echo $rackstatus?>",
                                                            "Name":"<?php echo $value[1];?>"
                                                            
                                                          },
					
                                        <?php }}?>
                                        
                                        
                                  
 
   ]
}
