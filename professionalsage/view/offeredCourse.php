<?php

if (!isset($_SESSION) ){
    session_start();
    }

    require_once('../controller/offeredCourseProcess.php');

    if(isset($_POST['submit'])){

        submitDocument($_POST['title'], $_FILES['filename'], trim($_POST['description']), $_POST['price']); 

    }

?>

<html>
<head>
    <title>
        Ofered Course
    </title>
    <link rel="stylesheet" href="../public/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../public/css/offeredCourse.css">
</head>
<body>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <fieldset>
                <legend >Offered course</legend>
                <table align=left  cellpadding ="10" cellspacing ="20">
                    <tr>
                        <td>
                            Course title :  
                        </td>
                        <td>
                            <input type="text" name="title" 
                            value="<?php
                                    if(isset($_SESSION['oldTitle'])) {
                                        echo $_SESSION['oldTitle'];
                                        unset($_SESSION['oldTitle']);
                                    }
                                ?>" />   
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
                            Materials :
                        </td>
                        <td>
                            <input type="file" id="myFile" name="filename" >
                            <span class="error" id="fileError">
                            <?php 
                                    if (isset($_SESSION['fileError'])) {
                                        echo $_SESSION['fileError'];
                                        unset($_SESSION['fileError']);
                                    }                                    
                                ?>
                            </span>
                        </td>
                    </tr><tr>
                        <td >                          
                        </td>
                        <td align="right">
                         
                        </td>
                    </tr>
                    <tr>
                        <td >
                            Description :
                        </td>
                        <td align = right>
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
                    </tr>
                    <tr>
                        <td >
                           Price :
                        </td>
                        <td >
                            <input type = "number" name="price"/>
                            <span class="error" id="priceError">
                            <?php 
                                    if (isset($_SESSION['priceError'])) {
                                        echo $_SESSION['priceError'];
                                        unset($_SESSION['priceError']);
                                    }                                    
                                ?>
                            </span>
                        </td>

                    </tr>
                    <tr>
                        <td >
                           
                        </td>
                        <td align = right>
                            <input class="submit" type="submit" name="submit" value="Upload"/>
                        </td>

                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</body>
</html>