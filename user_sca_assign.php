<?php
	session_start();
	//include "database_connection_web.php";
	if(isset($_SESSION['global']))
	{?>


 <?php include("headerSCANew.php");?>
 
<!-- <script src="js/dataTables.fixedColumns.js"></script>-->
 <script src="js/dataTables.fixedColumns.min.js"></script>
 
 <script src="jquery-ui.min.js"></script>
 <script src="js/jquery-dropdown-widget.js"></script>

 <link rel="stylesheet" href="jquery-ui.css">
 <link rel="stylesheet" href="css/jquery-dropdown-widget.css">
<!-- <link href="css/dataTables.fixedColumns.css">-->
 <link href="css/dataTables.fixedColumns.min.css">
 
 
 <style>
     
    input[type="text"] {
    border-radius: 5px;
    width: 47%;
}
.display{width:auto !important}
r{
   
    font-weight: bolder;
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
    width: 352px !important;
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
<script>
    
    $(document).ready(function() {
//        $("#alert-trans").css("visibility", "hidden");
            $("#load").css({"visibility":"hidden"});
     
        $( "#paging" ).click(function() {	
        
            //var toggleButton = function() {
                //alert("sdsjj");
                
            //}
            $("#loadingDiv").css({"visibility":"visible"});
            //$("#alert-trans").css("visibility", "hidden");
            //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
            //alert("hi");
            //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
            $.ajax({
                type: "POST",
                url: "ajaxUserSCA_Assign.php",
                dataType: 'text',
                cache : false,
                data: $('#usca_viewer').serializeArray(),
                //beforeSend: toggleButton,
                success: function(data) {
                    $("#loadingDiv").css({"visibility":"hidden"});
                    $('<div></div>').appendTo('body')
                        .html('<div><h6>' + data + '</h6></div>')
                        .dialog({
                            modal: true, title: 'Assign Confirmation', zIndex: 10000, autoOpen: true,
                            width: 'auto', resizable: false,
                            buttons: {
                                Ok: function () {
//                                    $("#load").css({"visibility":"visible"});
//                                    $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
                                    $("#loadingDiv").css({"visibility":"visible"});
                                    $.ajax({
                                        type: "POST",
                                        url: "ajaxUserSCAList.php",
                                        dataType: 'html',
                                        cache : false,
                                        data: $('#usca_viewer').serializeArray(),
                                        //beforeSend: toggleButton,
                                        success: function(data) {
                                            //$("#load").css({"visibility":"hidden"});
                                            $("#loadingDiv").css({"visibility":"hidden"});
                                            //console.log(data);
                                            $('#selUSCAListing').html(data);
                                            //initDataTable();
                                            /*$('#example').DataTable( {
                                                "sScrollY": "100%",
                                                "bScrollCollapse": true,
                                                "paging":         true,
                                            });*/
                                            attachClickHandler();
                                        },
                                        error: function(data) {
                                            console.log("error");
                                        }
                                        //"fixedColumns":   true
                                   });
                                    $(this).dialog("close");
                                },
                            },
                            close: function (event, ui) {
                                $(this).remove();
                            }
                      });

                },
                error: function(data) {
                    console.log("error");
                }
                //"fixedColumns":   true
           });
           return false;
   
    });
    
    
    //$( "#seluname" ).change(function() {
    
    
    $( "#selSupplier" ).combobox();
    $( "#selCustomer" ).combobox();
    $( "#seluname" ).combobox();

});

//new code for transprod and transcomp data

</script>

<script>
$(document).ready(function() {
	/*$( "#paging" ).click(function() {
            
	
        $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
        //alert("Transaction generating...");
	$('#example').DataTable( {
		"sScrollY": "100%",
                "bScrollCollapse": true,
		"paging":         true,
		"fixedColumns":   true
	});
    });*/
$.fn.resetForm = function() {
    return this.each(function(){
        this.reset();
    });
}
$( "#refresh" ).click(function() {
    //alert("clear");
	$('#usca_viewer').resetForm();
});
});	
</script>


	<style>
	div.container {
        width: 80%;
    }
	div.dataTables_wrapper {
        width: 95%;
        margin: 0 4px;
    }
    h4, .h4 {
    font-size: 20px;
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
                            document.getElementById("selCustomer").innerHTML = xmlhttp.responseText;
                            $( "#selCustomer" ).val("");
                            $('#selCustomer-input').val("");
                            document.getElementById("selAccount").innerHTML = "";
                            $( "#selAccount" ).val("");
                            
                        }
                        else if(dataLevel === "cust")
                        {
                            document.getElementById("selAccount").innerHTML = xmlhttp.responseText;
                            //$( "#selAccount" ).focus();
                            //$( "#selAccount" ).val("");
                        }
                        //document.getElementById("selCustomer").combobox();
                        $("#loadingDiv").css({"visibility":"hidden"});
                    }
		};
		xmlhttp.open("POST","ajaxUSCA.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                if(dataLevel === "supp")
                {
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("supplier_no="+str);
                }
                else if(dataLevel === "cust")
                {
                    var suppEle = document.getElementById("selSupplier");
                    var suppno = suppEle.options[suppEle.selectedIndex].value;
                    //alert(suppno);
                    $("#loadingDiv").css({"visibility":"visible"});
                    xmlhttp.send("cust_no="+encodeURIComponent(str)+"&supplier_no="+encodeURIComponent(suppno));
                }
		//alert("transaction_viewer.php" Mithunva");
	}
}

function loadUserSCA() {
            //alert( "Handler for called" );
//            var toggleButton = function() {
//                //alert("sdsjj");
//                $("#load").css({"visibility":"visible"});
//                $('#load').html('<images src="images/loading.gif" width="10%"> loading...');
//            }
            $("#loadingDiv").css({"visibility":"visible"});
            //$("#alert-trans").css("visibility", "hidden");
            //$('#load').html('<images src="images/loading.gif" width="10%"> loading...');
            //alert("hi");
            //$("#load").html('<images src="images/loading.gif" width="10%"> loading...');
            $.ajax({
                type: "POST",
                url: "ajaxUserSCAList.php",
                dataType: 'html',
                cache : false,
                data: $('#usca_viewer').serializeArray(),
                //beforeSend: toggleButton,
                success: function(data) {
                    //$("#load").css({"visibility":"hidden"});
                    $("#loadingDiv").css({"visibility":"hidden"});
                    //console.log(data);
                    $('#selUSCAListing').html(data);
                    //initDataTable();
                    /*$('#example').DataTable( {
                        "sScrollY": "100%",
                        "bScrollCollapse": true,
                        "paging":         true,
                    });*/
                    attachClickHandler();
                },
                error: function(data) {
                    console.log("error");
                }
                //"fixedColumns":   true
           });
           //return false;
}

</script>

<div id="loadingDiv">
    <div>
        <h7>Please wait...</h7>
    </div>
</div>

<div class="box col-md-12">
<div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> User Management Screen </h2>

          </div>
            
            
            <div class="box-content2">
            <div id="" class="center" style="">
                <div id="container" class="ap-viewer">
		<!---section---->
		<div>
				
                <form name="usca_viewer" method="post" id="usca_viewer">
                             
                                  
		<table  class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>User ID</td>
					<td>
						<select readonly name="seluname" id="seluname">
						<?php
							//echo "hello";
							//$id = $_GET['id']  ;
                                                        echo "<option name='uname' value=----Select User---->----Select User----</option>";
							$query1="SELECT user_id, nam FROM SYSTEM_USER";
							$result1=$mysqli->query($query1);
                                                        while($value1 = mysqli_fetch_array($result1))
							{
								echo "<option name='uname' value=".$value1["user_id"].">".trim($value1['user_id'])." --- ".trim($value1['nam'])."</option>";
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
                                    <td>Supplier</td><td>
					<select id="selSupplier" name="selSupplier">
					<option name='supp' value=""></option>
					<?php
						//$id = $_GET['id']  ;
						$query3="SELECT supplier_no, short_supplier_name FROM Supplier";
						$result3=$mysqli->query($query3);
                                                //echo "<option></option>";
						while($value3 = mysqli_fetch_array($result3))
						{
							echo "<option name='supp' value='".$value3['supplier_no']." --- ".trim($value3['short_supplier_name'])."'>".$value3['supplier_no']." --- ".trim($value3['short_supplier_name'])."</option>";
						}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Customer</td><td>
					<select name="selCustomer" id="selCustomer">

                                        </select>
					</td>
				</tr>
				<tr>
					<td>Account</td><td>
					<select class="select" name="selaccount[]" id="selAccount" size="7" multiple="multiple">
					
					</select>
					</td>
				</tr>
				
                                <tr>    
                                    <td></td><td><input type="button" name="button" id="paging" value="Assign" onClick="">
                                    <input type="button" name="button" id="refresh" value="Clear" onClick=""></td>
                                    <td id="load"></td>
                                </tr>
                                
                            
		<?php } 
		else
		{
			header("location:index.php");
			session_destroy();
		}?>
		
		</tbody>
		</table>
                                   
            </form>
            
                    
            <hr><hr>
            <hr><hr>
            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-list-alt"></i> User Management Listing </h2>

            </div>
            <hr><hr>
            <hr><hr>
            <hr><hr>
            <div id="selUSCAListing"></div>
        </div>
     </div>
   </div>
  </div>
 </div>
 </div>

		
<?php include("footer.php");?>
