<?php
    // if(isset($_POST['txt'])){
    //     $request = $_POST['txt'];
    //     $request = str_replace(" ","_",$request);
    //     $cmd = "python response.py $request";
    //     //$cmd = "python ../pyChatBot/main.py $request";
    //     $respone = shell_exec($cmd);
    //     echo $respone;
    // }
?>

<!-- modified code -->
<?php
    if(isset($_POST['txt'])){
        $mainRequest = $_POST['txt'];
        $request = str_replace(" ","_",$mainRequest);


        $current_data = file_get_contents('request.json');
        $array_data = json_decode($current_data, true);
        $extra = Array(
            'request' => $mainRequest
        );
        $array_data['intents'][] =$extra;
        $final_data = json_encode($array_data);
        if (file_put_contents("request.json", $final_data))
            echo "<script>console.log('JSON added successfully' );</script>";
        else 
        echo "<script>console.log('JSON adding error' );</script>";


        $cmd = "python response.py $request";
        //$cmd = "python ../pyChatBot/main.py $request";
        $respone = shell_exec($cmd);
        echo $respone;
    }
?>