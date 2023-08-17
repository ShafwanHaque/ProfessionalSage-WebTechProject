<?php

if (!isset($_SESSION) ){
    session_start();
    }
    
    $user = $_SESSION['user'];

    require_once('../controller/attendExamCheck.php');
    require_once('../controller/shareJourneyCheck.php');
    require_once('../controller/addCommunityProcess.php');
    $domains = fetchDomains();
    $titles = fetchTitles();

    if(isset($_POST['show'])){
        $file = selectPath($_POST['community'],$_POST['title']);
    }

    if(isset($_POST['submit'])){
        submitAnswer( $_FILES['answer']);
        
    }

?>


<html>
<head>
    <title>
        Professional sage | Attend Exam
    </title>
    <link rel="stylesheet" href="../public/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../public/css/attendExam.css">
</head>
<body>    
<?php require_once('top_navbar.php'); ?>

    <div>
        <form method="POST" action="">
            <fieldset>
                <legend align = "center"><h3>Attend exam</h3></legend>
                <table align="center" >
                    <tr>
                        <td >
                            Select path :
                        </td>
                        <td>
                            <select name="community" id="community">
                                <option value=""> </option>
                                <?php
                                if(isset($domains) && $domains){
                                    foreach($domains as $key => $value){
                                        
                                        
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
                        <td >
                            Select Task :
                        </td>
                        <td>
                        <select name="title" id="title">
                                <option value=""> </option>
                                <?php
                                if(isset($titles) && $titles){
                                    
                                    foreach($titles as $key => $value){
                                        
                                        
                                    ?>
                                    <option <?php if(isset($_SESSION['titleOld']) && $_SESSION['titleOld'] == $value['journey_id']) {echo 'selected';} ?> 
                                    value = "<?=$value['journey_id']?>"> <?=$value['title']?> </option>
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
                        <td></td>
                        <td align = center>
                            <input type="submit" name="show" value="Show Question" onclick="return validationQuestion()"/>
                        </td>
                        
                    </tr>
                </form>

                

                    <tr>
                        <td >
                            Question file :
                        </td>
                        <td>
                            <?php
                            if(isset($file) && isset($file[0])){?>
                                <a href='../vendor/documents/<?=$file[0]?>' target="_blank"><?=$file[0]?></a>
                            <?php
                            }
                            ?>
                        </td>
                        
                        
                    </tr>  
                    <form method="POST" action="" enctype="multipart/form-data">
                        <tr>                        
                            <td >Answer file: </td>
                            <td>
                                <input type="file" id="answer" name="answer">
                                <span class="error" id="answerError">
                                <?php 
                                    if (isset($_SESSION['answerError'])) {
                                        echo $_SESSION['answerError'];
                                        unset($_SESSION['answerError']);
                                    }                                    
                                ?>
                                </span>
                                <span class="sucess">
                                <?php 
                                    if (isset($_SESSION['sucess'])) {
                                        echo $_SESSION['sucess'];
                                        unset($_SESSION['sucess']);
                                    }                                    
                                ?>
                                </span>
                            </td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td align = center>
                                <input class="submit" type="submit" name="submit" value="Submit" onclick="return validationAnswer()"/>
                            </td>
                        </tr>
                    </form>
                                      
                      
                </table>
            </fieldset>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
    <script type="text/javascript" src="../public/js/attendExam.js"></script>
</body>
</html>