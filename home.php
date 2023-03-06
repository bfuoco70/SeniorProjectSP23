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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<!-- Header -->
<header class="w3-container-w3-theme-w3-padding" id="myHeader">
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
    <div class="w3-center">
        <h4>Safe Data Encryption</h4>
        <h1 class="mainlabel">Senior Project Payload Injection</h1>
        <div class="w3-padding-32">
        <a href="rundata.php">  <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey"  style="font-weight:900;">View Data</button></a>
        </div>
    </div>
</header>


<div class="w3-row-padding w3-center w3-margin-top">
    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:460px">
            <h3>Penetration</h3>
            <img class="cardimage" src ="images/targeting.png">
            <p>First we initiate contact</p>
            <p>Select the injection tool</p>
            <p>Find the targeted system </p>
            <p>Injection Tool injects arbitrary code into system</p>

        </div>
    </div>

    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:460px">
            <h3>Insertion</h3>
            <img class="cardimage" src ="images/injection.png">
            <p>Malicious code is placed into the open process</p>
            <p>Code causes the process to execute</p>
            <p>API monitoring tool</p>
            <p>Configure to monitor all process injection-related API calls</p>
        </div>
    </div>

    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:460px">
            <h3>Control</h3>
            <img class="cardimage" src ="images/pc.png">
            <p>Administrator views the information</p>
            <p>Admin can view what information is taken</p>
            <p>Monitor suspicious network activity</p>
            <p>Precautionary measures can be taken</p>
        </div>
    </div>
</div>
<!-- Footer --><br>
<footer class="w3-container-w3-theme-dark-w3-padding-16">
    <h3 id="footer"> Footer</h3>
    <p>Supported by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3schools</a></p>
    <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
        <span class="w3-text w3-theme-light w3-padding">Go To Top</span> 
        <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
    </div>
    <p>Contact us at NYIT</p>
</footer>


</body>
</html>
