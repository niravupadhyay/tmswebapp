<?php
	session_start();
	include "database_connection_web.php";
	if(isset($_SESSION['global']))
	{
            $user = $_SESSION["user"];
            $restrictSCADisplay = $_SESSION['restrictSCADisplay'];
            
            ?>


 <?php include("header.php");?>
 
    <?php
        
                
   ?>

 <!-- <script src="js/dataTables.fixedColumns.js"></script>-->
<script src="js/dataTables.fixedColumns.min.js"></script>
 
<script src="jquery-ui.min.js"></script>
<script src="js/jquery-dropdown-widget.js"></script>

<link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="css/jquery-dropdown-widget.css">
<!--<link href="css/dataTables.fixedColumns.css">-->
<link href="css/dataTables.fixedColumns.min.css">
 
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
function showData(str,dataLevel)
{
    
    if (str === "") 
    {
	    document.getElementById("sel"+dataLevel).innerHTML = "";
            return;
    }
    else 
    { 
                if (window.XMLHttpRequest) 
                {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
                    var xmlhttp = new XMLHttpRequest();
                }
		else 
		{
		    // code for IE6, IE5
                    var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		xmlhttp.onreadystatechange = function() 
		{
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
                    {
                        if(dataLevel === "supp")
			{
			    
                            suppRecordIndex = document.getElementById("selSupplier").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            document.getElementById("selAccount").innerHTML = "";
                            $('#selCustomer-input').val('');
                            $('#selCustomer').val('');
                            $('#selAccount-input').val('');
                            $('#selAccount').val('');
                            
                            //$('#adate').val('');
			}
                        if(dataLevel === "cust")
			{
			    
                            custRecordIndex = document.getElementById("selCustomer").selectedIndex;
                            //alert(suppRecordIndex);
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            $('#selAccount-input').val('');
                            $('#selAccount').val('');
			}
                        if(dataLevel === "carg")
			{
				
                            carrRecordIndex = document.getElementById("selCarrier").selectedIndex;
                            //alert(xmlhttp.responseText);
                            document.getElementById("selVehicleGroup").innerHTML = xmlhttp.responseText;
                            $('#selVehicleGroup').val('');
                            $('#selVehicleGroup-input').val('');
                            $('#vsx_add').resetForm();
                            
			}
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		//if(dataLevel === "supp")
                //{
			xmlhttp.open("POST","ajax.php", true);
		//}
		//else
		//{		
		//	xmlhttp.open("POST","getAccts.php", true);
		//}
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("supplierx_no="+str);
                }
                else if(dataLevel === "cust")
                {
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppEle.selectedIndex].value;
                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("custx_no="+encodeURIComponent(str)+"&supplierx_no="+encodeURIComponent(suppno));
                }
                else if(dataLevel === "carg")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    //alert(str);
                    xmlhttp.send("cargx_no="+str);
                }
                
	}
}

function loadCSXData()
{
            
            $('#vsx_add').resetForm();
            
	    if($('#selRT-input').val() === "")
            {
                alert("Select Record Type");
                return false;
            }
            if($('#selCarrier-input').val() === "")
            {
                alert("Select Carrier number");
                return false;
            }
            if($('#selVehicleGroup-input').val() === "")
            {
                alert("Select VehicleGroup number");
                return false;
            }
            if($('#selSupplier-input').val() === "")
            {
                alert("Select Supplier number");
                return false;
            }
            
            var rt = ($('#selRT-input').val() === "") ? "VSX" : $('#selRT').val().toString().trim();
            //alert(rt);
            var cargno = $('#selCarrier').val();
            var vgno = $('#selVehicleGroup').val();
            var supno = $('#selSupplier').val();
            
            $("#loadingDiv").css({"visibility":"visible"});
            
            //alert(str);
//            var cargno = document.getElementById('selCarrier').value;
//            var vgno = document.getElementById('selVehicleGroup').value;
            
            //var suppno = suppEle.options[suppEle.selectedIndex].value;
            $.ajax({
                type: "POST",
                url: "ajaxCSX.php",
                dataType: 'text',
                cache : false,
                data: {selRT:rt, selCarrier:cargno, selVG:vgno, selSupplier: supno},
                success: function(data) {
                    $("#loadingDiv").css({"visibility":"hidden"});
                    //alert(data);
                    
                    $('#csxListing').html(data);
                    
                    attachClickHandler();
                    //initDataTable();
                    //attachClickHandler();
                    //$('#remove').prop('disabled', false);
                },
                error: function(data) {
                    console.log("error");
                }
           });
 
}

</script>

<script>
    
   
    $(document).ready(function() {

        $( "#btnGetDetails" ).click(function() {
            
            loadCSXData();
        
        });
        
        function pad_with_zeroes(number, length) {

            var my_string = '' + number;
            while(my_string.length < length) {
                my_string = '0' + my_string;
            }

            return my_string;

        }
        
        
        $( "#paging" ).click(function() {	
        
	    if($('#selRT-input').val() === "")
            {
                alert("Select Record Type");
                return false;
            }
            if($('#selCarrier-input').val() === "")
            {
                alert("Select Carrier number");
                return false;
            }
            if($('#selVehicleGroup-input').val() === "")
            {
                alert("Select VehicleGroup number");
                return false;
            }
            if($('#selSupplier-input').val() === "")
            {
                alert("Select Supplier number");
                return false;
            }
            if($('#selCustomer-input').val() === "")
            {
                alert("Select Customer number");
                return false;
            }
            if($('#selAccount-input').val() === "")
            {
                alert("Select Account number");
                return false;
            }
            
            var supp = $("#selSupplier").val();
            var cust = $("#selCustomer").val();
            var acct = $("#selAccount").val();
            var cargno = $("#selCarrier").val();
            var vgno =  $("#selVehicleGroup").val();
            var rt = ($('#selRT-input').val() === "") ? "VSX" : $('#selRT').val().toString().trim();
            
            $("#loadingDiv").css({"visibility":"visible"});
            //alert(custn);
            $.ajax({
            type: "POST",
            url: "csxAddAjax.php",
            dataType: 'text',
            cache : false,
            data: {rt:rt, cargno: cargno, vgno: vgno, supno: supp, custno: cust, acctno: acct, cmd:'save'},
            //beforeSend: toggleButton,
            success: function(data) {
                //$("#load").css({"visibility":"hidden"});
                $("#loadingDiv").css({"visibility":"hidden"});
                alert(data);
                //$('#remove').prop('disabled', false);
                loadCSXData();
                //$('#selTransactionListing').html(data);
                //initDataTable();
                //attachClickHandler();
            },
            error: function(data) {
                console.log("error");
            }
        });
        return false;
   
});

//$("#selSupplier").change(function(){

  //  showData($("#selSupplier").val());
//});

$( "#selterminal" ).combobox();
$( "#selRT" ).combobox();
$( "#selSupplier" ).combobox();
$( "#selCustomer" ).combobox();
$( "#selAccount" ).combobox();
$( "#selCarrier" ).combobox();
$( "#selVehicleGroup" ).combobox();


});
        
        
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
	$('#vsx_add').resetForm();
});
 

});	
</script>


	<style>
	div.container {
        width: 80%;
    }
	div.dataTables_wrapper {
        width: 95%;
        margin: 0;
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
    background-image:url('images/3.gif');
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
            <h2><i class="glyphicon glyphicon-list-alt"></i> Carrier Supplier Xref </h2>
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
				
                                
                                 
                                  
                        <table class="display" cellspacing="0" width="100%">
    
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
					<td>Record Type</td>
					<td>
                                                <div class="ui-widget">
						<select name="selRT" id="selRT">
                                                    <?php
                                                        //$id = $_GET['id']  ;
                                                    echo "<option name='rtype' value=''></option>";
                                                    echo "<option name='rtype' value='VSE'>VSE --- VSX Exclusion Processing</option>";
                                                    echo "<option name='rtype' value='VSX'>VSX --- VSX Standard Processing</option>";
                                                    
                                                    ?>
						</select>
                                                </div>
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
                                    <td>Carrier</td><td>
                                        <div class="ui-widget">
					<select id="selCarrier" name="selCarrier">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            $query3="SELECT carr_no, name FROM Carrier";
						$result3=$mysqli->query($query3);
                                                echo "<option name='carg'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='carg' value=".$value3['carr_no'].">".$value3['carr_no']." --- ".trim($value3['name'])."</option>";
						}
                                            
					?>
					</select>
                                        </div>
					</td>
				</tr>
				<tr>

					<!--<td>Customer</td><td>
                                        	<input id="selCustomer" name="selCustomer"/>
                                    	</td>-->
                                        <td>Vehicle Group</td><td>
                                        <div class="ui-widget">
					<select name="selVehicleGroup" id="selVehicleGroup">
					
					</select>
                                        </div>
                                        </td>
<!--                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id='lblCustName'></label> </td>-->
<!--					<td> <input type="text" id="custname" name="custname"> </td>-->
                                        
<!--                                    <td>Customer No</td>
                                        <td>
                                            <input type="text" id="custno" name="custno">
					</td>-->
                                        
				</tr>
                                <tr>
                                    <td>Supplier</td><td>
                                        <div class="ui-widget">
					<select id="selSupplier" name="selSupplier">
					<!--<option value=""></option>-->
					<?php
						//$id = $_GET['id']  ;
                                            if($restrictSCADisplay)
                                            {
						$query3="SELECT distinct supplier_num, supp_shrt_name FROM TWUserSCA where tms_uname='$user'";
						$result3=$mysqli_web->query($query3);
                                                echo "<option name='supp'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
                                                    echo "<option name='supp' value=".$value3['supplier_num'].">".$value3['supplier_num']." --- ".trim($value3['supp_shrt_name'])."</option>";
						}
                                            }
                                            else
                                            {
                                                $query3="SELECT supplier_no, short_supplier_name FROM Supplier";
						$result3=$mysqli->query($query3);
                                                echo "<option name='supp'></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='supp' value=".$value3['supplier_no'].">".$value3['supplier_no']." --- ".trim($value3['short_supplier_name'])."</option>";
						}
                                            }
					?>
					</select>
                                        </div>
					</td>
				</tr>
                                <tr>
                                    <td></td>
                                    <td><input type="button" name="button" id="btnGetDetails" value="Get Details" onClick=""></td>
                                </tr>
                                
                                
                                
                            
                        </table>
                         
                        
                        <form name="vsx_add" method="post" id="vsx_add">
            
                        <div class="box-header well">
                            <h2><i class="glyphicon glyphicon-list-alt"></i> Carrier Supplier Xref Add / Update</h2>

                        </div>
                        
                        
                                    
                        <table class="display" cellspacing="0" width="100%">
                            
                                
                                
                                
				<tr>
                                        
                                    
					<td>Customer</td><td>
                                        <div class="ui-widget">
					<select  name="selCustomer" id="selCustomer">
					
					</select>
                                        </div>
					</td>
					
				</tr>
				
                                <tr>
                                        <td>Account</td><td>
                                        <div class="ui-widget">
					<select  name="selAccount" id="selAccount">
					
					</select>
                                        </div>
					</td>
					<!--<td>Account No</td>
                                        <td>
                                            <input type="text" id="acctno" name="acctno">
					</td>-->
					<!--<td>Account</td><td>
                                                <input id="selAccount" name="selAccount"/>
                                        </td>-->
				</tr>
                        
                        
                        
                        
                        
            
                        	
                                <tr>    
                                    <td></td><td>
                                        <!--<input type="button" name="button" id="prev" value="Previous" onClick="">
                                        <input type="button" name="button" id="next" value="Next" onClick="">-->
                                        <input type="button" name="button" id="paging" value="Add" onClick="">
<!--                                        <input type="button" name="button" id="remove" value="Remove" onClick="" disabled="true">-->
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        
                    
                </table>  
                </form>
                
                
                            
		<?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
		
		</tbody>
		</table>
                                   
                <hr><hr>
                <hr><hr>

                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> Carrier Supplier Xref Listing </h2>

                </div>
                <hr><hr>
                <hr><hr>
                <hr><hr>
                <div id="csxListing"></div>
                           
</div>
                                                </div>
                </div>
                </div>
                </div>
    </div>

		
<?php include("footer.php");?>
