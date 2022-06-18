<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>
    <div>
        <input type="text" name="" id="speechText">
        &nbsp;
        <input type="button" value="Start" id="start" onclick='startRecording();'>
    </div>
    <div class="container"></div>
</body>
</html>
<script>
    var recognition = new webkitSpeechRecognition();
    recognition.onresult = function(event){
        console.log('result');
        var saidText = "";
        for(var i = event.resultIndex; i<event.results.length; i++){
            if(event.results[i].isFinal){
                saidText = event.results[i][0].transcript;
            } else{
                saidText += event.results[i][0].transcript;
            }
        }
        document.getElementById('speechText').value = saidText;
    }

    function startRecording(){
        recognition.start();
    }

</script>