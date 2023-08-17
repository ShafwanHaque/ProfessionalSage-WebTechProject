<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/professionalDocumentsModel.php');
    
    function addQuestion($community,$title,$question){
        $uname = $_SESSION['username'];

        unset($_SESSION['communityError']);
        if($community == "") {
            $_SESSION['communityError'] = "Select Community";
            $errorFlag = true;
        }
        unset($_SESSION['titleError']);
        if($community == "") {
            $_SESSION['titleError'] = "Select title";
            $errorFlag = true;
        }
        unset($_SESSION['file']);
        if($question['size'] == 0) {
            $_SESSION['file'] = "Upload metarils are required.";
            $errorFlag = true;
        }
        
        if($question['size'] > 0){
            $document = $question['name'];
            $document_src = $question['tmp_name'];
            $document_des = "../vendor/documents/".$question['name'];
            
            if(move_uploaded_file($document_src, $document_des)){}
            else {
                header('location: ../view/uploadExam.php');
                exit();
            }
            
        }
        
        addDocument($uname,$question['name'],$community,$title);
    }
    
?>