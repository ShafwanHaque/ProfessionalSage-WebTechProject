<?php
    if (!isset($_SESSION) ){
        session_start();
        }
        $user = $_SESSION['user'];
    
        require_once('../controller/purchaseCrouseProcess.php');
        $courses = fetchAllCrouses();

?>

<html>
<head>
    <title>
        Purchase Course
    </title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/purchaseCourse.css">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>
        <form>
            <fieldset>
                <legend >Purchase course</legend>
                <table align=left  cellpadding ="10" cellspacing ="20">
                    <tr>
                        <td>
                            Crouses:
                        </td>
                        <td> </td>
                        
                    </tr>
                        <?php 
                        foreach($courses as $value){?>
                        <tr>
                            <td >
                                <a class="link" href="course_details.php?cid=<?=$value['offered_course_id']?>"><?=$value['title']?></a>
                            </td>
                            <td>
                            Price:
                            <?php
                                echo $value['price'];
                            ?>
                            TK
                            </td>
                            <td >
                                <a class="link" href="payment.php?cid=<?=$value['offered_course_id']?>">Purchase</a>
                            </td>
                        </tr>
                            <?php
                        }?>
                    
                </table>
            </fieldset>
        </form>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
</body>
</html>