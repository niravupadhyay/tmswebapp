<?php include("database_connection.php");?>

<style>
.color{color:red;font-weight: bold}
.colorf{color:#2FA4E7;font-weight: bold}
.color2{background-color:#A2E47B;font-weight: bold;font-color:white}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
margin-top:1px;
}

.row{
    width:auto;
    min-height:650% !important;
    
}
#reload-f-detail{
    float:right;
}
#tree2{
    width:100%;
}
.container {
    width: 100%;
}
.error1 {
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
}
.box-inner{
    min-height: 500px}
 </style>
 
<!--<script type="text/javascript" src="js/cookie.jquery.json.js"></script>-->
 <script>
    
$(document).ready(function()
{
	// $('#tree2').treegrid();
       
//        $('#tree2').treegrid({
//          'initialState': 'collapsed',
//          'saveState': true
//        });
    
        
        $('#tree2').treegrid({
          //'initialState': 'collapsed',
          'saveState':'true',
          'saveStateMethod':'cookie'
          
        });

        $(".output-success").css("visibility", "hidden");
	var term_id = $("#term_id").val();
   
//       value2 = 'ALARM';
//       value3 = 'FAILED';
//       value4 = 'COMMERROR';
//  
  
$("#tree2 td:contains('ALARM')").each(function(){
      $(this).addClass( "color" );
});

$('#tree2 tr:contains("ACTIVE")').addClass('color2');

$("#tree2 td:contains('FLOWING')").each(function(){
      $(this).addClass( "colorf" );
});
$("#tree2 td:contains('FAILED')").each(function(){
      $(this).addClass( "color" );
});
$("#tree2 td:contains('COMMERROR')").each(function(){
      $(this).addClass( "color" );
});
});

//if($('#tree:contains("' + value2 + '")'))
//{
//    $('#tree td:contains("' + value2 + '")').text().addClass( "color" );
//}
//if($('#tree:contains("' + value3 + '")'))
//{
//    $('#tree td:contains("' + value3 + '")').text().addClass( "color" );
//}
//if($('#tree:contains("' + value4 + '")'))
//{
//    $('#tree td:contains("' + value4 + '")').text().addClass( "color" );
//}
//  console.log(value);
//  //do something with value;
//});
</script>


<table class="tree table datatable" id="tree2">
                                        <tr class="">
                                            <td><b>Bay</b></td>
                                            <td><b>Description</b></td>
                                            <td><b>Status</b></td>
					</tr>
				
				<?php
					$query = "select distinct trim(bp.ld_bay),trim(bp.bay_desc),trim(LEADING '0' FROM rs.lrcmon_state_status) from BayProfile bp, RackStat rs where rs.lrcmon_state_key like 'M%00'
						and rs.lrcmon_state_key = concat('M', bp.ld_bay, '00')";			
					
					$status = array("Igdam Tigdam","STARTING","STOPPED","IDLE","ACTIVE","AUTHORIZED","FLOWING","ALARM","COMMERROR","FAILED","LOAD START","LOAD STOP","DRAINING","DISABLED","OPENING","ONLINE","OFFLINE","CARDING_IN","PRINTING","PROCESSING","CUTOFF","SUSPENDED","PERMISSIVE","TRUCKONSCAL","CANCELLOAD","CARDPULLED","PERMISSIVE2","PERMISSIVE3");
					$result = $mysqli->query($query);
					$ans1=1;
					$ans2=1;

					
					while($value = mysqli_fetch_array($result))
					{
						$ans=$ans1;
					?>
						<?php echo "<tr class='treegrid-".$ans1."'>"; ?><?php
							$ans1++;
							for($i=0;$i<2;$i++)
							{?>
								<td><?php echo $value[$i];?></td><?php
							}?>
							<td><?php echo $status[$value[2]];?></td>
							
						
						</tr><?php
						
						$preset = "select distinct trim(pp.ld_ctl),trim(pp.ctl_desc),trim(LEADING '0' FROM rs.lrcmon_state_status)
						from PresetProfile pp, BayProfile bp, RackStat rs where rs.lrcmon_state_key = concat('M', bp.ld_bay, pp.ld_ctl) and pp.ld_bay = '$value[0]'";	
					
                                                echo $preset;
						$result1 = $mysqli->query($preset);
						
						while($value1 = mysqli_fetch_array($result1))
						{?>
						
							<?php echo "<tr class='treegrid-".$ans1." treegrid-parent-".$ans."'>" ?><?php
                                                        $ans1++;
							for($j=0;$j<2;$j++)
							{?>
								<td><?php echo $value1[$j];?></td><?php
							}?>
							<td><?php echo $status[$value1[2]];?></td>
							
							</tr><?php 
					
                                                        $meter = "select distinct trim(mp.ld_mtr),trim(mp.mtr_desc),IF(mp.disabled = 'N', 'Enabled', 'Disabled') 
                                                            from MeterProfile mp where mp.ld_bay = '$value[0]' and mp.ld_ctl = '$value1[0]' and mp.ld_mtr like '5%'";
					
                                                        $result2 = $mysqli->query($meter);

                                                        while($value2 = mysqli_fetch_array($result2))
                                                        {
                                                                $ans2=$ans1-1;
                                                        ?>
                                                                <?php echo "<tr class='treegrid-".$ans1." treegrid-parent-".$ans2."'>" ;

                                                                        $ans1++;
                                                                        for($k=0;$k<2;$k++)
                                                                        {?>
                                                                                <td><?php echo $value2[$k];?></td><?php
                                                                        }?>
                                                                        <td><?php echo $value2[2];?></td>
                                                                </tr>

                                                        <?php
                                        
                                                        }	
                                                }	
			}	
	
	?>
</table>
</form>	
                            
                            
                     