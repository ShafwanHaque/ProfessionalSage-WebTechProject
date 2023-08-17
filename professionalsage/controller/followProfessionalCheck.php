<?php
    if (!isset($_SESSION) ){
        session_start();
        }
    require_once('../model/userModel.php');
    require_once('../model/followModel.php');

         
    function search($key=""){
        return getAllProfessionals($key);
    }

    function follow($username){
        followFinal($username, $_SESSION['username']);

    }     


    if(isset($_GET['followSearchKey'])) {
        // Get the search query from the URL parameter 'q'
        $query = isset($_GET['followSearchKey']) ? $_GET['followSearchKey'] : '';
        
        // Filter the data based on the search query
        $results = array();
        if (!empty($query)) {
            $sampleData = getAllProfessionals($query);
            foreach ($sampleData as $item) {
                $temp = [];
                $temp['username'] = $item['username'];
                $temp['email'] = $item['email'];
                $results[] = $temp;
            }
        }
        
        // Return the results as JSON
        header('Content-Type: application/json');
        echo json_encode($results);
    }



?>