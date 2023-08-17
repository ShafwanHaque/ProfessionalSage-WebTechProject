
<html >
<head>
    
    <title>Following professional</title>
</head>
<body>
    <?php require_once('top_navbar.php'); ?>
    <?php
        if (!isset($_SESSION) ){
            session_start();
        }
        $user = $_SESSION['user'];
        require_once('../controller/followProfessionalCheck.php');
        if($_POST["follow"]){
            follow($_POST['followUserName']);
            echo "You are following ".$_POST['followUserName'];   
        } else {
            header('location: ../view/followProfessional.php');
        }
    ?>
    <?php include_once('bottom_navbar.php'); ?>

</body>
</html>