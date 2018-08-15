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

    if(strcmp($rptName,"Carrier Activity Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpt02 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." h=".$carrier;
    }
    else if(strcmp($rptName,"Rack Activity Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpt01a f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account;
    }
    else if(strcmp($rptName,"Rack Activity Summary") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpt01 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." Summary";
    }
    else if(strcmp($rptName,"Shipping Report (with components)") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpt03 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." +component_detail";
    }
    else if(strcmp($rptName,"Customer Activity Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptca f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer;
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptCommand = $rptCommand." Summary";
        }
    }
    else if(strcmp($rptName,"Account Activity Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpt07 f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account;
    }
    else if(strcmp($rptName,"Meter Detail Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptmd f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Detail Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptpd f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier." c=".$customer." a=".$account." p=".$prod_id;
    }
    else if(strcmp($rptName,"Tank Detail Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpttd f=F".$terminal.".".$folMo.$folNo." r=E0010";
        if(strcmp($rptMode,"Summary") == 0)
        {
            $rptCommand = $rptCommand." summary";
        }
    }
    else if(strcmp($rptName,"Bulk Shipping Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptbs f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
    }
    else if(strcmp($rptName,"Bulk Transaction Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptbt f=F".$terminal.".".$folMo.$folNo." r=E0010 s=".$supplier;
    }
    else if(strcmp($rptName,"Bulk Product Movement Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptpm f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Tank Stock Balance Report") == 0)
    {
        $rptCommand = "/tms6/bin/rpttkstk f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Terminal Balance Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpttb f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Tank Inventory Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrpttk f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Product Summary Report") == 0)
    {
        $rptCommand = "/tms6/bin/rptprdsm f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Additive Mass Balance Report") == 0)
    {
        $rptCommand = "/tms6/bin/tmsrptamb f=F".$terminal.".".$folMo.$folNo." r=E0010";
    }
    else if(strcmp($rptName,"Carrier Listing Report") == 0)
    {
        $rptCommand = "/tms6/bin/l_carrier r=E0010";
    }
    else if(strcmp($rptName,"Driver Listing Report") == 0)
    {
        
        $rptCommand = "/tms6/bin/l_driver h=".$carrier." r=E0010";
        $idleDays = $_POST['txtIdleDays'];
        if(strcmp($idleDays,"") > 0 || strcmp($idleDays,"") < 0)
        {
            $rptCommand = $rptCommand." i=".$idleDays;
        }
        $isLocked = $_POST['isDrLocked'];
        if(strcmp($isLocked,"Y") == 0)
        {
            $rptCommand = $rptCommand." +locked";
        }
    }
    else if(strcmp($rptName,"Driver Expiration Listing Report") == 0)
    {
        
        $expType = $_POST['selDrExp'];
        $rptCommand = '/tms6/bin/l_driver h='.$carrier.' x="'.$expType.'" r=E0010';
        $expDays = $_POST['txtExpDays'];
        if(strcmp($expDays,"") > 0 || strcmp($expDays,"") < 0)
        {
            $rptCommand = $rptCommand." e=".$expDays;
        }
        $isLocked = $_POST['isDrLocked'];
        if(strcmp($isLocked,"Y") == 0)
        {
            $rptCommand = $rptCommand." +locked";
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

$vopakSSH = new Net_SSH2('192.168.0.155');
//echo "1";
if (!$vopakSSH->login('tms6', 'toptech')) {
    echo "Cannot connect to host";
    exit('Login Failed');
}


if(strcmp($rptName,"Meter Detail Report") == 0 || strcmp($rptName,"Bulk Product Movement Report") == 0 || strcmp($rptName,"Tank Stock Balance Report") == 0 || strcmp($rptName,"Carrier Listing Report") == 0 || strcmp($rptName,"Driver Listing Report") == 0 || strcmp($rptName,"Driver Expiration Listing Report") == 0)
{
}
else
{
    $isMTD = $_POST['isMTD'];
    if(strcmp($isMTD,"Y") == 0)
    {
        $rptCommand = $rptCommand." +mtd";
    }
}


$rptGenExec = $vopakSSH->exec($rptCommand);
$paramExec = $vopakSSH->exec('mylist Param');

$paramData = explode('","', $paramExec);

$macVMSSH = new Net_SSH2('10.66.24.2');
if (!$macVMSSH->login('nupadhyay', 'High4$Low')) {
    echo "Cannot connect to host";
    exit('Login Failed');
}
//echo "1";

$rptDownloadCmd = "scp tms6@192.168.0.155:/tmp/rpt/".$paramData[1]." /Applications/XAMPP/htdocs/TMS6/RPT/".$paramData[1].".txt";

$rptDownloadExec = $macVMSSH->exec($rptDownloadCmd);
echo "RPT/".$paramData[1].".txt";
//echo $rptCommand;

?>
