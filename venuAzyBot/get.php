<?php
$request = $_POST['txt'];
$Command = "python dataflair\chatgui.py $request";
$response = shell_exec($Command);
echo $response;
?>