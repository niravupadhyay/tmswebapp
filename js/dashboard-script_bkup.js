$(document).ready(function() { 
         
         
            $(".highcharts-data-labels").css({"visibility":"visible", 'pointer-events': 'none'});
           $("#day").dialog({
                autoOpen: false
            });
            $("#month").dialog({
                autoOpen: false
            });
            $("#year").dialog({
                autoOpen: false
            });
            $("#day2").dialog({
                autoOpen: false
            });
            $("#month2").dialog({
                autoOpen: false
            });
            $("#year2").dialog({
                autoOpen: false
            });
            $("#day3").dialog({
                autoOpen: false
            });
            $("#month3").dialog({
                autoOpen: false
            });
            $("#year3").dialog({
                autoOpen: false
            });
            $("#day4").dialog({
                autoOpen: false
            });
            $("#month4").dialog({
                autoOpen: false
            });
            $("#year4").dialog({
                autoOpen: false
            });
            $("#day5").dialog({
                autoOpen: false
            });
            $("#month5").dialog({
                autoOpen: false
            });
            $("#year5").dialog({
                autoOpen: false
            });
           
      
    /*$(".output-success").css("visibility", "xen");
    var term_id = $("#term_id").val();
    $("#addupdate").click(function() {
        $(".output-success").css("visibility", "visible");
        $('.success').css("background", "none");
        $('.output-success').html('<images src="images/loading.gif" width="5%"> loading...');
        $.ajax({
            type: "POST",
            url: "add.php",
            data: $("#frm1").serialize() + "&term_id=" + term_id,
            dataType: "html",
            success: function(data) {
                console.log(data);
                $(".output-success").css("background-color", "#DFF2BF");
                $(".output-success").css("visibility", "visible");
                $('.output-success').html(data);
            }
        });
    });*/
    $("#min").click(function() {
		if ($("#toggle").hasClass("glyphicon glyphicon-chevron-up")) {
            $("#abc").show();
            $("#i1").remove();
        }
        if ($("#toggle").hasClass("glyphicon glyphicon-chevron-down")) {
            $("#abc").hide();
            $("#content").append('<img id="i1" width="99%" height="83%" src="images/tms6.png">');
        }
    });
    $("#close").click(function() {
        $("#abc").show();
        $("#i1").remove();
        $("#content").append('<img id="i1" width="99%" height="83%" src="images/tms6.png">');
    });
});
$(document).ready(function() {
	
	
    $('.date-picker1').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker1').val(month);
            //var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });

	$('.date-picker2').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker2').val(month);
			//$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
	 $('.date-picker3').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker3').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
	 $('.date-picker4').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker4').val(year);
         
        }
    });
	$('.date-picker5').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker5').val(month);
         
        }
    });
	$('.date-picker6').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker6').val(month);
         
        }
    });
	$('.date-picker7').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			var sup = $('.date-picker7').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
	 $('.date-picker8').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			var sup = $('.date-picker8').val(year);
         
        }
    });
	
	$('.date-picker9').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker9').val(month);
         
        }
    });
	$('.date-picker10').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker10').val(month);
         
        }
    });
	$('.date-picker11').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			var sup = $('.date-picker11').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
	 $('.date-picker12').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			var sup = $('.date-picker12').val(year);
         
        }
    });
	$('.date-picker13').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker13').val(month);
         
        }
    });
	$('.date-picker14').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker14').val(month);
         
        }
    });
	$('.date-picker15').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
			//var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			//month++;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker15').val(year);
           //$('.date-picker').val('setDate', new Date(month, 1));
        }
    });
	 $('.date-picker16').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker16').val(year);
         
        }
    });
     $('.date-picker17').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker17').val(month);
         
        }
    });
    
    $('.date-picker18').datepicker( {
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			month++;
			var sup = $('.date-picker18').val(month);
         
        }
    });
    
     $('.date-picker19').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker19').val(year);
         
        }
    });
     $('.date-picker20').datepicker( {
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'Y',
        onClose: function(dateText, inst) { 
		//alert(dateText);
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			//year++;
			var sup = $('.date-picker20').val(year);
         
        }
    });
    
    
	$("#tcal").css("visibility", "hidden !important");
	$(".ui-button").click(function() {
		$("#tcal").css("visibility", "hidden");
		
	});	
	
	var m_names = ['January', 'February', 'March', 
               'April', 'May', 'June', 'July', 
               'August', 'September', 'October', 'November', 'December'];

	d = new Date();
	var currentYear = (new Date).getFullYear();
	var n = m_names[d.getMonth()];
	
    $("#g1").click(function() {
		
		//alert("hi");
		$.getScript("js/tcal_day.js");
		$("#day").dialog({
                autoOpen: false
            });
		$("#day").dialog("open");
        $("#month").dialog("close");
        $("#year").dialog("close");
        //$( "#tcalControls td" ).css("visibility", "hidden");
    });
   
    chartduration1_mobile = function(){
	var duration = $('select[id="chart1"]').val();
        if(duration=="day"){
		$.getScript("js/tcal_day.js");
		$("#day").dialog({
                autoOpen: false
            });
		$("#day").dialog("open");
        $("#month").dialog("close");
        $("#year").dialog("close");
        //$( "#tcalControls td" ).css("visibility", "hidden");
        }
  
       else if(duration== "month"){
		$("#month").dialog({
                autoOpen: false
            });
        $("#month").dialog("open");
        $("#day").dialog("close");
        $("#year").dialog("close");
    }
        
        else {
		$("#year").dialog({
                autoOpen: false
            });
        $("#year").dialog("open");
        //$.getScript("js/tcal_year.js");
        $("#month").dialog("close");
        $("#day").dialog("close");
    }
    
    }
    
	
	
    $(".submit").click(function() {
	
    var x = document.getElementById("from1").value;
	var y = document.getElementById("to1").value;
	
    if (x == null || x == "") {
		
		document.getElementById("alert1").innerHTML="Please Enter From Date";
		document.getElementById("from1").style.borderColor = "red";
		document.getElementById("from1").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert1").innerHTML="Please Enter To Date";
		document.getElementById("to1").style.borderColor = "red";
		document.getElementById("to1").focus();	
		return false;
    }
	else{
        $("#alert1").css({"visibility":"hidden"});
        $("#tcal").css("visibility", "hidden !important");
        //$("#from1").addClass("tcal tcalInput");
        var datepicker = $("input:text[id=from1]").val();
        var datepicker2 = $("input:text[id=to1]").val();
        $.getJSON("graph/data_date.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload1").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
			$("#day").dialog("close");
        });
        
//        setInterval(function(){ 
//    //code goes here that will be run every 5 seconds.   
//    
//    $.getJSON("graph/data_date.php?from=" + datepicker, "to=" + datepicker2, function(json) {
//            $(".mapload1").css("visibility", "hidden");
//            options.xAxis.categories = json[0]['data'];
//            //options.datepicker = json[0]['datepicker'];
//            options.series[0] = json[1];
//            //options.series[1] = json[2];
//            //options.series[2] = json[3];
//            chart = new Highcharts.Chart(options);
//			$("#day").dialog("close");
//        });
//}, 5000);
    }
	});
    $("#refresh1").click(function() {
        $(".mapload1").css("visibility", "visible");
        $('.container').html('<img src="images/loading.gif" width="5%"> loading...');
        $.getJSON("graph/data.php", function(json) {
            $(".mapload1").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.radio = json[0]['grouping'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
    });
    
//    setInterval(function(){ 
//    //code goes here that will be run every 5 seconds. 
//    
//    $(".mapload1").css("visibility", "visible");
//        $('.container').html('<img src="images/loading.gif" width="5%"> loading...');
//        $.getJSON("graph/data.php", function(json) {
//            $(".mapload1").css("visibility", "hidden");
//            options.xAxis.categories = json[0]['data'];
//            //options.radio = json[0]['grouping'];
//            options.series[0] = json[1];
//            //options.series[1] = json[2];
//            //options.series[2] = json[3];
//            chart = new Highcharts.Chart(options);
//        });
//}, 5000);

    $("#g2").click(function() {
		$("#month").dialog({
                autoOpen: false
            });
        $("#month").dialog("open");
        $("#day").dialog("close");
        $("#year").dialog("close");
		
       // $.getScript("js/tcal_month.js");
    });
    
	
	
	
    $(".submit2").click(function() {

	var x = document.getElementById("from2").value;
	var y = document.getElementById("to2").value;

    if (x == null || x == "") {
		
		document.getElementById("alert2").innerHTML="Please Enter From Date";
		document.getElementById("from2").style.borderColor = "red";
		//document.getElementById("from2").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert2").innerHTML="Please Enter To Date";
		document.getElementById("to2").style.borderColor = "red";
		//document.getElementById("to2").focus();	
		return false;
    }
	else{
		$("#alert2").css({"visibility":"hidden"});
        $("#month").dialog("close");
        var datepicker = $("input:text[id=from2]").val();
        var datepicker2 = $("input:text[id=to2]").val();
        $.getJSON("graph/data_month.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload1").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $("#g3").click(function() {
		$("#year").dialog({
                autoOpen: false
            });
        $("#year").dialog("open");
        //$.getScript("js/tcal_year.js");
        $("#month").dialog("close");
        $("#day").dialog("close");
    });
     $("#h3").click(function() {
		$("#year").dialog({
                autoOpen: false
            });
        $("#year").dialog("open");
        //$.getScript("js/tcal_year.js");
        $("#month").dialog("close");
        $("#day").dialog("close");
    });
    
    
    $(".submit3").click(function() {
	var x = document.getElementById("from3").value;
	var y = document.getElementById("to3").value;

    if (x == null || x == "") {
		
		document.getElementById("alert3").innerHTML="Please Enter From Date";
		document.getElementById("from3").style.borderColor = "red";
		document.getElementById("from3").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert3").innerHTML="Please Enter To Date";
		document.getElementById("to3").style.borderColor = "red";
		document.getElementById("to3").focus();	
		return false;
    }
	else{
		$("#alert3").css({"visibility":"hidden"});
        $("#year").dialog("close");
        var datepicker = $("input:text[id=from3]").val();
        var datepicker2 = $("input:text[id=to3]").val();
        $.getJSON("graph/data_year.php?from=" + datepicker,"to=" + datepicker2, function(json) {
            $(".mapload1").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    
     chartduration2_mobile = function(){
	var duration = $('select[id="chart2"]').val();
      
        if(duration=="day"){
		$("#day2").dialog({
                autoOpen: false
            });
        $("#day2").dialog("open");
        $.getScript("js/tcal_day.js");
        $("#year2").dialog("close")
        $("#month2").dialog("close");
        }
  
       else if(duration== "month"){
		$("#month2").dialog({
                autoOpen: false
            });
       // $.getScript("js/tcal_month.js");
        $("#month2").dialog("open");
        $("#year2").dialog("close")
        $("#day2").dialog("close");
    }
        
        else{
		$("#year2").dialog({
                autoOpen: false
            });
        $("#year2").dialog("open");
       // $.getScript("js/tcal_year.js");
        $("#month2").dialog("close");
        $("#day2").dialog("close");
    }
    
    }
    
    
    $("#h1").click(function() {
		$("#day2").dialog({
                autoOpen: false
            });
        $("#day2").dialog("open");
        $.getScript("js/tcal_day.js");
        $("#year2").dialog("close")
        $("#month2").dialog("close");
    });
    $("#h2").click(function() {
		$("#month2").dialog({
                autoOpen: false
            });
       // $.getScript("js/tcal_month.js");
        $("#month2").dialog("open");
        $("#year2").dialog("close")
        $("#day2").dialog("close");
    });
    $("#h3").click(function() {
		$("#year2").dialog({
                autoOpen: false
            });
        $("#year2").dialog("open");
       // $.getScript("js/tcal_year.js");
        $("#month2").dialog("close");
        $("#day2").dialog("close");
    });
    
    
    
     chartduration3_mobile = function(){
	var duration = $('select[id="chart3"]').val();
        if(duration=="day"){
		$("#day3").dialog({
                autoOpen: false
            });
        $.getScript("js/tcal_day.js");
        $("#day3").dialog("open");
        $("#month3").dialog("close");
        $("#year3").dialog("close");
        }
  
       else if(duration== "month"){
		$("#month3").dialog({
                autoOpen: false
            });
       // $.getScript("js/tcal_month.js");
        $("#month3").dialog("open");
        $("#day3").dialog("close");
        $("#year3").dialog("close");
    }
        
        else {
		$("#year3").dialog({
                autoOpen: false
            });
      // $.getScript("js/tcal_year.js");
        $("#month3").dialog("close");
        $("#day3").dialog("close");
        $("#year3").dialog("open");
    }
    
    }
    
    
    
    $("#i1").click(function() {
		$("#day3").dialog({
                autoOpen: false
            });
        $.getScript("js/tcal_day.js");
        $("#day3").dialog("open");
        $("#month3").dialog("close");
        $("#year3").dialog("close");
    });
    $("#i2").click(function() {
		$("#month3").dialog({
                autoOpen: false
            });
       // $.getScript("js/tcal_month.js");
        $("#month3").dialog("open");
        $("#day3").dialog("close");
        $("#year3").dialog("close");
    });
    $("#i3").click(function() {
		$("#year3").dialog({
                autoOpen: false
            });
      // $.getScript("js/tcal_year.js");
        $("#month3").dialog("close");
        $("#day3").dialog("close");
        $("#year3").dialog("open");
    });
    
    
    
     chartduration4_mobile = function(){
	var duration = $('select[id="chart4"]').val();
        if(duration=="day"){
		
        $.getScript("js/tcal_day.js");
        $("#day4").dialog({
                autoOpen: false
            });
        $.getScript("js/tcal_day.js");
        $("#day4").dialog("open");
		$("#month4").dialog("close");
        $("#year4").dialog("close");
     }
		
  
       else if(duration== "month"){
		$("#month4").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_month.js");
        $("#month4").dialog("open");
        $("#day4").dialog("close");
        $("#year4").dialog("close");
    }
        
        else {
		$("#year4").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_year.js");
		 $("#year4").dialog("open");
        $("#month4").dialog("close");
        $("#day4").dialog("close");
    }
    
    }
    
    
    $("#j1").click(function() {
		$("#day4").dialog({
                autoOpen: false
            });
        $.getScript("js/tcal_day.js");
        $("#day4").dialog("open");
		$("#month4").dialog("close");
        $("#year4").dialog("close");
    });
    $("#j2").click(function() {
		$("#month4").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_month.js");
        $("#month4").dialog("open");
        $("#day4").dialog("close");
        $("#year4").dialog("close");
    });
    $("#j3").click(function() {
		$("#year4").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_year.js");
		 $("#year4").dialog("open");
        $("#month4").dialog("close");
        $("#day4").dialog("close");
       
    });
    $('.mapload1').html('<img src="images/loading.gif" width="5%"> loading...');
    var options = {
        credits: {
            enabled: false
        },
        chart: {
            renderTo: 'container',
            type: 'bar',
			//zoomType: 'xy'
        },
        title: {
            text: 'No.of Truck',
            x: -20 //center
        },
        subtitle: {
            text: n+currentYear,
            x: -20
        },
        xAxis: {
			gridLineWidth: 1,	
			title: {
                text: 'Folio'
            },
			labels: {
                overflow: 'justify'
            },
            categories: [],
        },
        yAxis: {
			gridLineWidth: 1,	
            title: {
                text: 'No.of Truck'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            formatter: function() {
                return this.series.name + '<br/>' +
                    '<b>' +this.x + ': ' + this.y+'</b>';
                useHTML: true
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            borderWidth: 1
        },
        plotOptions: {
            line: {
                lineWidth: 3,
                shadow: false,
                marker: {
                    fillColor: '#fff',
                    /* LINE POINT COLOR */
                    lineWidth: 2,
                    radius: 4,
                    symbol: 'circle',
                    /* "circle", "square", "diamond", "triangle" and "triangle-down" */
                    lineColor: null // inherit from above defined colors
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            },
            column: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
           /* pie: {
                dataLabels: {
                    enabled: true,
				
				format: '<b>{point.name}</b>: {point.percentage:.1f}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#666',
                borderWidth: 1,
                shadow: false
            },*/
        },
        series: []
            // var chart = new Highcharts.Chart(options);
            //buttonhandle1();
    }
    $.getJSON("graph/data.php", function(json) {
        $("#bar1").attr('checked', true);
        $(".mapload1").css("visibility", "hidden");
        options.xAxis.categories = json[0]['data'];
        //options.datepicker = json[0]['datepicker'];
        options.series[0] = json[1];
        //options.series[1] = json[2];
        //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
    /*$("#graph").validate({
    rules: {
    from1: "required",
    to1:"required"
    },
    messages: {
    from1: "Please select start date",
    to1: "Please select end date"
    },
    submitHandler: function(form){
    alert("submit");
    return false;
    } 
    });
    /*	$("#graph-month").validate({
    rules: {
    from2: "required"
    },
    messages: {
    to2: "Please select date"
    }
    })
    //setInterval(function()	{	
    */
	
 chartfunc1_mobile = function() {
            
          
            var column = document.getElementById('column1');
            var bar = document.getElementById('bar1');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line1');
            if (column.selected) {
                options.chart.renderTo = 'container';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.selected) {
                options.chart.renderTo = 'container';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }
        }	
    chartfunc1 = function() {
            //alert("chart");
            var column = document.getElementById('column1');
            var bar = document.getElementById('bar1');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line1');
            if (column.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }
        }
        //}, 200000);
});
$(document).ready(function() {
    //setInterval(function()	{
	var m_names = ['January', 'February', 'March', 
               'April', 'May', 'June', 'July', 
               'August', 'September', 'October', 'November', 'December'];

	d = new Date();
	var currentYear = (new Date).getFullYear();
	var n = m_names[d.getMonth()];
	
    $('.mapload2').html('<img src="images/loading.gif" width="5%"> loading...');
    var options = {
        credits: {
            enabled: false
        },
        chart: {
            renderTo: 'container2',
            type: 'line',
			//zoomType: 'xy'
        },
        title: {
            text: 'No.of Transaction',
            x: -20 //center
        },
        subtitle: {
            text: n + currentYear,
            x: -20
        },
        xAxis: {
			gridLineWidth: 1,
            categories: [],
            title: {
                text: 'Folio'
        },
		labels: {
                overflow: 'justify'
            },
		},
        yAxis: {
			gridLineWidth: 1,
             title: {
                text: 'No.of Transaction'
            },
            labels: {
                overflow: 'justify'
            }
        },
		tooltip: {
            formatter: function() {
                return  this.series.name + '<br/>' +
                    '<b>'+this.x + ': ' + this.y +'</b>';
                useHTML: true
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            borderWidth: 1
        },
        plotOptions: {
            line: {
                lineWidth: 3,
                shadow: false,
                marker: {
                    fillColor: '#fff',
                    /* LINE POINT COLOR */
                    lineWidth: 2,
                    radius: 4,
                    symbol: 'circle',
                    /* "circle", "square", "diamond", "triangle" and "triangle-down" */
                    lineColor: null // inherit from above defined colors
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            },
            column: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
           /* pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#666',
                borderWidth: 1,
                shadow: false
            },*/
        },
        series: []
    }
    $.getJSON("graph/data2.php", function(json) {
		$("#line2").attr('checked', true);
        $(".mapload2").css("visibility", "hidden");
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        //options.series[1] = json[2];
        //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
    $(".submit4").click(function() {
	var x = document.getElementById("from4").value;
	var y = document.getElementById("to4").value;

    if (x == null || x == "") {
		
		document.getElementById("alert4").innerHTML="Please Enter From Date";
		document.getElementById("from4").style.borderColor = "red";
		document.getElementById("from4").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert4").innerHTML="Please Enter To Date";
		document.getElementById("to4").style.borderColor = "red";
		document.getElementById("to4").focus();	
		return false;
    }
	else{
		$("#alert4").css({"visibility":"hidden"});
        $("#day2").dialog("close");
        var datepicker = $("input:text[id=from4]").val();
        var datepicker2 = $("input:text[id=to4]").val();
        $.getJSON("graph/data2_date.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload2").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    var chart1 = new Highcharts.Chart(options);
    
     chartfunc2_mobile = function() {
     //alert("hi");
            //alert("chart");
            var column = document.getElementById('column2');
            var bar = document.getElementById('bar2');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line2');
            if (column.selected) {
                options.chart.renderTo = 'container2';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.selected) {
                options.chart.renderTo = 'container2';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container2';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }
        }	
        
        
    chartfunc2 = function() {
        var column = document.getElementById('column2');
        var bar = document.getElementById('bar2');
        //var pie = document.getElementById('pie2');
        var line = document.getElementById('line2');
        if (column.checked) {
            options.chart.renderTo = 'container2';
            options.chart.type = 'column';
            var chart1 = new Highcharts.Chart(options);
        } else if (bar.checked) {
            options.chart.renderTo = 'container2';
            options.chart.type = 'bar';
            var chart1 = new Highcharts.Chart(options);
        } /*else if (pie.checked) {
            options.chart.renderTo = 'container2';
            options.chart.type = 'pie';
            var chart1 = new Highcharts.Chart(options);
        } */else {
            options.chart.renderTo = 'container2';
            options.chart.type = 'line';
            var chart1 = new Highcharts.Chart(options);
        }
    }
    $(".submit5").click(function() {
		
	var x = document.getElementById("from5").value;
	var y = document.getElementById("to5").value;

    if (x == null || x == "") {
		
		document.getElementById("alert5").innerHTML="Please Enter From Date";
		document.getElementById("from5").style.borderColor = "red";
		document.getElementById("from5").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert5").innerHTML="Please Enter To Date";
		document.getElementById("to5").style.borderColor = "red";
		document.getElementById("to5").focus();	
		return false;
    }
	else{
	$("#alert5").css({"visibility":"hidden"});
        $("#month2").dialog("close");
        var datepicker = $("input:text[id=from5]").val();
        var datepicker2 = $("input:text[id=to5]").val();
        $.getJSON("graph/data2_month.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload2").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit6").click(function() {
	var x = document.getElementById("from6").value;
	var y = document.getElementById("to6").value;

    if (x == null || x == "") {
		
		document.getElementById("alert6").innerHTML="Please Enter From Date";
		document.getElementById("from6").style.borderColor = "red";
		document.getElementById("from6").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert6").innerHTML="Please Enter To Date";
		document.getElementById("to6").style.borderColor = "red";
		document.getElementById("to6").focus();	
		return false;
    }
	else{
		$("#alert6").css({"visibility":"hidden"});
        $("#year2").dialog("close");
        var datepicker = $("input:text[id=from6]").val();
		//alert(datepicker);
        var datepicker2 = $("input:text[id=to6]").val();
        $.getJSON("graph/data2_year.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload2").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
	$("#refresh2").click(function() {
		//alert("hi");
            $("#line2").attr('checked', true);
            $(".mapload2").css("visibility", "visible");
            $('.container2').html('<img src="images/loading.gif" width="5%"> loading...');
            $.getJSON("graph/data2.php", function(json) {
                $(".mapload2").css("visibility", "hidden");
                options.xAxis.categories = json[0]['data'];
                //options.radio = json[0]['grouping'];
                options.series[0] = json[1];
                //options.series[1] = json[2];
                //options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
        });
        
        //}, 200000);
        
        
        
        
//        setInterval(function(){ 
//    //code goes here that will be run every 5 seconds.    
//    
//    $("#line2").attr('checked', true);
//            $(".mapload2").css("visibility", "visible");
//            $('.container2').html('<img src="images/loading.gif" width="5%"> loading...');
//            $.getJSON("graph/data2.php", function(json) {
//                $(".mapload2").css("visibility", "hidden");
//                options.xAxis.categories = json[0]['data'];
//                //options.radio = json[0]['grouping'];
//                options.series[0] = json[1];
//                //options.series[1] = json[2];
//                //options.series[2] = json[3];
//                chart = new Highcharts.Chart(options);
//            });
//});
//});
$(document).ready(function() {	
	$("#column3").attr('checked', true);

	var m_names = ['January', 'February', 'March', 
               'April', 'May', 'June', 'July', 
               'August', 'September', 'October', 'November', 'December'];

	d = new Date();
	var currentYear = (new Date).getFullYear();
	var n = m_names[d.getMonth()];
//alert(n);
    //setInterval(function()	{
		
		
    $('.mapload3').html('<img src="images/loading.gif" width="5%"> loading...');
    var options = {
        credits: {
            enabled: false
        },
        chart: {
            renderTo: 'container3',
            type: 'bar',
			//zoomType: 'xy'
        },
        title: {
            text: 'Avg G2G',
            x: -20 //center
        },
        subtitle: {
            text: n + currentYear,
            x: -20
        },
        xAxis: {
			gridLineWidth: 1,
            categories: [],
            title: {
                text: 'Folio'
        },
		
		labels: {
                overflow: 'justify'
            },
		},
        yAxis: {
			gridLineWidth: 1,
             title: {
                text: 'Avg G2G'
            },
            labels: {
                overflow: 'justify'
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            borderWidth: 1
        },
        tooltip: {
            formatter: function() {
                return this.series.name + '<br/>'+
                    '<b>'+this.x + ': ' + this.y+'</b>';
            }
        },
        plotOptions: {
            line: {
                lineWidth: 3,
                shadow: false,
                marker: {
                    fillColor: '#fff',
                    /* LINE POINT COLOR */
                    lineWidth: 2,
                    radius: 4,
                    symbol: 'circle',
                    /* "circle", "square", "diamond", "triangle" and "triangle-down" */
                    lineColor: null // inherit from above defined colors
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            },
            column: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
        },
        series: []
    }
    $.getJSON("graph/data3.php", function(json) {
        $(".mapload3").css("visibility", "hidden");
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        //options.series[1] = json[2];
        //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
    var chart1 = new Highcharts.Chart(options);
    
     chartfunc3_mobile = function() {
     //alert("hi");
            chartfunc3//alert("chart");
            var column = document.getElementById('column3');
            var bar = document.getElementById('bar3');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line3');
            if (column.selected) {
                options.chart.renderTo = 'container3';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.selected) {
                options.chart.renderTo = 'container3';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container3';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }
        }	
        
        
    chartfunc3 = function() {
        var column = document.getElementById('column3');
        var bar = document.getElementById('bar3');
        //var pie = document.getElementById('pie3');
        var line = document.getElementById('line3');
        if (column.checked) {
            options.chart.renderTo = 'container3';
            options.chart.type = 'column';
            var chart1 = new Highcharts.Chart(options);
        } else if (bar.checked) {
            options.chart.renderTo = 'container3';
            options.chart.type = 'bar';
            var chart1 = new Highcharts.Chart(options);
        } /*else if (pie.checked) {
            options.chart.renderTo = 'container3';
            options.chart.type = 'pie';
            var chart1 = new Highcharts.Chart(options);
        } */else {
            options.chart.renderTo = 'container3';
            options.chart.type = 'line';
            var chart1 = new Highcharts.Chart(options);
        }
    }
    $(".submit7").click(function() {
	var x = document.getElementById("from7").value;
	var y = document.getElementById("to7").value;

    if (x == null || x == "") {
		
		document.getElementById("alert7").innerHTML="Please Enter From Date";
		document.getElementById("from7").style.borderColor = "red";
		document.getElementById("from7").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert7").innerHTML="Please Enter To Date";
		document.getElementById("to7").style.borderColor = "red";
		document.getElementById("to7").focus();	
		return false;
    }
	else{
        $("#day3").dialog("close");
        var datepicker = $("input:text[id=from7]").val();
        var datepicker2 = $("input:text[id=to7]").val();
		//alert(datepicker);
        $.getJSON("graph/data3_date.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload3").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit8").click(function() {
		var x = document.getElementById("from8").value;
	var y = document.getElementById("to8").value;

    if (x == null || x == "") {
		
		document.getElementById("alert8").innerHTML="Please Enter From Date";
		document.getElementById("from8").style.borderColor = "red";
		document.getElementById("from8").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert8").innerHTML="Please Enter To Date";
		document.getElementById("to8").style.borderColor = "red";
		document.getElementById("to8").focus();	
		return false;
    }
	else{
        $("#month3").dialog("close");
        var datepicker = $("input:text[id=from8]").val();
        var datepicker2 = $("input:text[id=to8]").val();
        $.getJSON("graph/data3_month.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload3").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit9").click(function() {
		var x = document.getElementById("from9").value;
	var y = document.getElementById("to9").value;

    if (x == null || x == "") {
		
		document.getElementById("alert9").innerHTML="Please Enter From Date";
		document.getElementById("from9").style.borderColor = "red";
		document.getElementById("from9").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert9").innerHTML="Please Enter To Date";
		document.getElementById("to9").style.borderColor = "red";
		document.getElementById("to9").focus();	
		return false;
    }
	else{
        $("#year3").dialog("close");
        var datepicker = $("input:text[id=from9]").val();
        var datepicker2 = $("input:text[id=to9]").val();
        $.getJSON("graph/data3_year.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload3").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $("#refresh3").click(function() {
        $(".mapload3").css("visibility", "visible");
        $('.container3').html('<img src="img/loading.gif" width="5%"> loading...');
        $.getJSON("graph/data3.php", function(json) {
            $(".mapload3").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.radio = json[0]['grouping'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
    });
//    setInterval(function(){ 
//    //code goes here that will be run every 5 seconds.  
//    $(".mapload3").css("visibility", "visible");
//        $('.container3').html('<img src="img/loading.gif" width="5%"> loading...');
//        $.getJSON("graph/data3.php", function(json) {
//            $(".mapload3").css("visibility", "hidden");
//            options.xAxis.categories = json[0]['data'];
//            //options.radio = json[0]['grouping'];
//            options.series[0] = json[1];
//            //options.series[1] = json[2];
//            //options.series[2] = json[3];
//            chart = new Highcharts.Chart(options);
//        });
//});
//    
//    //}, 200000);			
//});
$(document).ready(function() {
	var m_names = ['January', 'February', 'March', 
               'April', 'May', 'June', 'July', 
               'August', 'September', 'October', 'November', 'December'];

	d = new Date();
	var currentYear = (new Date).getFullYear();
	var n = m_names[d.getMonth()];
	
    $('.mapload4').html('<img src="images/loading.gif" width="5%"> loading...');
    var options = {
        credits: {
            enabled: false
        },
        chart: {
            renderTo: 'container4',
            type: 'line',
			//zoomType: 'xy'
        },
        title: {
            text: 'Avg Load Time',
            x: -20 //center
        },
        subtitle: {
            text: n + currentYear,
            x: -20
        },
        xAxis: {
			gridLineWidth: 1,
            categories: [],
            title: {
                text: 'Folio'
        },
		labels: {
                overflow: 'justify'
            },
		},
        yAxis: {
			gridLineWidth: 1,
             title: {
                text: 'Avg Load Time'
            },
            labels: {
                overflow: 'justify'
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            borderWidth: 1
        },
		tooltip: {
            formatter: function() {
                return this.series.name + '<br/>'+
                    '<b>'+this.x + ': ' + this.y+'</b>';
            }
        },
        plotOptions: {
            line: {
                lineWidth: 3,
                shadow: false,
                marker: {
                    fillColor: '#fff',
                    /* LINE POINT COLOR */
                    lineWidth: 2,
                    radius: 4,
                    symbol: 'circle',
                    /* "circle", "square", "diamond", "triangle" and "triangle-down" */
                    lineColor: null // inherit from above defined colors
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            },
            column: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
           /* pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#666',
                borderWidth: 1,	
                shadow: false
            },*/
        },
        series: []
    }
    $.getJSON("graph/data4.php", function(json) {
		//alert("hi");
		$("#line4").attr('checked', true);
        $(".mapload4").css("visibility", "hidden");
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        //options.series[1] = json[2];
        //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
		//alert(chart);
    });
    $(".submit10").click(function() {
		var x = document.getElementById("from10").value;
	var y = document.getElementById("to10").value;

    if (x == null || x == "") {
		
		document.getElementById("alert10").innerHTML="Please Enter From Date";
		document.getElementById("from10").style.borderColor = "red";
		document.getElementById("from10").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert10").innerHTML="Please Enter To Date";
		document.getElementById("to10").style.borderColor = "red";
		document.getElementById("to10").focus();	
		return false;
    }
	else{
        $("#day4").dialog("close");
        var datepicker = $("input:text[id=from10]").val();
        var datepicker2 = $("input:text[id=to10]").val();
        $.getJSON("graph/data4_date.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload4").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit11").click(function() {
		var x = document.getElementById("from11").value;
	var y = document.getElementById("to11").value;

    if (x == null || x == "") {
		
		document.getElementById("alert11").innerHTML="Please Enter From Date";
		document.getElementById("from11").style.borderColor = "red";
		document.getElementById("from11").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert11").innerHTML="Please Enter To Date";
		document.getElementById("to11").style.borderColor = "red";
		document.getElementById("to11").focus();	
		return false;
    }
	else{
        $("#month4").dialog("close");
        var datepicker = $("input:text[id=from11]").val();
        var datepicker2 = $("input:text[id=to11]").val();
        $.getJSON("graph/data4_month.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload4").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit12").click(function() {
		var x = document.getElementById("from12").value;
	var y = document.getElementById("to12").value;

    if (x == null || x == "") {
		
		document.getElementById("alert12").innerHTML="Please Enter From Date";
		document.getElementById("from12").style.borderColor = "red";
		document.getElementById("from12").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert12").innerHTML="Please Enter To Date";
		document.getElementById("to12").style.borderColor = "red";
		document.getElementById("to12").focus();	
		return false;
    }
	else{
        $("#year4").dialog("close");
        var datepicker = $("input:text[id=from12]").val();
        var datepicker2 = $("input:text[id=to12]").val();
        $.getJSON("graph/data4_year.php?from=" + datepicker, "to=" + datepicker2, function(json) {
            $(".mapload4").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    refresh4 = function() {
        $("#j3").attr('checked', true);
        $(".mapload4").css("visibility", "visible");
        $('.container4').html('<img src="images/loading.gif" width="5%"> loading...');
        $.getJSON("graph/data4.php", function(json) {
            $(".mapload4").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.radio = json[0]['grouping'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
    }
    
//    setInterval(function(){ 
//        
//        $("#j3").attr('checked', true);
//        $(".mapload4").css("visibility", "visible");
//        $('.container4').html('<img src="images/loading.gif" width="5%"> loading...');
//        $.getJSON("graph/data4.php", function(json) {
//            $(".mapload4").css("visibility", "hidden");
//            options.xAxis.categories = json[0]['data'];
//            //options.radio = json[0]['grouping'];
//            options.series[0] = json[1];
//            //options.series[1] = json[2];
//            //options.series[2] = json[3];
//            chart = new Highcharts.Chart(options);
//        });
//    //code goes here that will be run every 5 seconds.    
//});
   
    chartfunc4_mobile = function() {
     //alert("hi");
            //chartfunc3//alert("chart");
            var column = document.getElementById('column4');
            var bar = document.getElementById('bar4');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line4');
            if (column.selected) {
                options.chart.renderTo = 'container4';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.selected) {
                options.chart.renderTo = 'container4';
                options.chart.type = 'bar';
                var chart4 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container4';
                options.chart.type = 'line';
                var chart4 = new Highcharts.Chart(options);
            }
        }	
    
    var chart1 = new Highcharts.Chart(options);
    chartfunc4 = function() {
        var column = document.getElementById('column4');
        var bar = document.getElementById('bar4');
       // var pie = document.getElementById('pie4');
        var line = document.getElementById('line4');
        if (column.checked) {
            options.chart.renderTo = 'container4';
            options.chart.type = 'column';
            var chart1 = new Highcharts.Chart(options);
        } else if (bar.checked) {
            options.chart.renderTo = 'container4';
            options.chart.type = 'bar';
            var chart1 = new Highcharts.Chart(options);
        } /*else if (pie.checked) {
            options.chart.renderTo = 'container4';
            options.chart.type = 'pie';
            var chart1 = new Highcharts.Chart(options);
        } */else {
            options.chart.renderTo = 'container4';
            options.chart.type = 'line';
            var chart1 = new Highcharts.Chart(options);
        }
    }
    $('#change_chart_title').click(function() {
        var new_title = $('#chart_title').val();
        var chart = $('#container').highcharts();
        chart.settitle({
            text: new_title
        });
        alert('Chart title changed to ' + new_title + ' !');
    });
    //}, 200000);	
    
    
    
    $(document).ready(function() {
        
        
         chartduration5_mobile = function(){
	var duration = $('select[id="chart5"]').val();
        if(duration=="day"){
		$.getScript("js/tcal_day.js");
		$("#day5").dialog({
                autoOpen: false
            });
	$("#day5").dialog("open");
        $("#month5").dialog("close");
        $("#year5").dialog("close");
        //$( "#tcalControls td" ).css("visibility", "hidden");
        }
  
       else if(duration== "month"){
		  $("#month5").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_month.js");
        $("#month5").dialog("open");
        $("#day5").dialog("close");
        $("#year5").dialog("close");
    }
        
        else {
		 $.getScript("js/tcal_year.js");
     		$("#year5").dialog({
                autoOpen: false
            });
       $("#year5").dialog("open");
        $("#month5").dialog("close");
        $("#day5").dialog("close");
    }
    
    }
    
        $("#k1").click(function() {
		
		$.getScript("js/tcal_day.js");
		$("#day5").dialog({
                autoOpen: false
            });
	$("#day5").dialog("open");
        $("#month5").dialog("close");
        $("#year5").dialog("close");
        //$( "#tcalControls td" ).css("visibility", "hidden");
    });
    
    $("#k2").click(function() {
            $("#month5").dialog({
                autoOpen: false
            });
        //$.getScript("js/tcal_month.js");
        $("#month5").dialog("open");
        $("#day5").dialog("close");
        $("#year5").dialog("close");
    });
    
    
    
    
     $("#k3").click(function() {
         $.getScript("js/tcal_year.js");
     		$("#year5").dialog({
                autoOpen: false
            });
       $("#year5").dialog("open");
        $("#month5").dialog("close");
        $("#day5").dialog("close");
    });
      $("#gocustomer").click(function() {  
      $("#column5").attr('checked', true);

	var m_names = ['January', 'February', 'March', 
               'April', 'May', 'June', 'July', 
               'August', 'September', 'October', 'November', 'December'];

	d = new Date();
	var currentYear = (new Date).getFullYear();
	var n = m_names[d.getMonth()];
//alert(n);
    //setInterval(function()	{
		
	var supp_name = document.getElementById("supp_name").value;
	var short_cust_name = document.getElementById("short_cust_name").value;
        
    $('.mapload5').html('<img src="images/loading.gif" width="5%"> loading...');
    var options = {
        credits: {
            enabled: false
        },
        chart: {
            renderTo: 'container5',
            type: 'bar',
            //zoomType: 'xy'
        },
        title: {
            text: 'Customer',
            x: -20 //center
        },
        subtitle: {
            text: n + currentYear,
            x: -20
        },
        xAxis: {
			gridLineWidth: 1,
            categories: [],
            title: {
                text: 'Folio'
        },
		
		labels: {
                overflow: 'justify'
            },
		},
        yAxis: {
			gridLineWidth: 1,
             title: {
                text: 'Customer'
            },
            labels: {
                overflow: 'justify'
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            borderWidth: 1
        },
        tooltip: {
            formatter: function() {
                return this.series.name + '<br/>'+
                    '<b>'+this.x + ': ' + this.y+'</b>';
            }
        },
        plotOptions: {
            line: {
                lineWidth: 3,
                shadow: false,
                marker: {
                    fillColor: '#fff',
                    /* LINE POINT COLOR */
                    lineWidth: 2,
                    radius: 4,
                    symbol: 'circle',
                    /* "circle", "square", "diamond", "triangle" and "triangle-down" */
                    lineColor: null // inherit from above defined colors
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            },
            column: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                cursor: 'pointer',
                borderColor: '#333',
                borderWidth: 1,
                shadow: false
            },
        },
        series: []
    }
    $.getJSON("graph/data5.php",{supp_name: supp_name, short_cname: short_cust_name})
                .done(function( json ) {
        $(".mapload5").css("visibility", "hidden");
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        //options.series[1] = json[2];
        //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
    
      chartfunc5_mobile = function() {
            
          
            var column = document.getElementById('column5');
            var bar = document.getElementById('bar5');
            //var pie = document.getElementById('pie1');
            var line = document.getElementById('line5');
            if (column.selected) {
                options.chart.renderTo = 'container5';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.selected) {
                options.chart.renderTo = 'container5';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }/* else if (pie.checked) {
                options.chart.renderTo = 'container';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            }*/ else {
                options.chart.renderTo = 'container5';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }
        }
    
    var chart5 = new Highcharts.Chart(options);
    chartfunc5 = function() {
      
        var column = document.getElementById('column5');
        var bar = document.getElementById('bar5');
        //var pie = document.getElementById('pie3');
        var line = document.getElementById('line5');
        if (column.checked) {
            
            options.chart.renderTo = 'container5';
            options.chart.type = 'column';
            var chart5 = new Highcharts.Chart(options);
        } else if (bar.checked) {
            options.chart.renderTo = 'container5';
            options.chart.type = 'bar';
            var chart5 = new Highcharts.Chart(options);
        } /*else if (pie.checked) {
            options.chart.renderTo = 'container3';
            options.chart.type = 'pie';
            var chart1 = new Highcharts.Chart(options);
        } */else {
            options.chart.renderTo = 'container5';
            options.chart.type = 'line';
            var chart5 = new Highcharts.Chart(options);
        }
    }
   $(".submit13").click(function() {
      
	var x = document.getElementById("from13").value;
	var y = document.getElementById("to13").value;
        //var customer = document.getElementById("short_cust_name").value;
        
        //alert(customer);
//    if(customer == 'Select Customer'){
//                document.getElementById("alert13").innerHTML="Please Select Supplier and Customer first";
//                document.getElementById("short_cust_name").focus();
//                return false;
//    }   
    if (x == null || x == "") {
		
		alert("null");
                document.getElementById("alert13").innerHTML="Please Enter From Date";
		document.getElementById("from13").style.borderColor = "red";
		document.getElementById("from13").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert13").innerHTML="Please Enter To Date";
		document.getElementById("to13").style.borderColor = "red";
		document.getElementById("to13").focus();	
		return false;
    }
	else{
        $("#day5").dialog("close");
        var datepicker = $("input:text[id=from13]").val();
        var datepicker2 = $("input:text[id=to13]").val();
        var short_cust_name = $('#short_cust_name').val();
        //alert(short_cust_name);
        /*$.getJSON("graph/data5_date.php?from=" + datepicker, "to=" + datepicker2, "short_cust_name=" + short_cust_name, function(json) {
            $(".mapload5").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });*/
        $.getJSON("graph/data5_date.php", { from: datepicker, to: datepicker2, short_cname: short_cust_name})
                .done(function( json ) {
            $(".mapload5").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit14").click(function() {
		var x = document.getElementById("from14").value;
	var y = document.getElementById("to14").value;

    if (x == null || x == "") {
		
		document.getElementById("alert14").innerHTML="Please Enter From Month";
		document.getElementById("from14").style.borderColor = "red";
		document.getElementById("from14").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert14").innerHTML="Please Enter To Month";
		document.getElementById("to14").style.borderColor = "red";
		document.getElementById("to14").focus();	
		return false;
    }
	else{
        $("#month5").dialog("close");
        var short_cust_name = $('#short_cust_name').val();
        var datepicker = $("input:text[id=from14]").val();
        var datepicker2 = $("input:text[id=to14]").val();
        $.getJSON("graph/data5_month.php", { from: datepicker, to: datepicker2, short_cname: short_cust_name})
                .done(function( json ) {
            $(".mapload5").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $(".submit15").click(function() {
		var x = document.getElementById("from15").value;
                var y = document.getElementById("to15").value;

    if (x == null || x == "") {
		
		document.getElementById("alert15").innerHTML="Please Enter From Year";
		document.getElementById("from15").style.borderColor = "red";
		document.getElementById("from15").focus();
		return false;
    }
	if (y == null || y == "") {
		
		document.getElementById("alert15").innerHTML="Please Enter To Year";
		document.getElementById("to15").style.borderColor = "red";
		document.getElementById("to15").focus();	
		return false;
    }
	else{
        $("#year5").dialog("close");
        var datepicker = $("input:text[id=from15]").val();
        var datepicker2 = $("input:text[id=to15]").val();
        $.getJSON("graph/data5_year.php",{short_cname: short_cust_name,from: datepicker, to: datepicker2})
                .done(function( json ) {
            $(".mapload5").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.datepicker = json[0]['datepicker'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
	}
    });
    $("#refresh5").click(function() {
        $(".mapload5").css("visibility", "visible");
        $('.container5').html('<img src="images/loading.gif" width="5%"> loading...');
        $.getJSON("graph/data5.php",{short_cname: short_cust_name,supp_name: supp_name})
                .done(function( json ) {
            $(".mapload5").css("visibility", "hidden");
            options.xAxis.categories = json[0]['data'];
            //options.radio = json[0]['grouping'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
     });
     
     
//     setInterval(function(){ 
//    //code goes here that will be run every 5 seconds.    
//    
//    $(".mapload5").css("visibility", "visible");
//        $('.container5').html('<img src="images/loading.gif" width="5%"> loading...');
//        $.getJSON("graph/data5.php",{short_cname: short_cust_name,supp_name: supp_name})
//                .done(function( json ) {
//            $(".mapload5").css("visibility", "hidden");
//            options.xAxis.categories = json[0]['data'];
//            //options.radio = json[0]['grouping'];
//            options.series[0] = json[1];
//            //options.series[1] = json[2];
//            //options.series[2] = json[3];
//            chart = new Highcharts.Chart(options);
//        });
//}, 5000);
      });
  });
});
});
});