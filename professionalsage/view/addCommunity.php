<?php

if (!isset($_SESSION) ){
    session_start();
    }

    $user = $_SESSION['user'];

    require_once('../controller/addCommunityProcess.php');
    $result = fetchDomains();

    if(isset($_POST['add'])){
        
        addCommunity($_POST['community']);
    }

?>

<html>
<head>
    <title>
        Add community
    </title>
    <link rel="stylesheet" href="../public/css/style.css" media="screen">
    <link rel="stylesheet" href="../public/css/addCommunity.css" media="screen">
</head>
<body>
    <?php require_once('top_navbar.php'); ?>
    <div>
        <form method="POST" action="">
            <fieldset>
                <legend >Add community</legend>
                <table align=left  cellpadding ="10" cellspacing ="30">
                    <tr>
                        <td class="description">
                            Community Name: 
                        </td>
                        <td>
                            <select name="community" id="community" onchange="emptyError()">
                                <option value=""> </option>
                                <?php
                                if(isset($result) && $result){
                                    foreach($result as $key => $value){
                                        
                                        
                                    ?>
                                    <option <?php if(isset($_SESSION['communityOld']) && $_SESSION['communityOld'] == $value['domain_id']) {echo 'selected'; unset($_SESSION['communityOld']);} ?> 
                                    value="<?=$value['domain_id']?>"> <?=$value['name']?> </option>
                                    <?php
                                    }
                                    
                                }
                               
                                ?>
                            </select>
                            <span class="error" id="communityError">
                                <?php 
                                    if (isset($_SESSION['communityError'])) {
                                        echo $_SESSION['communityError'];
                                        unset($_SESSION['communityError']);
                                    }                                    
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td align = center>
                            <input class="submit" type="submit" name="add" value="Add" onclick="return validationCommunity()">
                        </td>
                        

                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
    <script type="text/javascript" src="../public/js/addCommunity.js"></script>
</body>
</html>