<?php
include('database_connection_primary.php');
$query1 = "SELECT count(*) as id FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
$result_last = $mysqli->query($query1);
$num = mysqli_fetch_array($result_last);
//print_r($num[0]);
//$page = $_POST['page'];

for ($i = 1; $i <= $num[0]; $i++) {
    //if($page == 0){
    //echo $i;
    ?>
    <script>
        var tankDiv = $('#inner<?php echo $i; ?>');
        console.log(tankDiv);
        var tankPct = tankDiv.attr("data-progress");

        $(tankDiv).animate({
            height: tankPct
        }, 1500);

    </script>
    <?php
}

// }
?>


<script>
    $('#main-slider-tank').liquidSlider({
        mobileNavigation: true,
        responsive: true,
        savestate:false,
        hideArrowsWhenMobile: true,
        pauseOnHover: true,
        swipe: false,
        dynamicArrows: false
  });
    //$('#main-slider2').liquidSlider();
   
</script>
<?php
//include('database_connection.php');
require_once './Mobile-Detect-2.8.22/Mobile_Detect.php';
$width = $_POST['table_width'];
$cur_page = $_POST['current_page'];
$table_width = floor($width / 100);
?>
<?php
$query1 = "SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
//$result1 = $mysqli->query($query1);
//$value1 = mysqli_fetch_array($result1);
?>

<div id="main-slider-tank" class="liquid-slider">
<?php
$count = 0;
$level = 0;
$result = $mysqli->query($query1);
?>

    <?php
    while ($value = mysqli_fetch_array($result)) {

        if ($value) {
            $count++;
            ?>

            <div>
                <p class="title"> Page <?php echo $count; ?></p>

        <?php
        $detect = new Mobile_Detect;

        // Any mobile device (phones or tablets).
        if ($detect->isMobile()) {
            $table = 2;
            ?>
                 
               <?php     }
                    else{
                    $table = 2;
                    }
                    // echo "mobile bhai";
                    ?>
            <?php
            for ($i = 0; $i < 2; $i++) {
                $level++;
                ?>
                        <table border="1" style="float:left">
                            <tr>
                        <?php
			$gross_inv = $value['gross_inv'];
                        $net_inv = $value['net_inv'];

                        $capacity = $value['capacity'];
                        if ($capacity) {
                            $per = ($gross_inv * 100) / ($capacity);
                        }
                        $pro_percentage = round($per, 2);
                        $tank_id = $value['tank_id'];
                        ?> 

                            <center><td><b><?php echo $pro_percentage; ?>%</b></td><td colspan=2 align=center>
                                    <div  value="<?php echo $tank_id ?>" OnClick="tank(this);" class="outer" width="50%" style="float:right">


                                        <div id="inner<?php echo $level; ?>" class="inner" data-progress="<?php echo $pro_percentage; ?>%">

                                            <div></div>
                                        </div> 
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                    <td>Product Percentage:</td><td><?php echo $pro_percentage; ?></td>
                                </tr>
                                <tr>
                                    <td>Tank_id:</td><td><?php echo $value['tank_id']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Product Id:</td><td><?php echo $value['prod_id']; ?> </td>
                                </tr>
				<tr>
                                    <td>Volume:</td><td><?php echo $value['gross_inv']; ?> </td>
                                </tr>
				
                                </tr>


                        </table>



                <?php
                if ($i === 0) {

		    if(!($value = mysqli_fetch_array($result)))
                    {
                        break;
                    }
                    //$value = mysqli_fetch_array($result);
                    // $level++; 
                } else {
                    //$level++;
                }
                ?>
                        <?php }
                    ?>

                </div>

                    <?php }
                ?>


        <?php } ?> 

</div>
