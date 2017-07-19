
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
    //non funziona 2.0 mail valida
    var pattern = new RegExp("[^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]]");

    if(document.getElementById("username").value === "") {
        document.getElementById("username").focus();
        return false;
    }
    if(document.getElementById("email1").value === "" ) {
        document.getElementById("email1").focus();
        return false;
    }
    if(document.getElementById("email2").value === "" || document.getElementById("mail1").value !== document.getElementById("mail2").value) {
        document.getElementById("email2").focus();
        return false;
    }
    if(document.getElementById("password1").value === "") {
        document.getElementById("password1").focus();
        return false;
    }

    if(document.getElementById("password2").value === "" || document.getElementById("password1").value !== document.getElementById("password2").value) {
        document.getElementById("password2").focus();
        return false;
    }
    return true;
}