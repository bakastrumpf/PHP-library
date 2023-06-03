<link rel="stylesheet" type="text/css" href="styles/styles-index.css">
<link rel="stylesheet" type="text/css" href="styles/styles-header.css">
<link rel="stylesheet" type="text/css" href="styles/styles-footer.css">

<?php
session_start();
session_destroy();
header("Location:index.php");
