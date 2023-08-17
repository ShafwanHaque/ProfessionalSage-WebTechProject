<?php
    require_once('db.php');


    function addDocument($username, $location, $community = NULL, $title = NULL){
        
        $con = dbConnection();
        $sql = "INSERT into professional_documents values(
                                        '{$username}',
                                        '{$location}',
                                        '',
                                        '{$community}',
                                        '{$title}'
                                        )";

        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }

    function deleteDocument($username, $file){
        $con = dbConnection();
        $sql = "DELETE FROM professional_documents where username='{$username}' and file_location='{$file}';";
        if(mysqli_query($con, $sql)){
            return true;
        }
        return false;

    }

    // function getInfo($title, $description, $price){
    //     $con = dbConnection();
    //     $sql = "SELECT * from offered_courses where username='{$username}';";
        
    //     if($result = mysqli_query($con, $sql)){
    //         $files = [];
    //         while($row=mysqli_fetch_assoc($result)){
    //             array_push($files, $row['file_location']);
    //         }
    //         return $files;
    //     }
    //     return false;

    // }

    function getDocuments($username){
        $con = dbConnection();
        $sql = "SELECT file_location from professional_documents where username='{$username}';";
        
        if($result = mysqli_query($con, $sql)){
            $files = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($files, $row['file_location']);
            }
            return $files;
        }
        return false;
    }

    function getQuestion($community, $title){
        $con = dbConnection();
        $sql = "SELECT file_location from professional_documents where community='{$community}' and  title='{$title}';";
        
       
        if($result = mysqli_query($con, $sql)){
            $files = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($files, $row['file_location']);
            }
            return $files;
        }
        return false;
    }

    //offered Course
    function addOfferedCourse($title, $filename, $description, $price){
        $con = dbConnection();
        $sql = "INSERT into offered_courses (offered_course_id, title, file_location, description, price) values(
                                        '',
                                        '{$title}',
                                        '{$filename}',
                                        '{$description}',
                                        '{$price}'
                                        )";

        if(mysqli_query($con, $sql)){
            return true;
        }else {
            mysqli_error($con);
            return false;
        }
    }

?>