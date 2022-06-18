<html>
    <body>
<?php
$input_name =  $_POST['txt'];

//$input_name="best song of this year";

//$input_name = str_replace(' ', '_', $input_name);
// $Command="python C:\Users\HP\PycharmProjects\ChatBot\main.py $input_name";
//$Command="python C:\Users\HP\PycharmProjects\venuAzyBot\main.py";
//$Command="python C:\xampp\htdocs\Venueazy\chatbot\main.py $input_name";
//$Command="python C:\Users\HP\PycharmProjects\phpConnectChatbot\main.py $input_name";
//$Command = "python C:\xampp\htdocs\VenuAzyBot\pyChatBot\main.py $input_name";

$Command="python C:\Users\HP\PycharmProjects\dataflair\chatgui.py $input_name";
$greeter_data = shell_exec($Command);
//   $greeter_data;

echo $greeter_data;
//echo "how arer you";
        

?>
</body>
</html>