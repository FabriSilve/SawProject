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