<?php
session_start();
include "database_connection_45.php";
if (isset($_SESSION['global'])) {
    ?>


    <?php include("header.php"); ?>

    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="css/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>
    </head>
    <body>
        <!---section---->
        <?php 
        
        echo "";
        
        $supplier = $_GET['sup'];
        $customer = $_GET['cust'];
        $account =  $_GET['acct'];
        $product = $_GET['p'];
        
        $spdcode = $_GET['sc'];
        $cn = $_GET['cn'];
        $aefd = $_GET['aefd'];
        $aexd = $_GET['aexd'];
        $erp = $_GET['erp'];
        $src = $_GET['src'];
        $ae = $_GET['ae'];
        $oi = $_GET['oi'];
        $pdt = $_GET['pdt'];
        
        ?>
        <div>
            <!-- <h3>Surveys</h3>
            <hr>-->
            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Account Product Edit</h2>

            </div>
            
<!--            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Account Products Edit</a></li> 
                </ul>
            </div>-->
           

            <table>
                <thead>
                    <tr>
                        <td>Terminal</td>
                        <td>
                            <?php 
                                $query1="SELECT term_id FROM TerminalProfile";
				$result1=$mysqli->query($query1);
                                while($value1 = mysqli_fetch_array($result1))
				{
                                    echo $value1['term_id'];
				}
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>
                            <?php echo $supplier; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer</td>
                        <td>
                            <?php echo $customer; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Account</td>
                        <td>
                            <?php echo $account; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product</td>
                        <td>
                            <?php echo $product; ?>
                        </td>
                    </tr>
                </thead>
            </table>


            <div>
                <!--<ul>
                    <li><a href="#tabs-1">General</a></li> 
                    <li><a href="#tabs-2">Validations</a></li>
                </ul>-->
                <div>
                    <form>
                        <table>
                            <thead>
                                <tr>
                                    <td>SPD Code</td>
                                    <td>
                                        <input type="text" name="spd_code" value="<?php echo $spdcode; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>ContractNumber</td>
                                    <td>
                                        <input type="text" name="contract_number" value="<?php echo $cn; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Authorized Eff.Date</td>
                                    <td>
                                        <input type="text" name="auth_eff_dt" value="<?php echo $aefd; ?>">
                                </tr>
                                <tr>
                                    <td>Authorized Exp.Date</td>
                                    <td>
                                        <input type="text" name="auth_expr_dt" value="<?php echo $aexd; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>ERP Handling Type </td>
                                    <td>
                                        <input type="text" name="ERPHandlingType" value="<?php echo $erp; ?>">
                                </tr>
                                <tr>
                                    <td>Source</td>
                                    <td>
                                        <input type="text" name="source" value="<?php echo $src; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox">Active
                                    </td>
                                </tr>
                                <tr>					
                                    <td><input type="checkbox">Enable OSP Interface</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox">Print Delivery Tickit</td>
                                </tr>
                                <?php
                            } else {
                                header("location:index.php");
                                session_destroy();
                            }
                            ?>

                            </tbody>
                    </table>
                </form>
            </div>
<!--            <div id="tabs-2">
                <form>
                    <table  class="display" cellspacing="0" width="100%">
                        <thead>
                            
                        </thead>
                    </table>

                </form>
            </div>-->
        </div>


</body>
</html>

<?php include("footer.php"); ?>