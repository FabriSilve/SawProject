
function checkLogin() {
    if(document.getElementById("username").value === "") {
        document.getElementById("username").focus();
        return false;
    }
    if(document.getElementById("password").value === "") {
        document.getElementById("password").focus();
        return false;
    }
    return true;
}

function checkReg() {
    var pattern = new RegExp("[^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]]"); //TODO controllare exp reg e usarla
    username = document.getElementById("username").value;
    pass1 = document.getElementById("password1").value;
    pass2 = document.getElementById("password2").value;

    console.info(username);
    console.info(pass1);
    console.info(pass2);

    document.getElementById("formError").innerText = "";
    if(username === "") {
        document.getElementById("username").focus();
        document.getElementById("formError").innerText = "Username non valido";
        return false;
    }

    if(pass1 === "") {
        document.getElementById("password1").focus();
        document.getElementById("formError").innerText = "Password non valido";
        return false;
    }
    if(pass2 === "") {
        document.getElementById("password2").focus();
        document.getElementById("formError").innerText = "Password non valido";
        return false;
    }
    if(pass1 !== pass2) {
        document.getElementById("password2").focus();
        document.getElementById("formError").innerText = "Password diversa";
        return false;
    }
    return true;
}

function checkProfile() {
    email1 = document.getElementById("email1").value;
    email2 = document.getElementById("email2").value;

    console.info(email1);
    console.info(email2);

    if(email1 === "" ) { //TODO inserire pattern per controllo mail
        document.getElementById("email1").focus();
        document.getElementById("error").innerText = "Email non valida";
        return false;
    }
    if(email2 === "" ) { //TODO inserire pattern per controllo mail
        document.getElementById("email2").focus();
        document.getElementById("error").innerText = "Email non valida";
        return false;
    }
    if(email1 !== email2) {
        document.getElementById("email2").focus();
        document.getElementById("error").innerText = "Email diversa";
        return false;
    }

    return true;
}