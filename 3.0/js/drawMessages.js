function drawMessages() {
    numMessages = messages.length;
    text = "";
    if(numMessages <= 0) {
        text += '<div class="row">';
        text += '   <div class="col-sm-12 marginMin text-center">';
        text += '       <h3 class="liteBackground radiusDiv">MailBox Empty</h3>';
        text += '   </div>';
        text += '</div>';
    }else{
        text += '<div class="row text-right">';
        text += '   <div class="col-sm-12">';
        text += '       <h4>'+numMessages+' mail</h4>';
        text += '   </div>';
        text += '</div>';
        for(j=1;j<numMessages;j++)
        {
            text += drawSingleMessage(j);
        }
    }
    document.getElementById('messages').innerHTML = text;
}

function drawSingleMessage() {
    message = messages[j];

    temp  = '<div class="row marginBottom liteBackground">';
    temp += '   <div class="col-sm-3">'+message.sender+'</div>';
    temp += '   <div class="col-sm-2">';
    temp += '       <div class=row">'+message.day+'</div>';
    temp += '       <div class=row">'+message.time+'</div>';
    temp += '   </div>';
    temp += '   <div class="col-sm-6">'+message.text+'</div>';
    temp += '   <div class="col-sm-1">'+message.readed+'</div>';
    temp += '</div>';

    return temp;
}


