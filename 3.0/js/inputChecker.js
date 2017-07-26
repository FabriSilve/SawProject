
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
    var user_regexp = new RegExp("/^[ -~]*$/");
    var pass_regexp = new RegExp("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/");
    username = document.getElementById("username").value;
    pass1 = document.getElementById("password1").value;
    pass2 = document.getElementById("password2").value;

    console.info(username);
    console.info(pass1);
    console.info(pass2);

    document.getElementById("formError").innerText = "";
    if(!user_regexp.test(username)) {
        document.getElementById("username").focus();
        document.getElementById("formError").innerText = "Username non valida JS";
        return false;
    }

    if(!pass_regexp.test(pass1)) {
        document.getElementById("password1").focus();
        document.getElementById("formError").innerText = "Password non valida";
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

    var email_regexp = new RegExp("/^(([^<>()[\\]\\\\.,;:\\s@\\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\\"]+)*)|(\\\".+\\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$/")
    email1 = document.getElementById("email1").value;
    email2 = document.getElementById("email2").value;

    console.info(email1);
    console.info(email2);

    if(!email_regexp.test(email1)) {
        document.getElementById("email1").focus();
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