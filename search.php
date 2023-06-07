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
                <input type="text" name="search" size="20" placeholder="What book are you interested in?" value="<?php if (isset($_GET['book'])) echo $_GET['book']; ?>" />
                Sort:
                <select name="redosled">
                    <option>descending</option>
                    <option>ascending</option>
                    <option selected>nevermind</option>
                </select>
                <br>
                <hr>


                <input type="submit" name="confirm" value="PRETRAŽI">
            </form>
        </fieldset>
    </div>
</body>

</html>

<?php include('footer.php'); ?>