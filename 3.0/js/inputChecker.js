
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
    var user_regexp = new RegExp("/^[a-zA-Z0-9]+$/");
    var pass_regexp = new RegExp("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/");
    username = document.getElementById("username").value;
    pass1 = document.getElementById("password1").value;
    pass2 = document.getElementById("password2").value;

    console.info(username);
    console.info(pass1);
    console.info(pass2);

    document.getElementById("formError").innerText = "";
    if(user_regexp.test(username)) {
        document.getElementById("username").focus();
        document.getElementById("formError").innerText = "Username non valido";
        return false;
    }

    if(pass_regexp.test(pass1)) {
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

    if(email1 === ""){
        document.getElementById("email1").focus();
        document.getElementById("error").innerText = "Email must NOT be empty"
    }

    if(email_regexp.test(email1)) {
        document.getElementById("email1").focus();
        document.getElementById("error").innerText = "Invalid email";
        return false;
    }

    if(email1 !== email2) {
        document.getElementById("email2").focus();
        document.getElementById("error").innerText = "Emails are different!";
        return false;
    }

    return true;
}

function checkMessage() {
    alert("ciao");
    sender = document.getElementById("sender").value;
    receiver = document.getElementById("receiver").value;
    text = document.getElementById("text").value;

    console.info(sender);
    console.info(receiver);
    console.info(text);

    if(sender === "") {
        console.error("Sender not found");
        document.getElementById("error").innerText = "Errore. Refresh the page";
        return false;
    }

    if(receiver === "") {
        console.error("receiver not found");
        document.getElementById("error").innerText = "Errore. Refresh the page";
        return false;
    }

    if(text === "") {
        document.getElementById("error").innerText = "Empty message";
        return false;
    }

    if(text.length < 20 ) {
        document.getElementById("error").innerText = "Message too short, at least 20 char";
        return false;
    }

    if(text.length >= 300 ) {
        document.getElementById("error").innerText = "Message too short, at max 300 char";
        return false;
    }
    return true;
}
