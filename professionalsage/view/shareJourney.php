<?php

if (!isset($_SESSION) ){
    session_start();
    }

    $user = $_SESSION['user'];

    require_once('../controller/shareJourneyCheck.php');
    if(isset($_POST['submit'])){
          shareJourney($_POST['title'],$_POST['description']);
    }
    
?>
<html>
<head>
    <title>
        Share Journey
    </title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/shareJourney.css">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>
        <form method="POST" action="shareJourney.php">
            <fieldset>
                <legend >Share journey</legend>
                <table align=center  cellpadding ="10" cellspacing ="30">
                    <tr>
                        <td>
                            Topic title :  
                        </td>
                        <td>
                            <input type="text" id="title" name="title" /> 
                            <span class="error" id="titleError">
                                <?php 
                                    if (isset($_SESSION['titleError'])) {
                                        echo $_SESSION['titleError'];
                                        unset($_SESSION['titleError']);
                                    }                                    
                                ?>
                            </span>                               
                        </td>
                        
                    </tr>
                    <tr>
                        <td >
                            Description :
                        </td>
                        <td align = center>
                            <?php
                                if(isset($_SESSION['oldDescription'])) {
                                    $oldDescription = $_SESSION['oldDescription'];
                                    unset($_SESSION['oldDescription']);
                                } else {
                                    $oldDescription = "";
                                }
                            ?>
                            <textarea id="description" name="description" rows="5" cols="50"><?= $oldDescription; ?></textarea>
                            <span class="error" id="descriptionError">
                                <?php 
                                    if (isset($_SESSION['descriptionError'])) {
                                        echo $_SESSION['descriptionError'];
                                        unset($_SESSION['descriptionError']);
                                    }                                    
                                ?>
                            </span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                           
                        </td>
                        <td align = center>
                            <input class="submit" type="submit" name="submit" value="Submit">
                        </td>

                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
</body>
</html>