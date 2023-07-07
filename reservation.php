    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">

    <?php
    session_start();

    include('header.php');

    include_once('config.inc.php');

    // $iduser = 7;
    $iduser = $_SESSION['idUSER'];

    $idBOOK = $_GET['id'];

    $sql = "INSERT INTO 
    RESERVATION (RESisBooked, `RESvalidity`, `USER_idUSER`, `BOOK_idBOOK`)
    VALUES (TRUE, 2, '$iduser', '$idBOOK')";

    echo ("You have successfully made a book reservation! ");
    $result = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));

    include('footer.php'); ?>