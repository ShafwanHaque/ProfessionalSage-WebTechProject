<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/domainsModel.php');

    function fetchDomains(){
        return getDomains();
    }

    function addCommunity($community){
        $errorFlag = false;
        $uname = $_SESSION['username'];

        unset($_SESSION['communityError']);
        if($community == "") {
            $_SESSION['communityError'] = "Select Community";
            $errorFlag = true;
        }     
        else if(checkCommunity($uname,$community)){

            $_SESSION['communityError'] = "Community Already Exists";
            $errorFlag = true;
        }

        if($errorFlag) {
            $_SESSION['communityOld'] = $community;            
            header('location: ../view/addCommunity.php');
            exit(0);
        }
        
        insertCommunity($community, $uname); 

        
    }

?>