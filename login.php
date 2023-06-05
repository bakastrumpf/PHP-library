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
            <button type="submit">Login</button>
        </form>
    </fieldset>
</body>

</html>

<?php include('footer.php'); ?>

<?php
$user = $_POST['USERemail'];
$pass = $_POST['USERpass'];
$user_role = $_POST['USERrole'];

$msg = "";
if (empty($user))
    $msg .= "Login email is mandatory. <br />";
if (empty($pass))
    $msg .= "Password is mandatory. <br />";
if (empty($user_type))
    $msg .= "User type is mandatory. <br />";

if ($msg != "") {
    $_SESSION['msg'] = $msg;
    header("Location:index.php");
    exit();
}

include_once('config.inc.php');

if ($user_type == 1) {
    $sql = "select * from USER where USERrole = '$user'";
} else {
    if ($user_type == 2) {
        $sql = "select * from USER where USERrole = '$user'";
    } else {
        if ($user_type == 3) {
            $sql = "select * from USER where USERrole = '$user'";
        } else {
            $_SESSION['msg'] = "Wrong user data.";
            header("Location:index.php");
            exit();
        }
    }
}

$result = mysqli_query($conn, $sql)
    or die("Error: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    // user found
    $user_db = mysqli_fetch_assoc($result);
    if ($user_db['USERpass'] == $pass) {
        $_SESSION['USERemail'] = $user;
        $_SESSION['USERrole'] = $user_role;
        if ($user_role == 1) {
            $_SESSION['user'] = $user_db['USERname'] . " " . $user_db['USERsurname'];
            $_SESSION['USERemail'] = $user_db['USERemail'];
            header("Location:admin.php");
            exit();
        }
        if ($user_role == 2) {
            $_SESSION['user'] = $user_db['USERname'] . " " . $user_db['USERsurname'];
            $_SESSION['USERemail'] = $user_db['USERemail'];
            header("Location:librarian.php");
            exit();
        }
        if ($user_role == 3) {
            $_SESSION['user'] = $user_db['USERname'] . " " . $user_db['USERsurname'];
            $_SESSION['USERemail'] = $user_db['USERemail'];
            header("Location:member.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Wrong user data.";
        header("Location:index.php");
        exit();
    }
}
?>