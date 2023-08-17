<?php
    if (!isset($_SESSION) ){
        session_start();
        }
        require_once('../model/offeredCourseModel.php');


        function fetchAllCrouses(){

            return getAllCourses();
        }

        function fetchCrouse($cid){
            
            return getCourse($cid);
        }


    
?>