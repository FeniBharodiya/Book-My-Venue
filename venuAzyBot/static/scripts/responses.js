function getBotResponse(txt) {
    if(txt){
        jQuery.ajax({
             //url:'chatBot/get_msg2.php',
            url: './VenuAzyBot/pyconnectphp/get.php',
            type:'POST',
            data:'txt='+txt,
            success:function(result){
                 let botHtml = '<p class="botText"><span>' + result + '</span></p>';
                //let botHtml = '<p class="botText" id="botResponse"><span>' + result + '<i id="chat-icon" style="color: crimson;" class="fa fa-volume-up" onclick="readText()"></span></p>';
                
                $("#chatbox").append(botHtml);
                document.getElementById("chat-bar-bottom").scrollIntoView(true);
                // var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
                // jQuery('.messages-list').append(html);
                // jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                console.log(result);
                
                
                
            }
        });
    }
}