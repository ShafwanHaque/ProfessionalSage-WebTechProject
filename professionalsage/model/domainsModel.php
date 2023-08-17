<?php
    require_once('db.php');


    function addDomain($name){
        
        $con = dbConnection();
        $sql = "INSERT into domains values(
                                        '',
                                        '{$name}'
                                        )";

        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }

    function deleteDomains($id){
        $con = dbConnection();
        $sql = "DELETE FROM domains where id='{$id}';";
        if(mysqli_query($con, $sql)){
            return true;
        }
        return false;

    }

    function getAllDomains($username = ''){
        $con = dbConnection();
        $sql = "SELECT * from domains where domain_id NOT IN (SELECT domain_id from user_domains where username='{$username}');";
        
        if($result = mysqli_query($con, $sql)){
            $domains = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($domains, $row);
            }
            return $domains;
        }
        return false;
    }

    function getDomainName($id){
        $con = dbConnection();
        $sql = "SELECT name from domains where domain_id='{$id}';";
        
        if($result = mysqli_query($con, $sql)){
            return $row=mysqli_fetch_assoc($result)['name'];
        }
        return false;
    }

    function getDomains(){
        $con = dbConnection();
        $sql = "SELECT * from domains;";
        
        if($result = mysqli_query($con, $sql)){
            $domains = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($domains, $row);
            }
            return $domains;
        }
        return false;

    }


    function insertCommunity($cid,$uname){
        
        $con = dbConnection();
        $sql = "INSERT into user_domains(username,domain_id) values(
                                        '{$uname}',
                                        '{$cid}'
                                        )";

        
        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }

    function checkCommunity($username,$domain_id){

        $con = dbConnection();
        $sql = "SELECT * from user_domains where (username = '{$username}' and domain_id = '{$domain_id}');";

        if($result = mysqli_query($con, $sql)){
            $user_domains = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($user_domains, $row);
            }
            return $user_domains;
        }
        return false;
    }

    function  deleteCommunity($cid,$uname){
        $con = dbConnection();
        $sql = "DELETE FROM user_domains where username='{$uname}' and domain_id='{$cid}';";

        if(mysqli_query($con, $sql)){

            return true;
        }
        return false;


    }

    function getAllDomainsByUser($username = ''){
        $con = dbConnection();
        $sql = "SELECT * from domains where domain_id IN (SELECT domain_id from user_domains where username='{$username}');";
        
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