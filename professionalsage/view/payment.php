<?php
    if (!isset($_SESSION) ){
        session_start();
        }
        $user = $_SESSION['user'];
        require_once('../controller/purchaseCrouseProcess.php');
        $course = fetchCrouse($_GET['cid']);

?>
<html>
<head>
    <title>
        Make Payment
    </title>
    <link rel="stylesheet" href="../public/css/style.css" media="screen">
    <link rel="stylesheet" href="../public/css/payment.css" media="screen">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>
        <fieldset>
            <legend >Make Payment</legend>
            <div class="payement-div">
                <table align=left  cellpadding ="10" cellspacing ="20">
                    <tr>
                        <td>
                            Going to purchase 
                        </td>
                        <td>
                            <?php
                            echo $course['title'];
                                ?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            Payment Amount
                        </td>
                        <td>
                            <?php
                            echo $course['price'];
                                ?>
                            <input type="hidden" id="fileName" value="<?= $course['file_location']; ?>"/>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td >
                            Select payment method:
                        </td>
                        <td align = right>
                            <select name="paymentType" id="paymentType" onchange="changeType()">
                                <option value=""></option>
                                <option value="card">Card</option>
                                <option value="bkash">Bkash</option>
                                <option value="nagad">Nagad</option>
                            </select>
                        </td>
                    </tr>                   
                </table>
                <table id="card" class="typeForm">
                    <tr>
                            <td >
                            Card No :
                            </td>
                            <td >
                                <input type = "number" id="cardNo">
                                <span class="error" id="cardError">

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            PIN :
                            </td>
                            <td >
                                <input type = "number" id="pinNo">
                                <span class="error" id="pinError">

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            
                            </td>
                            <td align = right>
                                <button onclick="return purchase();">Purchase</button>
                            </td>
                    </tr>
                </table>
                <table id="bkash" class="typeForm">
                    <tr>
                            <td >
                            Mobile No :
                            </td>
                            <td >
                                <input type = "number" id="mobileNo">
                                <span class="error" id="mobileError">

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            PIN :
                            </td>
                            <td >
                                <input type = "number" id="bkashPinNo">
                                <span class="error" id="bkashPinError">

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            
                            </td>
                            <td align = number>
                                <button onclick="return purchase();">Purchase</button>
                            </td>
                    </tr>
                </table>
            </div>
        </fieldset>
    </div>
    <script type="text/javascript" src="../public/js/payment.js"></script>
        <?php include_once('bottom_navbar.php'); ?>
</body>
</html>