function drawUserData() {

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
    text = "";

    text += '<div class="row">';
    text += '   <div class="col-sm-12 text-right" id="modifyUser">';
    text += '       <img src="../media/modify.png" id="modify" onclick="userModify();">';
    text += '   </div>';
    text += '</div>';
    text += '<div class="row">';
    text += '   <div class="row padding20">';
    text += '       <div class="col-sm-3 text-center" id="userData1">';
    text += '           <table class="table-responsive text-left">';
    text += '               <tr><td>username:</td><td class="padding5">'+userData.username+'</td></tr>';
    text += '               <tr><td>nome:</td><td class="padding5">'+userData.name+'</td></tr>';
    text += '               <tr><td>cognome:</td><td class="padding5">'+userData.surname+'</td></tr>';
    text += '               <tr><td>residenza:</td><td class="padding5">'+userData.residence+'</td></tr>';
    text += '           </table>';
    text += '       </div>';
    text += '       <div class="col-sm-6 text-center" id="userData2">';
    text += '           <h5>'+userData.description+'</h5>';
    if(userData.link !== "") {
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

function userModify() {
    //todo remove
    console.info(userData.username);


    btn = '<img src="../media/save.png" onclick="confirmUserModify();">';
    document.getElementById("modifyUser").innerHTML = btn;

    userData1  = '<table class="table-responsive text-left">';
    userData1 += '    <tr><td>username:</td><td class="padding5">'+userData.username+'</td></tr>';
    userData1 += '    <tr><td>nome:</td><td class="padding5"><input name="name" id="name" placeholder="Name" class="radiusDiv" type="text" value="'+userData.name+'"></td></tr>';
    userData1 += '    <tr><td>cognome:</td><td class="padding5"><input name="surname" id="surname" placeholder="Surname" class="radiusDiv" type="text" value="'+userData.surname+'"></td></tr>';
    userData1 += '    <tr><td>residenza:</td><td class="padding5"><input name="residence" id="residence" placeholder="Residence" class="radiusDiv" type="text" value="'+userData.residence+'"></td></tr>';
    userData1 += '</table>';
    document.getElementById("userData1").innerHTML = userData1;

    userData2  = '<textarea cols="50" rows="6" name="description" id="description" placeholder="Description" class="radiusDiv">'+userData.description+'</textarea><br>';
    userData2 += '<input type="url" name="link" id="link" placeholder="Link Social" class="radiusDiv padding5" value="'+userData.link+'">';

    document.getElementById("userData2").innerHTML = userData2;


}

function confirmUserModify() {
    name = document.getElementById("name").value;
    surname = document.getElementById("surname").value;
    residence = document.getElementById("residence").value;
    description = document.getElementById("description").value;
    link = document.getElementById("link").value;

    urlSimple = "script/userModifier.php";
    url = urlSimple + "?username=" +owner+"&name=" + name + "&surname="+surname+"&residence="+residence+"&description="+description+"&link="+link;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = modifyUserCallback;
    xhr.open('GET', url, true);
    xhr.send(null);
}

function modifyUserCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== "") {
                console.info(xhr.responseText);
                location.reload();
            }
            else {
                console.error("Ajax error: no data received");
            }
        }
        else {
            console.error("Ajax error: " + xhr.responseText);
        }
    }
}

