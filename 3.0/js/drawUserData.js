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

    document.getElementById("username").innerHTML = userData.username;
    document.getElementById("name").innerHTML = "name <h3>"+userData.name+"</h3>";
    document.getElementById("surname").innerHTML = "surname <h3>"+userData.surname+"</h3>";
    document.getElementById("residence").innerHTML = "residence <h3>"+userData.residence+"</h3>";
    if(userData.link !== "") {
        document.getElementById("link").innerHTML = '<a href="'+userData.link+'" target="blank"><img src="../media/social.png"></a>';
    } else {
        document.getElementById("link").innerHTML = '';
    }
    document.getElementById("description").innerHTML = "Description: <h5>"+userData.description+"</h5>";

    document.getElementById("events").innerHTML = "insert events: "+userData.events;
    document.getElementById("fans").innerHTML = "fans: "+userData.fans;
    document.getElementById("followed").innerHTML = "followed: "+userData.followed;
    document.getElementById("signaled").innerHTML = "signaled: "+userData.signaled;
}

function userModify() {
    //todo remove
    console.info(userData.username);


    btn = '<img src="../media/save.png" onclick="confirmUserModify();">';
    document.getElementById("modifyUser").innerHTML = btn;

    text  = '<div class="col-sm-6 text-center">';
    text += '<div class="row"><input name="name" id="name" placeholder="Name" class="radiusDiv padding5" type="text" value="'+userData.name+'"></div>';
    text += '<div class="row"><input name="surname" id="surname" placeholder="Surname" class="radiusDiv padding5" type="text" value="'+userData.surname+'"></div>';
    text += '<div class="row"><input name="residence" id="residence" placeholder="Residence" class="radiusDiv padding5" type="text" value="'+userData.residence+'"></div>';
    text += '<div class="row"><input type="url" name="link" id="link" placeholder="Link Social" class="radiusDiv padding5" value="'+userData.link+'"></div>';
    text += '</div>';
    text += '<div class="col-sm-6 text-center">';
    text += '<textarea cols="50" rows="6" name="description" id="description" placeholder="Description" class="radiusDiv padding5">'+userData.description+'</textarea>';
    text += '</div>';

    console.info(text);
    document.getElementById("userData").innerHTML = text;


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

