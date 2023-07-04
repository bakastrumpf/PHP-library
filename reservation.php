    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">

    <?php
    session_start();

    include('header.php');

    echo ($row['idBOOK']);


    /*
    insert into reservation ( . . . )
    values
    (. . .)

    INSERT INTO RESERVATION (RESisBooked, RESvalidity, USER_idUSER, BOOK_idBOOK)
    VALUES (true, 2, $, 2), (true, 2, 7, 11), (true, 2, 13, 11), (true, 2, 12, 10);

    */

    ?>





    <?php include('footer.php'); ?>