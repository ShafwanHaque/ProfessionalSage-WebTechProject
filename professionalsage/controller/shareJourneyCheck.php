<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/journeyModel.php');
    
    function shareJourney($title,$description){
        $uname = $_SESSION['username'];
        $erroFlag = false;
        if($title == "") {
            $_SESSION['titleError'] = "Enter title";
            $errorFlag = true;
        }
        if(!$description || $description == "" || !strlen($description)) {
            $_SESSION['descriptionError'] = "Enter description";
            $errorFlag = true;
        }  
        if($erroFlag) {
            $_SESSION['oldTitle'] = $title;
            $_SESSION['oldDescription'] = $description;
            return false;
        }
        addJourney($uname,$title, $description);
    }

    function fetchTitles(){
        return getTitles();
    }

?>