<style>
   

    table.dataTable tbody th, table.dataTable tbody td{
        padding: 6px 0 !important;
    }
/*    .dataTables_wrapper::after{ 
      //  min-height:201px !important;
    }*/
.dataTables_empty{
    color:green;
    font-weight:bold;
}
</style>
</style><div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Alarm Notice</h2>
            <!--<div class="box-icon">-->
              <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-cog"></i></a>-->
              <!--<a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i-->
                <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
              <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-remove"></i></a>-->
            <!--</div>-->
          </div>
            
            
            <div class="box-content">
            <div id="" class="center" style="">
                <div id="containerx" class="alarm">
<input type="button" id="reload" value="Reload"> 

<!--<input type="button" id="email" value="Email">-->       
<div id="tableDiv"></div>   
                    
                    
                </div>
            </div>
            </div>
			
	</div>
       </div>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/fnReloadAjax.js"></script>
<script>
    $( document ).ready( function( $ ) {    
    $("#tableDiv").html( '<table id="alarm" class="display" cellspacing="0" width="100%"></table>' );
     $('#container-alarm').html('<images src="images/loading.gif" width="10%"> loading...');
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

var table = $('#alarm').DataTable({
    
       
     "language": {
        "emptyTable":     "There is no ALARM generated."
    },
    "pageLength": 5,
   
    "responsive":true,
    
    //"stateSave": true,
     "order": [[ 1, "desc" ]],
     
     "drawCallback": function( settings ) {
      var api = this.api();
 
        // Output the data for the visible rows to the browser's console
      var a = ( api.rows( {page:'current'} ).data());
      $.each(a, function() {
     
  $('#alarm').on('draw.dt', function() {
       value2 = 'RAISED';
       value22 = 'INDICATED';
       value222 = 'FAILURE';
       value232 = 'CLEARED';
       var key = Object.keys(this)[6];
      var value = this[key];
	if($('#alarm:contains("' + value2 + '")'))
	{
    		$('#alarm td:contains("' + value2 + '")').text(value).addClass( "color" );
	}
	if($('#alarm:contains("' + value22 + '")'))
        {
                $('#alarm td:contains("' + value22 + '")').text(value).addClass( "colorw" );
        }
	if($('#alarm:contains("' + value222 + '")'))
        {
                $('#alarm td:contains("' + value222 + '")').text(value).addClass( "color" );
        }
	if($('#alarm:contains("' + value232 + '")'))
        {
                $('#alarm td:contains("' + value232 + '")').text(value).addClass( "clear" );
        }
  console.log(value);
//  //do something with value;
  }); 
});
    },
    
    
    
    "ajax": {
        "contentType": "application/json",
        "url": "alarm_dashboard_data_detail.php",
        "type": "GET",
        "cache": "false",
        "data": {logdate: "newalarmlog.txt"}
    },  
    "fnInitComplete": function (oSettings, json) {
             $('#container-alarm').html('Alarm'); 
        },
        "dom": 'Bfrtip',    
     
        "columns": [
        { "title": "Date", "data" : "date"},
        { "title": "Time",  "data": "time" },
        { "title": "Bay", "data": "bay" },
        { "title": "Ctl", "data": "ctl" },
        { "title": "Desc", "data": "desc" }
    ]
});
 
 setInterval( function () {
     $('#container-alarm').html('<images src="images/loading.gif" width="10%"> loading...');
    table.ajax.reload( null, false ); // user paging is not reset on reload
}, 1000);
 
// $('#alarm-detail').on('draw.dt', function() {
//       value = 'RAISED';
//if($('#alarm-detail:contains("' + value + '")'))
//{
//     var d =   table.row( this );
//     alert(d);
//    $('#alarm-detail td:contains("' + value + '")').text('<span class=color>RAISED</span>');
//
//}
//else{
//    alert("else bhai");
//}
//});



   
//
//table.each( function () {
//        
//                value = 'RAISED';
//if($('#alarm-detail:contains("' + value + '")'))
//{
//    alert("aayu la");
//    $('#alarm-detail td:contains("' + value + '")').text('');
//
//}
//else{
//    alert("else bhai");
//}
//});
//var q = $('.odd > td:contains(RAISED)').length;
//alert(q);

$("#reload").click(function(){
   // alert("i am clicked");
    $('#container-alarm').html('<images src="images/loading.gif" width="10%"> loading...');
    //table.state.save();
    table.ajax.reload( null, false ); // user paging is not reset on reload
    table.state('save');
    
});

});

</script>

