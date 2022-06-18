<?php
    // if(isset($_POST['tag'])&&isset($_POST['pattern'])&&isset($_POST['response'])&&isset($_POST['context'])){
        if(isset($_POST['tag'])){

        // $result = $_POST['name'];
        // $row=0;
        // if($result == "himanshu"){
        //     $row = 1;
        // }
        // echo json_encode($row);

        $tag = $_POST['tag'];
        $patternArray = $_POST['pattern'];   
        $responseArray = $_POST['response'];
        $context = $_POST['context'];

        $pattern = str_replace('\\', '', $patternArray);
        $response = str_replace('\\', '', $responseArray);
        // $pattern = json_encode($patternArray);
        // $response = json_encode($responseArray);
        // $pattern = serialize($patternArray);
        // $tag = $_POST['tag'];
        // $pattern = $_POST['pattern'];   
        // $response = $_POST['response'];
        // $context = $_POST['context']; 
        // $tag = "zdfsadfsdf";
        // $pattern = "sdfsdfsdf";   
        // $response = "34656";
        // $context = "34256";    

        $current_data = file_get_contents('../../dataflair/intents.json');
        $array_data = json_decode($current_data, true);
        $extra = Array(
            "tag" => $tag,
            "patterns" => $pattern,
            "responses" => $response,
            "context" => [$context]
        ); 
        $array_data['intents'][] =$extra;
        $final_data = json_encode($array_data);
        $row=2;
        
        if(file_put_contents('../../dataflair/intents.json', $final_data))
        {
             $row =1;
            echo json_encode($row);
        }else{
            $row=0;
            echo json_encode($row);
        } 
    }   
    
?>