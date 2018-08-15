<?php

 include 'database_connection.php';

 if($_POST)
 {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['password'];
  $group_id = $_POST['group_id'];
  
  try
  { 
  
   $stmt = $mysqli->query("SELECT * FROM SYSTEM_USER WHERE nam='$user_name' AND password='$user_password' AND group_id='$group_id'");
  // echo "SELECT * FROM SYSTEM_USER WHERE nam=$user_name,password=$user_password,group_id=$group_id";
   /*$stmt->execute(array(":uname"=>$user_name));
   $count = $stmt->rowCount();*/

    //echo "SELECT * FROM SYSTEM_USER WHERE nam='$user_name' AND password='$user_password' AND group_id='$group_id";
	$count = mysqli_num_rows($stmt);
	if( mysqli_num_rows($stmt) == 0)
	{
   $stmt = $mysqli->query("INSERT INTO SYSTEM_USER(user_id,nam,password,group_id) VALUES($user_name,$user_name,$user_password,$group_id)");
  /* $stmt->bindParam(":user_id",$user_name);
   $stmt->bindParam(":uname",$user_name);
   $stmt->bindParam(":pass",$user_password);
   $stmt->bindParam(":group_id",$group_id);*/

    
   if(isset($stmt))
    {
     echo "0";
    }
    else
    {
     echo "Query could not execute !";
    }
   
   }
   else{
    
    echo "1"; //  not available
   }
    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>