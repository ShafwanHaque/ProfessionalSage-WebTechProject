<?php

if (!isset($_SESSION) ){
    session_start();
    }

    $user = $_SESSION['user'];
    require_once('../controller/uploadExamCheck.php');
    require_once('../controller/shareJourneyCheck.php');
    require_once('../controller/addCommunityProcess.php');
    $domains = fetchDomains();
    $titles = fetchTitles();

    if(isset($_POST['submit'])){
        addQuestion($_POST['community'], $_POST['title'], $_FILES['question']);
        

    }

?>

<html>
<head>
    <title>
        Upload Exam Question
    </title>
    <link rel="stylesheet" type="text/css" href="../public/css/uploadExam.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">

</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>Upload exam question</legend>
                <table align=left  cellpadding ="10" cellspacing ="30">
                    <tr>
                        <td class="deriction">
                            Select path :
                        </td>
                        <td>
                            <select name="community">
                                <option value=""> </option>
                                <?php
                                if(isset($domains) && $domains){
                                    foreach($domains as $key => $value){
                                        
                                        
                                    ?>
                                    <option value = "<?=$value['domain_id']?> "> <?=$value['name']?> </option>
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
                        <td class="deriction">
                            Select Task :
                        </td>
                        <td>
                            <select name="title">
                                <option value=""> </option>
                                <?php
                                if(isset($titles) && $titles){
                                    foreach($titles as $key => $value){
                                        
                                        
                                    ?>
                                    <option value = "<?=$value['journey_id']?> "> <?=$value['title']?> </option>
                                    <?php
                                    }
                                    
                                }
                               
                                ?>
                            </select>
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
                        <td class="deriction">
                            Upload question file :
                        </td>
                        <td>
                            <input type="file" id="myFile" name="question">
                            <span class="error" id="file">
                                <?php 
                                    if (isset($_SESSION['file'])) {
                                        echo $_SESSION['file'];
                                        unset($_SESSION['file']);
                                    }                                    
                                ?>
                            </span>
                        </td>
                        
                    </tr>  
                    <tr>
                        <td></td>
                        <td></td>
                        <td>                            
                            <input class="button" type="submit" name="submit" value="Upload"/>
                        </td>
                    </tr>     
                </table>
            </fieldset>
        </form>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
</body>
</html>