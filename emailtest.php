<?php
include("database_connection.php");
include_once('simple_html_dom.php');
$to =  $_POST['emailto'];
$data = "<html><table>".$_POST['data']."</table></html>";
//$to ="urvashidave123@gmail.com";
$data = $_POST['data'];
//$element = $_POST['element'];
$from = "udave123@gmail.com";
$date= date('d/m/Y');
$subject = "Tank-Detail-".$date;
$message = "test message";
$filename = $_SERVER['DOCUMENT_ROOT']."/TMS6/email.csv";


//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$message .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";



$html = str_get_html($data);

$fp = fopen($filename, "w");
foreach($html->find('tr') as $element) // find tr element inside the table
{
    $td = array();
    foreach( $element->find('th') as $row) // look for th tag and it to the array if it exists.
    {
        $td [] = $row->plaintext;
    }
    fputcsv($fp, $td);
    $td = array();
    foreach( $element->find('td') as $row) // look for td and put into array
    {
       $td [] = $row->plaintext;
    }
    fputcsv($fp, $td);
}
fclose($fp);





com_load_typelib("outlook.application");

if (!defined("olMailItem")) {define("olMailItem",0);}

$outlook_Obj = new COM("outlook.application") or die("Unable to start Outlook");

//just to check you are connected.

echo "Loaded MS Outlook, version {$outlook_Obj->Version}\n";

$oMsg = $outlook_Obj->CreateItem(olMailItem);

$oMsg->Recipients->Add($to);

$oMsg->Subject=$subject;

$oMsg->Attachments->Add("C:\\xampp\\htdocs\\TMS6\\email.csv");

$oMsg->Save();

$oMsg->Send();

//
//
// $attachment =  "email.csv";
//		$fileatt = $_SERVER['DOCUMENT_ROOT']."/TMS6/email.csv"; // Path to the file                  
//		$fileatt_type = "application/octet-stream"; // File Type 
//		$start=	strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
//		$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the 	attachment 
//		//$fileatt_name	= $attachment;
//		
//		$email_from = $from; // Who the email is from 
//		$email_subject =  $subject; // The Subject of the email 
//		$email_txt = "data"; // Message that the email has in it 
//		
//		$email_to = $to; // Who the email is to
//
//		$headers = "From: ".$from;
//
//		$file = fopen($fileatt,'r'); 
//		$data = fread($file,filesize($fileatt)); 
//		fclose($file); 
//		$msg_txt="";
//
//		$semi_rand = md5(time()); 
//		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
//		
//		$headers .= "\nMIME-Version: 1.0\n" . 
//				"Content-Type: multipart/mixed;\n" . 
//				" boundary=\"{$mime_boundary}\""; 
//
//		$email_txt .= $msg_txt;
//		
//		$email_message = "This is a multi-part message in MIME format.\n\n" . 
//					"--{$mime_boundary}\n" . 
//					"Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
//				   "Content-Transfer-Encoding: 7bit\n\n" . 
//		$email_txt . "\n\n"; 
//
//		$data = chunk_split(base64_encode($data)); 
//
//		$email_message .= "--{$mime_boundary}\n" . 
//					  "Content-Type: {$fileatt_type};\n" . 
//					  " name=\"{$fileatt_name}\"\n" . 
//					  //"Content-Disposition: attachment;\n" . 
//					  //" filename=\"{$fileatt_name}\"\n" . 
//					  "Content-Transfer-Encoding: base64\n\n" . 
//					 $data . "\n\n" . 
//					  "--{$mime_boundary}--\n"; 
//
//
//		$ok = @mail($email_to, $email_subject, $email_message, $headers); 
//
//		if($ok) { 
//			echo "Ok, sent!";
//		} else { 
//			echo "Sorry, form not sent!";
//		}
                
                

//$headers ='Content-type: application/ms-excel';
//$headers = "Content-Type:  multipart/mixed; ";
//$headers .= "Content-Disposition: attachment; filename=email.csv";
//
//
//$headers  .= "Content-Type: application/ms-excel";
//$headers  .= "name=\"".$filename;
//$headers  .= "Content-Transfer-Encoding: base64";
//$headers  .= "Content-Disposition: attachment; ";
//$headers  .= "filename=email.csv";
//$headers  .= $filename;




//mail($to, $subject, $data, $headers);
//if(isset($_POST['element'])){
//    
//    
//    
//    file_put_contents($_SERVER['DOCUMENT_ROOT']."/TMS6/email.txt",$data);
//    echo $element;
//    $query1="SELECT * FROM Tank ta,TvsStatus tv where ta.term_id = tv.term_id and ta.tank_id = tv.tank";
//    $result=$mysqli->query($query1);
//    
//}
//else{
//}
?>