   <?php session_start();?>
<style>
    @import "http://fonts.googleapis.com/css?family=Droid+Serif";
/* Above line is used for online google font */
h2 {
text-align:center;
font-size:24px
}
hr {
margin-bottom:30px
}
p {
color:#000;
font-size:16px;
font-weight:700
}
#button {
border:1px solid #0c799e;
width:250px;
padding:10px;
font-size:16px;
font-weight:700;
color:#fff;
border-radius:3px;
background:linear-gradient(to bottom,#59d0f8 5%,#49c0e8 100%);
cursor:pointer
}
#button:hover {
background:linear-gradient(to bottom,#49c0e8 5%,#59d0f8 100%)
}
input[type=text] {
margin-top:5px;
margin-bottom:20px;
width:96%;
border-radius:5px;
border:0;
padding:5px 0
}
#name,#email {
padding-left:10px
}
input[type=submit] {
width:30%;
border:1px solid #59b4d4;
background:#0078a3;
color:#eee;
padding:3px 0;
border-radius:5px;
margin-left:33%;
cursor:pointer
}
input[type=submit]:hover {
border:1px solid #666;
background:#555;
color:#fff
}
.ui-dialog .ui-dialog-content {
padding:2em
}
div.container {
width:960px;
height:610px;
margin:50px auto;
font-family:'Droid Serif',serif;
position:relative
}
div.main {
width:320px;
margin-top:35px;
float:left;
padding:10px 55px 25px;
background-color:rgba(204,204,191,0.51);
border:15px solid #fff;
box-shadow:0 0 10px;
border-radius:2px;
font-size:13px;
text-align:center
}
.ui-widget-content {
    background:#F5F5F5 !important;
}

</style>


<!DOCTYPE html>
<html>
<head>
    <?php //include("database_connection.php");?>
 
<title>Settings</title>
<link href="css/dialog.css" rel="stylesheet"> <!-- Including CSS File Here-->
<!-- Including CSS & jQuery Dialog UI Here-->
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="js/dialog.js" type="text/javascript"></script>
</head>
<body>  
<div class="box col-md-11" id="dialog">
        <div class="box-inner">
          <div class="box-header well">
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
              <div id="container" class="graph" style="min-width: 300px; height: 300px; margin: 0 auto">
                  <div  title="Settings">
                    <form action="" method="post" name="settings" id="settings">
                         <table align="">
                                <?php
                                    $user = $_SESSION["user"];
                                    $query = "select * from settings where user_id='$user'";
                                    $value = $mysqli->query($query);
                                    while($result = mysqli_fetch_array($value))
                                    {
                                        echo "<tr><td>User Id: </td><td>".$result['user_id']."</td></tr>";
                                        $user_id = $result['user_id'];
                                        $is_active = $result['is_active'];
                                            echo "<tr><td>Status: </td>";
                                        if($is_active == 1){
                                            echo "<td>Active</td></tr>";
                                        }
                                        else{
                                            echo "<td>Inactive</td></tr>";
                                        }
                                        $widget1 = $result['widget1'];
                                        echo "<tr><td>Graph Widget: </td>";
                                            if($widget1==1){
                                                $graph = 1;
                                                $selected='checked';
                                            }
                                            else{
                                                $graph = 0;
                                                $selected='';
                                            }
                                            echo "<td><input type=checkbox name=graph id=graph value=$graph $selected></td></tr>";
                                        
                                        //else{
                                         //   echo "<td><input type=checkbox name=graph></td></tr>";
                                        //}
                                        $widget2 = $result['widget2'];
                                        echo "<tr><td>Alarm Widget: </td>";
                                         if($widget2==1){
                                                $alarm = 1;
                                                $selected='checked';
                                                
                                            }
                                            else{
                                                $alarm = 0;
                                                $selected='';
                                            }
                                            echo "<td><input type=checkbox name=graph id=alarm value=$alarm $selected></td></tr>";
                                        
                                        $widget3 = $result['widget3'];
                                        echo "<tr><td>Tank Inventory Widget: </td>";
                                         if($widget3==1){
                                                $tank = 1;
                                                $selected='checked';
                                            }
                                            else{
                                                $tank = 0;
                                                $selected='';
                                            }
                                            echo "<td><input type=checkbox name=tank id=tank value=$tank $selected></td></tr>";
                                        
                                        echo "<tr><td><input type=submit name=save value=Save id=save></td></tr>";
                                 
                                    }
                                    ?>
                                
                                 
                          </table>
                    </form>
                  </div>
                  <input id="button" type="button" value="Open Dialog Form">
              </div>
            </div>
          </div>
</div>
</div>
</body>
</html>


<script>
    $(document).ready(function() {
        
        $(function() {
            
        $("#dialog").dialog({
        autoOpen: false
        });
        $("#button").on("click", function() {
        $("#dialog").dialog("open");
        });
        });
        
        $('#graph').change(function(){
        
        });
        // Validating Form Fields.....
        $("#save").click(function() {        
              if($('#graph').is(':checked')){
                var value=1;
            } else {
                var value=0;
            }  
            if($('#alarm').is(':checked')){
                var value2=1;
            } else {
                var value2=0;
            }  
            if($('#tank').is(':checked')){
                var value3=1;
            } else {
                var value3=0;
            }  
            
        $.ajax({
            async:false;
            type: "POST",
            url: "save-settings.php",
            data: {value1:value,value2:value2,value3:value3},
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log("error");
            }
       });
    return false;
    });
   });
</script>