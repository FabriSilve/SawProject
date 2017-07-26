function eventDelete(num) {
    if(confirm("Cancellare evento "+events[num].name+"?")) {
        urlSimple = "script/eventDeleter.php";
        url = urlSimple + "?username=" +owner+"&id=" + events[num].id;
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = deleteCallback;
        xhr.open('GET', url, true);
        xhr.send(null);
    }

}

function deleteCallback() {
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