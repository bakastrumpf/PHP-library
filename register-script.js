function checkName() {
    var name = document.getElementById("name").value;
    // alert("Hej");
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = name.match(reg);
    return match != null;
}

function checkLastName() {
    var name = document.getElementById("lastName").value;
    // alert("Hej");
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = name.match(reg);
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

function checkPassword() {
    // fetch password and repPassword
    var password = document.getElementById("password").value;
    var repPassword = document.getElementById("repPassword").value;
    // check if they match
    if (password != repPassword)
        return false;

    var regLetter = /[a-z]/;
    if (password.search(regLetter) == -1)
        return false;

    //      - at least 1 capital letter, 
    var regCapLetter = new RegExp("[A-Z]");
    if (password.search(regCapLetter) == -1)
        return false;

    //      - at least 1 digit 
    var regDigit = /\d/;
    if (regDigit.exec(password) == null)
        return false;

    //      - at least 1 spec char   
    var regChar = new RegExp("\\W");
    if (!regChar.test(password))
        return false;

    //      - at least 8 chars
    return password.length >= 8;
}

function checkAddress() {
    var address = document.getElementById("address").value;
    // alert("Address");
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = address.match(reg);
    return match != null;
}

function checkPhone() {
    var phone = document.getElementById("phone").value;
    var reg = new RegExp("^\\+?(\\(\\d+\\)|\\d+/?)[\\d]+$");
    var pos = phone.search(reg);
    return pos != -1;
}

function checkData() {
    var message = "";
    if (!checkName())
        message += "Please, insert name. ";
    if (!checkLastName())
        message += "Please, insert last name. ";
    if (!checkEmail())
        message += "Please, insert email address. ";
    if (!checkPassword())
        message += "Passwords mismatch. Please, try again. ";
    if (!checkAddress())
        message += "Please, insert email address. ";
    if (!checkPhone())
        message += "Wrong phone format. ";
    if (message == "") {
        message = "Congrats! You have successfully registered. ";
        /*document.forms['registration'].submit();*/
    }
    document.getElementById("message").innerHTML = message;
}