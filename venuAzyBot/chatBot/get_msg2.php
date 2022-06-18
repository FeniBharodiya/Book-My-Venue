<?php
$input_name =  $_POST['txt'];

//$input_name="best song of this year";

//$input_name = str_replace(' ', '_', $input_name);


// $Command = "python C:\xampp\htdocs\pyChatBot\pychat2510\call_api.py $input_name";
$Command="python C:\Users\HP\PycharmProjects\ChatBot\main.py $input_name";
// $Command="python C:\xampp\htdocs\Venueazy\chatbot\main.py $input_name";

//$Command="python C:\Users\HP\PycharmProjects\phpConnectChatbot\main.py $input_name";
$greeter_data = shell_exec($Command);
echo $greeter_data;

//echo $input_name;
//echo "what";
        

?>
