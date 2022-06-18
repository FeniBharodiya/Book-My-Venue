<?php 
if(isset($_POST['txt'])){
    // $cmd = "python pythoncode.py";
    $cmd = "python senti.py";

    $response = shell_exec($cmd);
    echo $response;
}
?>