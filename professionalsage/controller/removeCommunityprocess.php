<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/domainsModel.php');

    function fetchDomains(){
        $uname = $_SESSION['username'];
        return getAllDomainsByUser($uname);
    }

    function removeCommunity($cid){
        $uname = $_SESSION['username'];
        deleteCommunity($cid,$uname);        
    }
      

?>