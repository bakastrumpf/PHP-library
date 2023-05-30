<?php
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];
$user_type = $_POST['user_type'];

$msg = "";
if (empty($user))
    $msg .= "Username is mandatory. <br/>";
if (empty($pass))
    $msg .= "Password is mandatory. <br/>";
if (empty($user_type))
    $msg .= "User type is mandatory. <br/>";

if ($msg != "") {
    $_SESSION['msg'] = $msg;
    header("Location:index.php");
    exit();
}

include_once('primer5110config.inc.php');

if ($user_type == 1) {
    $sql = "select * from korisnik where userkor = '$user'";
} else {
    $sql = "select * from kompanija where userkomp = '$user'";
}

$result = mysqli_query($conn, $sql)
    or die("Error: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    // pronadjen user sa zadatim korisničkim imenom
    $user_db = mysqli_fetch_assoc($result);
    if ($user_db['pass'] == $pass) {
        $_SESSION['user'] = $user;
        $_SESSION['user_type'] = $user_type;
        if ($user_type == 1) {
            $_SESSION['osoba'] = $user_db['ime'] . " " . $user_db['prezime'];
            $_SESSION['eposta'] = $user_db['eposta'];
            header("Location:primer5103korisnik.php");
            exit();
        } else {
            $_SESSION['naziv'] = $user_db['naziv'];
            $_SESSION['adresa'] = $user_db['adresa'];
            header("Location:kompanija/primer5104komp.php");
            exit();
        }
    } else {
        $_SESSION['user'] = $user;
        $_SESSION['msg'] = "Wrong password.";
        header("Location:index.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "Wrong username.";
    header("Location:index.php");
    exit();
}
