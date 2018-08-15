<?php
	session_start();
	include "database_connection.php";
	if(isset($_SESSION['global']))
	{?>
<?php include("header.php");?>

<style>
    .loadimg{
    position: fixed;
    margin: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
.ch-container {
    min-height: 200px !important;
    padding: 0 20px;
}
</style>

<script type="text/javascript" src="js/cookie.jquery.json.js"></script>
<link rel="stylesheet" href="css/jquery.treegrid.css">

<script type="text/javascript" src="js/jquery.treegrid.js"></script>

<script>
                         $(window).load(function()  { 
                             $("#reload-f-detail").click(function(){
                                   // alert("clicked");
                                    facility_data();
                               //document.getElementById("load").innerHTML = "<img src='images/load.gif' width='2%'> Loading...";
                           });
                         // document.getElementById("container").innerHTML = "<img class='loadimg' src='images/load.gif' width='10%' align='center'>";
                    }); 
                        
                               function facility_data(){
                                   //alert("hi");
                                  // document.getElementById("load").innerHTML = "<img src='images/load.gif' width='1%'> Loading...";
                                $.ajax({
                                    url: 'facility_data_detail_new.php',
                                    datatype:"html",
                                    cache:"false",
                                     success:function(data)
                                            {
                                                //do something with response data
                                                //alert("inside ajax");
                                                document.getElementById("load").innerHTML = "";
                                                $('.container').html(data);
                                            }
                                          });
                                      }
                                      
                                      
                                      setInterval(function()
                                        { 
                                           facility_data();
                                        },8000);
                                        facility_data();
                                 
                            </script>
                           
    
	
<div id="result"></div>
            <div class="row1">
    <div class="box col-md-11">
        <div class="box-inner fac">
     <div class="box-header well">
         <h2><i class="glyphicon glyphicon-list-alt"></i>							
				<?php
				    $currentFile = $_SERVER["PHP_SELF"];	
					$input = $currentFile;
					$result = explode('/',$input);
					echo $result[0];
					$file = basename($currentFile);         // $file is set to "index.php"
					$file2 = basename($file, ".php");
					echo $file2;
					?>

				</h2>

                <!--<div class="box-icon">-->
				
                    <!--<a href="#" id="" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                    <!--<a href="#" id="min" class="btn btn-minimize btn-round btn-default"><i-->
                            <!--id="toggle" class="glyphicon glyphicon-chevron-up"></i></a>-->
                    <!--<a href="#" id="close" class="btn btn-close btn-round btn-default"><i-->
                            <!--class="glyphicon glyphicon-remove"></i></a>-->
                <!--</div>-->
            </div>
            <div class="box-content2 row1">
                <div class="col-lg-7 col-md-11">
                   
    </div>

  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
	

<body>
		<!---section---->
		<section>
			<div>
		<form>
                    <input type="button" id="reload-f-detail" value="Reload">  
                <r id="reloadhere"></r>
                <p id="load"></p>
        <table>
			<tr>
				<td>Terminal</td><td>
                <select disabled="disabled" name="selterminal">
                <?php
					$query1="SELECT term_id FROM TerminalProfile";
					$result=$mysqli->query($query1);
					while($value = mysqli_fetch_array($result))
					{
						echo "<option value=".$value["term_id"].">".$value['term_id']."</option>";
            	    }
				?>
                </select>
                </td>
                <td width="300px">
                <?php
					$query = "select name from TerminalProfile";
					$result = $mysqli->query($query);
					$value = mysqli_fetch_array($result);
					//echo $value['name'];
                                        echo "CN Cargoflow"
				?>
                </td>
			</tr>
		</table>
		</form>
		<form>
                    <div class="container" id="container"></div>
                    
		  <?php
                            
                            
        }         
        else
	{
		header("location:index.php");
		session_destroy();
	}?>
                    
                    </section>
            </div></div></div></div></div></div>
    
       <?php include("footer.php");?>