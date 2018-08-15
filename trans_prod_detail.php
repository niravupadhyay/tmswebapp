<?php 
include("database_connection_primary.php");
$transrefno = $_POST['transrefno'];
$index = $_POST['index'];
                    $query1="SELECT tp.prod_id, p.short_name, tp.temperature, tp.grav_density, tp.gross, tp.net, tp.uom, tp.sign, tp.ContainerID FROM TransProducts tp, Product p where tp.trans_ref_no = '$transrefno' AND tp.prod_id = p.prod_id";
                               		$result=$mysqli->query($query1);
                                        //$value = mysqli_fetch_array($result);
                                            $count = 0;
                                            while($value = mysqli_fetch_array($result))
                                            {
                                                //echo "<option>".$value10['MOT']."</option>";
                                                echo "<tr class='product'>";
                                                echo "<td class='compdetail'><b><a id='H".$transrefno."P".$count."'>+Product: </a></b></td><td>".$value['prod_id']."&emsp;</td>";
                                                echo "<td><b>Name: </b></td><td>".$value['short_name']."&emsp;</td>";
                                                echo "<td><b>Temp.: </b></td><td>".$value['temperature']."&emsp;</td>";
                                                echo "<td><b>Gravity: </b></td><td>".$value['grav_density']."&emsp;</td>";
                                                echo "<td><b>Gross: </b></td><td>".$value['gross']."&emsp;</td>";
                                                echo "<td><b>Net: </b></td><td>".$value['net']."&emsp;</td>";
                                                echo "<td><b>UOM: </b></td><td>".$value['uom']."&emsp;</td>";
                                                echo "<td><b>Sign: </b></td><td>".$value['sign']."&emsp;</td>";
                                                echo "<td><b>Container: </b></td><td>".$value['ContainerID']."&emsp;</td>";
                                                /////////////////////////////////////////////
                                                echo "<td>----</td><td>----</td>";
                                                echo "<td>----</td><td>----</td>";
                                                echo "<td>----</td><td>----</td>";
                                                echo "<td>----</td><td>----</td>";
                                                echo "<td>----</td><td>----</td>";
                                                echo "<td>----</td><td>----</td>";
                                                echo "</tr>";
                                                $count++;
                                            }
                                            echo ":::".$count;
?>
