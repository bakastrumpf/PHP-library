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

<?php
include('header.php');
include_once('config.inc.php');
?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>LIBRARY | MEMBER</title>
</head>

<body>
    Welcome, <?= $_SESSION['person'] ?>
    <br>
    You are logged in as: <?= $_SESSION['USERemail'] ?>
    <br>
    <div style="float:right">
        <a href="user-settings.php">SETTINGS</a> |
        <a href="logout.php">LOGOUT</a>
    </div>

    <ul class="nav nav-tabs" id="membMenu" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="searchBooks-tab" data-bs-toggle="tab" data-bs-target="#searchBooks-tab-pane" type="button" role="tab" aria-controls="searchBooks-tab-pane" aria-selected="false">Search books</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reservation-tab" data-bs-toggle="tab" data-bs-target="#reservation-tab-pane" type="button" role="tab" aria-controls="reservation-tab-pane" aria-selected="false">Reservations</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="false">History</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
        </li>
    </ul>

    <div class="tab-content" id="membMenuContent">

        <div class="tab-pane fade show active" id="searchBooks-tab-pane" role="tabpanel" aria-labelledby="searchBooks-tab" tabindex="0">
            <?php include('search.php'); ?>
        </div>

        <div class="tab-pane fade" id="reservation-tab-pane" role="tabpanel" aria-labelledby="reservation-tab" tabindex="0">
            DISPLAY RESERVATIONS | TO BE COMPLETED
            <br>
            Iz tabele Reservations uraditi
            <br>
            "SELECT BOOKtitle FROM RESERVATION WHERE idBOOK = "
            <br>
        </div>

        <div class="tab-pane fade" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0">
            <!-- DISPLAY RENTALS HISTORY | TO BE COMPLETED
            <br>
            Iz tabele BORROWED uraditi
            <br>
            "SELECT * FROM BORROWED WHERE idBOOK = "
            <br> -->

            <p>On this page, you can see your book rentals history.</p>
            <form name="history" id="history" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <p>Results sorted:
                    <select name="sort">
                        <option selected>ascending</option>
                        <option>descending</option>
                    </select>
                </p>
                <br>
                <hr>
                <input type="submit" name="history" value="SHOW HISTORY">
            </form>


            <?php
            if (isset($_GET['history'])) {

                $iduser = $_SESSION['idUSER'];

                $idBOOK = $_GET['id'];

                $sql = "SELECT USERname, USERsurname, BOOKtitle, AUTHORname, AUTHORsurname, BORRdateTaken, BORRdateRet 
                        FROM BORROWED bd, USER usr, BOOK bk, AUTHOR ath, WRITTEN wtn 
                        WHERE usr.idUSER = bd.USER_idUSER 
                            AND bk.idBOOK = bd.BOOK_idBOOK 
                            AND ath.idAUTHOR = wtn.AUTHOR_idAUTHOR
                        ORDER BY USERsurname ASC";

                echo ("SUCCESS! ");
                $result = mysqli_query($conn, $sql)
                    or die("Error: " . mysqli_error($conn));


                if (mysqli_num_rows($result) > 0) {
                    // results render
                    echo "<table border='5'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Author surname</th>";
                    echo "<th>Author name</th>";
                    echo "<th>Taken</th>";
                    echo "<th>Returned</th>";
                    echo "<tr>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>{$row['BOOKtitle']}</td>";
                        echo "<td>{$row['AUTHORsurname']}</td>";
                        echo "<td>{$row['AUTHORname']}</td>";
                        echo "<td>{$row['BORRdateTaken']}</td>";
                        echo "<td>{$row['BORRdateRet']}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p><br> No results fetched. 
                    <br> You haven't been reading lately, have you? 
                    <br> How about browsing for books to see if you'd like something, 
                    <br> or heading to the library directly instead? 
                    <br> So far, those are the best ways to populate this page with data :wink: <br></p>";
                }
                mysqli_free_result($result);
                mysqli_close($conn);
            }
            ?>
        </div>

        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
            REVIEWS | TO BE COMPLETED
            <br>
            Omogućiti korisniku da ostavi recenziju knjiga koje je IZNAJMLJIVAO, tabele BORROWED i RATING
            <br>
            na sličan način kao što upisujemo podatke u tabele BOOK, AUTHOR, WRITTEN
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>

<!-- use lesson 50 to get code for this section -->