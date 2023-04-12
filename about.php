<?php


session_start();
require_once "Database.php";
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: Login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="profile.css">

</head>

<nav role="navigation">
    <div id="menuToggle">
        <input type="checkbox"/>

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
</header>
    </div>
</nav>
<body>

<!-- The Team Members Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:900px" id="members">
    <h1 class="w3-wide"><b>Windows PE Injection Tool</b></h1>
    <p class="w3-center">Cybersecurity is a key part of the current and future business world, and with injection attacks becoming more prominent, it increases the pressing need to both understand and counter them. As a team, we designed a user-friendly application in which the user can utilize the Windows PE Injection Tool to simulate a code injection attack to gain information and help understand the key components behind an injection attack.</p>

    <div class="w3-row w3-padding-32">

        <div class="w3-card w3-third" style="background-color: aliceblue">
            <p>Michael</p>
            <img src="images/Michael.png" class="w3-card w3-round w3-margin-bottom" alt="Michael's Photo" style="width:60%;">
            <p>Developer</p>
        </div>
        <div class="w3-card w3-third" style="background-color: aliceblue">
            <p>Ben</p>
            <img src="images/Ben.png" class="w3-card w3-round w3-margin-bottom" alt="Ben's Photo" style="width:60%">
            <p>Developer</p>
        </div>
        <div class="w3-card w3-third" style="background-color: aliceblue">
            <p>Jacob</p>
            <img src="images/Jacob.jpg" class="w3-card w3-round w3-margin-bottom" alt="Jacob's Photo" style="width:60%">
            <p>Developer</p>
        </div>
        <div class="w3-third">
            <p></p>
        </div>
        <div class="w3-card w3-third" style="background-color: aliceblue">
            <p>Hayden</p>
            <img src="images/Hayden.png" class="w3-card w3-margin-bottom" alt="Hayden's Photo" style="width:60%">
            <p>Team Leader</p>
        </div>

    </div>
</div>

<!--Instructions Section-->
<div class="w3-black" id="instructions">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
        <h2 class="w3-wide w3-center"><i>Instructions</i></h2>
        <p class="w3-opacity w3-center"><i>How to use the Payload Injection Tool.</i></p><br>



        <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
            <div class="w3-third w3-margin-bottom">
                <div class="w3-container w3-white">
                    <p><b>Download</b></p>
                    <p>First obtain the Windows PE Injection Tool using the button below.</p>
                    <a href=""> <button class="w3-button w3-black w3-margin-bottom"> Get Injection Tool </button> </a>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <div class="w3-container w3-white">
                    <p><b>Run & Simulate</b></p>
                    <p >To use the tool, the user must access a Kali Linux machine and use the command-line interface to interact with the tool. The user will be able to monitor and view what information would be spread through a code injection attack.</p>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <div class="w3-container w3-white">
                    <p><b>Results</b></p>
                    <p>Once the hack has been run successfully, continue to this page to view the spreadsheet of the results.</p>
                    <a href="rundata.php"> <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">View Run Data</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Contact Section -->

<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <div class="w3-row w3-padding-32">
            <i class="fa fa-map-marker" style="margin-left:285px" ></i> Old Westbury, New York<br>
            <i class="fa fa-phone" style="margin-left:285px"></i> Phone: (516)-686-7520<br>
            <i class="fa fa-envelope" style="margin-left:285px"> </i> Email: nyit@nyit.edu<br>
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