function sendButton(){
    // let userText = $("#txt").val();
    trainBot("userText") 
}

function trainBot(txt){
    jQuery.ajax({
        url: '../../trainAzyBot/getTrain.php',
        type:'post',
        data:'txt='+txt,
        success:function(result){
            console.log(result);
        }
    });
}