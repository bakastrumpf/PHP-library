<?php
session_start();
if (!empty($_SESSION['msg']))
    echo "<span style='color:red'>" . $_SESSION['msg'] . "</span>";

$user = $_POST['USERemail'];
$pass = $_POST['USERpass'];
$user_role = $_POST['USERrole'];

$msg = "";
if (empty($user))
    $msg .= "Email is mandatory. <br />";
if (empty($pass))
    $msg .= "Password is mandatory. <br />";
if (empty($user_role))
    $msg .= "User role is mandatory. <br />";

if ($msg != "") {
    $_SESSION['msg'] = $msg;
    header("Location:index.php");
    exit();
}

include_once('config.inc.php');

if ($user_role == 1) {
    $sql = "select * from USER where USERemail = '$user'";
} else {
    if ($user_role == 2) {
        $sql = "select * from USER where USERemail = '$user'";
    } else {
        if ($user_role == 3) {
            $sql = "select * from USER where USERemail = '$user'";
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
        header("Location:index.php?error");
        exit();
    }
}
