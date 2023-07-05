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

    <title>Library: User registration</title>
</head>

<body>

    <fieldset style="width: 400px;">
        <form name="registration" id="registration" method="POST" action="register.php">
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
            type="text" instead type="password"
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
            <button onclick="checkData()" type="button" name="registration" value="Submit">SUBMIT</button>
        </form>
    </fieldset>
    <div id="message"></div>
    <script src="register-script.js"></script>
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