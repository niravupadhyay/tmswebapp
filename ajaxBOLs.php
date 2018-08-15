
	<?php
	session_start();
	include "database_connection_web_primary.php";
        
        $from = $_POST['from'];
        $from_date_format1 = explode( '/', $from );
        $from_date_format2 = $from_date_format1[2]."/".$from_date_format1[1]."/".$from_date_format1[0];
        $from_date = date('ymd',strtotime($from_date_format2));
        //print_r(explode('/', $from, 2));
        
        //echo $from.":::".$from_date_format2.":::".$from_date."----";
        
        $to = $_POST['to'];
        $to_date_format1 = explode( '/', $to );
        $to_date_format2 = $to_date_format1[2]."/".$to_date_format1[1]."/".$to_date_format1[0];
        $to_date = date('ymd',strtotime($to_date_format2));
        
        $query9= "SELECT distinct doc_no FROM TransHeader where transaction_date BETWEEN ('".$from_date."') AND ('".$to_date."')";
        //echo $query9;
	$result9=$mysqli->query($query9);
        $docStr="<option></option>";
	while($value9 = mysqli_fetch_array($result9))
	{
            $docStr = $docStr."<option>".trim($value9['doc_no'])."</option>";
	}
        echo $docStr;
       
	?>
	

	
