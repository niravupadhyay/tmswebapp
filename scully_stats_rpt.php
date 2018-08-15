<?php
	session_start();
	include "database_connection_web_3.php";
	
            ?>


 <?php include("header_3.php");?>
 
    <?php
        
                
   ?>

 <link href="css/dataTables.fixedColumns.css">
 <link href="css/dataTables.fixedColumns.min.css">
 <script src="js/dataTables.fixedColumns.js"></script>
 <script src="js/dataTables.fixedColumns.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget-vg.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="css/jquery-dropdown-widget.css">
 
 <style>
    
.display{width:auto !important}
r{
   
    font-weight: bolder;
}
.product{
    background-color: #E5E4E2 !important;
}
.comp{
    background-color: #F5F5DC !important;
}
.red{
    font-color:red;
    font-weight: 2px;
    font-weight: bolder;
}
h1, .h1, h2, .h2, h3, .h3 {
    margin-bottom: -19px;
    margin-top: -28px;
}
.alert-trans{
    border:2px solid red;
}
select {
    background-color: #fff;
    border-radius: 4px;
    width: 200px !important;
}
inputtext {
    background-color: #fff;
    border-radius: 4px;
    width: 370px !important;
}
input, button, select, textarea {
    line-height: normal;
}
.right {
    background: #f5f5f5 none repeat scroll 0 0;
    float: right;
    /*margin-right: 200px;*/
    margin-top: 31px;
}
a {
    cursor: pointer;
}
.ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        }
</style>


<script>


</script>

<script>
    
   
    $(document).ready(function() {

        
        $( "#btnGetDetails" ).click(function() {
            
            if($('#scdate').val() === "" || !isDate($('#scdate').val()))
            {
                alert("Input valid allocation date");
                return false;
            }
        
            $("#loadingDiv").css({"visibility":"visible"});
            
            //alert(str);
            var bayno = document.getElementById('selBay').value;
            
            var carno = document.getElementById('selCar').value;
            
            var scdate = $('#scdate').val();
            
            //alert(bayno + ":::" + scdate);
            
            //var suppno = suppEle.options[suppEle.selectedIndex].value;
            $.ajax({
                type: "POST",
                url: "scully_detail.php",
                dataType: 'html',
                cache : false,
                data: ({scdate:scdate, bayno:bayno, carno:carno}),
                success: function(data) {
                    $("#loadingDiv").css({"visibility":"hidden"});
                    //console.log(data);
                    $('#selAPListing').html(data);
//                    if(data.toString().indexOf(":::") === -1)
//                    {
//                        alert("No Scully Hit record found for criterias specified !");
//                        return;
//                    }
//                    
//                    var scData = data.split(":::");
//
//                    $("#txtDrCntErr").val(scData[0]);
//                    $("#txtDrDiscntErr").val(scData[1]);
//                    $("#txtScOvrFlErr").val(scData[2]);
                },
                error: function(data) {
                    console.log("error");
                }
            });
        
        });
        
        function pad_with_zeroes(number, length) {

            var my_string = '' + number;
            while(my_string.length < length) {
                my_string = '0' + my_string;
            }

            return my_string;

        }
        
        
        

//$("#selSupplier").change(function(){

  //  showData($("#selSupplier").val());
//});
$( "#selterminal" ).combobox();
$( "#selBay" ).combobox();


});

function isDate(txtDate)
{
    var currVal = txtDate;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    
    if (dtArray == null) 
        return false;
    
    //Checks for mm/dd/yyyy format.
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5];        
    
    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    return true;
}
        
</script>
    
<script>
$(document).ready(function() {

$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
}
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#vg_add').resetForm();
});
 

});	
</script>


	<style>
	div.container {
        width: 80%;
    }
	div.dataTables_wrapper {
        width: 95%;
        margin: 0 auto;
    }
    h4, .h4 {
    font-size: 20px;
}

#loadingDiv{
    position:fixed;
    visibility:hidden;
    top:0px;
    right:0px;
    width:100%;
    height:100%;
    background-color:#666;
    background-image:url('http://loadinggif.com/images/image-selection/3.gif');
    background-repeat:no-repeat;
    background-position:center;
    z-index:10000000;
    opacity: 0.4;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}
</style>

<div id="loadingDiv">
    <div>
        <h7>Please wait...</h7>
    </div>
</div>

<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Scully Report Criteria </h2>
<!--            <div class="box-icon">
              <a href="#" class="btn btn-setting btn-round btn-default"><i
                class="glyphicon glyphicon-cog"></i></a>
              <a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i
                class="glyphicon glyphicon-chevron-up"></i></a>
              <a href="#" class="btn btn-close btn-round btn-default"><i
                class="glyphicon glyphicon-remove"></i></a>
            </div>-->
          </div>
            
            
            <div class="box-content2">
            <div id="" class="center" style="">
                <div id="container" class="trans-viewer">
		<!---section---->
			<div>
				
                                
                                 
                                  
                        <table  class="display" cellspacing="0" width="100%">
    
                                <tr>
					<td>Terminal</td>
					<td>
						<select readonly disabled="disabled" name="selterminal" id="selterminal">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
							$query1="SELECT term_id, name FROM TerminalProfile";
							$result1=$mysqli->query($query1);
                                                        while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option value=".$value1["term_id"].">".$value1['term_id']." --- ".trim($value1['name'])."</option>";
							}
						?>
						</select>
					</td>
					<td width="50px"></td>
					<td>
						<?php
//						$query2= "select name from TerminalProfile";
//						$result2 = $mysqli->query($query2);
//						$value2 = mysqli_fetch_array($result2);
//						echo $value2['name'];
						?>
					</td>
				</tr>
				
                                <tr>
                                    <td>Bay</td><td>
                                        <div class="ui-widget">
					<select id="selBay" name="selBay">
					<option value="AB">All Bays</option>
					<?php
						//$id = $_GET['id']  ;
                                            $query3="SELECT ld_bay, bay_desc from BayProfile";
					    $result3=$mysqli->query($query3);
                                            
                                            while($value3 = mysqli_fetch_array($result3))
                                            {
                                                echo "<option name='baydesc' value=".$value3['ld_bay'].">".$value3['ld_bay']." --- ".trim($value3['bay_desc'])."</option>";
                                            }
                                            
					?>
					</select>
                                        </div>
					</td>
				</tr>
                                
                                <tr>
                                    <td>Carrier</td><td>
                                        <div class="ui-widget">
					<select id="selCarrier" name="selCarrier">
					<option value="AC">All Carriers</option>
					<?php
						//$id = $_GET['id']  ;
                                            $query3="SELECT carr_no, name FROM Carrier";
						$result3=$mysqli->query($query3);
                                                //echo "<option name='car'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='selCar' value=".$value3['carr_no'].">".$value3['carr_no']." --- ".trim($value3['name'])."</option>";
						}
                                            
					?>
					</select>
                                        </div>
					</td>
				</tr>
                                
                                <tr>
                                    <td>Date</td>                                        
					<td>
					        <input type="text" name="scdate" data-role="popup" value="<?php echo $var=date("d/m/Y");?>" id="scdate" class="tcal required" maxlength="10"/>
                                	</td>
                                        
				</tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="button" name="btnGetDetails" id="btnGetDetails" value="Get Scully Hit Details" onClick=""></td>
                                </tr>
                                
                            
                        </table>
                         
                        
                        <form name="vg_add" method="post" id="vg_add">
            
                        <div class="box-header well">
                            <h2><i class="glyphicon glyphicon-list-alt"></i> Scully Hit Statistics</h2>

                        </div>
                        
                        <div id="selAPListing"></div>
                                    
<!--                        <table class="display" cellspacing="0" width="100%">
                            
                                <tr>
                                    <td><b>No. of Driver Connect Errors</b></td>
                                     
                                    <td>
                                        <input type="text" id="txtDrCntErr" name="txtDrCntErr" maxlength="40" readonly="readonly">
				    </td>
                                      
				</tr>
                                
                                <tr>
                                    <td><b>No. of Driver Disconnect Errors</b></td>
                                     
                                    <td>
                                        <input type="text" id="txtDrDiscntErr" name="txtDrDiscntErr" maxlength="40" readonly="readonly">
				    </td>
                                      
				</tr>
                                
                                <tr>
                                    <td><b>No. of Overfill Scully Events</b></td>
                                     
                                    <td>
                                        <input type="text" id="txtScOvrFlErr" name="txtScOvrFlErr" maxlength="40" readonly="readonly">
				    </td>
                                      
				</tr>
                                
                                
                        
                    
                </table>  -->
                </form>            
		
		</tbody>
		</table>
                                   
        
                           
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>
