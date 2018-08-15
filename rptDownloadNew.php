<?php
//echo "1";
session_start();
error_reporting(0);

$rptName = $_POST['selRptName'];

$terminal_txt = $_POST['selterminal'];
$terminal = explode(" --- ", $terminal_txt);
//$terminal = "0000001";

$folMo = $_POST['selFolMo'];
$folNo = $_POST['selFolNo'];
$folYr = $_POST['selFolYr'];

$supplier_txt = $_POST['selSupplier'];

if(strcmp($supplier_txt,"") == 0)
{
    $supplier_no = "0000001000";
}
else
{
    $supplier = explode(" --- ", $supplier_txt);
    $supplier_no = trim($supplier[0]);
}

$customer_txt = $_POST['selCustomer'];

if(strcmp($customer_txt,"") == 0)
{
    $customer_no = "0000000000";
}
else
{
    $customer = explode(" --- ", $customer_txt);
    $customer_no = trim($customer[0]);
}

$account_txt =  $_POST['selaccount'];
    
if(strcmp($account_txt,"") == 0)
{
    $account_no = "0000000000";
}
else
{
    $account = explode(" --- ", $account_txt);
    $account_no = trim($account[0]);
}

$carrier_txt = $_POST['selCarrier'];

if(strcmp($carrier_txt,"") == 0)
{
    $carrier_no = "0000000";
}
else
{
    $carrier = explode(" --- ", $carrier_txt);
    $carrier_no = trim($carrier[0]);
}
//$driver = $_POST['seldriver'];

$prod_id_txt = $_POST['selProduct'];

if(strcmp($prod_id_txt,"") == 0)
{
    $prod_id_no = "000000";
}
else
{
    $prod_id = explode(" --- ", $prod_id_txt);
    $prod_id_no = trim($prod_id[0]);
}
//$destination = $_POST['selDestination'];

$rptMode = $_POST['selReportMode'];

$rptFormat = $_POST['rptFormat'];
        
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

$rptCommand = "";
$rptType = "";
$rptParameters = "";
$rptDesc = "";

    if(strcmp($rptName,"Carrier Activity Report") == 0)
    {
	$rptType = "tmsrpt02";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." h=".$carrier_no;
	$rptDesc = "Carrier Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt02 f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." h=".$carrier_no;
    }
    else if(strcmp($rptName,"Rack Activity Report") == 0)
    {
	$rptType = "tmsrpt01a";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no;
	$rptDesc = "Rack Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt01a f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no;
    }
    else if(strcmp($rptName,"Rack Activity Summary") == 0)
    {
	$rptType = "tmsrpt01";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 S";
	$rptDesc = "Rack Activity Summary";
        //$rptCommand = "/tms6/bin/tmsrpt01 f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 S";
    }
    else if(strcmp($rptName,"Shipping Report (with components)") == 0)
    {
	$rptType = "tmsrpt03";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." +component_detail";
	$rptDesc = "Shipping Report (with components)";
        //$rptCommand = "/tms6/bin/tmsrpt03 f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." +component_detail";
    }
    else if(strcmp($rptName,"Customer Activity Report") == 0)
    {
	$rptType = "tmsrptca";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." +sql";
	$rptDesc = "Customer Activity Report";
        //$rptCommand = "/tms6/bin/tmsrptca f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." +sql";
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Account Activity Report") == 0)
    {
	$rptType = "tmsrpt07";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no." +sql";
	$rptDesc = "Account Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt07 f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no." +sql";
    }
    else if(strcmp($rptName,"Meter Detail Report") == 0)
    {
	$rptType = "tmsrptmd";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Meter Detail Report";
        //$rptCommand = "/tms6/bin/tmsrptmd f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Detail Report") == 0)
    {
	$rptType = "tmsrptpd";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no." p=".$prod_id_no;
	$rptDesc = "Product Detail Report";
        //$rptCommand = "/tms6/bin/tmsrptpd f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no." c=".$customer_no." a=".$account_no." p=".$prod_id_no;
    }
    else if(strcmp($rptName,"Tank Detail Report") == 0)
    {
	$rptType = "tmsrpttd";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Detail Report";
        //$rptCommand = "/tms6/bin/tmsrpttd f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Bulk Shipping Report") == 0)
    {
	$rptType = "tmsrptbs";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
	$rptDesc = "Bulk Shipping Report";
        //$rptCommand = "/tms6/bin/tmsrptbs f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
    }
    else if(strcmp($rptName,"Bulk Transaction Report") == 0)
    {
	$rptType = "tmsrptbt";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
	$rptDesc = "Bulk Transaction Report";
        //$rptCommand = "/tms6/bin/tmsrptbt f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
    }
    else if(strcmp($rptName,"Bulk Product Movement Report") == 0)
    {
	$rptType = "tmsrptpm";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
	$rptDesc = "Bulk Product Movement Report";
        //$rptCommand = "/tms6/bin/tmsrptpm f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
	if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Tank Stock Balance Report") == 0)
    {
	$rptType = "rpttkstk";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Stock Balance Report";
        //$rptCommand = "/tms6/bin/rpttkstk f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Terminal Balance Report") == 0)
    {
	$rptType = "tmsrpttb";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Terminal Balance Report";
        //$rptCommand = "/tms6/bin/tmsrpttb f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Tank Inventory Report") == 0)
    {
	$rptType = "tmsrpttk";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Inventory Report";
        //$rptCommand = "/tms6/bin/tmsrpttk f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Summary Report") == 0)
    {
	$rptType = "rptprdsm";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
	$rptDesc = "Product Summary Report";
        //$rptCommand = "/tms6/bin/rptprdsm f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Additive Mass Balance Report") == 0)
    {
	$rptType = "tmsrptamb";
	$rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010";
	$rptDesc = "Additive Mass Balance Report";
        //$rptCommand = "/tms6/bin/tmsrptamb f=F".trim($terminal[0]).".".$folMo.$folNo." yr=".$folYr." r=E0010";
    }
    else if(strcmp($rptName,"Bulk Stock Report") == 0)
    {
        $rptType = "tmsrpt05";
        $rptParameters = "f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
        $rptDesc = "Bulk Stock Report";
        //$rptCommand = "/tms6/bin/tmsrpt05 f=F".trim($terminal[0]).".".$folMo.$folNo." r=E0010 s=".$supplier_no;
	if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." summary";
        }
    }
    else if(strcmp($rptName,"Carrier Listing Report") == 0)
    {
	$rptType = "l_carrier";
	$rptParameters = "t=0000001 r=E0010";
	$rptDesc = "Carrier Listing Report";
        //$rptCommand = "/tms6/bin/l_carrier r=E0010";
    }
    else if(strcmp($rptName,"Driver Listing Report") == 0)
    {

	$rptType = "l_driver";
	$rptParameters = "h=".$carrier_no." t=0000001 r=E0010";
	$rptDesc = "Driver Listing Report";
        
        //$rptCommand = "/tms6/bin/l_driver h=".$carrier_no." r=E0010";
        $idleDays = $_POST['txtIdleDays'];
        if(strcmp($idleDays,"") > 0 || strcmp($idleDays,"") < 0)
        {
            $rptParameters = $rptParameters." i=".$idleDays;
        }
        $isLocked = $_POST['isDrLocked'];
        if(strcmp($isLocked,"locked") == 0)
        {
            $rptParameters = $rptParameters." +locked";
        }
    }
    else if(strcmp($rptName,"Driver Expiration Listing Report") == 0)
    {
        
	$rptType = "driver_exp";
	
	$expType = $_POST['selDrExp'];	

        if(strcmp($expType,"") == 0)
        {
            $expType = "ALL EXPIRATION";
        }
        
        $expDays = $_POST['txtExpDays'];
        $expDays = str_pad($expDays, 3, "0", STR_PAD_LEFT); 
        
	$rptParameters = 'h='.$carrier_no.' e='.$expDays.' x="'.$expType.'" r=E0010';
	$rptDesc = "Driver Expiration Listing Report";

        //$rptCommand = '/tms6/bin/l_driver h='.$carrier_no.' x="'.$expType.'" r=E0010';
        
//        if(strcmp($expDays,"") > 0 || strcmp($expDays,"") < 0)
//        {
//            
//            $rptParameters = $rptParameters." e=".$expDays;
//        }
        $isLocked = $_POST['isDrLocked'];
        if(strcmp($isLocked,"locked") == 0)
        {
            $rptParameters = $rptParameters." +locked";
        }
    }

//echo "1";
//session_start();
//$_SESSION['last_line'] = "";
//echo get_include_path();
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//echo "1";
include('Net/SSH2.php');
//echo "1";
//CN IP 184.149.36.41
//$ssh = new Net_SSH2('10.73.5.50');

$vopakSSH = new Net_SSH2('192.168.0.150');
//echo "1";
if (!$vopakSSH->login('tms6', 'toptech')) {
    echo "Cannot connect to host";
    exit('Login Failed');
}


if(strcmp($rptName,"Meter Detail Report") == 0 || strcmp($rptName,"Tank Stock Balance Report") == 0 || strcmp($rptName,"Carrier Listing Report") == 0 || strcmp($rptName,"Driver Listing Report") == 0 || strcmp($rptName,"Driver Expiration Listing Report") == 0)
{
}
else
{
    $isMTD = $_POST['isMTD'];
    //echo $isMTD;
    if(strcmp($isMTD,"mtd") == 0)
    {
        $rptParameters = $rptParameters." +mtd";
    }
}


if(strcmp($rptFormat,"txtrpt") == 0)
{
	$rptCommand = "/tms6/bin/".$rptType." ".$rptParameters;
	
	$rptGenExec = $vopakSSH->exec($rptCommand);
	
	$paramExec = $vopakSSH->exec('mylist Param');

	$paramData = explode('","', $paramExec);	

	$srcRptDir = "/tmp/rpt/".$paramData[1];

	$destRptFilename = $paramData[1].".txt";
	
}
else if(strcmp($rptFormat,"txtpdf") == 0)
{
        $user = $_SESSION["user"];
        
	$rptCommand = "unset DISPLAY; /toptech_prj/bin/reportHandler rt=".$rptType." rp='".$rptParameters."' u=".$user." d='".$rptDesc."' ot=P os=9999 > /dev/null";

	$rptGenExec = $vopakSSH->exec($rptCommand);

	$srcRptDir = "/toptech_prj/www/rpt/".$user."/9999.pdf";

	$destRptFilename = $user."9999.pdf";

}


$macVMSSH = new Net_SSH2('10.66.24.2');
if (!$macVMSSH->login('nupadhyay', 'High4$Low')) {
    echo "Cannot connect to host";
    exit('Login Failed');
}
//echo "1";

$rptDownloadCmd = "scp tms6@192.168.0.150:".$srcRptDir." /Applications/XAMPP/htdocs/TMS6/RPT/".$destRptFilename;

$rptDownloadExec = $macVMSSH->exec($rptDownloadCmd);
echo "RPT/".$destRptFilename;
//echo $rptCommand.":::--:::RPT/".$destRptFilename;

?>
