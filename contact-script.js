function checkName() {
    var name = document.getElementById("name").value;
    // alert("Hej");
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = name.match;
    return match != null;
}

function checkEmail() {
    var email = document.getElementById("email").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$", "i");
    var match = email.match(reg);
    // alert(match);
    return match != null;
}

function checkData() {
    var message = "";
    if (!checkName())
        message += "Please, insert name. ";
    if (!checkEmail())
        message += "Please, insert a valid email address. ";
    if (message == "")
        message = "Congrats! Your message has been successfully sent. ";
    document.getElementById("comment").innerHTML = message;
}