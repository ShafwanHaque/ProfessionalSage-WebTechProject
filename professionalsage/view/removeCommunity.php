<?php

if (!isset($_SESSION) ){
    session_start();
    }
    $user = $_SESSION['user'];
    require_once('../controller/removeCommunityProcess.php');
    $result = fetchDomains();
    
    if(isset($_POST['add'])){
        addCommunity($_POST['community']);

    }

?>

<html>
<head>
    <title>
        Remove community
    </title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/removeCommunity.css">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>       
            <fieldset>
                <legend >Remove community</legend>
                <table align=left  cellpadding ="10" cellspacing ="30">
                    <tr>
                        <td>
                            Community Name: 
                        </td>
                       
                    </tr>
                    <?php
                    if(isset($result)){
                        foreach($result as $key => $value){?>
                        <tr>
                            <td class="description">
                                <?=$value['name']?>
                            </td>
                            <td>
                                <a href="remove_com.php?did=<?=$value['domain_id']?>"> Reomve </a>
                            </td>

                        </tr>
                        <?php }

                    }?>
                  
                </table>
            </fieldset>        
    </div>
    <?php include_once('bottom_navbar.php'); ?>
</body>
</html>