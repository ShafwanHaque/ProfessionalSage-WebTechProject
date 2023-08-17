<?php

if (!isset($_SESSION) ){
    session_start();
    }

    require_once('../controller/removeCommunityProcess.php');
   
    
    if(isset($_GET['did'])){
        
        removeCommunity($_GET['did']);

    }
    header('location: removeCommunity.php');


?>