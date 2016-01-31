function setVolume(force) {
    var forceStr = "false";
    if (force) {
        forceStr = "true";
    }
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (!isNaN(xmlhttp.responseText)) {
                document.getElementById("currentVolume").innerHTML = xmlhttp.responseText;
            }
        }
    };
    
    xmlhttp.open("GET", "volume.php?force=" + forceStr, true);
    xmlhttp.send();
}

setInterval(function() {
    setVolume(false);
}, 2000);
