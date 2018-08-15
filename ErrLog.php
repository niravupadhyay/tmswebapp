<?php

    session_start();
    error_reporting(0);?>
<b><?php echo "File is big and it may take a while to download, ";?></b>;
<?php $errlogdate = $_GET['filedate'];
    $errfiledate =  substr($errlogdate,0, strpos($errlogdate, "."));
// define some variables
    ?>
<!--<a href='downloadErrLog.php?filedate=<?php //echo "$errfiledate";?>'>Click here to download file</a>;-->
<a href='ErrLog/errlog<?php echo "$errfiledate";?>.txt'>Click here to download file</a>;


