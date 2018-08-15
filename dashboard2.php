<?php session_start(); error_reporting(1);  if(isset($_SESSION[ 'global'])) {?>
<?php include("headerRPT.php");?>

<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="lslider/css/liquid-slider.css">
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.touchSwipe.js"></script>
<noscript>
    <div class="alert alert-block col-md-12">
        <h4 class="alert-heading">Warning! 
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
      enabled to use this site.
    </p>
  </div>
</noscript>
<div id="content" class="col-lg-10 col-sm-10">
  <!-- content starts -->
  <div>
    <!-- <ul class="breadcrumb">
      <li>
                </li>
      </ul>-->
  </div>
  <style>
      .color{color:red;}
      .colorw{color:#DAA520;}
      .clear{color:green;}
      .alarm{
          height:307px;
      }
      #alarm{
          font-size:10px;
      }
       .col-md-11 {
        width: 100%;
    }
    .ui-dialog {
    width: auto;
}
    .col-md-12 {
        width: 100%;
    }
  
    </style>
  
<!--<link href="css/dialog.css" rel="stylesheet">-->
<div class="ch-container">
<div class="row">
       
    
<?php  $user = $_SESSION["user"];
$sql= "select * from settings where user_id='$user'";
//echo $sql;
    //  $result = $mysqli->query($sql);
      //print_r($result);
    //  while ($row = mysqli_fetch_array($result)) {
         // echo "hi";
        //  $widget1 = $row['widget1'];
         // if($widget1 == 1 AND $widget2 == 1 AND $widget3 == 1){
              ?>
            <style>
                .col-md-11 {
                width: 100%;
            }
             .col-md-12 {
                width: 50%;
             }
            </style>
           <?php
            
           include("facility_status.php");           
           include("alarm.php");
           include("graph.php");
           
           include("tank-inventory.php");
         // }
         // if($widget1 == 1){
            
           
         // }
         // $widget2 = $row['widget2'];
         // if($widget2 == 1){
           // include("graph.php");
         // }
        //  $widget3 = $row['widget3'];
         // if($widget3 == 1){
            
        //  }
   //  }
?>
<script src="lslider/js/jquery.liquid-slider.min.js"></script> 

  <!-- content ends -->
</div>
<!--/#content.col-md-0-->
</div><!--/fluid-row-->
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">?</button>
        <h3>Settings</h3>
      </div>
      <div class="modal-body">
        <p>Here settings can be configured...</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
      </div>
    </div>
  </div>
</div>

  <script>
    $('#main-slider-graph').liquidSlider({
        continuous:false,
        slideEaseFunction: "easeInOutCubic",
        mobileNavigation: true,
        responsive: true,
        mobileUIThreshold: 0,
        hideArrowsWhenMobile: true,
        swipe: false,
        dynamicArrows: false,
        pretransition: function() {
          //  alert("hi");
var sliderObject = $.data( $('#main-slider-graph')[0],'liquidSlider');

if ( (sliderObject).NextPanel === 4 ) {
   //$.data( $('#main-slider')[5], 'liquidSlider').setNextPanel(0);
  //turn off click event
  //update link
  alert("hi");
}
this.transition();
            }
            
        
});
	//$('#main-slider2').liquidSlider();
  </script>
<?php }
else
	{
		header("location:index.php");
		session_destroy();
	}
	
  ?>
</body>
</html>
<?php include("footer.php");?>
