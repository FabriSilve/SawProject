function signalEvent(num) {
    console.info(confirm("Segnalare davvero evento id:"+num+"?"));
    /*id = "check"+num;
    check = document.getElementById(id).checked;
    console.info("check "+check);
    console.info("id "+id);
    console.info(owner);
    urlSimple = "script/updateFollowed.php";
    url = urlSimple+"?id="+num+"&check="+check+"&username="+owner;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = updateCallback;
    xhr.open('GET',url,true);
    xhr.send(null);*/
}

function updateCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== "") {
                console.info("respose is: " + xhr.responseText);
            }
            else {
                alert("Ajax error: no data received");
            }
        }
        else {
            alert("Ajax error: " + xhr.responseText);
        }
    }
}