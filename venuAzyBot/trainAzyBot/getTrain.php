<?php
    if(isset($_POST['txt'])){
        $request = $_POST['txt'];
        $cmd = "python training.py $request";
        $response = shell_exec($cmd);
        echo $response;
    }
?>