/**
 * gestisce display dei messaggi
 * @param id
 */
function showMessage(id, readed) {
    console.info(id);
    value = document.getElementById(id).style.display.toString();
    console.info(value);
    console.info(readed)
    if(value === "block") {
        document.getElementById(id).style.display = "none";
    } else {
        document.getElementById(id).style.display = "block";
        if(readed === "0"){
            setReadedMessage(id);
            document.getElementById("read"+id).innerHTML = '<img src="../media/readed.png" alt="readed">';
        }
    }
}

function setReadedMessage(id) {
    urlSimple = "script/messageSetReaded.php";
    url = urlSimple+"?id="+id;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = setReadedCallback;
    xhr.open('GET',url,true);
    xhr.send(null);
}

function setReadedCallback() {
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