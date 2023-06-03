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
        <form name="registration" method="POST" action="register.php">
            Name:
            <br>
            <input type="text" name="name" required>
            <br>
            Last name:
            <br>
            <input type="text" name="lastName" required>
            <br>
            Email address (to be used as your username):
            <br>
            <input type="email" name="email" required>
            <br>
            Password:
            <br>
            <input type="text" name="password" required>
            <br>
            Repeated password:
            <br>
            <input type="text" name="repPassword" required>
            <br>
            Address:
            <br>
            <input type="text" name="address" required>
            <br>
            Phone number:
            <br>
            <input type="text" name="phone" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>

    </fieldset>

</body>

</html>


<?php include('footer.php'); ?>