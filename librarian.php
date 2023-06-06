<?php
session_start();
if (empty($_SESSION['user_role'])) {
    header("Location:index.php");
    exit();
}
if ($_SESSION['user_role'] == 1) {
    header("Location:admin.php");
    exit();
}
if ($_SESSION['user_role'] == 3) {
    header("Location:member.php");
    exit();
}
?>

<?php include('header.php'); ?>