function signalEvent(num) {
    if(confirm("Segnalare davvero l'evento?")) {
        id = "signal" + num;
        urlSimple = "script/signalEvent.php";
        url = urlSimple + "?id=" + num + "&username=" + owner;
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = signalCallback;
        xhr.open('GET', url, true);
        xhr.send(null);
        document.getElementById(id).removeAttribute("onclick");
    }
}

function signalCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== "") {
                console.info("respose is: " + xhr.responseText);
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