<script src="lslider/js/jquery.liquid-slider.min.js"></script> 

<style>

    .se-pre-con {
        width:4%;
    }
    .skill {
        float: left;
    }
    #reload-t{
        margin-bottom:6%;
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
    .outer:hover { -moz-box-shadow: 0 0 10px #ccc;
                   -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;
                   cursor:pointer}
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
        padding: 3px 2px;
        text-align: center;
        /*border-bottom: 1px solid;*/
    }
    table {
        background-color: transparent;
        font-size: 12px;
        margin-left: 3%;   
    }
    .outer {
        border: 2px solid #ccc;
        border-radius: 2px;
        height: 67px;
        overflow: hidden;
        position: relative;
        width: 72px;
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
        background:black;
    }

    .inner {
        border: 2px solid black;
        border-top-width: 0;
        background-color: #DAA520;
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
    #innertank3 > div {
        background: black none repeat scroll 0 0;
        color: black;
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
    #main-slider-tank {
        height: 300px !important;
    }


</style>
<script src="js/dialog.js" type="text/javascript"></script>  



<?php
$query1 = "SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
$result1 = $mysqli->query($query1);
$value1 = mysqli_fetch_array($result1);
?>

<form name="prod_level" id="prod_level" method="post">
    <div class="box col-md-12" id="box col-md-12">
        <div class="box-inner" id="box-inner">

            <div class="box-header well">

                <h2><i class="glyphicon glyphicon-list-alt"></i> Tank Inventory </h2>

                <!--<div class="box-icon">-->
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-cog"></i></a>-->
              <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
              <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
                <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
            </div>


            <div name="table_width" id="table_width">

            </div>
            <center>
                <input type="button" id="reload-t" value="Reload"><r id="reload-tank"></r>
            </center>


            <div class="box col-md-12" id="tank-dialog" name="tank-dialog">
                <div class="box-inner">
                    <div class="box-content" id="box-content">
                        <div id="" class="center" style="">
                            <div id="" class="">
                                <div id="" title="Settings">


                                    <?php
                                    echo "<b id=product>%</b><div class=outer2>";
                                    echo "<div id=inner class=inner  data-progress><div></div></div></div>";
                                    ?>
                                    <table align="center" class="tank-detail" border="1" name="tank-detail" cellspacing="0">
                                        <input type="hidden" name="vol_total" value="<?php echo $level; ?>">                  
                                        <tbody>
                                            <?php
                                            $detect = new Mobile_Detect;
                                            if ($detect->isMobile()) {
                                                ?>

                                            <style>
                                                /*  .ui-dialog {
                                                    width: 216px !important;
                                                    left:10px !important;
                                                }*/

                                            </style>
                                            <?php
                                            echo "<tr><th>Term Id: </th><td id=term_id></td></tr>";
                                            echo "<tr><th>Tank Group: </th><td id=tank_group></td></tr>";

                                            echo "<tr><th>Tank Id: </th><td id=tank_id_2></td></tr>";
                                            echo "<tr><th>Prod Id: </th><td id=prod_id></td></tr>";

                                            echo "<tr><th>Capacity: </th><td id=capacity></td></tr>";
                                            echo "<tr><th>Height: </th><td id=height></td></tr>";

                                            echo "<tr><th>Short Name: </th><td id=short_name></td></tr>";
                                            echo "<tr><th>Temperature: </th><td id=temperature></td></tr>";

                                            echo "<tr><th>Grav Density: </th><td id=grav_density></td></tr>";
                                            echo "<tr><th>Net Inv: </th><td id=net_inv></td></tr>";

                                            echo "<tr><th>Gross Inv: </th><td id=gross_inv></td></tr>";
                                        } else {
                                            echo "<tr><th>Term Id: </th><td id=term_id></td>";
                                            echo "<th>Tank Group: </th><td id=tank_group></td></tr>";

                                            echo "<tr><th>Tank Id: </th><td id=tank_id_2></td>";
                                            echo "<th>Prod Id: </th><td id=prod_id></td></tr>";

                                            echo "<tr><th>Capacity: </th><td id=capacity></td>";
                                            echo "<th>Height: </th><td id=height></td></tr>";

                                            echo "<tr><th>Short Name: </th><td id=short_name></td>";
                                            echo "<th>Temperature: </th><td id=temperature></td></tr>";

                                            echo "<tr><th>Grav Density: </th><td id=grav_density></td>";
                                            echo "<th>Net Inv: </th><td id=net_inv></td></tr>";

                                            echo "<tr><th>Gross Inv: </th><td id=gross_inv></td></tr>";
                                        }
                                        ?>

                                        </tbody>     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>



</div>


</div>


<link href="css/jquery.dataTables.min.css" rel="stylesheet"> 
<script>
    function tank(tank_id) {
        var tank_id = $(tank_id).attr('value');
        //alert(tank_id);
        jQuery.ajax({
            type: "POST",
            data: {tank_id: tank_id},
            url: "get_tank.php",
            dataType: 'json',
            success: function (data) {
               // alert(data);
                var table = $('#tank-detail').DataTable();
                $(data.tankDetail).each(function (index, value) {
                    var pro_percentage = value.pro_percentage;
                    //alert(pro_percentage);
                    $('#product').html(pro_percentage);
                    $("#inner").attr("data-progress", pro_percentage);
                    var tankDiv = $('#inner');
                    var tankPct = tankDiv.attr("data-progress");
                    $(tankDiv).animate({
                        height: tankPct
                    }, 2500);

                    var tank_id = value.tank_id;
                    $('#tank_id_2').html(tank_id);
                    var term_id = value.term_id;
                    //alert(term_id);
                    $('#term_id').html(term_id);
                    var tank_group = value.tank_group;
                    $('#tank_group').html(tank_group);
                    var prod_id = value.prod_id;
                    $('#prod_id').html(prod_id);
                    var capacity = value.capacity;
                    $('#capacity').html(capacity);
                    var height = value.height;
                    $('#height').html(height);
                    var short_name = value.short_name;
                    $('#short_name').html(short_name);
                    var temperature = value.temperature;
                    $('#temperature').html(temperature);
                    var grav_density = value.grav_density;
                    $('#grav_density').html(grav_density);
                    var net_inv = value.net_inv;
                    $('#net_inv').html(net_inv);
                    var gross_inv = value.gross_inv;
                    $('#gross_inv').html(gross_inv);
                });

                $("#tank-dialog").dialog("open");
                //$('#tank-detail').DataTable();
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    }

</script>

<script>

    $(document).ready(function () {


        $("#tank-dialog").dialog({
            autoOpen: false
        });
        // var inner_width = document.getElementById('box-inner').offsetWidth();
        //var inner_width = parseInt(width);
        //alert(inner_width);
        reload_tankDiv();

        return false;

    });

    $("#reload-t").click(function () {
        //document.getElementById("reload-tank").innerHTML = "<img src='images/loading.gif' width='5%'> loading...";
        reload_tankDiv();

        // user paging is not reset on reload
    });

//setInterval(function(){ alert("Hello"); }, 3000);
    //setInterval(function ()
    //{
       // document.getElementById("reload-tank").innerHTML = "<img src='images/loading.gif' width='5%'> loading...";
      //  reload_tankDiv();
    //}, 5000);


    function reload_tankDiv()
    {
        var width = $("#box-inner").width();
        var inner_width = parseInt(width);
	$('#table_width').html("");
        $.ajax({
            type: "POST",
            cache: false,
            url: "tankslider.php",
            dataType: 'html',
            data: ({table_width: inner_width, current_page:2}),
            success: function (data) {
                //console.log(data);
                $('#table_width').html(data);
                document.getElementById("reload-tank").innerHTML = "";
                
            },
            error: function (data) {
                console.log("error");
            }
        });
    }

</script>


