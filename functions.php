<?php

	

//include'database_connection.php';

class database
{
	public function tablesList($mysqli)
	{
		
		//$this->mysqli= $mysqli;
		//$_SESSION['mysqli'] = new mysqli("192.168.1.40", "ttadmin", "toptech", "Tms6Data");
		//$_SESSION['mysqli'] = $mysqli;
		//print_r($_SESSION['mysqli']);
		//$this->mysqli = $mysqli;
		$result = $mysqli->query("SHOW TABLES");
		$file_name = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
		while($row = mysqli_fetch_array($result))
		{		
			echo '<a href="table.php?var='.$row[0].'&var1='.$file_name.'">'.$row[0].'</a><br/>';
		}
		
	}
	public function getVar()
	{
		if(isset($_GET['var']))
		{
			$_SESSION['testvar'] = $_GET['var'];
			$filename = $_GET['var1'];
			//echo $_SESSION['testvar'];
			
		//unset($_SESSION['var']);
		}	
	}
	
	public function showTableByClick($mysqli)
	{
	    $var1 = new database;
		$var1->getVar();
		//$this->mysqli= $mysqli;
		$_SESSION['result'] =  $mysqli->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = '".$_SESSION['testvar']."'");
		
	}
	
	public function showAllRecords($mysqli)
	{
		//$this->mysqli=$mysqli;
		$_SESSION['query'] =  $mysqli->query("SELECT * FROM ".$_SESSION['testvar']." LIMIT 500");
	}

		
}
?>