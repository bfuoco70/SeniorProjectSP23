<?php

session_start();
require_once "Database.php";
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="profile.css">
</head>

<nav role="navigation">
    <div id="menuToggle">
        <input type="checkbox" />

        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <header class="nav-logo">
                <img class="navimage" src ="images/code-injection.png">

            </header>
            <li> <a href="home.php"><i class="fas fa-home"></i><b> Home</b></li></a>
            <li> <a href="profile.php"><i class="far fa-id-card"></i><b> Profile</b></li></a>
            <li> <a href="rundata.php"><i class="fas fa-chart-bar"></i><b> Previous Run Data</b></li></a>
            <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i><b> Logout</b></li></a>
            <li> <a href="about.php"><i class="fas fa-book"></i><b> About</b></li></a>
            <footer>
                <div id="borderbottom">
                    <img class="navNYIT" src ="images/BlackNYITlogo.png">
                </div>
            </footer>
        </ul>
    </div>
</nav>
<body>







</body>
</html>