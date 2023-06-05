<?php include('header.php'); ?>

<!DOCTYPE html>
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
        <form name="login" action="login.php" method="post">
            <caption>LOGIN FORM</caption>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <br>
            <label>Email: </label>
            <br>
            <input type="text" name="uname" placeholder="Your email address">
            <br>
            <label>Password:</label>
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <br>
            <label>User role:</label>
            <br>
            <select name="user_role">
                <option></option>
                <option>ADMIN</option>
                <option>LIBRARIAN</option>
                <option>MEMBER</option>
            </select>
            <br>
            <br>
            <button type="submit">Login</button>
        </form>
    </fieldset>
</body>

</html>

<?php include('footer.php'); ?>