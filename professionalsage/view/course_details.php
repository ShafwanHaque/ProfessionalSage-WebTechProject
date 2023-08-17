<?php
    if (!isset($_SESSION) ){
        session_start();
        }
        $user = $_SESSION['user'];
    
        require_once('../controller/purchaseCrouseProcess.php');
        $course = fetchCrouse($_GET['cid']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course Details</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/courseDetails.css">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <table>
        <tr>
            <td>
                Title:
            </td>
            <td>
                <?php
                    echo $course['title'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Description:
            </td>
            <td>
                <?php
                    echo $course['description'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Price:
            </td>
            <td>
                <?php
                    echo $course['price'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <a class="submit" href="payment.php?cid=<?=$course['offered_course_id']?>">Purchase</a>
            </td>
        </tr>
    </table>
    <?php include_once('bottom_navbar.php'); ?>
</body>
</html>