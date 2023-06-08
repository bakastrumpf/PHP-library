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
    <?php include('header.php'); ?>

    <div>
        <fieldset style="width: 450px;">
            <h3>SEARCH BOOKS</h3>
            <hr>
            <form name="search" id="search" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                I am looking for:
                <input type="text" name="search" size="30" placeholder="book title" value="<?php if (isset($_GET['book'])) echo $_GET['book']; ?>" />
                <br>
                <br>
                Results sorted:
                <select name="sort">
                    <option>descending</option>
                    <option>ascending</option>
                    <option selected>nevermind</option>
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
            $books = $_GET['BOOK'];
            $authors = $_GET['AUTHOR'];
            $sort = $_GET['sort'];

            // include DB
            include_once('config.inc.php');

            $query = "SELECT BOOKtitle, AUTHORname, AUTHORsurname, BOOKyear, BOOKpublisher, BOOKpages, BOOKgenre, BOOKtoBorrow from BOOK b, WRITTEN w, AUTHOR a WHERE b.idBOOK = w.BOOK_idBOOK AND a.idAUTHOR = w.AUTHOR_idAUTHOR";

            if ($books != "") {
                $query .= " AND BOOK like '%$books'"; // partial title match
            }

            // alphabet sorting
            if ($sort == 'ascending')
                $query .= " ORDER BY BOOKtitle ASC";
            elseif ($_GET['sort'] == 'descending')
                $query .= " ORDER BY BOOKtitle DESC";

            $result = mysqli_query($conn, $upit)
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
                    echo "<td>{$row['Title']}</td>";
                    echo "<td>{$row['Year']}</td>";
                    echo "<td>{$row['Author surname']}</td>";
                    echo "<td>{$row['Author name']}</td>";
                    echo "<td>{$row['Publisher']}</td>";
                    echo "<td>{$row['Nr of pages']}</td>";
                    echo "<td>{$row['Genre']}</td>";
                    echo "<td>{$row['Can be taken']}</td>";
                    echo "<td><a href='[[[[[reservation.php]]]]]?id=" . $row['idRESERVATION'] . "'>RESERVATION</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<br> No results. <br> Please, try again with different data.";
            }
            mysqli_free_result($result);
            mysqli_close($conn);
        }
        ?>
    </div>

</body>

</html>

<?php include('footer.php'); ?>