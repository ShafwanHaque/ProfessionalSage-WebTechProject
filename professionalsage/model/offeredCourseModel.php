<?php
    require_once('db.php');

    function getAllCourses(){
        
        $con = dbConnection();
        $sql = "SELECT * from offered_courses;";

        if($result = mysqli_query($con, $sql)){
            $courses = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($courses, $row);
            }
            return $courses;
        }
        return false;
    }
    
    function getCourse($cid){
        
        $con = dbConnection();
        $sql = "SELECT * from offered_courses where offered_course_id = '{$cid}';";

        if($result = mysqli_query($con, $sql)){
            return $row=mysqli_fetch_assoc($result);
        }
        return false;
    }
?>