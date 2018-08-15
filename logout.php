<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
//session_unset();
unset($_SESSION['myvar']);
header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
?>