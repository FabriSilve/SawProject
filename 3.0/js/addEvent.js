function addEvent() {
    if(document.getElementById("name").value === "") {
        document.getElementById("name").focus();
        return false;
    }
    if(document.getElementById("day").value === "gg/mm/aaaa") {
        document.getElementById("day").focus();
        return false;
    }
    if(document.getElementById("address").value === "") {
        document.getElementById("address").focus();
        return false;
    }
    if(document.getElementById("description").value === "") {
        document.getElementById("description").focus();
        return false;
    }
    //TODO inserire controllo file

    urlSimple = "eventAdder.php";

    name = document.getElementById('name').value;
    day = document.getElementById('day').value;
    address = document.getElementById('address').value;
    description = document.getElementById('description').value;

    url = urlSimple+"?name="+name+"&day="+day+"&address="+address+"&description="+description+"&owner="+owner;
    //console.info(url);
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = addCallback;
    xhr.open('GET',url,true);
    xhr.send(null);
}

function addCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== null) {
                console.info("respose is: " + xhr.responseText);
                mex = xhr.responseText;
                if(mex === "true") {
                    document.getElementById('name').value = "";
                    document.getElementById('day').value = "gg/mm/aaa"; //TODO cambiate formato data qui o nel db
                    document.getElementById('address').value = "";
                    document.getElementById('description').value = "";
                    document.getElementById('addMessage').value = "<h3>Added</h3>";
                } else {
                    document.getElementById('addMessage').value = mex;
                }
            }
            else
                alert("Ajax error: no data received");
        }
        else
            alert("Ajax error: " + xhr.statusText);
    }
}