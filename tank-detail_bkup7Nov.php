<?php
session_start();
error_reporting(0);
//include "database_connection.php";
//include_once('simple_html_dom.php');
if (isset($_SESSION['global'])) {
    ?>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/buttons.dataTables.min.css" rel="stylesheet">
    <?php include("headerRPT.php"); ?>

    <style>
        #emailto{ width:20%;}
        .extra{
            background-color:#F6F6F6 !important;
        }
        table.dataTable tbody th, table.dataTable tbody td{
            padding:3px 10px;
            border-bottom: 1px solid #ddd;
        }
        table.dataTable, table.dataTable th, table.dataTable td,.header{
            border-style: none;
        }
        t1{
            font-size:12px;
            padding-right:0px;
            margin-right:10px;

            line-height: 1.42857;
            padding: 8px;
            vertical-align: top;
            box-sizing: content-box;

        }

        .header > td{
            border-top:none !important;
        }
        .header > td > span{
            background-image: none;         
        }
        .header{

            border-color:white !important;
        }
        b, strong {
            float: none!important;
        }
        .dataTable {
            background:#F0F0F0;
        }
        .skill {
            float: left;
        }
        .tanktable {
            float: left;
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
        /*    .panel-wrapper {
                padding: 0 40px !important;
                position: relative;
            }*/
        h1,
        .h1,    
        h2,
        .h2,
        h3,
        .h3 {
            margin-top: 0px !important;
            margin-bottom: -27px;
        }
        table td,
        table th {
            padding: 3px 10px;
            text-align: center;
        }
        table {
            background-color: transparent;
            font-size: 13px;
            margin-left: 0;
            width: 100%;
        }
        .outer {
            width: 150px;
            height: 60px;
            border: 2px solid #ccc;
            overflow: hidden;
            position: relative;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        .outer2 {
            width: 100%;
            height: 140px;
            border: 2px solid #ccc;
            overflow: hidden;
            position: relative;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        .inner > div {
            background: black transparent none repeat scroll 0 0;
            color: black;
        }
        .inner,
        .inner div {
            width: 100%;
            overflow: hidden;
            background: black;
            left: -2px;
            position: absolute;
        }
        .inner {
            border: 2px solid black;
            border-top-width: 0;
            background-color: #DAA520;
            filter: alpha(opacity=60);
            opacity: 0.6;
            bottom: 0;
            height: 100%;
        }
        .inner div {
            border: 2px solid #7CB5EC;
            border-bottom-width: 0;
            background-color: #DAA520;
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
            float: right;
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


    <div class="box col-md-12">
        <div class="def box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Tank Detail</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default" id="min"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>


            <div class="box-content">
                <div id="" class="center" style="">
                    <div id="container" class="tank-detail">
                        

                    </div>
            </div>
        </div>
    </div>
</div>
</div></div>

<script>
    
    var intervalID = null;
    
    function displayTankData()
    {
        $.ajax({
            type: "POST",
            url: "displayTankDetails.php",
            dataType: 'html',
            cache : false,
            success: function(data) {
                //$("#load").css({"visibility":"hidden"});
                //console.log(data);
                $('#container').html(data);
                initDataTable();
                //attachClickHandler();
                
            },
            error: function(data) {
                console.log("error");
            }
       });
    }
    
    displayTankData();
    
//    function testAnimate()
//    {
//        //alert('animate');
//        var tankDiv = $('#innertank1');
//
//        var tankPct = tankDiv.attr("data-progress");
//        alert(tankPct);
//        $('#innertank1').animate({
//            height: tankPct
//        }, 2500);
//    }
    
    
    function format(d) {

        return '<div class ="tank-extra-detail"></div>';
    }
</script>      
<script src="js/dataTables.buttons.min.js"></script>
<!--<script src="/js/buttons.flash.min.js"></script>-->
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>
<script src="js/fnAddTr.js"></script>


<?php
$detect = new Mobile_Detect;

// Any mobile device (phones or tablets).
if ($detect->isMobile()) {
    // echo "mobile bhai";
    ?>



    <script>

        var table;
        var htmlString = "InitialVal";

        /*function initDataTable() {
         dataTable = $('#tank-detail').dataTable(options);
         }*/

        function initDataTable() {
            //alert("init");
            table = $('#tank-detail').dataTable({
                "bSort": false,
                "bPaginate": false,
                "responsive": true,
                "dom": 'Bfrtip',
                "scrollX": true,
                "pageLength": 10,
                "scrollCollapse": true,
                "buttons": [
                    'copy', 'csv', //'excel', 'pdf', 'print',
                    {
                        text: 'Pause',
                        action: function ( e, dt, node, config ) {
                            var btnTxt = this.text();
                            if(btnTxt === "Pause")
                            {
                                clearInterval(intervalID);
                                this.text('Resume');
                            }
                            else if(btnTxt === "Resume")
                            {
                                intervalID = setInterval(function()
                                {
                                    //displayTankData();
                                    updateTankLevels();
                                }, 5000);
                                this.text('Pause');
                            }
                        }
                    }
                ],
                "drawCallback": function (data, settings) {

                    htmlString = $(this).html();
                    //$( '#data' ).text( htmlString );
                    //alert("ok");

                }

            });
	    attachClickHandler();
        }

    </script>

<?php } else { ?>
    <script>


        var table;
        var htmlString = "InitialVal";

        /*function initDataTable() {
         dataTable = $('#tank-detail').dataTable(options);
         }*/

        function initDataTable() {
            //alert("init");
            table = $('#tank-detail').dataTable({
                "bSort": false,
                "bPaginate": false,
                "responsive": true,
                "pageLength": 10,
                "dom": 'Bfrtip',
                "buttons": [
                    'copy', 'csv', //'excel', 'pdf', 'print',
                    {
                        text: 'Pause',
                        action: function ( e, dt, node, config ) {
                            //alert( 'Button activated' );
                            var btnTxt = this.text();
                            if(btnTxt === "Pause")
                            {
                                clearInterval(intervalID);
                                this.text('Resume');
                            }
                            else if(btnTxt === "Resume")
                            {
                                intervalID = setInterval(function()
                                {
                                    //displayTankData();
                                    updateTankLevels();
                                }, 5000);
                                this.text('Pause');
                            }
                        }
                    }
                ],
                "drawCallback": function (data, settings) {

                    htmlString = $(this).html();
                    //$( '#data' ).text( htmlString );
                    //alert(htmlString);
                    //alert("ok");

                }

            });
	    attachClickHandler();
        }



    </script>
<?php } ?>
<script>

    var newRow = '';
    function attachClickHandler() {
        $('#tank-detail tbody').on('click', 'td.details-control', function () {
            
            $("#loadingDiv").css({"visibility":"visible"});
            
            var tr = $(this).closest('tr');
            var index = tr.index();
            //var index=$(this).attr('index');
            var tank_id = tr.find("td.details-control>a").html();
            //alert(tank_id);
            //alert($(this).id);
            //if(tr.id == 'notclicked')
            //{
            var nexttr = $("#tank-detail tbody tr").eq(index + 1);
            var trdata = tr.find("td").find("a").html().toString();
            var toggleSign = trdata.substring(0, 1);
            var tankStr = trdata.substring(1);
            var strAfterToggle = "-" + tankStr;
            //tr.find("td").find("a").html("");
            //alert(strAfterToggle);
            //tr.id = 'clicked';
            //alert(tr.id)
            $.ajax({
                type: "POST",
                url: "tank-extra-detail.php",
                dataType: 'html',
                data: ({tank_id: tank_id}),
                success: function (data) {
                    //console.log(data);
                    
                    $("#loadingDiv").css({"visibility":"hidden"});
                    
//                    var buttons = [];
//
//                    $.each(table.DataTable().buttons()[0].inst.s.buttons,
//                            function () {
//                                buttons.push(this);
//                            });
//                    $.each(buttons,
//                            function () {
//                                table.DataTable().buttons()[0].inst.remove(this.node);
//                            });
//
//                    table.DataTable().destroy();


                    if (toggleSign === "+")
                    {
                        var newRow = '<tr>' + data + '</tr>';
                        //alert(index);
                        $("#tank-detail tbody tr").eq(index).after(newRow);
                        //initDataTable();
                        tr.find("td").find("a").html(strAfterToggle);
                    } else
                    {
                        $("#tank-detail tbody tr").eq(index + 1).remove("tr");
                        tr.find("td").find("a").html("+" + tankStr);
                        //initDataTable();
                    }

                },
                error: function (data) {
                    console.log("error");
                }
            });
            //}
            //else
            //{
            //  tr.id = '';

            //}
            //attachClickHandler()
            //alert(tr.id);
        });
    }


    $('#send').click(function (event) {
        var email = document.getElementById('emailto').value;
        var elements = $("#tank-detail_filter").find("[aria-controls='tank-detail']").val();
        //alert(htmlString);

        event.preventDefault();
        $.ajax({
            url: "emailtest.php",
            cache: "false",
            type: "POST",
            dataType: 'html',
            //'emailto='+email+
            data: '&data=' + htmlString + '&element=' + elements + '&emailto=' + email,
            success: function (result) {
                //alert(result);
            }

        });
    });


    
    function updateTankLevels()
    {
        $.ajax({
            type: "POST",
            url: "updateTankLevels.php",
            dataType: 'text',
            cache : false,
            success: function(data) {
                //$("#load").css({"visibility":"hidden"});
                //console.log(data);
                //alert(data);
                
                var jsonObj = $.parseJSON(data);
                
//                $.each(jsonObj, function(idx, obj) {
//                        alert(obj.Tanks.TankPct);
//                });

                
                for (var i = 0; i < jsonObj.Tanks.length; i++) {
                    
                    //alert(jsonObj.Tanks[i].TankPct);
                    var tankIDCol = $("#tankIDCol"+(i+1));
                    var tankLevelCol = $("#tankLevelCol"+(i+1));
                    var prodIDCol = $("#prodIDCol"+(i+1));
                    var tankCapCol = $("#tankCapCol"+(i+1));
                    var tankGrossCol = $("#tankGrossCol"+(i+1));
                    var tankNetCol = $("#tankNetCol"+(i+1));
                    var tankHeelCol = $("#tankHeelCol"+(i+1));
                    
//                    bPCTTag.html(pctLevels[i]+"%");
//                    
//                    var tankDiv = $("#innertank"+(i+1));
//
//                    tankDiv.attr("data-progress", pctLevels[i]+"%");
                    // alert();
                    
                    var curTIDExpandSign = tankIDCol.find("a").html().toString().substring(0,1);
                    
                    tankIDCol.html("<a>"+curTIDExpandSign+"T-"+jsonObj.Tanks[i].TankID+"</a>");
                    
                    var pctColHTML = "<div value='' id='outer"+(i+1)+"' class='outer' width='50%' style='float:right'><b id='outerPCT"+(i+1)+"'>"+$.trim(jsonObj.Tanks[i].TankPct)+"%</b>";
                    
                    if(jsonObj.Tanks[i].TankPct === 0)
                    {
                        pctColHTML = pctColHTML + "<div id='innertank"+(i+1)+"' class='inner' data-progress='0%' style='height:0'>";
                    }
                    else
                    {
                        pctColHTML = pctColHTML + "<div id='innertank"+(i+1)+"' class='inner' data-progress='"+jsonObj.Tanks[i].TankPct+"%'>";
                    }
                    pctColHTML = pctColHTML + "<div><\/div><\/div><\/div>";
                                                
                    pctColHTML = pctColHTML + "<script>var tankDiv = $('#innertank"+(i+1)+"');"
                    pctColHTML = pctColHTML + "var tankPct = tankDiv.attr('data-progress');"
                    pctColHTML = pctColHTML + "$(tankDiv).animate({height: tankPct}, 2500);"
                    pctColHTML = pctColHTML + "<\/script>";
                    
                    tankLevelCol.html(pctColHTML);
                    
                    prodIDCol.html(jsonObj.Tanks[i].ProdID);
                    tankCapCol.html(jsonObj.Tanks[i].Capacity);
                    tankGrossCol.html(jsonObj.Tanks[i].Gross);
                    tankNetCol.html(jsonObj.Tanks[i].Net);
                    tankHeelCol.html(jsonObj.Tanks[i].Heel);
                
                }
                

                
            },
            error: function(data) {
                console.log("error");
            }
       });
    }
    
    
    
    //$( ".player" ).html(row_num);
    intervalID = setInterval(function()
    {
        // document.getElementById("reload-tank").innerHTML = "<img src='images/loading.gif' width='5%'> loading...";
        //reload_tankDiv();
        //displayTankData();
        updateTankLevels();
                    
    }, 5000);


</script>

<?php include("footer.php");

} ?>  

