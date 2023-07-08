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

<?php include('header.php'); ?>

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
            DISPLAY RENTALS HISTORY | TO BE COMPLETED
            <br>
            Iz tabele BORROWED uraditi
            <br>
            "SELECT * FROM BORROWED WHERE idBOOK = "
            <br>
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