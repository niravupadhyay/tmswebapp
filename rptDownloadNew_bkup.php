<?php
//echo "1";
session_start();
error_reporting(0);

$rptName = $_POST['selRptName'];

$terminal = $_POST['selterminal'];

//$terminal = "0000001";

$folMo = $_POST['selFolMo'];
$folNo = $_POST['selFolNo'];

$supplier = $_POST['selSupplier'];
if(strcmp($supplier,"") == 0)
{
    $supplier = "0000000000";
}

$customer = $_POST['selCustomer'];
if(strcmp($customer,"") == 0)
{
    $customer = "0000000000";
}

$account =  $_POST['selaccount'];
if(strcmp($account,"") == 0)
{
    $account = "0000000000";
}

$carrier = $_POST['selCarrier'];
if(strcmp($carrier,"") == 0)
{
    $carrier = "0000000";
}
//$driver = $_POST['seldriver'];

$prod_id = $_POST['selProduct'];
if(strcmp($prod_id,"") == 0)
{
    $prod_id = "000000";
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
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." h=".$carrier;
	$rptDesc = "Carrier Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt02 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." h=".$carrier;
    }
    else if(strcmp($rptName,"Rack Activity Report") == 0)
    {
	$rptType = "tmsrpt01a";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account;
	$rptDesc = "Rack Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt01a f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account;
    }
    else if(strcmp($rptName,"Rack Activity Summary") == 0)
    {
	$rptType = "tmsrpt01";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 S";
	$rptDesc = "Rack Activity Summary";
        //$rptCommand = "/tms6/bin/tmsrpt01 f=F".$terminal.".".$folMo.$folNo." r=E0010 S";
    }
    else if(strcmp($rptName,"Shipping Report (with components)") == 0)
    {
	$rptType = "tmsrpt03";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." +component_detail";
	$rptDesc = "Shipping Report (with components)";
        //$rptCommand = "/tms6/bin/tmsrpt03 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." +component_detail";
    }
    else if(strcmp($rptName,"Customer Activity Report") == 0)
    {
	$rptType = "tmsrptca";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." +sql";
	$rptDesc = "Customer Activity Report";
        //$rptCommand = "/tms6/bin/tmsrptca f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." +sql";
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Account Activity Report") == 0)
    {
	$rptType = "tmsrpt07";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." +sql";
	$rptDesc = "Account Activity Report";
        //$rptCommand = "/tms6/bin/tmsrpt07 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." +sql";
    }
    else if(strcmp($rptName,"Meter Detail Report") == 0)
    {
	$rptType = "tmsrptmd";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Meter Detail Report";
        //$rptCommand = "/tms6/bin/tmsrptmd f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Detail Report") == 0)
    {
	$rptType = "tmsrptpd";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." p=".$prod_id;
	$rptDesc = "Product Detail Report";
        //$rptCommand = "/tms6/bin/tmsrptpd f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." p=".$prod_id;
    }
    else if(strcmp($rptName,"Tank Detail Report") == 0)
    {
	$rptType = "tmsrpttd";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Detail Report";
        //$rptCommand = "/tms6/bin/tmsrpttd f=F".$terminal.".".$folMo.$folNo." r=E0010";
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Bulk Shipping Report") == 0)
    {
	$rptType = "tmsrptbs";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
	$rptDesc = "Bulk Shipping Report";
        //$rptCommand = "/tms6/bin/tmsrptbs f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
    }
    else if(strcmp($rptName,"Bulk Transaction Report") == 0)
    {
	$rptType = "tmsrptbt";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
	$rptDesc = "Bulk Transaction Report";
        //$rptCommand = "/tms6/bin/tmsrptbt f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
    }
    else if(strcmp($rptName,"Bulk Product Movement Report") == 0)
    {
	$rptType = "tmsrptpm";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
	$rptDesc = "Bulk Product Movement Report";
        //$rptCommand = "/tms6/bin/tmsrptpm f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
	if(strcmp($rptMode,"Summary") == 0)
        {
            $rptParameters = $rptParameters." S";
        }
    }
    else if(strcmp($rptName,"Tank Stock Balance Report") == 0)
    {
	$rptType = "rpttkstk";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Stock Balance Report";
        //$rptCommand = "/tms6/bin/rpttkstk f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Terminal Balance Report") == 0)
    {
	$rptType = "tmsrpttb";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Terminal Balance Report";
        //$rptCommand = "/tms6/bin/tmsrpttb f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Tank Inventory Report") == 0)
    {
	$rptType = "tmsrpttk";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Tank Inventory Report";
        //$rptCommand = "/tms6/bin/tmsrpttk f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Summary Report") == 0)
    {
	$rptType = "rptprdsm";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Product Summary Report";
        //$rptCommand = "/tms6/bin/rptprdsm f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Additive Mass Balance Report") == 0)
    {
	$rptType = "tmsrptamb";
	$rptParameters = "f=F".$terminal.".".$folMo.$folNo." r=E0010";
	$rptDesc = "Additive Mass Balance Report";
        //$rptCommand = "/tms6/bin/tmsrptamb f=F".$terminal.".".$folMo.$folNo." r=E0010";
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
	$rptParameters = "h=".$carrier." t=0000001 r=E0010";
	$rptDesc = "Driver Listing Report";
        
        //$rptCommand = "/tms6/bin/l_driver h=".$carrier." r=E0010";
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
        
	$rptParameters = 'h='.$carrier.' e='.$expDays.' x="'.$expType.'" r=E0010';
	$rptDesc = "Driver Expiration Listing Report";

        //$rptCommand = '/tms6/bin/l_driver h='.$carrier.' x="'.$expType.'" r=E0010';
        
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
