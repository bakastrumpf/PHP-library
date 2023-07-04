<?php
session_start();
if (empty($_SESSION['user_role'])) {
    header("Location:index.php");
    exit();
}
if ($_SESSION['user_role'] == 'ADMIN') {
    header("Location:admin.php");
    exit();
}
if ($_SESSION['user_role'] == 'LIBRARIAN') {
    header("Location:librarian.php");
    exit();
}
?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="DD | MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">
    <title>LIBRARY | MEMBER</title>
</head>

<body>
    Welcome, <?= $_SESSION['person'] ?>
    <br>
    You are logged in as: <?= $_SESSION['USERemail'] ?>
    <br>
    <div style="float:right">
        <a href="logout.php">LOGOUT</a>
    </div>
    <?php include('search.php'); ?>
    <?php include('footer.php'); ?>
</body>

</html>

<!-- use lesson 50 to get code for this section -->