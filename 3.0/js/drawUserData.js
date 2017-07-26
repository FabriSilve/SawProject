function drawUserData(userData) {

    if(userData.name === null) {
        userData.name = "";
    }
    if(userData.surname === null) {
        userData.surname = "";
    }
    if(userData.residence === null) {
        userData.residence = "";
    }
    if(userData.description === null) {
        userData.description = " ";
    }

    text  = '<div class="row">';
    text += '   <div class="row padding20">';
    text += '       <div class="col-sm-3 text-center">';
    text += '           <table class="table-responsive text-left">';
    text += '               <tr><td>username:</td><td class="padding5">'+userData.username+'</td></tr>';
    text += '               <tr><td>nome:</td><td class="padding5">'+userData.name+'</td></tr>';
    text += '               <tr><td>cognome:</td><td class="padding5">'+userData.surname+'</td></tr>';
    text += '               <tr><td>residenza:</td><td class="padding5">'+userData.residence+'</td></tr>';
    text += '           </table>';
    text += '       </div>';
    text += '       <div class="col-sm-6 text-center">';
    text += '           <h5>'+userData.description+'</h5>';
    if(userData.link !== null) {
        text += '       <p class="text-center"><a href="' + userData.link + '" target="blank">link</a></p>';
    }
    text += '       </div>';
    text += '       <div class="col-sm-3 text-center">';
    text += '           <table class="table-responsive text-center">';
    text += '               <tr><td>'+userData.events+'</td><td class="padding5"> :eventi inseriti</td></tr>';  //TODO implement
    text += '               <tr><td>'+userData.fans+'</td><td class="padding5"> :fans</td></tr>';  //TODO implement
    text += '               <tr><td>'+userData.followed+'</td><td class="padding5"> :segue</td></tr>';  //TODO implement
    text += '               <tr><td>'+userData.signaled+'</td><td class="padding5"> :segnalati</td></tr>';  //TODO implement
    text += '           </table>';
    text += '       </div>';
    text += '   </div>';
    text += '</div>';


    document.getElementById('userData').innerHTML = text;
}


