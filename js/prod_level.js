$(document).ready(function() {
            var prod_level =  $(".inner").attr('data-progress');
			alert(prod_level);

	
	$.ajax({
        type: "POST",
        url: "progress-value.php",
        cache: false,
		data: $("prod_level").serialize(),
        //data: {"prod_level":prod_level},
        dataType: "json",
        success: function(data) {
			alert(data);
            if (arg == 'someval') {
                alert("success 1");
            } else {
                alert("success 2");
            }
        }
    })
});