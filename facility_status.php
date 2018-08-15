<?php
	session_start();
	include "database_connection_primary.php";
	if(isset($_SESSION['global']))
	{?>
<?php //include("header.php");?>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/fnReloadAjax.js"></script>
<link rel="stylesheet" href="css/jquery.treegrid.css">
<link rel="stylesheet" href="css/datatable.css">
<script type="text/javascript" src="js/jquery.treegrid.js"></script>
  
	<style>
.color-g{
    color:green;
    font-weight:bold;
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
margin-top:1px;
}
.facility{
    height:303px;
}
#tree_length > label{
    margin-left: 49px;
}
.container-f {
    height: 257px;
}
.row1{
    width:auto;
    
}
.container {
    width: 100%;
}
.error1 {
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
}
/*.box-inner{
    min-height: 500px}*/
 </style>
<script>
$(document).ready(function()
{
	$('.tree').treegrid();
	$(".output-success").css("visibility", "hidden");
	var term_id=$("#term_id").val();
    $("#addupdate").click(function()
    {
		$(".output-success").css("visibility", "visible");
		$('.success').css("background", "none");
		$('.output-success').html('<images src="images/loading.gif" width="5%"> loading...');
        $.ajax({
		type: "POST",
		url: "add.php",
		data: $("#frm1").serialize() + "&term_id=" + term_id,
		dataType: "html",
		success: function(data) {
				console.log(data); 
				$(".output-success").css("background-color", "#DFF2BF");
				$(".output-success").css("visibility", "visible");
				$('.output-success').html(data);	
		}
	});
   });
   
   $("#min").click(function()
    {
		if ( $("#toggle").hasClass("glyphicon glyphicon-chevron-up") ) {
			$("#abc").show();
			$("#i1").remove();
	
			
		}
		if ( $("#toggle").hasClass("glyphicon glyphicon-chevron-down") ) {
			$("#abc").hide();
			$("#content").append('<images id="i1" width="99%" height="83%" src="images/tms6.png">');
	
		}
	}	
);
	
	$("#close").click(function()
    {
			$("#abc").show();
			$("#i1").remove();
			$("#content").append('<images id="i1" width="99%" height="83%" src="images/tms6.png">');
	}	
);
});
</script>

<div id="result"></div>
            <div class="row1">
    <div class="box col-md-12">
        <div class="box-inner">
         <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Facility Status</h2>
            <!--<div class="box-icon">-->
              <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-cog"></i></a>-->
              <!--<a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i-->
                <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
              <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-remove"></i></a>-->
            <!--</div>-->
          </div>

            <div class="box-content row1">
            <div class="box-content row1">
              
	
 
  <link rel="stylesheet" href="css/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
	
<body>
		<!---section---->
		
			<div id="container-f" class="facility">
                       
               
                
		<input type="button" id="reload-f" value="Reload">  
                <r id="reloadhere"></r>
                 <b>Terminal:
                 <!--<select disabled="disabled" name="selterminal">-->
                <?php
					$query1="SELECT term_id FROM TerminalProfile";
					$result=$mysqli->query($query1);
					while($value = mysqli_fetch_array($result))
					{
						//echo "<option value=".$value["term_id"].">".$value['term_id']."</option>";
						echo $value['term_id'];
                                        }
				?>
                </select>
         
                <?php
					$query = "select name from TerminalProfile";
					$result = $mysqli->query($query);
					$value = mysqli_fetch_array($result);
					echo " - ".$value['name']."</b>";
                                       // echo "CN Cargoflow"
				?>
<div id="facilityDiv"></div>   
                    
                    
                </div> 
                           
	<?php
        
        }
	else
	{
		header("location:index.php");
		session_destroy();
	}?>
	
            </div></div></div></div></div>
    <?php //include("footer.php");?>
  
<script>
    $( document ).ready( function( $ ) {    
    $("#facilityDiv").html( '<table id="tree" class="display" cellspacing="0" width="100%"></table>' );
     //$('#container-f').html('<images src="images/loading.gif" width="10%"> loading...');


var table = $('#tree').DataTable({
    
     "pageLength": 5, 
     "stateSave": true,
    "ajax": {
        "contentType": "application/json",
        "url": "facility_status_control.php"   
    }, 
    "drawCallback": function( settings ) {
        document.getElementById("reloadhere").innerHTML = "";
      var api = this.api();
 
        // Output the data for the visible rows to the browser's console
      var a = ( api.rows( {page:'current'} ).data());
      $.each(a, function() {
     
  $('#tree').on('draw.dt', function() {
       value2 = 'ALARM';
       value3 = 'FAILED';
       value4 = 'COMMERROR';
       value5 = 'ACTIVE';
       
       var key = Object.keys(this)[6];
      var value = this[key];
if($('#tree:contains("' + value2 + '")'))
{
    $('#tree td:contains("' + value2 + '")').text(value).addClass( "color" );
}
if($('#tree:contains("' + value3 + '")'))
{
    $('#tree td:contains("' + value3 + '")').text(value).addClass( "color" );
}
if($('#tree:contains("' + value4 + '")'))
{
    $('#tree td:contains("' + value4 + '")').text(value).addClass( "color" );
}
if($('#tree:contains("' + value5 + '")'))
{
    $('#tree td:contains("' + value5 + '")').text(value).addClass( "color-g" );
}
  console.log(value);
//  //do something with value;
}); 
});
    },
    "fnInitComplete": function (oSettings, json) {
        document.getElementById("reloadhere").innerHTML = "";
            // $('#container-f').html('Alarm'); 
           // alert("hi");
        },
        "dom": 'Bfrtip',    
        "columns": [
        { "title": "Bay", "data" : "Bay"},
        { "title": "Status", "data" : "Status"},
        { "title": "Name", "data" : "Name"}
    ]
});
//comment

 setInterval( function () {
     //document.getElementById("reloadhere").innerHTML = "<images src='images/loading.gif' width='5%'> loading...";
     table.bStateSave=true;
    table.ajax.reload( null, false ); // user paging is not reset on reload
}, 5000 );


$("#reload-f").click(function(){
    document.getElementById("reloadhere").innerHTML = "<images src='images/loading.gif' width='5%'> loading...";
    table.bStateSave=true;
    table.ajax.reload(null, false); 
});

} );

</script>
