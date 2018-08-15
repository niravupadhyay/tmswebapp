<?php session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>
<link href="css/jquery.dataTables.css" rel="stylesheet">
<link href="css/buttons.dataTables.css" rel="stylesheet">



<?php include("header.php");?>
<style>
/*    .dataTables_wrapper::after {
    min-height: 200px;
}*/
/*table.dataTable thead th, table.dataTable thead td{
    padding: 8px 0;
}*/
/*table.dataTable thead th, table.dataTable tbody td {
  padding: 7px 0px !important;
}*/
table.dataTable tbody th, table.dataTable tbody td {
    padding: 1px 22px;
}
.dataTables_empty{
    color:green;
    font-weight:bold;
}
.color{color:red}
.colorw{color:#DAA520}
  .clear{color:green}
       .col-md-11 {
        width: 100%;
    }
.alert-trans{
    border:2px;
}
/*    .alarm{
        min-height:200px;
    }*/
    .dataTable {
        background:#F0F0F0;
    }
    .skill {
        float: left;
    }
    .tanktable {
        float: left;
    }
   .tank-detail {
    min-height: 600px;
    margin-left: 0;
}
    .error {
        border-color: red;
    }
    .ui-datepicker-calendar {
        display: none;
    }
    .title {
        visibility: hidden;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 3px 40px;
}
    .panel-wrapper {
        padding: 0 40px !important;
        position: relative;
    }
    h1,
    .h1,    
    h2,
    .h2,
    h3,
    .h3 {
        margin-top: 0px !important;
        margin-bottom: -27px;
    }
    input[type="text"] {
    border-radius: 5px;
    width: 15%;
}
    table td,
    table th {
        padding: 6px 10px;
        text-align: center;
    }
    table {
        background-color: transparent;
        font-size: 13px;
        margin-left: 1%; 
        width: 18%;
    }
    .outer {
        width: 150px;
        height: 34px;
        border: 2px solid #ccc;
        overflow: hidden;
        position: relative;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }
    .outer2 {
        width: 80%;
        height: 140px;
        border: 2px solid #ccc;
        overflow: hidden;
        position: relative;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }
    .inner,
    .inner div {
        width: 100%;
        overflow: hidden;
        left: -2px;
        position: absolute;
    }
    .inner {
        border: 2px solid black;
        border-top-width: 0;
        background-color: #2FA4E7;
        bottom: 0;
        height: 100%;
    }
    .inner div {
        border: 2px solid #7CB5EC;
        border-bottom-width: 0;
        background-color: #2FA4E7;
        top: 0;
        width: 100%;
        height: 5px;
    }
	p {
    margin: 0 0 -17px;
	}
    .ui-dialog { 
        position: absolute;
        padding: .2em;
        /*width: 465px !important;*/
        overflow: hidden;
    }
    b, strong {
    font-weight: bold;
}
.tank-detail{
    margin-left: 0px;
    
}
h7{
    color: #317eac;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 500;
    line-height: 1.1;
}
a {
    cursor: pointer;
}
</style>

<div class="box col-md-12">
        <div class="box-inner def">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Alarm List</h2>
<!--            <div class="box-icon">
              <a href="#" class="btn btn-setting btn-round btn-default"><i
                class="glyphicon glyphicon-cog"></i></a>
              <a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i
                class="glyphicon glyphicon-chevron-up"></i></a>
              <a href="#" class="btn btn-close btn-round btn-default"><i
                class="glyphicon glyphicon-remove"></i></a>
            </div>-->
          </div>
            
            
            <div class="box-content">
            <div id="" class="center" style="">
                <div id="container" class="tank-detail">
                    <select id="logdate" name="logdate">
                        <option id="newalarmlog.txt"><?php echo date('y/m/d');?></option>
                        <?php 
                            $files = array_diff( scandir("AlarmFiles"), array(".", "..","newalarmlog","") );
                            
                            rsort($files);
                            foreach($files as $file)
                                { 
                                 
                                    $name =  substr($file,0, strpos($file, "."));
                                    $chop = chop($name,"newalarmlog");
                                    $chunks = str_split($chop, 2);
                                    //$sort = print_r($chunks[2]);
                                    //$sorted = sort($sort);
                                   // print_r(array_filter($chunks));
                                    
                                    //Convert array to string.  Each element separated by the given separator.
                                    $result = implode('/', $chunks);
                                    echo '<option id='.$file.'>'.$result.'</option>';
                                } 
                        ?>
                        
                        
                    </select>  
                    &nbsp;
                    <input type="button" id="reload-detail" value="Reload">&nbsp;
<!--                    <input type="button" id="errlogdwnld" value="Download Error Log">&nbsp;-->
                    <a id='errlogdwnld' target='_blank'>Download Error Log</a>
                      
                    
                   
<!--                    Email To:<input type="text" id="txt-email" value="">
                    <div id="data"></div>
                    <input type="button" id="email" value="send">-->
<!--                    <b>Select Alarm:</b>   <select name="alarm_type" id="alarm_type"><option>-</option><option>All</option><option>Meter</option><option>Bay</option><option>Preset</option></select>
                    <b class="container2"></b>-->
                    <div id="tableDiv"></div>                   
<!--<table id="alarm-detail" class="display" width="90%" cellspacing="0">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Hostname</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
</table>-->
    
               

<script src="js/fnReloadAjax.js"></script>
<script>
//    $(document).ready(function() {
//    
//      $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');  
//     //$(".sorting_asc").html("Alarm");
//     //$(".sorting_asc").css("visibility", "hidden");
//    var table = $('#alarm-detail').DataTable( {
//        "fnInitComplete": function (oSettings, json) {
//             $('.container2').html('Alarm'); 
//        },
//         dom: 'Bfrtip',
//        buttons: [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],
//        "columnDefs": [{
//        "defaultContent": "-",
//        "targets": "_all"
//      }],
//        "aLengthMenu": [[20, 25, 50, 100], ["20 Per Page", "25 Per Page", "50 Per Page", "100 Per Page"]]
//       // "ajax": 'alarm_data_detail.php'
//} );
//

 
$( document ).ready( function( $ ) {
    
    //$('option[id="newalarmlog.txt"]').hide();
    var logdate = "";
    logdate = $('#logdate').attr("id");
   // alert(logdate);
    someFunction();
     
    function someFunction() {

        //table.ajax.reload();
//        $.ajax({
//        url: 'alarm_data_detail.php',
//        type: 'GET',
//        data: { logdate: logdate} ,
//        //contentType: 'application/json; charset=utf-8',
//        success: function (data) {
//            alert(data);
//             
//            //your success code
//        },
//        error: function () {
//            //your error code
//        }
//    }); 
   
    logdate = $('#logdate :selected').text();
    var filedate = logdate.replace(/\//g,'');
    $("#errlogdwnld").attr('href', "ErrLog.php?filedate="+filedate+".txt");
    
    $("#tableDiv").html( '<table id="alarm-detail" class="display" cellspacing="0" width="100%"></table>' );
     $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//        $.ajax({
//                "url": 'alarm_data_detail.php',
//                "dataType": "json",
//                "success": function(json) {
//                    var table = $('#alarm-detail').dataTable( json );
//                    $('.container2').html('All Alarm');
//                    
//                }
//          
//             } );

var table = $('#alarm-detail').DataTable({
    "fnInitComplete": function (oSettings, json) {
             $('.container2').html('Alarm'); 
        },
        "language": {
        "emptyTable":     "There is no ALARM generated."
    },
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
//	      'copy'
        ],
        "pageLength": 10,
        "bProcessing" : true,
        "bDestroy" : true,
        "bSort" : true,
        "order": [[ 1, "desc" ]],
       
        
        "drawCallback": function( data,settings ) {
        var htmlString = $( this ).html();
  $( '#data' ).text( htmlString );
  
//  $('#email').click(function (event) {
//           var email = document.getElementById('txt-email').value;
//  
//      event.preventDefault();
//       $.ajax({
//           url: "email.php",
//           type: "POST",
//           dataType : 'html',
//           data:'email='+email+'&data='+htmlString,
//           
//           success: function(result){
//                alert(result);
//    }});
//  });
      var api = this.api();
 
        // Output the data for the visible rows to the browser's console
      var a = ( api.rows( {page:'current'} ).data());
      $.each(a, function() {
      
  
  $('#alarm-detail').on('draw.dt', function() { 
       value2 = 'RAISED';
       value22 = 'INDICATED';
       value222 = 'FAILURE';
       value232 = 'CLEARED';
       var key = Object.keys(this)[6];
        var value = this[key];
        if($('#alarm-detail:contains("' + value2 + '")'))
        {
            $('#alarm-detail td:contains("' + value2 + '")').text(value).addClass( "color" );
        }
	if($('#alarm-detail:contains("' + value22 + '")'))
        {
            $('#alarm-detail td:contains("' + value22 + '")').text(value).addClass( "colorw" );
        }
	if($('#alarm-detail:contains("' + value222 + '")'))
        {
            $('#alarm-detail td:contains("' + value222 + '")').text(value).addClass( "color" );
        }
	if($('#alarm-detail:contains("' + value232 + '")'))
        {
            $('#alarm-detail td:contains("' + value232 + '")').text(value).addClass( "clear" );
        }
        console.log(key);

//  //do something with value;
}); 
});
},   
    "ajax": {
        "contentType": "application/json",
        "url": "alarm_data_detail.php",
        "type": "GET",
        "cache":"false",
        "data": { logdate: "newalarmlog.txt"} 
    },  
        "columns": [
        { "title": "Date", "data" : "date"},
        { "title": "Time",  "data": "time" },
        { "title": "Bay", "data": "bay" },
        { "title": "Ctl", "data": "ctl" },
        { "title": "Desc", "data": "desc" }
    ]
});
       
}
    //do stuff







    $("#logdate").change(function () {
        
       // table.destroy();
        //logdate = $('#logdate :selected').text();
        
        logdate = $('#logdate :selected').attr("id");
        $("#errlogdwnld").attr('href', "ErrLog.php?filedate="+logdate);
    //alert(logdate);
        //alert(logdate);
        //table.ajax.reload();
//        $.ajax({
//        url: 'alarm_data_detail.php',
//        type: 'GET',
//        data: { logdate: logdate} ,
//        //contentType: 'application/json; charset=utf-8',
//        success: function (data) {
//            alert(data);
//             
//            //your success code
//        },
//        error: function () {
//            //your error code
//        }
//    }); 
   
   // logdate = $('#logdate :selected').text();
    $("#tableDiv").html( '<table id="alarm-detail" class="display" cellspacing="0" width="100%"></table>' );
     $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//        $.ajax({
//                "url": 'alarm_data_detail.php',
//                "dataType": "json",
//                "success": function(json) {
//                    var table = $('#alarm-detail').dataTable( json );
//                    $('.container2').html('All Alarm');
//                    
//                }
//          
//             } );

var table = $('#alarm-detail').DataTable({
    "fnInitComplete": function (oSettings, json) {
             $('.container2').html('Alarm'); 
        },
        "language": {
        "emptyTable":     "There is no ALARM generated."
    },
//    "columns": [
//    null,
//    null,
//    null,
//    null,
//    { "width": "10%" },
//    { "width": "80%" }
//  ],
    "order": [[ 1, "desc" ]],
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
//              'copy'
        ],
        "pageLength": 10,
        "bProcessing" : true,
        "bDestroy" : true,
        "bSort" : true,
        
        "drawCallback": function( data,settings ) {
            
                var htmlString = $( this ).html();
  $( '#data' ).text( htmlString );
  
//  $('#email').click(function (event) {
//           var email = document.getElementById('txt-email').value;
//  
//      event.preventDefault();
//       $.ajax({
//           url: "email.php",
//           type: "POST",
//           dataType : 'html',
//           data:'email='+email+'&data='+htmlString,
//           
//           success: function(result){
//                alert(result);
//    }});
//  });
      var api = this.api();
 
        // Output the data for the visible rows to the browser's console
      var a = ( api.rows( {page:'current'} ).data());
      $.each(a, function() {
      
  
  	$('#alarm-detail').on('draw.dt', function() { 
       		value2 = 'RAISED';
		value22 = 'INDICATED';
		value222 = 'FAILURE';
		value232 = 'CLEARED';
       		var key = Object.keys(this)[6];
      		var value = this[key];
		if($('#alarm-detail:contains("' + value2 + '")'))
		{
    			$('#alarm-detail td:contains("' + value2 + '")').text(value).addClass( "color" );
		}
		if($('#alarm-detail:contains("' + value22 + '")'))
		{
    			$('#alarm-detail td:contains("' + value22 + '")').text(value).addClass( "colorw" );
		}
	        if($('#alarm-detail:contains("' + value222 + '")'))
                {
                        $('#alarm-detail td:contains("' + value222 + '")').text(value).addClass( "color" );
                }
		if($('#alarm-detail:contains("' + value232 + '")'))
                {
                        $('#alarm-detail td:contains("' + value232 + '")').text(value).addClass( "clear" );
                }
  		console.log(key);

//  //do something with value;
  	}); 
     });
},   
    "ajax": {
        "contentType": "application/json",
        "url": "alarm_data_detail.php",
        "type": "GET",
        "cache":"false",
        "data": { logdate: logdate} 
    },  
        "columns": [
        { "title": "Date", "data" : "date"},
        { "title": "Time",  "data": "time" },
        { "title": "Bay", "data": "bay" },
        { "title": "Ctl", "data": "ctl" },
        { "title": "Desc", "data": "desc" }
    ]
});
       

//$("#alarm_type").change(function(){
//    var selected_alarm = $("#alarm_type option:selected").text();
//   
//    if(selected_alarm == "All"){
//        //alert("all");
//     
//       $("#tableDiv").html( '<table id="alarm-detail" class="display" cellspacing="0" width="100%"></table>' );
//       $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//       
//      var table = $('#alarm-detail').DataTable({
//    "fnInitComplete": function (oSettings, json) {
//             $('.container2').html('Alarm'); 
//        },
//        "dom": 'Bfrtip',
//        "buttons": [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],
//        "pageLength": 20,
//        
//        "drawCallback": function( settings ) {
//      var api = this.api();
// 
//        // Output the data for the visible rows to the browser's console
//      var a = ( api.rows( {page:'current'} ).data());
//      $.each(a, function() {
//      
//
//  
//  $('#alarm-detail').on('draw.dt', function() {
//       value2 = 'RAISED';
//       var key = Object.keys(this)[6];
//      var value = this[key];
//if($('#alarm-detail:contains("' + value2 + '")'))
//{
//    $('#alarm-detail td:contains("' + value2 + '")').text(value).addClass( "color" );
//}
//  console.log(key);
////  //do something with value;
//}); 
//});
//},   
//    "ajax": {
//        "contentType": "application/json",
//        "url": "alarm_data_detail.php"      
//    },  
//         "columns": [
//        { "title": "date", "data" : "date"},
//        { "title": "time",  "data": "time" },
//        { "title": "bay", "data": "bay" },
//        { "title": "ctl", "data": "ctl" },
//        { "title": "preset", "data": "preset" },
//        { "title": "meter", "data": "meter" },
//        { "title": "desc", "data": "desc" }
//    ]
//});
//}
//    if(selected_alarm == "Bay"){
//        
//        $("#tableDiv").html( '<table id="bay-detail" class="display" cellspacing="0" width="100%"></table>' );
//        $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//        
//        var table = $('#bay-detail').dataTable({
//        "fnInitComplete": function (oSettings, json) {
//             $('.container2').html('Alarm'); 
//        },
//        "dom": 'Bfrtip',
//        "buttons": [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],    
//    
//    "ajax": {
//        "contentType": "application/json",
//        "url": "bay-alarm.php"      
//    },  
//        "columns": [
//        { "title": "date", "data" : "date"},
//        { "title": "time",  "data": "time" },
//        { "title": "bay", "data": "bay" },
//        { "title": "ctl", "data": "ctl" },
//        { "title": "desc", "data": "desc" }
//    ]
//});
//}
//    
//    if(selected_alarm == "Meter"){
//        $("#tableDiv").html( '<table id="meter-detail" class="display" cellspacing="0" width="100%"></table>' );
//        $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//         var table = $('#meter-detail').dataTable({
//        "fnInitComplete": function (oSettings, json) {
//             $('.container2').html('Alarm'); 
//        },
//        "dom": 'Bfrtip',
//        "buttons": [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],    
//    
//    "ajax": {
//        "contentType": "application/json",
//        "url": "meter-alarm.php"      
//    },  
//        "columns": [
//        { "title": "date", "data" : "date"},
//        { "title": "time",  "data": "time" },
//        { "title": "bay", "data": "bay" },
//        { "title": "ctl", "data": "ctl" },
//        { "title": "preset", "data": "preset" },
//        { "title": "meter", "data": "meter" },
//        { "title": "desc", "data": "desc" }
//    ]
//});
//}
//    if(selected_alarm == "Preset"){
//        $("#tableDiv").html( '<table id="preset-detail" class="display" cellspacing="0" width="100%"></table>' );
//        $('.container2').html('<images src="images/loading.gif" width="10%"> loading...');
//        var table = $('#preset-detail').dataTable({
//        "fnInitComplete": function (oSettings, json) {
//             $('.container2').html('Alarm'); 
//        },
//        "dom": 'Bfrtip',
//        "buttons": [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],    
//    
//    "ajax": {
//        "contentType": "application/json",
//        "url": "preset-alarm.php"      
//    },  
//       "columns": [
//        { "title": "date", "data" : "date"},
//        { "title": "time",  "data": "time" },
//        { "title": "bay", "data": "bay" },
//        { "title": "ctl", "data": "ctl" },
//        { "title": "desc", "data": "desc" }
//    ]
//});
//    }
//});  
$("#reload-detail").click(function(){
    table.ajax.reload(null, false);    
});


});

/*$("#errlogdwnld").click(function(){
    var filedate = $('#logdate :selected').attr("id");
    //alert(filedate);
    window.open("downloadErrLog.php?filedate="+filedate,"newwindow");
    /*$.ajax({
        type: "GET",
        url: "downloadErrLog.php",
        dataType: 'text',
        cache : false,
        data: {filedate: filedate} ,
        success: function(data) {
            $("#load").css({"visibility":"hidden"});
            //alert(data);
            window.open(data,"newwindow");
            //$('#selTransactionListing').html(data);
            //initDataTable();
            attachClickHandler();
        },
        error: function(data) {
            console.log("error");
        }
    });
});*/

});

</script>
  </div>
            </div>
            </div>
			
	</div>
       </div>
 <?php 
 }

else
	{
		header("location:index.php");
		session_destroy();
	}
        ?>
 
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>       
    <?php include("footer.php"); ?>
