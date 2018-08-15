<?php 
include("database_connection_web_primary.php");
	session_start();
if(isset($_POST['btnsubmit']))
	{
		//echo $_POST['remember'];
		 if(isset($_POST['remember']))
			{
			  $_SESSION['global'] = "hello";

			}
   
		$username=$_POST['username'];
		echo $username;
		$password=$_POST['password'];
		echo $password;
		$_SESSION['timeout'] = time();
		//echo $_SESSION['timeout'];
		
		
		
	
			$query1="SELECT group_id FROM SYSTEM_USER where user_id='$username' AND password='$password'";
				$result1=$mysqli->query($query1);
							echo $result_Num_Rows = mysqli_num_rows($result1);
							
							if($result_Num_Rows > 0){
							while($value1 = mysqli_fetch_array($result1))
							{
                                                                $queryUSCA = "SELECT tms_uname from TWUserSCA where tms_uname = '$username'";
                                                                $resultUSCA = $mysqli_web->query($queryUSCA);
                                                                $result_Num_RowsUSCA = mysqli_num_rows($resultUSCA);

                                                                if($result_Num_RowsUSCA > 0){
                                                                    $_SESSION['restrictSCADisplay'] = true;
                                                                }
                                                                else{
                                                                    $_SESSION['restrictSCADisplay'] = false;
                                                                }
                                                                  
								// $group = $value1['group_id'];
								
								// echo $group;								

								 //if(strcmp(trim($group),"Group100 ") == 0)
								 //{
								//	echo "You have Logged in successfully";
								//	header("Location:dashboard2.php");
								//	$_SESSION['user']=$username;
                                                                //        $_SESSION['date']=date('d-m-Y');
								//	$_SESSION['global'] = "hello";	
								//	die();
								 //}
								 //else if(strcmp(trim($group),"Greenergy") == 0)
								 //{
									echo "You have Logged in successfully";
									header("Location:dashboard2.php");
									$_SESSION['user']=$username;
                                                                        $_SESSION['date']=date('d-m-Y');
									$_SESSION['global'] = "hello";	
									$_SESSION['user_id']= 'Greenergy';
									die();
								 //}
								 //else if(strcmp(trim($group),"Group3") == 0)
								 //{
								//	echo "You have Logged in successfully";
								//	header("Location:dashboard2.php");
								//	$_SESSION['global'] = "hello";	
								//	$_SESSION['user']=$username;
                                                                //        $_SESSION['date']= date('d-m-Y');
								//	die();
								 //}
								
							}
							}
							else
							{
									$error='error';
									echo "else";
									header("Location:index.php?link=$error");
									die();
									
							}
				
	}
	else
	{
		header("location:index.php");	
	}
?>
