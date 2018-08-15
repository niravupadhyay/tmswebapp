<?php
	session_start();
	error_reporting(0);
	include("database_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TMS6</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Terminal Management System">
    <meta name="author" content="Urvashi Dave">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

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
    
	<script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>  
   <style>
	.error{width: 100%}
	.login-box .btn {
    margin-top: 0px;
    width: auto;
}
.logo{
    background-color: #4BB0EA;
}
   </style>
   
   <script>
  $("#errmsg").hide();
	
      //Configuration
         var minUserLen = 3, maxUserLen = 30;
         var minPassLen = 3, maxPassLen = 4096;
         var usernameMsg = "Username must be between " + minUserLen + " and " +
                           maxUserLen + " characters, inclusive.";
         var passwordMsg = "Password must be between " + minPassLen + " and " +
                           maxPassLen + " characters, inclusive.";
         jQuery.validator.setDefaults({
            debug: true,      //Avoids form submit. Comment when in production.
            success: "valid",
            submitHandler: function() {
			   document.getElementById("login").submit();
            }
         });
      $(document).ready(function() {
         // validate signup form on keyup and submit
         $("#login").validate({
            rules: {
               username: {
                  required: true,
                  minlength: minUserLen,	
                  maxlength: maxUserLen
 
               },
               password: {
                  required: true,
                  minlength: minPassLen,
                  maxlength: maxPassLen
 
               },
            },
            messages: {
               username: {
                  required: "Username required",
                  minlength: usernameMsg,
                  maxlength: usernameMsg
               },
               password: {
                  required: "Password required",
                  minlength: passwordMsg,
                  maxlength: passwordMsg
               }
            }
         });
});
 </script>
 <script>
 $(function(){
	 $("#password").on("keyup",function(){
    if($(this).val())
        $(".glyphicon-eye-open").show();
    else
        $(".glyphicon-eye-open").hide();
    });
$(".glyphicon-eye-open").mousedown(function(){
                $("#password").attr('type','text');
            }).mouseup(function(){
            	$("#password").attr('type','password');
            }).mouseout(function(){
            	$("#password").attr('type','password');
            });
 });
 </script>
 <script>
 $('document').ready(function()
{ 
     /* validation */
  $("#register-form").validate({
      rules:
   {
   user_name: {
      required: true,
   minlength: 3
   },
   password: {
   required: true,
   minlength: 8,
   maxlength: 15
   },
   cpassword: {
   required: true,
   equalTo: '#password2'
   },
   group_id: {
	   required: true
   },
   user_email: {
            required: true,
            email: true
            },
    },
       messages:
    {
			group_id: "Please enter group",
            user_name: "please enter user name",
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            user_email: "please enter a valid email address",
   cpassword:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* form submit */
    function submitForm()
    {  
    var data = $("#register-form").serialize();
    
    $.ajax({
    
    type : 'POST',
    url  : 'register.php',
    data : data,
    beforeSend: function()
    { 
	//alert("hi");
     $("#error").fadeOut();
     $("#btn-submit").html('<images src="images/loading.gif" width="8%"> &nbsp; Signing Up ...');
    },
    success :  function(data)
         {     		
        if(data==1){
         $("#error").fadeIn(1000, function(){
           
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');
           
           $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
         });
                    
        }
        else if(data==0)
        {
		$("#error").fadeIn(1000, function(){
         
         $("#error").html('<div class="alert alert-success"><span class="glyphicon sucess"></span> &nbsp;User Registered Successfully.!</div>');
         setInterval(function() {
                  window.location.reload();
                }, 3000); 
          
         });
		 
        }
        else if(data == "Query could not execute !"){
			         
         $("#error").fadeIn(1000, function(){
           
         $("#error").html('<div class="alert alert-danger"><span class="glyphicon sucess"></span> &nbsp; '+data+' !</div>');
           
         $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
          
         });
           
        }
         }
    });
    return false;
  }
    /* form submit */ 

});
</script>
  
<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  <style>
   .glyphicon1  {
    display:none;
    right: 15px;
    position: absolute;
    top: 12px;
    cursor:pointer;
}
</style>
    <link rel="shortcut icon" href="images/favicon.png">
</head>
<body>

<!--<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Login</a></li>
    <li><a href="#tabs-2">Register</a></li>
  </ul>
  <div id="tabs-1">-->
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
		<?php //echo $_SERVER['HTTP_USER_AGENT'] ;?>
            <!--<h2>Welcome to Terminal Management System</h2>-->
            <img class="logo" src="images/b-logo.png">
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
				
				
            </div>
            <form class="form-horizontal" id="login" action="login_process.php" method="post">
                <fieldset>
				<?php	
					if($_GET['link']=='error')
					{
						?>
						<div class="alert alert-info" style=color:red;border-color:red>Wrong Username Password</div>
					<?php
					}
				?></p>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" width="200px" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>
					
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" width="200px" id="password" name="password" class="form-control" placeholder="Password">
						<span class="glyphicon glyphicon1 glyphicon-eye-open" style="display: inline"></span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" name="remember" value="1" id="remember"> Remember me</label>						
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" name="btnsubmit" id="btnsubmit2" class="btn btn-primary" onclick="validate()">Login</button>
                    </p>
                </fieldset>
            </form>

			 <?php
		if(isset($_SESSION['username']))
		{
		//	echo "<font color='red'>".$_SESSION['username']."</font>";
			unset($_SESSION['username']);
		}
		if(isset($_SESSION['password']))
		{
		//	echo "<font color='red'>".$_SESSION['password']."</font>";
			unset($_SESSION['password']);
		}

	?>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->
<!--</div>-->

<!--  <div id="tabs-2">
  
  <div class="ch-container">
    <div class="row">

<body>

  <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Register Form</h2>
        </div>
        /span
    </div>/row

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please Fillup the required details.
			 </div>
            <form class="form-signin" method="post"  name="register-form" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <div id="error">
         error will be showen here ! 
        </div>
        <div class="form-group">
			Group Name:<select class="select" name="group_id" placeholder="Group Name" id="group_id" onChange="showCarrier(this.value)">
					<option value=""></option>
					<?php
//						$query4="SELECT DISTINCT group_id FROM SYSTEM_USER";
//						$result4=$mysqli->query($query4);
//						while($value4 = mysqli_fetch_array($result4))
//						{
//							
//							echo "<option>".$value4['group_id']."</option>";
//						}
					?>
					</select>
			</div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
        </div>
       <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password2" />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
        </div>
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
        </div>  
      
 </form>
			
        </div>
        /span
    </div>/row
</div>/fluid-row

</div>/.fluid-container


  </div>-->
 <!--</div>-->
<!-- external javascript -->

<script src="js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<!-- data table plugin -->
<!--commented



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
<script src="js/charisma.js"></script>


</body>
</html>
