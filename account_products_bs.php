<?php
session_start();
include "database_connection_45.php";
if (isset($_SESSION['global'])) {
    ?>

<html>
    <?php include("header.php"); ?>
    <head>
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="css/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-table.css">-->
    <script>
        $(function () {
            $('#tablebs').bootstrapTable({
                //idField: 'name',
                pagination: true,
                search: true,
                onPostBody: function () {
                        $('#table').editableTableWidget({editor: $('<textarea>')});
                }
            });
        });
    </script>
    </head>
    <body>
        <!---section---->
        <?php echo "" ?>
        <div>
            <!-- <h3>Surveys</h3>
            <hr>-->
            



            <table  class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Terminal</td>
                        <td>
                            <select class="select" name="term_id">
                                <?php
                                $query1 = "SELECT term_id FROM AccountProducts";
                                $result1 = $mysqli->query($query1);
                                while ($value1 = mysqli_fetch_array($result1)) {
                                    echo "<option value=" . $value1["term_id"] . ">" . $value1['term_id'] . "</option>";
                                }
                                ?>
                            </select>				
                        </td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>
                            <select class="select" name="selterminal">
                                <?php
                                $query1 = "SELECT supplier_no FROM AccountProducts";
                                $result1 = $mysqli->query($query1);
                                while ($value1 = mysqli_fetch_array($result1)) {
                                    echo "<option value=" . $value1["supplier_no"] . ">" . $value1['supplier_no'] . "</option>";
                                }
                                ?>
                            </select>				
                        </td>
                    </tr>
                    <tr>
                        <td>Customer</td>
                        <td>
                            <select class="select" name="cust_no">
                                <?php
                                $id = $_GET['cust_no'];
                                $query1 = "SELECT cust_no FROM AccountProducts";
                                $result1 = $mysqli->query($query1);
                                while ($value1 = mysqli_fetch_array($result1)) {
                                    echo "<option value=" . $value1["cust_no"] . ">" . $value1['cust_no'] . "</option>";
                                }
                                ?>
                            </select>
                            				
                        </td>
                    </tr>
                    <tr>
                        <td>Account</td>
                        <td>
                            <select class="select" name="acct_no">
                                <?php
                                $id = $_GET['acct_no'];
                                $query1 = "SELECT acct_no FROM AccountProducts";
                                $result1 = $mysqli->query($query1);
                                while ($value1 = mysqli_fetch_array($result1)) {
                                    echo "<option value=" . $value1["acct_no"] . ">" . $value1['acct_no'] . "</option>";
                                }
                                ?>
                            </select>
                            				
                        </td>
                    </tr>
                    
                </thead>
            </table>


   <table data-toggle="table" id="tablebs">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Item 1</td>
                <td>$1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Item 2</td>
                <td>$2</td>
            </tr>
        </tbody>
    </table>
               
                    
                                
                                <?php
                            } else {
                                header("location:index.php");
                                session_destroy();
                            }
                            ?>

                     
               
            
          
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap-table.js"></script>     


</body>
</html>

<?php include("footer.php"); ?>