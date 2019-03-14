function doubleDigit(number) {
    var input = parseInt(number, 10);
    var output = input > 9 ? "" + number: "0" + number;
    return output;
}

function clock() {
    var now = new Date(),
        time = doubleDigit(now.getHours()) + ':' + doubleDigit(now.getMinutes()) + ':' + doubleDigit(now.getSeconds()),
        date = [doubleDigit(now.getMonth() + 1), doubleDigit(now.getDate()), now.getFullYear()].join('/');

    var output = "Time: " + time + "&nbsp; &nbsp; &nbsp; Date: " + date;
    document.getElementById("timeInput").innerHTML = output;

    setInterval(clock, 1000);
}


window.addEventListener("load", clock, false);
