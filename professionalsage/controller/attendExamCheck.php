<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/professionalDocumentsModel.php');



    function selectPath($community, $title){
        $errorFlag = false;
        if($community == "") {
            $_SESSION['communityError'] = "Select Community";
            $errorFlag = true;
        }
        if($title == "") {
            $_SESSION['titleError'] = "Select Title";
            $errorFlag = true;
        }
        if($errorFlag) {
            $_SESSION['communityOld'] = $community;
            $_SESSION['titleOld'] = $title;
            header('location: ../view/attendExam.php');
            exit(0);
        }
        $uname = $_SESSION['username'];
        $file=getQuestion($community, $title);
        return $file;
    }

    function submitAnswer($question){
        // Get the file name without extension
        $fileName = pathinfo($question['name'], PATHINFO_FILENAME);

        // Get the file extension
        $fileExtension = pathinfo($question['name'], PATHINFO_EXTENSION);

        $erroFlag = false;
        $extensionError = true;
        $allowed_extensions = ["jpg", "png", "doc", "docx", "pdf"];
        

        $extensionError = true;
        for($i = 0; $i < count($allowed_extensions); $i++)
        {
            if($allowed_extensions[$i] == $fileExtension)
            {
                $extensionError = false;
                break;
            }
        }

        if($fileName==""){
            $_SESSION['answerError'] = "Select File";
            $erroFlag = true;
        } else if($extensionError){
            $_SESSION['answerError'] = "Allowed File Type: image, docs, pdf";
            $erroFlag = true;
        }

        if($erroFlag) {
            return false;
        }
        
        $uname = $_SESSION['username'];

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
        
        if(addDocument($uname,$question['name'])) {
            $_SESSION['sucess'] = "Answer Uploaded Sucessfully!";
        } else {
            $_SESSION['answerError'] = "Something went wrong!";
        }
    }
      

?>