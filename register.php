<!DOCTYPE html>
<?php include('header.php'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="MS" />
    <meta name="description" content="PHP: Library" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">
    <script>
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
                document.forms['registration'].submit();
            }
            document.getElementById("message").innerHTML = message;
        }
    </script>
    <title>Library: User registration</title>
</head>

<body>

    <fieldset style="width: 400px;">
        <form name="registration" id="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <caption>REGISTRATION FORM</caption>
            <br>
            Name:
            <br>
            <input type="text" name="name" id="name" required>
            <br>
            Last name:
            <br>
            <input type="text" name="lastName" id="lastName" required>
            <br>
            Email address (to be used as your username):
            <br>
            <input type="email" name="email" id="email" required>
            <br>
            <!--
            to see password and repeated password: 
            type="text" instead of type="password"
            return to the correct one once the app is complete
            -->
            Password:
            <br>
            <input type="text" name="password" id="password" required>
            <br>
            Repeated password:
            <br>
            <input type="text" name="repPassword" id="repPassword" required>
            <br>
            Address:
            <br>
            <input type="text" name="address" id="address" required>
            <br>
            City:
            <br>
            <input type="text" name="city" id="city" required>
            <br>
            Phone number:
            <br>
            <input type="text" name="phone" id="phone" required>
            <br>
            <br>
            <!--<button onclick="checkData()" type="button" name="registration" value="Submit">SUBMIT</button> -->
            <input type="submit" name="registration" value="SUBMIT" onClick="checkData()" />
        </form>
        <div id="message"></div>
    </fieldset>

</body>


<?php
include_once('config.inc.php');

$name = $_POST['name'];
$surname = $_POST['lastName'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];

$sql = "INSERT INTO 
USER (`USERname`, `USERsurname`, `USERpass`, `USERemail`, `USERstreet`, `USERcity`, `USERphone`, `USERrole`, USERactive, USERmembPaid)
VALUES 
('$name', '$surname', '$password', '$email', '$address', '$city', '$phone', 'MEMBER', TRUE, TRUE)";

$result = mysqli_query($conn, $sql)
    or die("Error: " . mysqli_error($conn));

?>

</html>


<?php include('footer.php'); ?>