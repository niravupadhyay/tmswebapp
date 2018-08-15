<?php

error_reporting(1);

?>


<style>
    .graph{
      min-width: 300px;
      height: 300px;
      margin: 0 auto;  
    }
   tspan {
    cursor: none;
    pointer-events: none !important;
}
    #chart{
        float:left;
    }
    #chart2{
        float:right;
    }
    .highcharts-legend-item {
    transform: unset !important;
}

    
    
</style>  
    <script src="js/highstock.js"></script>
<script src="js/exporting.js"></script>


<script src="js/dashboard-script.js"></script>
 

<script>
     $(document).ready(function() {
 
    $( ".highcharts-legend-item tspan" ).addClass( "display" );

         $('#message').html('Please Select Customer And Supplier');
  $("#gocustomer").click(function() {
  
    var x = $( "#supp_name option:selected" ).text() == "Select Supplier";
    var y = $( "#short_cust_name option:selected" ).text() == "Select Customer";
        if(x || y == "TRUE")
        {

//            $('#message').html('Please Select Customer And Supplier');

        }
        else{
            $('#message').html('');
        }
    });
     });
</script>
      
      <script>
            function select(str){
                {
                    
                    if (str == "") 
    {
        document.getElementById("short_cust_name").innerHTML = "";
        return;
    }
      else 
    { 
        if (window.XMLHttpRequest) 
        {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            var xmlhttp = new XMLHttpRequest();
        }
          else 
        {

            // code for IE6, IE5

            var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
            xmlhttp.onreadystatechange = function() 
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                {
                    document.getElementById("short_cust_name").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST","selected_value.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("supp_name="+str);

            // alert("transaction_viewer.php" Mithunva");

    }
}
            }
            /*    }
                var supp_name = $('#supp_name').val();
                alert(supp_name);
             $.ajax({
                type: 'POST',
                url: 'selected_value.php',
                data:{supp_name:supp_name},
                success: function(response) {

                    // Do Something
                    // document.write(supp_name);

                  },
                        error: function(xhr) {

                    // Do Something to handle error

                  }
                });
            });*/
          </script>
<div class="box col-md-12">
        <div class="box-innerg">
            
            
  <div id="main-slider-graph" class="liquid-slider">
    <div>
        <h2 class="title">Truck</h2>
       <div class="box col-md-11">
        <div class="box-inner abc">
          <div class="box-header well">
            <h2><i class="glyphicon glyphicon-list-alt"></i> Truck per Day</h2>
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
            <div id="main-container" class="center" style="">
              <div id="container" class="graph" style=""></div>
              <?php
             $detect = new Mobile_Detect;

                                // Any mobile device (phones or tablets).
                                if ( $detect->isMobile() ) {
                                   // echo "mobile bhai";
                                   ?>
         
                                       <div>                                     
                <select  float="left" id="chart" onblur="chartfunc1_mobile()">
                    <option name="mychart" class="mychart" id= "column1" value="column1">Column</option>
                    <option name="mychart" class="mychart" id= "bar1" value="bar1" >Bar</option>
                    <option name="mychart" class="mychart" id= "line1" value="line1">Line</option>                   
                </select>                                           
                <select id="chart1" float="right" onblur="chartduration1_mobile()">
                    <option name="grouping1" id="g1" class="grouping" value="day">Day</option>
                    <option name="grouping1" id="g2" class="grouping" value="month">Month</option>
                    <option name="grouping1" id="g3" class="grouping" value="year">Year</option>
                </select>
                                                                              
                                      
               <?php } else{ ?>
              <div>
                <input type="radio" name="mychart" class="mychart" id= "column1" value="column" onclick= "chartfunc1()" >Column 
                <input type="radio" name="mychart" class="mychart" id= "bar1" value="bar" onclick= "chartfunc1()">Bar
                 <!--  <input type="radio" name="mychart" class="mychart" id= "pie1" value="pie" onclick= "chartfunc1()">Pie-->
                <input type="radio" name="mychart" class="mychart" id= "line1" value="line" onclick= "chartfunc1()">Line -
                <input type="radio" name="grouping1" id="g1" class="grouping" value="day"/>Day 
                <input type="radio" name="grouping1" id="g2" class="grouping" value="month"/>Month
                <input type="radio" name="grouping1" id="g3" class="grouping" value="year"/>Year
             
               <?php } ?>
                <br/><br/>
                <input type="button" align="middle" id="refresh1" value="reload" class="mychart" onclick= "refresh1()"><r class="mapload1"></r>
             
                <div id="day" class="day" name="day" title="Truck - Select Date for Apr">
                  <table align="center">
                        <div id="alert1" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Date From:</th>
                      <td><input type="text" name="from1" id="from1" class="tcal required"  readonly required/></td>
                    </tr>
                    <tr>
                      <th>Date To:</th>
                      <td><input type="text" name="to1" id="to1" class="tcal required"  readonly/></td></tr>
                      <tr><td><input type="Submit" class="submit" name="submit" value="go"></td>
                    </tr>
                  </table>
                </div>
                <div class="month" name="month" id="month" title="Truck - Select Month for Year 2016 ">
                  <table align="center">
                  <div id="alert2" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Month From:</th>
                      <td><input type="text" class="tcalInput date-picker1" name="from2" id="from2"/></td>
                      </tr>
                    <tr>
                      <th>Month To:</th>
                      <td><input type="text" class="tcalInput date-picker2" name="to2" id="to2" readonly/></td></tr>
                    <tr>
                        <td><input type="Submit" class="submit2" name="submit2" value="go"></td></tr>
                    </tr>
                  </table>
                </div>
                <div class="year" id="year" name="year" title="Truck - Select Year ">
                  <table align="center">
                  
                  <div id="alert3" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Year From:</th>
                      <td><input type="text" name="from3" class="tcalInput date-picker3" id="from3" readonly/></td>
                    </tr>
                    <tr>
                      <th>Year To:</th>
                      <td><input type="text" name="to3" class="tcalInput date-picker4" id="to3" readonly/></td></tr>
                    <tr><td><input type="Submit" class="submit3" name="submit3" value="go"></td></tr>
                    </tr>
                  </table>
                </div>
                <br/><br/>
                
              </div>
              
              
            </div>
          </div>
        </div>
        </div>
    </div>
    <div>
    <h2 class="title">Transaction</h2>
    <div class="box col-md-11">
      <div class="box-inner abc">
        <div class="box-header well">
          <h2><i class="glyphicon glyphicon-list-alt"></i> Transactions per day</h2>
          <!--<div class="box-icon">-->
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-cog"></i></a>-->
            <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
            <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-remove"></i></a>-->
          <!--</div>-->
          
        </div>
        <div class="box-content">
          <div id="" class="center" style="">
            <div id="container2" class="graph" style=""></div>
            
            <?php
            if ( $detect->isMobile() ) {
                                   // echo "mobile bhai";
                                   ?>
         
                                       <div>                                     
                <select  float="left" id="chart" onblur="chartfunc2_mobile()">
                    <option name="mychart" class="mychart" id= "column2" value="column2">Column</option>
                    <option name="mychart" class="mychart" id= "bar2" value="bar2" >Bar</option>
                    <option name="mychart" class="mychart" id= "line2" value="line2">Line</option>           
                </select>
                <select id="chart2" float="right" onblur="chartduration2_mobile()">
                    <option name="grouping1" id="h1" class="grouping" value="day">Day</option>
                    <option name="grouping1" id="h2" class="grouping" value="month">Month</option>
                    <option name="grouping1" id="h3" class="grouping" value="year">Year</option>
                </select>
                                                            
               <?php } else{ ?>
                                           
            <div>
              <input type="radio" name="mychart2" class="mychart" id= "column2" value="column" onclick= "chartfunc2()" >Column
              <input type="radio" name="mychart2" class="mychart" id= "bar2" value="bar" onclick= "chartfunc2()">Bar
             <!-- <input type="radio" name="mychart2" class="mychart" id= "pie2" value="pie" onclick= "chartfunc2()">Pie-->
              <input type="radio" name="mychart2" class="mychart" id= "line2" value="line" onclick= "chartfunc2()">Line
              Day<input type="radio" name="grouping2" id="h1" class="grouping" value="Day" /> 
              Month<input type="radio" name="grouping2" id="h2" class="grouping" value="month" />
              Year<input type="radio" name="grouping2" id="h3" class="grouping" value="year" />
          <?php }?>
           <br/><br/>
              <input type="button" align="middle" id="refresh2" value="reload" class="mychart" onclick= "refresh2()"><r class="mapload2"></r>
            
              <div class="day" id="day2" name="day2" title="Transaction - Select Date for Apr 2016">
                <table align="center">
                <div id="alert4" class="alert4" name="alert4" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Trans From:</th>
                    <td><input type="text" name="date" class="tcal" id="from4" readonly/></td>
                  </tr>
                  <tr>
                    <th>Trans To:</th>
                    <td><input type="text" name="date" class="tcal" id="to4" readonly/></td></tr>
                    <tr><td><input type="Submit" class="submit4" name="submit4" value="go"></td>
                  </tr>
                </table>
              </div>
              <div class="month" id="month2" name="month2" title="Transaction - Select Month for 2016">
                <table align="center">
                <div id="alert5" class="alert5" name="alert5" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Month From:</th>
                    <td><input type="text" name="from5" class="tcalInput date-picker5" id="from5" readonly/></td>
                  </tr>
                  <tr>
                    <th>Month To:</th>
                    <td><input type="text" name="to5" class="tcalInput date-picker6" id="to5" readonly/></td></tr>
                  <tr><td><input type="Submit" class="submit5" name="submit5" value="go"></td></tr>
                  </tr>
                </table>
              </div>
              <div class="year" id="year2" name="year2" title="Transaction - Select Year ">
                <table align="center">
                <div id="alert6" class="alert6" name="alert6" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Year From:</th>
                    <td><input type="text" name="from6" class="tcalInput date-picker7" id="from6" readonly/></td>
                  </tr>
                  <tr>
                    <th>Year To:</th>
                    <td><input type="text" name="to6" class="tcalInput date-picker8" id="to6" readonly/></td></tr>
                  <tr><td><input type="Submit" class="submit6" name="submit6" value="go" ></td></tr>
                  </tr>
                </table>
              </div>
              <br/><br/>
              </div>
       
            
          </div>
        </div>
      </div>
     </div> 
    </div>
    
    <div>
        <h2 class="title">G2G</h2>
      <div class="box col-md-11">
      <div class="box-inner abc">
        <div class="box-header well">
          <h2><i class="glyphicon glyphicon-list-alt"></i> Avg. G2G</h2>
          <!--<div class="box-icon">-->
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-cog"></i></a>-->
            <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
            <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-remove"></i></a>-->
          <!--</div>-->
        </div>
        <div class="box-content">
          <div id="" class="center" style="">
            <div id="container3" class="graph" style=""></div>
             <?php
            if ( $detect->isMobile() ) {
                                   // echo "mobile bhai";
                                   ?>
         
                                       <div>                                     
               <select   id="chart" float="left" onblur="chartfunc3_mobile()">
                    <option name="mychart" class="mychart" id= "column3" value="column3">Column</option>
                    <option name="mychart" class="mychart" id= "bar3" value="bar3" >Bar</option>
                    <option name="mychart" class="mychart" id= "line3" value="line3">Line</option>
                </select>
                                           
                <select id="chart3" float="right" onblur="chartduration3_mobile()">
                    <option name="grouping1" id="i1" class="grouping" value="day">Day</option>
                    <option name="grouping1" id="i2" class="grouping" value="month">Month</option>
                    <option name="grouping1" id="i3" class="grouping" value="year">Year</option>
                </select>
                                                            
               <?php } else{ ?>
                                           
            <div>
              <input type="radio" name="mychart3" class="mychart" id= "column3" value="column" onclick= "chartfunc3()" >Column
              <input type="radio" name="mychart3" class="mychart" id= "bar3" value="bar" onclick= "chartfunc3()">Bar
             <!-- <input type="radio" name="mychart3" class="mychart" id= "pie3" value="pie" onclick= "chartfunc3()">Pie-->
              
              <input type="radio" name="mychart3" class="mychart" id= "line3" value="line" onclick= "chartfunc3()">Line
              Day<input type="radio" name="grouping3" id="i1" class="grouping" value="Day" /> 
              Month<input type="radio" name="grouping3" id="i2" class="grouping" value="month" />
              Year<input type="radio" name="grouping3" id="i3" class="grouping" value="year" />
              
          <?php }?>
              <br/><br/>
              <input type="button" id="refresh3" value="reload" class="mychart" onclick= "refresh3()"><r class="mapload3"></r>
            
              <div class="day" id="day3" name="day3" title="G2G - Select Date for Apr 2016">
                <table align="center">
                <div id="alert7" class="alert7" name="alert7" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Date From:</th>
                    <td><input type="text" name="date" class="tcal" id="from7" readonly/></td>
                  </tr>
                  <tr>
                    <th>Date To:</th>
                    <td><input type="text" name="date" class="tcal" id="to7" readonly/></td></tr>
                  <tr><td><input type="Submit" class="submit7" name="submit7" value="go"></td></tr>
                  </tr>
                </table>
              </div>
              <div class="month" id="month3" name="month3" title="G2G - Select Month for 2016">
                <table align="center">
                <div id="alert8" class="alert8" name="alert8" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Month From:</th>
                    <td><input type="text" name="from8" class="tcalInput date-picker9" id="from8" readonly/></td>
                  </tr>
                  <tr>
                    <th>Month To:</th>
                    <td><input type="text" name="to8" class="tcalInput date-picker10" id="to8" readonly/></td></tr>
                  <tr><td><input type="Submit" class="submit8" name="submit8" value="go"></td></tr>
                  </tr>
                </table>
              </div>
              <div class="year" id="year3" name="year3" title="G2G - Select Year ">
                <table align="center">
                <div id="alert9" class="alert9" name="alert9" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Year From:</th>
                    <td><input type="text" name="from9" class="tcalInput date-picker11" id="from9" readonly/></td>
                  </tr>
                  <tr>
                    <th>Year To:</th>
                    <td><input type="text" name="to9" class="tcalInput date-picker12" id="to9" readonly/></td></tr>
                    <tr><td><input type="Submit" class="submit9" name="submit9" value="go"></td>
                  </tr>
                </table>
              </div>
              <br/><br/>
              </div>
            
          </div>
        </div>
      </div>
    </div>  
  </div>
  
    <div>
      <h2 class="title">Loading</h2>
      <div class="box col-md-11">
      <div class="box-inner abc">
        <div class="box-header well">
          <h2><i class="glyphicon glyphicon-list-alt"></i> Avg Loading Time</h2>
          <!--<div class="box-icon">-->
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-cog"></i></a>-->
            <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
            <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-remove"></i></a>-->
          <!--</div>-->
        </div>
        <div class="box-content">
          <div id="" class="center" style="">
          <div id="container4" class="graph" style=""></div>
           <?php
            if ( $detect->isMobile() ) {
                                   // echo "mobile bhai";
                                   ?>
         
                                       <div>                                     
               <select   id="chart4" float="left" onblur="chartfunc4_mobile()">
                    <option name="mychart" class="mychart" id= "column4" value="column">Column</option>
                    <option name="mychart" class="mychart" id= "bar4" value="bar" >Bar</option>
                    <option name="mychart" class="mychart" id= "line4" value="line">Line</option>
                </select>
                <select id="chart4" float="right" onblur="chartduration4_mobile()">
                    <option name="grouping1" id="j1" class="grouping" value="day">Day</option>
                    <option name="grouping1" id="j2" class="grouping" value="month">Month</option>
                    <option name="grouping1" id="j3" class="grouping" value="year">Year</option>
                </select>
                                                            
               <?php } else{ ?>
                                           
            <div>
              <input type="radio" name="mychart4" class="mychart" id= "column4" value="column" onclick= "chartfunc4()" >Column
              <input type="radio" name="mychart4" class="mychart" id= "bar4" value="bar" onclick= "chartfunc4()">Bar
             <!-- <input type="radio" name="mychart4" class="mychart" id= "pie4" value="pie" onclick= "chartfunc4()">Pie-->
              <input type="radio" name="mychart4" class="mychart" id= "line4" value="line" onclick= "chartfunc4()">Line
              Day<input type="radio" name="grouping4" id="j1" class="grouping" value="Day" /> 
              Month<input type="radio" name="grouping4" id="j2" class="grouping" value="month" />
              Year<input type="radio" name="grouping4" id="j3" class="grouping" value="year" />
          
          <?php }?>
              <br/><br/>
               <input type="button" id="refresh4" value="reload" class="mychart" onclick= "refresh4()"><r class="mapload4"></r>
           
              <div class="day" id="day4" title="Loading - Select Date for Apr 2016">
                <table align="center">
                <div id="alert10" class="alert10" name="alert10" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Date From:</th>
                    <td><input type="text" name="date" class="tcal" id="from10" readonly/></td>
                  </tr>
                  <tr>
                    <th>To:</th>
                    <td><input type="text" name="date" class="tcal" id="to10" readonly/></td>
                    <td><input type="Submit" class="submit10" name="submit" value="go"></td>
                  </tr>
                </table>
              </div>
              <div class="month" id="month4" title="Loading - Select Month for 2016">
                <table align="center">
                <div id="alert11" class="alert11" name="alert11" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Month From:</th>
                    <td><input type="text" name="from11" class="tcalInput date-picker13" id="from11" readonly/></td>
                  </tr>
                  <tr>
                    <th>To:</th>
                    <td><input type="text" name="to11" id="to11" class="tcalInput date-picker14" readonly/></td>
                    <td><input type="Submit" class="submit11" name="submit11" value="go"></td>
                  </tr>
                </table>
              </div>
              <div class="year" id="year4" title="Loading - Select Year ">
                <table align="center">
                <div id="alert12" class="alert12" name="alert12" style="color:red;border-color:red"></div>
                  <tr>
                    <th>Year From:</th>
                    <td><input type="text" name="from12" class="tcalInput date-picker15" id="from12" readonly/></td>
                  </tr>
                  <tr>
                    <th>To:</th>
                    <td><input type="text" name="to12" id="to12" class="tcalInput date-picker16" readonly/></td>
                    <td><input type="Submit" class="submit12" name="submit12" value="go"></td>
                  </tr>
                </table>
              </div>
              <br/><br/>
              </div>
            
          </div>
        </div>
      </div>
    </div>
   </div>
  
    
           <div>
      <h2 class="title">Customer</h2>
      <div class="box col-md-11">
      <div class="box-inner abc">
        <div class="box-header well">
          <h2><i class="glyphicon glyphicon-list-alt"></i> Customer Transaction</h2>
          <!--<div class="box-icon">-->
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-cog"></i></a>-->
            <!--<a href="#" class="btn btn-minimize btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-chevron-up"></i></a>-->
            <!--<a href="#" class="btn btn-close btn-round btn-default"><i-->
              <!--class="glyphicon glyphicon-remove"></i></a>-->
          <!--</div>-->
        </div>
               <div class="box-content">
                  
                Supplier:  <select class="select" id="supp_name" name="supp_name" onChange="select(this.value)">
                        <?php
$query1 = "SELECT distinct TransHeader.supplier_no,Supplier.supplier_name FROM TransHeader INNER JOIN Supplier ON TransHeader.supplier_no = Supplier.supplier_no";
$result1 = $mysqli->query($query1);
echo "<option>Select Supplier</option>";

while ($value1 = mysqli_fetch_array($result1))
	{
	echo "<option name=" . $value1['supplier_no'] . " id=" . $value1['supplier_no'] . " value=" . $value1['supplier_no'] . ">" . $value1['supplier_no'] . ' - ' . $value1['supplier_name'] . "</option>";
	}

?>
               </select>
                <?php
             if ( $detect->isMobile() ) {
           ?>
           <br/><br/>
             <?php } ?>
               Customer: <select class="select" id="short_cust_name" name="short_cust_name">
                                <option>Select Customer</option>        
                </select>
                                    <input type="button" name="gocustomer" id="gocustomer" value="Go">
            <div id="" class="center" style="">
                
                <div class="" id="message" style="color:red;"></div>
                <div id="container5" class="graph">
                  
                </div>
                
                <?php
            if ( $detect->isMobile() ) {
                                   // echo "mobile bhai";
                                   ?>
         
                                       <div>                                     
               <select id="chart" onblur="chartfunc5_mobile()">
                    <option name="mychart" class="mychart" id= "column5" value="column">Column</option>
                    <option name="mychart" class="mychart" id= "bar5" value="bar" >Bar</option>
                    <option name="mychart" class="mychart" id= "line5" value="line">Line</option>
                   
                    
                </select>
                                          
                <select id="chart5" onblur="chartduration5_mobile()">
                    <option name="grouping1" id="k1" class="grouping" value="day">Day</option>
                    <option name="grouping1" id="k2" class="grouping" value="month">Month</option>
                    <option name="grouping1" id="k3" class="grouping" value="year">Year</option>
                </select>
                                                            
               <?php } else{ ?>
                                           <div>
                <input type="radio" name="mychart5" class="mychart" id= "column5" value="column" onclick= "chartfunc5()" >Column 
                <input type="radio" name="mychart5" class="mychart" id= "bar5" value="bar" onclick= "chartfunc5()">Bar
                <input type="radio" name="mychart5" class="mychart" id= "line5" value="line" onclick= "chartfunc5()">Line -
                <input type="radio" name="grouping5" id="k1" class="grouping" value="Day"/>Day 
                <input type="radio" name="grouping5" id="k2" class="grouping" value="month"/>Month
                <input type="radio" name="grouping5" id="k3" class="grouping" value="year"/>Year
                
               <?php } ?>
                <br/><br/>
                <input type="button" id="refresh5" value="reload" class="mychart" data-icon="refresh"><r class="mapload5"></r>
             
                <div id="day5" class="day" name="day5" title="Truck - Select Date for <?php
                echo date('M');
                ?>">
                  <table align="center">
                                <div id="alert13" name="alert13" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Date From:</th>
                      <td><input type="text" name="from13" id="from13" class="tcal required"  readonly required/></td>
                    </tr>
                    <tr>
                      <th>Date To:</th>
                      <td><input type="text" name="to13" id="to13" class="tcal required"  readonly/></td></tr>
                    <tr><td><input type="Submit" class="submit13" name="submit13" value="go"></td></tr>
                    </tr>
                  </table>
                </div>
                <div class="month" name="month5" id="month5" title="Truck - Select Month for Year <?php
echo date('Y');
?> ">
                  <table align="center">
                  <div id="alert14" name="alert14" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Month From:</th>
                      <td><input type="text" class="tcalInput date-picker17" name="from14" id="from14"/></td>
                      </tr>
                    <tr>
                      <th>Month To:</th>
                      <td><input type="text" class="tcalInput date-picker18" name="to14" id="to14" readonly/></td></tr>
                    <tr><td><input type="Submit" class="submit14" name="submit14" value="go"></td></tr>
                    </tr>
                  </table>
                </div>
                <div class="year" id="year5" name="year5" title="Truck - Select Year ">
                  <table align="center">
                  
                  <div id="alert15" name="alert15" style="color:red;border-color:red"></div>
                    <tr>
                      <th>Year From:</th>
                      <td><input type="text" name="from15" class="tcalInput date-picker19" id="from15" readonly/></td>
                    </tr>
                    <tr>
                      <th>Year To:</th>
                      <td><input type="text" name="to15" class="tcalInput date-picker20" id="to15" readonly/></td></tr>
                      <tr><td><input type="Submit" class="submit15" name="submit15" value="go"></td>
                    </tr>
                  </table>
                </div>
               
                 </div>
              
            </div>
          </div>
        </div>
    </div>
           </div>     
      <p class="last">
         
      </p>
      
  
  </div>
              
      
  </div>
    
    </div>
    
<!-- chart libraries start -->
  <script src="bower_components/flot/excanvas.min.js"></script>
  <script src="bower_components/flot/jquery.flot.js"></script>
  <!--<script src="bower_components/flot/jquery.flot.pie.js"></script>-->
  <script src="bower_components/flot/jquery.flot.stack.js"></script>
  <script src="bower_components/flot/jquery.flot.resize.js"></script>
  <!-- chart libraries end -->
