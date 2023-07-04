<?php
include_once('config.inc.php');

$sql = "select * from USER where USERemail = 'mija@admin1.net'";

$result = mysqli_query($conn, $sql)
    or die("Error: " . mysqli_error($conn));
echo ("TEST tra la la");
if (mysqli_num_rows($result) > 0) {
    // user found
    $user_db = mysqli_fetch_assoc($result);
}

echo ($user_db['USERname']);
