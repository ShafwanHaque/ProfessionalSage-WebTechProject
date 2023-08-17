<?php
    require_once('db.php');

    function followFinal($username, $user){
        
        $con = dbConnection();
        $sql = "INSERT into followers (username, following_username, follower_id) values(                                        
                                        '{$user}',                                        
                                        '{$username}',
                                        ''
            
            )";

        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }
?>