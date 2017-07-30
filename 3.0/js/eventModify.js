function eventModify(num) {
    text = '<textarea id="description'+num+'" cols="20" rows="10">'+events[num].description+'</textarea>';
    btn = '<img src="../media/save.png" onclick="confirmModify('+num+');">';
    document.getElementById("divDesc"+num).innerHTML = text;
    document.getElementById("modifySave"+num).innerHTML = btn;

}

function confirmModify(num) {
    desc = document.getElementById('description'+num).value;

    //TODO remove
    console.info(num+"\n"+num);
    console.info(owner);
    console.info(events[num].id);
    console.info(desc);

    urlSimple = "script/eventModifier.php";
    url = urlSimple + "?username=" +owner+"&id=" + events[num].id + "&description="+desc;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = modifyCallback;
    xhr.open('GET', url, true);
    xhr.send(null);
}

function modifyCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== "") {
                console.info(xhr.responseText)
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