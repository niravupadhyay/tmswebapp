<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="format-detection" content="telephone=no">
        <title><?php
            error_reporting(0);
            require_once './Mobile-Detect-2.8.22/Mobile_Detect.php';
            $page = $_SERVER['PHP_SELF'];
            $name1 = end((explode('/', $page)));
            $name2 = current(explode(".php", $name1));
            echo strtoupper($name2);
            ?></title>


        <!--Script by hscripts.com-->
        <!--<script type="text/javascript">
         Edit the message as your wish 
        var msg_box ="Right click disabled in this page"; function dis_rightclickIE(){
        
        if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
        alert(msg_box)
        }
        function dis_rightclickNS(e){
        if ((document.layers||document.getElementById&&!document.all) && (e.which==2||e.which==3))
        {
        alert(msg_box)
        return false;
        }
        }
        if (document.layers){
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown=dis_rightclickNS;
        }
        else if (document.all&&!document.getElementById){
        document.onmousedown=dis_rightclickIE;
        
        }
        document.oncontextmenu=new Function("alert(msg_box);return false")
        </script>-->

        <!-- Script by hscripts.com -->
        <meta name="description" content="TMS6 Toptech">
        <meta name="author" content="Urvashi Dave">

        <!-- The styles -->
        <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

        <?php
        require_once './Mobile-Detect-2.8.22/Mobile_Detect.php';
        $detect = new Mobile_Detect;

        // Any mobile device (phones or tablets).
        if ($detect->isMobile()) {
            
        } else {
            
        }
        ?>
        <link href="css/charisma-app.css" rel="stylesheet">
        <link href='css/fullcalendar.css' rel='stylesheet'>
        <link href='css/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='css/chosen.min.css' rel='stylesheet'>
        <link href='css/colorbox.css' rel='stylesheet'>
        <link href='css/responsive-tables.css' rel='stylesheet'>
        <link href='css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='css/jquery.noty.css' rel='stylesheet'>
        <link href='css/noty_theme_default.css' rel='stylesheet'>
        <link href='css/elfinder.min.css' rel='stylesheet'>
        <link href='css/elfinder.theme.css' rel='stylesheet'>
        <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='css/uploadify.css' rel='stylesheet'>
        <link href='css/animate.min.css' rel='stylesheet'>
        
        
        
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.js"></script>


        <link rel="stylesheet" type="text/css" href="css/tcal.css" />
        <script type="text/javascript" src="js/tcal.js"></script>





        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link class="b-logo" rel="shortcut icon" href="images/favicon.png">
        <?php include "database_connection_web.php"; ?>

        <!-- CSS -->
        <style>
            .accordion-toggle {
                cursor: pointer;
            }

            .accordion-content {
                display: none;
            }

            .accordion-content.default {
                display: block;
            }
        </style>


        <script language="javascript">
            //    document.onmousedown=disableclick;
            //    status="Right Click Disabled";
            //    function disableclick(event)
            //    {
            //      if(event.button==2)
            //       {
            //         alert(status);
            //         return false;    
            //       }
            //    }
        </script>



    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar navbar-default" role="navigation">

            <div class="navbar-inner info">


                <!-- -- TMS-6 User ---->
                <?php
                $query1="SELECT name FROM TerminalProfile";
                $result1=$mysqli->query($query1);
                while($value1 = mysqli_fetch_array($result1))
                {
                $term_name = $value1["name"];
                echo $term_name;
                //echo "CN Cargoflow";
                }
                ?>
                <?php
                $currentFile = $_SERVER["PHP_SELF"];
                $input = $currentFile;
                $result = explode('/', $input);
                //echo $result[0];
                $file = basename($currentFile);         // $file is set to "index.php"
                $file2 = basename($file, ".php");
                //echo "[]-";
                //echo "[".$file2."]";
                ?>
                <button type="button" class="navbar-toggle pull-left animated flip">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="tms-pic.php">  ?<image class="images1" src="images/capture.png">
                    <span></span></a>-->

                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
                            <?php
                            print_r($_SESSION["user"]);

                            $query1 = "SELECT last_access FROM SYSTEM_USER";
                            $result1 = $mysqli->query($query1);
                            while ($value1 = mysqli_fetch_array($result1)) {
                                $term_name = $value1["name"];
                                echo $term_name;
                            }
                            //print_r($_SESSION["date"]);
                            ?>
                        </span>
                        <span class="caret"></span>
                    </button>




                    <ul class="dropdown-menu">
                        <li><a href="logout.php">Logout</a></li>
                        <li>
                            <?php $cur_dir = explode('\\', getcwd()); ?>
                        </li>
                        <!-- <li><a id="settings" name="settings">Settings</a></li>-->
                    </ul>
                </div>
                <!-- user dropdown ends -->
            </div>
        </div>
        <!-- topbar ends -->
        <div class="ch-container">
            <div class="row">
                <!-- left menu starts -->
                <div class="col-sm-2 col-lg-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Main</li>
                                <li><a class="ajax-link" href="dashboard2.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                                </li>
                                <?php
                                $full_name = $_SERVER['PHP_SELF'];
                                $name_array = explode('/', $full_name);
                                $count = count($name_array);
                                $page_name = $name_array[$count - 1];
                                ?>


                               <!-- <li class="<?php //echo ($page_name=='system_parameter.php')?'active':'';  ?>">
                                    <a class="ajax-link" href="system_parameter.php"><i class="glyphicon glyphicon-edit"></i><span> System Parameter</span></a>
                                </li>-->
                                <!-- <li class="accordion">
                                     <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Profile</span></a>
                                     <ul class="nav nav-pills nav-stacked">
                                         <li class="<?php //echo ($page_name=='bay_profile.php')?'active':'';  ?>"><a class="ajax-link" href="bay_profile.php"><i class="glyphicon glyphicon-edit"></i><span> Bay Profile</span></a>
                                             <li class="<?php //echo ($page_name=='preset_profile.php')?'active':'';  ?>"><a class="ajax-link" href="preset_profile.php"><i class="glyphicon glyphicon-edit"></i><span> Preset Profile</span></a>
                                                 <li class="<?php //echo ($page_name=='meter_profile.php')?'active':'';  ?>"><a class="ajax-link" href="meter_profile.php"><i class="glyphicon glyphicon-edit"></i><span> Meter Profile</span></a>
                                                     <li class="<?php //echo ($page_name=='terminal_profile.php')?'active':'';  ?>"><a class="ajax-link" href="terminal_profile.php"><i class="glyphicon glyphicon-edit"></i><span> Terminal Profile</span></a>
                                     </ul>
                                     </li>-->
                                <?php /* if (isset($_SESSION["user_id"]))
                                  {
                                  if($_SESSION["user_id"] == 'Greenergy')
                                  {
                                  ?>
                                  <li class="<?php echo ($page_name=='users.php')?'active':'';?>">
                                  <a class="ajax-link" href="users.php"><i class="glyphicon glyphicon-user"></i><span> Users</span></a>
                                  </li>
                                  <?php
                                  }
                                  } */
                                ?>

                                <!-- <li class="accordion">
                                     <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Master</span></a>
                                     <ul class="nav nav-pills nav-stacked">
                                         <li class="<?php //echo ($page_name=='product_master.php')?'active':'';  ?>"><a class="ajax-link" href="product_master.php"><i class="glyphicon glyphicon-edit"></i><span> Product Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='customer_master.php')?'active':'';  ?>"><a class="ajax-link" href="customer_master.php"><i class="glyphicon glyphicon-edit"></i><span> Customer Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='account_master.php')?'active':'';  ?>"><a class="ajax-link" href="account_master.php"><i class="glyphicon glyphicon-edit"></i><span> Account Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='destination_master.php')?'active':'';  ?>"><a class="ajax-link" href="destination_master.php"><i class="glyphicon glyphicon-edit"></i><span> Destination Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='supplier_master.php')?'active':'';  ?>"><a class="ajax-link" href="supplier_master.php"><i class="glyphicon glyphicon-edit"></i><span> Supplier Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='tank_master.php')?'active':'';  ?>"><a class="ajax-link" href="tank_master.php"><i class="glyphicon glyphicon-edit"></i><span> Tank Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='carrier_master.php')?'active':'';  ?>"><a class="ajax-link" href="carrier_master.php"><i class="glyphicon glyphicon-edit"></i><span> Carrier Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='vehicle_master.php')?'active':'';  ?>"><a class="ajax-link" href="vehicle_master.php"><i class="glyphicon glyphicon-edit"></i><span> Vehicle Master</span></a>
                                         </li>
                                         <li class="<?php //echo ($page_name=='driver_master.php')?'active':'';  ?>"><a class="ajax-link" href="driver_master.php"><i class="glyphicon glyphicon-edit"></i><span> Driver Master</span></a>
                                         </li>
                                     </ul>
                                 </li>-->
                                 <!--<li><a class="ajax-link" href="vehicle_supplier_ref.php"><i class="glyphicon glyphicon-edit"></i><span> Vehicle Supplier Reference</span></a>
                                 </li>-->
                                <!--<li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Products</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="<?php //echo ($page_name=='account_products.php')?'active':'';  ?>"><a class="ajax-link" href="account_products.php"><i class="glyphicon glyphicon-edit"></i><span> Account Products</span></a>
                                        </li>
                                        <li class="<?php //echo ($page_name=='customer_products.php')?'active':'';  ?>"><a class="ajax-link" href="customer_products.php"><i class="glyphicon glyphicon-edit"></i><span> Customer Products</span></a>
                                        </li>
                                        <li class="<?php //echo ($page_name=='destination_products.php')?'active':'';  ?>"><a class="ajax-link" href="destination_products.php"><i class="glyphicon glyphicon-edit"></i><span> Destination Products</span></a>
                                        </li>
                                        <li class="<?php //echo ($page_name=='supplier_products.php')?'active':'';  ?>"><a class="ajax-link" href="supplier_products.php"><i class="glyphicon glyphicon-edit"></i><span> Supplier Products</span></a>
                                        </li>
                                    </ul>
                                </li>-->

                                <!-- <li class="accordion">
                                     <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Status</span></a>-->
                                <ul class="nav nav-pills nav-stacked main-menu">
                                  <!--  <li class="<?php echo ($page_name == 'folio.php') ? 'active' : ''; ?>"><a class="ajax-link" href="folio.php"><i class="glyphicon glyphicon-edit"></i><span>Folio Status</span></a>
                                    </li>-->
                                    <li class="<?php echo ($page_name == 'facility_status_detail.php') ? 'active' : ''; ?>"><a class="ajax-link" href="facility_status_detail.php"><i class="glyphicon glyphicon-edit"></i><span>Facility Status</span></a>
                                    </li>
                                </ul>
                                </li>
                                <ul class="nav nav-pills nav-stacked main-menu">
                                    <li class="<?php echo ($page_name == 'tank-detail.php') ? 'active' : ''; ?>"><a class="ajax-link" href="tank-detail.php"><i class="glyphicon glyphicon-edit"></i><span> Tank Inventory</span></a>
                                    </li>
                                </ul>
                                <ul class="nav nav-pills nav-stacked main-menu">
                                    <li class="<?php echo ($page_name == 'alarms.php') ? 'active' : ''; ?>"><a class="ajax-link" href="alarm-detail.php"><i class="glyphicon glyphicon-edit"></i><span> Alarms</span></a>
                                    </li>
                                </ul>

                                <li class="<?php echo ($page_name == 'transaction_viewer.php') ? 'active' : ''; ?>"><a class="ajax-link" href="transaction_viewer.php"><i class="glyphicon glyphicon-eye-open"></i><span>Transaction Viewer</span></a>
                                </li>

				<ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'cust_add.php') ? 'active' : ''; ?>"><a class="ajax-link" href="cust_add.php"><i class="glyphicon glyphicon-eye-open"></i><span>Customer Master</span></a>
                                </li>
                                </ul>

                                <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'acct_add.php') ? 'active' : ''; ?>"><a class="ajax-link" href="acct_add.php"><i class="glyphicon glyphicon-eye-open"></i><span>Account Master</span></a>
                                </li>
                                </ul>

                                <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'account_products_dt.php') ? 'active' : ''; ?>"><a class="ajax-link" href="account_products_dt.php"><i class="glyphicon glyphicon-eye-open"></i><span>Account Products</span></a>
                                </li>
                                </ul>
                                
                                <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'driver_mst.php') ? 'active' : ''; ?>"><a class="ajax-link" href="driver_mst.php"><i class="glyphicon glyphicon-eye-open"></i><span>Driver</span></a>
                                </li>
                                </ul>
                                
                                <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'carrier_mst.php') ? 'active' : ''; ?>"><a class="ajax-link" href="carrier_mst.php"><i class="glyphicon glyphicon-eye-open"></i><span>Carrier</span></a>
                                </li>
                                </ul>
                                
                                <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'vehicle_mst.php') ? 'active' : ''; ?>"><a class="ajax-link" href="vehicle_mst.php"><i class="glyphicon glyphicon-eye-open"></i><span>Vehicle</span></a>
                                </li>
                                </ul>
                                
				<ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'vehicle_group.php') ? 'active' : ''; ?>"><a class="ajax-link" href="vehicle_group.php"><i class="glyphicon glyphicon-eye-open"></i><span>Vehicle Group</span></a>
                                </li>
                                </ul>

				<ul class="nav nav-pills nav-stacked main-menu">
                                <li class="<?php echo ($page_name == 'carrier_supplier_xref.php') ? 'active' : ''; ?>"><a class="ajax-link" href="carrier_supplier_xref.php"><i class="glyphicon glyphicon-eye-open"></i><span>Carrier - Supplier Xref</span></a>
                                </li>
                                </ul>

                                <li class="<?php echo ($page_name == 'tms_reports.php') ? 'active' : ''; ?>"><a class="ajax-link" href="tms_reports.php"><i class="glyphicon glyphicon-eye-open"></i><span>TMS Reports</span></a>
                                </li>
                                <!--<li class="<?php //echo ($page_name == 'ssotest.php') ? 'active' : ''; ?>"><a class="ajax-link" href="ssotest.php"><i class="glyphicon glyphicon-eye-open"></i><span>Support Portal</span></a>
                                </li>-->
                                <li class="<?php echo ($page_name == 'acct_allocations.php') ? 'active' : ''; ?>"><a class="ajax-link" href="acct_allocations.php"><i class="glyphicon glyphicon-eye-open"></i><span>Allocations</span></a>
                                </li>
                                
                                <!--<li class="<?php echo ($page_name == 'user_sca_assign.php') ? 'active' : ''; ?>"><a class="ajax-link" href="user_sca_assign.php"><i class="glyphicon glyphicon-eye-open"></i><span>User Management</span></a>
                                </li>-->
                                

 <!-- <li class="<?php //echo ($page_name=='tank_guage.php')?'active':'';  ?>"><a class="ajax-link" href="tank_guage.php"><i class="glyphicon glyphicon-edit"></i><span> Tank Guage Entry Screen</span></a>
  </li>-->

                            </ul>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <!-- left menu ends -->

                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>

                        <!-- <ul class="breadcrumb">
                    <li>
                        <?php //include("breadcrumbs.php");
                        ?>
            </li>
                     <li class="<?php echo ($page_name == 'database_screen.php') ? 'active_h' : ''; ?>"><a class="ajax-link" href="database_screen.php">Dashboard</a></li>
                     <li class="<?php echo ($page_name == 'system_parameter.php') ? 'active_h' : ''; ?>"><a href="system_parameter.php">System Parameter</a></li>
                            <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
                                            <span class="caret"></span>
                                    </a>
                                            <ul class="dropdown-menu">
                                                    <li class="<?php echo ($page_name == 'bay_profile.php') ? 'active' : ''; ?>"><a href="bay_profile.php">Bay Profile</a></li>
                                                    <li class="<?php echo ($page_name == 'preset_profile.php') ? 'active' : ''; ?>"><a href="preset_profile.php">Preset Profile</a></li>
                                                    <li class="<?php echo ($page_name == 'meter_profile.php') ? 'active' : ''; ?>"><a href="meter_profile.php">Meter Parameter</a></li>
                                                    <li class="<?php echo ($page_name == 'terminal_profile.php') ? 'active' : ''; ?>"><a href="terminal_profile.php">Terminal Parameter</a></li>			
                                            </ul>
                            </li>
            <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master
                                            <span class="caret"></span>
                                    </a>
                                            <ul class="dropdown-menu">
                                                    <li class="<?php echo ($page_name == 'product_master.php') ? 'active' : ''; ?>"><a href="product_master.php">Product Master</a></li>
                                                    <li class="<?php echo ($page_name == 'customer_master.php') ? 'active' : ''; ?>"><a href="customer_master.php">Customer Master</a></li>
                                                    <li class="<?php echo ($page_name == 'account_master.php') ? 'active' : ''; ?>"><a href="account_master.php">Account Master</a></li>
                                                    <li class="<?php echo ($page_name == 'destination_master.php') ? 'active' : ''; ?>"><a href="destination_master.php">Destination Master</a></li>
                                                    <li class="<?php echo ($page_name == 'supplier_master.php') ? 'active' : ''; ?>"><a href="supplier_master.php">Supplier Master</a></li>
                                                    <li class="<?php echo ($page_name == 'tank_master.php') ? 'active' : ''; ?>"><a href="tank_master.php">Tank Master</a></li>
                                                    <li class="<?php echo ($page_name == 'carrier_master.php') ? 'active' : ''; ?>"><a href="carrier_master.php">Carrier Master</a></li>
                                                    <li class="<?php echo ($page_name == 'vehicle_master.php') ? 'active' : ''; ?>"><a href="vehicle_master.php">vehicle Master</a></li>
                                                    <li class="<?php echo ($page_name == 'driver_master.php') ? 'active' : ''; ?>"><a href="driver_master.php">Driver Master</a></li>						
                                            </ul>
                            </li>
            <li class="<?php echo ($page_name == 'vehicle_supplier_ref.php') ? 'active_h' : ''; ?>"><a href="vehicle_supplier_ref.php">Vehicle Supplier Reference</a></li>
            <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
                                            <span class="caret"></span>
                                    </a>
                                            <ul class="dropdown-menu">
                                                    <li class="<?php echo ($page_name == 'account_products_dt.php') ? 'active' : ''; ?>"><a href="account_products.php">Account Products</a></li>
                                                    <li class="<?php echo ($page_name == 'customer_products.php') ? 'active' : ''; ?>"><a href="customer_products.php">Customer Products</a></li>
                                                    <li class="<?php echo ($page_name == 'destination_products.php') ? 'active' : ''; ?>"><a href="destination_products.php">Destination Products</a></li>
                                                    <li class="<?php echo ($page_name == 'supplier_products.php') ? 'active' : ''; ?>"><a href="supplier_products.php">Supplier Products</a></li>					
                                            </ul>
                            </li>
                     <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Status
                                            <span class="caret"></span>
                                    </a>
                                            <ul class="dropdown-menu">
                                                    <li class="<?php echo ($page_name == 'folio.php') ? 'active_h' : ''; ?>"><a href="folio.php">Folio Status</a></li>
                                                    <li class="<?php echo ($page_name == 'facility_status.php') ? 'active_h' : ''; ?>"><a href="facility_status.php">Facility Status</a></li>				
                                            </ul>
                            </li>
                    <li class="<?php echo ($page_name == 'transaction_viewer.php') ? 'active_h' : ''; ?>"><a href="transaction_viewer.php">Transaction Viewer</a></li>
                    <li class="<?php echo ($page_name == 'tank_guage.php') ? 'active_h' : ''; ?>"><a href="tank_guage.php">Tank Guage Entry Screen</a></li>
        </ul>-->
                    </div>

                    <!-- external javascript -->

                    <script src="js/bootstrap.min.js"></script>

                    <!-- library for cookie management -->
                    <script src="js/jquery.cookie.js"></script>
                    <!-- calender plugin -->
                    <script src='js/moment.min.js'></script>
                    <script src='js/fullcalendar.min.js'></script>
                    <!-- data table plugin -->
                    <script src='js/jquery.dataTables.min.js'></script>


                    <!-- select or dropdown enhancer -->
                    <script src="js/chosen.jquery.min.js"></script>
                    <!-- plugin for gallery image view -->
                    <script src="js/jquery.colorbox-min.js"></script>
                    <!-- notification plugin -->
                    <script src="js/jquery.noty.js"></script>
                    <!-- library for making tables responsive -->
                    <script src="js/responsive-tables.js"></script>
                    <!-- tour plugin -->
                    <script src="js/bootstrap-tour.min.js"></script>
                    <!-- star rating plugin -->
                    <script src="js/jquery.raty.min.js"></script>
                    <!-- for iOS style toggle switch -->
                    <script src="js/jquery.iphone.toggle.js"></script>
                    <!-- autogrowing textarea plugin -->
                    <script src="js/jquery.autogrow-textarea.js"></script>
                    <!-- multiple file upload plugin -->
                    <script src="js/jquery.uploadify-3.1.min.js"></script>
                    <!-- history.js for cross-browser state change on ajax -->
                    <script src="js/jquery.history.js"></script>
                    <!-- application script for Charisma demo -->

                    <!-- JS -->

                    <script src="js/charisma.js"></script>
                    <script>
            $(document).ready(function () {
                $(function () {
                    $("#dialog").dialog({
                        autoOpen: false
                    });
                    $("#settings").on("click", function () {
                        $("#dialog").dialog("open");
                    });
                });

                // Validating Form Fields.....
                $("#save").click(function () {
                    if ($('#graph').is(':checked')) {
                        var value = 1;
                    } else {
                        var value = 0;
                    }
                    if ($('#alarm').is(':checked')) {
                        var value2 = 1;
                        alert(value2);
                    } else {
                        var value2 = 0;
                    }
                    if ($('#tank').is(':checked')) {
                        var value3 = 1;
                    } else {
                        var value3 = 0;
                    }

                    $.ajax({
                        type: "POST",
                        url: "save-settings.php",
                        data: {value1: value, value2: value2, value3: value3},
                        success: function (data) {
                            //console.log(data);
                            $("#dialog").dialog("close");
                            location.reload();

                        },
                        error: function (data) {
                            console.log("error");
                        }
                    });
                    return false;
                });
            });
                    </script>
                    <script>
                        $(document).bind("contextmenu", function (e) {
                            e.preventDefault();
                        });

                    </script>
