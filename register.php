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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
    <caption>REGISTRATION FORM</caption>
    <form class="row g-3" name="registration" id="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="col-md-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-5">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address is your USERNAME" required>
        </div>
        <!--
            to see password and repeated password: 
            type="text" instead of type="password"
            return to the correct one once the app is complete
        -->
        <div class="col-md-2">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-md-2">
            <label for="repPassword" class="form-label">Repeated password</label>
            <input type="text" class="form-control" id="repPassword" name="repPassword" required>
        </div>
        <div class="col-md-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="col-md-4">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="col-md-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="registration" value="REGISTER" onClick="checkData()">REGISTER</button>
        </div>
    </form>
    <div id="message"></div>

    <!--
    <fieldset style="width: 400px;">
        
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
            <button onclick="checkData()" type="button" name="registration" value="Submit">SUBMIT</button> 
            <input type="submit" name="registration" value="SUBMIT" onClick="checkData()" />
        </form>
        <div id="message"></div>
    </fieldset>
-->

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