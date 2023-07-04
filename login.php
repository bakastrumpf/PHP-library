<?php
session_start();
/*
if (!empty($_SESSION['msg']))
    echo "<span style='color:red'>" . $_SESSION['msg'] . "</span>";
*/

$user = $_POST['username'];
$pass = $_POST['password'];
$user_role = $_POST['user_role'];
echo ($user);

$msg = "";
$_SESSION['$msg'] = "";

if (empty($user))
    $msg .= "Email is mandatory. <br />";
if (empty($pass))
    $msg .= "Password is mandatory. <br />";
if (empty($user_role))
    $msg .= "User role is mandatory. <br />";

include_once('config.inc.php');

$sql = "select * from USER where USERemail = '$user'";

$result = mysqli_query($conn, $sql)
    or die("Error: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    // user found
    $user_db = mysqli_fetch_assoc($result);
    if ($user_db['USERpass'] == $pass) {
        $_SESSION['user'] = $user;
        $_SESSION['user_role'] = $user_role;
        if ($user_role == 'ADMIN') {
            $_SESSION['user'] = $user_db['USERname'] . " " . $user_db['USERsurname'];
            $_SESSION['USERemail'] = $user_db['USERemail'];
            header("Location:admin.php");
            exit();
        }
        if ($user_role == 'LIBRARIAN') {
            $_SESSION['user'] = $user_db['USERname'] . " " . $user_db['USERsurname'];
            $_SESSION['USERemail'] = $user_db['USERemail'];
            header("Location:librarian.php");
            exit();
        }
        if ($user_role == 'MEMBER') {
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
