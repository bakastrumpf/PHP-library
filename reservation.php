    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">

    <?php
    session_start();

    include('header.php');

    echo ($_SESSION['idBOOK']);

    include_once('config.inc.php');

    $iduser = 7;
    /*
    $idBOOK = 9;
    */
    $idBOOK = $_SESSION['idBOOK'];

    echo ("PROBA");

    $sql = "INSERT INTO 
    RESERVATION (`RESisBooked`, `RESvalidity`, `USER_idUSER`, `BOOK_idBOOK`)
    VALUES (TRUE, 2, '$iduser', '$idBOOK')";

    echo ("PROBA 2");
    $result = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));

    include('footer.php'); ?>