/**
 * controlla input form di login
 * @returns {boolean}
 */
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

/**
 * controlla input form di registrazione
 * @returns {boolean}
 */
function checkReg() {
    var user_regexp = new RegExp("/^[a-zA-Z0-9]+$/");
    var pass_regexp = new RegExp("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/");
    username = document.getElementById("username").value;
    pass1 = document.getElementById("password1").value;
    pass2 = document.getElementById("password2").value;
    document.getElementById("formError").innerText = "";

    if(user_regexp.test(username)) {
        document.getElementById("username").focus();
        document.getElementById("formError").innerText = "Username not valid";
        return false;
    }
    if(pass_regexp.test(pass1)) {
        document.getElementById("password1").focus();
        document.getElementById("formError").innerText = "Password not valid";
        return false;
    }
    if(pass1 !== pass2) {
        document.getElementById("password2").focus();
        document.getElementById("formError").innerText = "Password not equals";
        return false;
    }
    return true;
}

/**
 * controlla input form profile
 * @returns {boolean}
 */
function checkProfile() {
    var email_regexp = new RegExp("/^(([^<>()[\\]\\\\.,;:\\s@\\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\\"]+)*)|(\\\".+\\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$/")
    email1 = document.getElementById("email1").value;
    email2 = document.getElementById("email2").value;

    if(email1 === ""){
        document.getElementById("email1").focus();
        document.getElementById("error").innerText = "Email empty"
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

/**
 * controlla input form messaggio
 * @returns {boolean}
 */
function checkMessage() {
    sender = document.getElementById("sender").value;
    receiver = document.getElementById("receiver").value;
    text = document.getElementById("text").value;

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

/**
 * controlla input form aggiunta evento
 * @returns {boolean}
 */
function checkAddEvent() {
    if (document.getElementById("name").value === "") {
        document.getElementById("name").focus();
        document.getElementById('error').innerText = "Name not valid";
        return false;
    }
    if (document.getElementById("day").value === "gg/mm/aaaa") {
        document.getElementById("day").focus();
        document.getElementById('error').innerText = "Day not valid";
        return false;
    }
    if (document.getElementById("address").value === "") {
        document.getElementById("address").focus();
        document.getElementById('error').innerText = "Address not valid";
        return false;
    }
    if (document.getElementById("description").value === "") {
        document.getElementById("description").focus();
        document.getElementById('error').innerText = "Description not valid";
        return false;
    }
    if (document.getElementById("image").value === "") {
        document.getElementById("image").focus();
        document.getElementById('error').innerText = "Image not valid";
        return false;
    }
    return true;
}
