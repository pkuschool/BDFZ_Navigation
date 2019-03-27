function GoTo(to_url) {
    window.open(to_url, '_blank');
}
t = 0;
window.setInterval(uptime, 1000);
function uptime() {
    var thedate = new Date;
    var timelbl = document.getElementById("time-desktop");
    var datelbl = document.getElementById("date-desktop");
    var datestring = "";
    switch (thedate.getDay()) {
        case 1:
            datestring = '一'
            break;
        case 2:
            datestring = '二'
            break;
        case 3:
            datestring = '三'
            break;
        case 4:
            datestring = '四'
            break;
        case 5:
            datestring = '五'
            break;
        case 6:
            datestring = '六'
            break;
        case 7:
            datestring = '日'
            break;
        default:
            break;
    }
    var minstring = "";
    var secstring = "";
    if (thedate.getMinutes() < 10) {
        minstring = '0' + thedate.getMinutes().toString();
    } else {
        minstring = thedate.getMinutes().toString();
    }
    if (thedate.getSeconds() < 10) {
        secstring = '0' + thedate.getSeconds().toString();
    } else {
        secstring = thedate.getSeconds().toString();
    }
    if (document.body.clientWidth <= 992) {
        timelbl.innerHTML = thedate.getHours() + ':' + minstring;
        datelbl.innerHTML = '星期' + datestring;
    } else {
        timelbl.innerHTML = thedate.getHours() + ':' + minstring + ":" + secstring;
        datelbl.innerHTML = thedate.getMonth() + '月' + thedate.getDay() + '日，星期' + datestring;
    }
}
function clicktime() {
    var timelbl1 = document.getElementById("time-desktop");
    t = t + 1;
    if (t >= 30) { timelbl1.innerHTML = '蛤？'; t = 0; }
}
var h = document.getElementsByClassName("hoverable");
for (var i = 0; i < h.length; i++) {
    h[i].onmouseover = function () {
        h[i].style.width += 10;
        h.style.height += 10;
    }
    h[i].onmouseout = function () {
        h[i].style.width -= 10;
        h[i].style.height -= 10;
    }
}
