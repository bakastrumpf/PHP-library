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
    <title>LIBRARY ADMIN | USER MANAGEMENT</title>
</head>

<body>

    <div>
        <fieldset style="width: 450px;">
            <h3>USER MANAGEMENT</h3>
            <hr>
            <form name="search" id="search" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                I am looking for USER:
                <input type="text" name="surname" size="30" placeholder="type text" value="<?php if (isset($_GET['surname'])) echo $_GET['surname']; ?>" />
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
            $users = $_GET['surname'];
            // $authors = $_GET['AUTHOR'];
            $sort = $_GET['sort'];

            // include DB
            include_once('config.inc.php');

            $query = "SELECT idUSER, USERname, USERsurname, USERpass, USERemail, USERstreet, USERcity, USERphone, USERrole, USERactive, USERmembPaid FROM USER";

            if ($users != "") {
                $query .= " AND USERsurname like '%$users%'"; // partial title match
            }

            // alphabet sorting
            if ($sort == 'ascending')
                $query .= " ORDER BY USERsurname ASC";
            elseif ($_GET['sort'] == 'descending')
                $query .= " ORDER BY USERsurname DESC";
            echo ("TEST TEST 1");
            $result = mysqli_query($conn, $query)
                or die("Unexpected error: " . mysqli_error($conn));
            echo ("TEST TEST 2");
            if (mysqli_num_rows($result) > 0) {
                // results render
                echo ("TEST TEST 3");
                echo "<table border='5'>";
                echo "<tr>";
                echo "<th>User ID</th>";
                echo "<th>Last name</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>City</th>";
                echo "<th>Address</th>";
                echo "<th>Phone</th>";
                echo "<th>Role</th>";
                echo "<th>Is active</th>";
                echo "<th>Membership paid</th>";
                echo "<th>Modify</th>";
                echo "<th>DELETE</th>";
                echo "<tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>{$row['idUSER']}</td>";
                    echo "<td>{$row['USERsurname']}</td>";
                    echo "<td>{$row['USERname']}</td>";
                    echo "<td>{$row['USERemail']}</td>";
                    echo "<td>{$row['USERpass']}</td>";
                    echo "<td>{$row['USERcity']}</td>";
                    echo "<td>{$row['USERaddress']}</td>";
                    echo "<td>{$row['USERphone']}</td>";
                    echo "<td>{$row['USERrole']}</td>";
                    echo "<td>{$row['USERactive']}</td>";
                    echo "<td>{$row['USERmembPaid']}</td>";
                    echo "<td><a href='user-action.php?id=" . $row['idUSER'] . "'>Update</a></td>";
                    echo "<td><a href='user-action.php?id=" . $row['idUSER'] . "'>DELETE</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<br> No results fetched. <br> Please, try again with different data.";
            }
            $_SESSION['$idUSER'] = $row['idUSER'];
            mysqli_free_result($result);
            mysqli_close($conn);
        }
        ?>
    </div>

</body>

<?php include('footer.php'); ?>

</html>