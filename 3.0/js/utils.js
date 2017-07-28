var hider = true;
function showFilter() {
    if(hider) {
        document.getElementById("filter").style.display = "block";
        hider = false;
    } else {
        document.getElementById("filter").style.display = "none";
        hider = true;
    }
}

function getXMLHttpRequestObject() {
    var request = null;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // Older IE.
        request = new ActiveXObject("MSXML2.XMLHTTP.3.0");
    }
    return request;
}

function showValue(id, newValue)
{
    document.getElementById(id).innerHTML=newValue+" ";
}

/*function clicked(text) {
    if (confirm(text)) {
        return true;
    } else {
        return false;
    }
}*/

function showMessageForm() {
    document.getElementById('mailForm').style.display = "block";
}

function hideMessageForm() {
    document.getElementById('mailForm').style.display = "none";
}

function showAdmin() {
    document.getElementById('admin').style.display = "block";
}

function hideAdmin() {
    document.getElementById('admin').style.display = "none";
}