<?php
session_start();
include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="DD | MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">
    <title>LIBRARY | SEARCH</title>
</head>

<body>


    <div>
        <fieldset style="width: 450px;">
            <h3>SEARCH BOOKS</h3>
            <hr>
            <form name="search" id="search" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                I am looking for:
                <input type="text" name="title" size="30" placeholder="book title" value="<?php if (isset($_GET['title'])) echo $_GET['title']; ?>" />
                <br>
                <br>
                Results sorted:
                <select name="sort">
                    <option selected>ascending</option>
                    <option>descending</option>
                </select>
                <br>
                <hr>
                <input type="submit" name="confirm" value="SEARCH">
            </form>
        </fieldset>
    </div>
    <div>
        <?php
        if (isset($_GET['confirm'])) {
            echo "<br>Search results: <br>";

            // search criteria
            $books = $_GET['title'];
            // $authors = $_GET['AUTHOR'];
            $sort = $_GET['sort'];

            // include DB
            include_once('config.inc.php');

            $query = "SELECT idBOOK, BOOKtitle, AUTHORname, AUTHORsurname, BOOKyear, BOOKpublisher, BOOKpages, BOOKgenre, BOOKtoBorrow from BOOK b, WRITTEN w, AUTHOR a WHERE b.idBOOK = w.BOOK_idBOOK AND a.idAUTHOR = w.AUTHOR_idAUTHOR";

            if ($books != "") {
                $query .= " AND BOOKtitle like '%$books%'"; // partial title match
            }

            // alphabet sorting
            if ($sort == 'ascending')
                $query .= " ORDER BY BOOKtitle ASC";
            elseif ($_GET['sort'] == 'descending')
                $query .= " ORDER BY BOOKtitle DESC";

            $result = mysqli_query($conn, $query)
                or die("Unexpected error: " . mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
                // results render
                echo "<table border='5'>";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Author surname</th>";
                echo "<th>Author name</th>";
                echo "<th>Year</th>";
                echo "<th>Publisher</th>";
                echo "<th>Nr of pages</th>";
                echo "<th>Genre</th>";
                echo "<th>Can be taken</th>";
                echo "<tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>{$row['BOOKtitle']}</td>";
                    echo "<td>{$row['BOOKyear']}</td>";
                    echo "<td>{$row['AUTHORsurname']}</td>";
                    echo "<td>{$row['AUTHORname']}</td>";
                    echo "<td>{$row['BOOKpublisher']}</td>";
                    echo "<td>{$row['BOOKpages']}</td>";
                    echo "<td>{$row['BOOKgenre']}</td>";
                    echo "<td>{$row['BOOKtoBorrow']}</td>";
                    echo "<td><a href='reservation.php?id=" . $row['idBOOK'] . "'>RESERVATION</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<br> No results fetched. <br> Please, try again with different data.";
            }
            $_SESSION['$idBOOK'] = $row['idBOOK'];
            mysqli_free_result($result);
            mysqli_close($conn);
        }
        ?>
    </div>

</body>

</html>

<?php include('footer.php'); ?>