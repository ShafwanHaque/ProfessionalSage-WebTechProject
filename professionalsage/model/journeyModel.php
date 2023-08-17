<?php
    require_once('db.php');


    function addJourney($username,$title, $description){
        
        $con = dbConnection();
        $sql = "INSERT into share_journey values(
                                        '',
                                        '{$username}',
                                        '{$title}',
                                        '{$description}'
                                        )";

        
        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }

    function getTitles(){
        $con = dbConnection();
        $sql = "SELECT * from share_journey;";
        
        if($result = mysqli_query($con, $sql)){
            $domains = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($domains, $row);
            }
            return $domains;
        }
        return false;

    }
?>