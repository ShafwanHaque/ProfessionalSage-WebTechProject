<?php
     if (!isset($_SESSION) ){
        session_start();
    }
    $user = $_SESSION['user'];

    require_once('../controller/followProfessionalCheck.php');

    if(isset($_POST['search'])){        
        $result = search($_POST['followSearchKey']); 
    }
    else{
        $result = search();
    }

    
?>

<html>
<head>
    <title>
        Follow Pofessional
    </title>
    <link rel="stylesheet" href="../public/css/followProfessional.css" media="screen">
</head>
<body>
<?php require_once('top_navbar.php'); ?>
    <div>
        
            <fieldset>
                <legend >Follow professional</legend>
                <form method="POST" action = "">
                    <div class="div_one">
                        <span class="deriction">Search by User Name/Email: </span>
                        <input type="text" name="followSearchKey" id="followSearchKey" value="" onkeyup="autoComplete()"/> <input type="submit" value="Search" name="search">
                    </div>
                </form>
                <div id="searchResults">
                    <?php
                    
                        if(isset($result) && $result){
                            foreach($result as $key => $value){
                    ?>
                                <form method="POST" action="follow.php">       
                                    <div class="follow-list">               
                                        <div>
                                            <a href="profile_view.php?username=<?=$value['username'] ?>"><?=$value['username'] ?></a> 
                                            <input type="hidden" name="followUserName" value="<?=$value['username'] ?>">
                                        </div>
                                        <div>
                                            <span><?=$value['email'] ?></span>
                                        </div>
                                        <div> 
                                            <input type="submit" value="Follow" name="follow"/>
                                        </div>
                                    </div> 
                                </form>
                                <?php
                            }

                        }                       
                        
                    ?>
                </div>

            </fieldset>
    </div>
    <?php include_once('bottom_navbar.php'); ?>
    <script type="text/javascript" src="../public/js/followProfessional.js"></script>
</body>
</html>