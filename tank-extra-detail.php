<?php 
include("database_connection_primary.php");
$tank = $_POST['tank_id'];
$tank_id = substr($tank, 3);

                    $query1="SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = '$tank_id' and ta.tank_id=tv.tank";
                               		$result=$mysqli->query($query1);
                                        $value = mysqli_fetch_array($result);
                                            
                                            echo "<td class=extra><b>Temperature:  </b></td><td>".$value['temperature']."&emsp;</td>";
                                            //echo "<td class=extra><b>Short Name: </b></td><td>".$value['short_name']."&emsp;</td>";
                                            echo "<td class=extra><b>GravityDensity:  </b></td><td>".$value['grav_density']."&emsp;</td>";
                                            echo "<td class=extra>---</td>";
                                            echo "<td class=extra>---</td>";
					    echo "<td class=extra>---</td>";
					    echo "<td class=extra>---</td>";
                                         

?>

