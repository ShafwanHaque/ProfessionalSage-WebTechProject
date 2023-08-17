<?php
if (!isset($_SESSION) ){
    session_start();
    }
    require_once('../model/professionalDocumentsModel.php');
    
    // function submitDocument($title, $filename, $description, $price ){
    //     if($filename['size'] > 0){
    //         $document = $filename['name'];
    //         $document_src = $filename['tmp_name'];
    //         $document_des = "../vendor/documents/".$filename['name'];
            
    //         if(move_uploaded_file($document_src, $document_des)){}
    //         else {
    //             header('location: ../view/offeredCourse.php');
    //             exit();
    //         }
            
    //     }
        
    //     addOfferedCourse($title, $filename['name'], $description, $price);
    // }

    function submitDocument($title, $file, $description, $price ){
        // Get the file name without extension
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);

        // Get the file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

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

        if($title == "") {
            $_SESSION['titleError'] = "Enter title";
            $errorFlag = true;
        } 
        if($fileName=="" || !$file['size']){
            $_SESSION['fileError'] = "Select File";
            $erroFlag = true;
        } else if($extensionError){
            $_SESSION['fileError'] = "Allowed File Type: image, docs, pdf";
            $erroFlag = true;
        }
        if(!$description || $description == "" || !strlen($description)) {
            $_SESSION['descriptionError'] = "Enter description";
            $errorFlag = true;
        }  
        if($price =="") {
            $_SESSION['priceError'] = "Enter Price";
            $errorFlag = true;
        }

        if($erroFlag) {
            $_SESSION['oldTitle'] = $title;
            $_SESSION['oldDescription'] = $description;
            return false;
        }
        
        $uname = $_SESSION['username'];

        if($file['size'] > 0){
            $document = $file['name'];
            $document_src = $file['tmp_name'];
            $document_des = "../vendor/documents/".$file['name'];
            
            if(move_uploaded_file($document_src, $document_des)){}
            else {
                header('location: ../view/offerdCourse.php');
                exit();
            }
            
        }
        
        if(addOfferedCourse($title, $file['name'], $description, $price)) {
            $_SESSION['sucess'] = "Document Uploaded Sucessfully!";
        } else {
            $_SESSION['answerError'] = "Something went wrong!";
        }

    }
    
?>