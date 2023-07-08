<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('header.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles-index.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-header.css">
    <link rel="stylesheet" type="text/css" href="styles/styles-footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>LIBRARY ADMIN | BOOK MANAGEMENT</title>
</head>

<body>

    <ul class="nav nav-tabs" id="book-management" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="search-tab" data-bs-toggle="tab" data-bs-target="#search-tab-pane" type="button" role="tab" aria-controls="search-tab-pane" aria-selected="false">Search books</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add-tab-pane" type="button" role="tab" aria-controls="add-tab-pane" aria-selected="false">Add books</button>
        </li>

    </ul>
    <div class="tab-content" id="book-managementContent">
        <div class="tab-pane fade show active" id="search-tab-pane" role="tabpanel" aria-labelledby="search-tab" tabindex="0">
            <div>
                <br>
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
                    <input type="submit" name="confirm" value="SEARCH">
                </form>
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
                    include('config.inc.php');

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
                        echo "<th>Modify</th>";
                        echo "<th>Delete</th>";
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
                            echo "<td><a href='book-management.php?id=" . $row['idBOOK'] . "'>UPDATE</a></td>";
                            echo "<td><a href='book-management.php?id=" . $row['idBOOK'] . "'>DELETE</a></td>";
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
        </div>
        <div class="tab-pane fade" id="add-tab-pane" role="tabpanel" aria-labelledby="add-tab" tabindex="0">

            <br>
            <form class="row g-3" name="book-reg" id="book-reg" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="col-md-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="col-md-3">
                    <label for="authorSurname" class="form-label">Author surname</label>
                    <input type="text" class="form-control" id="authorSurname" name="authorSurname" required>
                </div>
                <div class="col-md-3">
                    <label for="authorName" class="form-label">Author name</label>
                    <input type="text" class="form-control" id="authorName" name="authorName" required>
                </div>
                <div class="col-md-3">
                    <label for="year" class="form-label">Publication year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <div class="col-md-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher">
                </div>
                <div class="col-md-3">
                    <label for="nrpages" class="form-label">Nr of pages</label>
                    <input type="number" class="form-control" id="nrpages" name="nrpages">
                </div>
                <div class="col-md-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="col-md-9">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="col-md-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre">
                </div>
                <div class="col-md-3">
                    <label for="borrow" class="form-label">To rent</label>
                    <input type="text" class="form-control" id="borrow" name="borrow">
                </div>
                <div class="col-md-3">
                    <label for="copies" class="form-label">Nr of copies</label>
                    <input type="number" class="form-control" id="copies" name="copies" required>
                </div>
                <div class="col-md-3">
                    <label for="available" class="form-label">Available</label>
                    <input type="text" class="form-control" id="available" name="available">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="book-reg" value="SUBMIT">SUBMIT</button>
                </div>
            </form>
            <div id="message"></div>

            <?php
            include('config.inc.php');

            $title = $_POST['title'];
            $year = $_POST['year'];
            $publisher = $_POST['publisher'];
            $nrpages = $_POST['nrpages'];
            $isbn = $_POST['isbn'];
            $description = $_POST['description'];
            $genre = $_POST['genre'];
            $borrow = $_POST['borrow'];
            $copies = $_POST['copies'];
            $available = $_POST['available'];
            $authorSurname = $_POST['authorSurname'];
            $authorName = $_POST['authorName'];

            $sql = "INSERT INTO BOOK 
            (`BOOKtitle`, `BOOKyear`, `BOOKpublisher`, `BOOKpages`, `BOOKisbn`, `BOOKdescr`, `BOOKgenre`, BOOKtoBorrow, `BOOKcopies`, BOOKisAvailable)
                VALUES 
            ('$title', '$year', '$publisher', '$nrpages', ' $isbn', '$description', '$genre', TRUE, '$copies', TRUE)";

            $sql2 = "INSERT INTO AUTHOR (`AUTHORname`, `AUTHORsurname`)
            VALUES
            ('$authorName', '$authorSurname')";

            $result = mysqli_query($conn, $sql)
                or die("Error: " . mysqli_error($conn));

            $result2 = mysqli_query($conn, $sql2)
                or die("Error: " . mysqli_error($conn));

            $query = "SELECT idBOOK from BOOK WHERE BOOKtitle = '$title'";
            $resultbook =
                mysqli_query($conn, $query)
                or die("Error: " . mysqli_error($conn));

            $query2 = "SELECT idAUTHOR from AUTHOR WHERE AUTHORname = '$authorName' AND AUTHORsurname = '$authorSurname'";
            $resultauthor =
                mysqli_query($conn, $query2)
                or die("Error: " . mysqli_error($conn));

            $ra = mysqli_fetch_row($resultauthor);
            $rb = mysqli_fetch_row($resultbook);

            // var_dump($resultbook);
            // var_dump($resultauthor[0]);

            $query3 = "INSERT INTO WRITTEN (BOOK_idBOOK, AUTHOR_idAUTHOR)
                        VALUES ('$rb[0]', '$ra[0]')";

            $resultwritten =
                mysqli_query($conn, $query3)
                or die("Error: " . mysqli_error($conn));

            ?>

        </div>

    </div>

</body>

</html>

<?php
session_start();
include('footer.php');
?>