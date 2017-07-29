/**
 * funzione per mostrare o nascondere il div 'filter' contenente i filtri
 * di ricerca in homepage
 */
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

/**
 * funzione che inserisce il valore 'newValue' in un campo con id 'id'
 * @param id
 * @param newValue
 */
function showValue(id, newValue)
{
    document.getElementById(id).innerHTML=newValue;
}

/**
 * mostra div con id 'id'
 */
function showForm(id) {
    document.getElementById(id).style.display = "block";
}

/**
 * nasconde div con id 'id'
 */
function hideForm(id) {
    document.getElementById(id).style.display = "none";
}


/**
 * funzione per gestire un httpxmlrequest su diversi browser
 * @returns {*}
 */
function getXMLHttpRequestObject() {
    var request = null;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // Older IE.
        request = new ActiveXObject("MSXML2.XMLHTTP.3.0");
    }
    return request;
}