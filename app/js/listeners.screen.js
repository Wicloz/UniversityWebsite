if (window.addEventListener) {
    window.addEventListener("scroll", function() {movement();});
    window.addEventListener("touchmove", function() {movement();});
    window.addEventListener("resize", function() {movement();});
    window.addEventListener("load", function() {movement();});
} else if (window.attachEvent) {
    window.attachEvent("onscroll", function() {movement();});
    window.attachEvent("ontouchmove", function() {movement();});
    window.attachEvent("onresize", function() {movement();});
    window.attachEvent("onload", function() {movement();});
}

var alertTop = -1;

function movement () {
    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var top = scrolltop()
    if (alertTop == -1) {
        alertTop = findPos(document.getElementById("alerts"))[1];
    }

    if (top >= 80) {
        document.getElementById("belowtopnav").style.paddingTop = "52px";
        document.getElementById("navbar").style.position = "fixed";
    } else {
        document.getElementById("belowtopnav").style.paddingTop = "0px";
        document.getElementById("navbar").style.position = "";
    }

    if (top >= alertTop - 70 && w >= 768) {
        document.getElementById("alerts").style.marginTop = (70 - alertTop) + "px";
        document.getElementById("alerts").style.width = $("#content-right").width() + "px";
        document.getElementById("alerts").style.position = "";
    } else {
        document.getElementById("alerts").style.marginTop = "";
        document.getElementById("alerts").style.width = "";
        document.getElementById("alerts").style.position = "relative";
    }
}

function scrolltop () {
    var top = 0;
    if (typeof(window.pageYOffset) == "number") {
        top = window.pageYOffset;
    } else if (document.body && document.body.scrollTop) {
        top = document.body.scrollTop;
    } else if (document.documentElement && document.documentElement.scrollTop) {
        top = document.documentElement.scrollTop;
    }
    return top;
}

function findPos (obj) {
	var curleft = curtop = 0;
    if (obj.offsetParent) {
        do {
            curleft += obj.offsetLeft;
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
    }
    return [curleft, curtop];
}
