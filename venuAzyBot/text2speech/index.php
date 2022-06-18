<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['txt'])){
            $txt = $_POST['txt'];
            $txt = htmlspecialchars($txt);
            $txt = rawurlencode($txt);
            $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
            // $html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gts&q='.$txt.'&tl=en-IN');
            echo $txt;
            // $player = "<audio controls='controls' autoplay><source src = 'data:audio/mped;base64,".base64_encode($html)."'</audio>";
            // $player = "<embed hidden='true' autoplay='true'><source src = 'data:audio/mped;base64,".base64_encode($html)."'</embed>";
            // $player = "<embed  src='data:audio/mped;base64,".base64_encode($html)."' loop='false' hidden='true' autostart='true'>";
            // $player = "<embed src='data:audio/mped;base64,".base64_encode($html)."' loop='false' hidden='true' autostart='true' width='2' height='0'>";
            $player = "<iframe width='0' height='0' src='https://www.youtube.com/watch?v=CRI2maIiqzc' frameborder='0' allowfullscreen></iframe>";
        
        }
    ?>
    <form action="" method="POST">
        <input type="textbox" id="text" name="txt">
        <input type="submit" name="submit" value="Convert to speech">
    </form>
</body>
</html>