<?php

session_start();
require_once "Database.php";
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
//Checks to see if the database 
if($_SERVER['REQUEST_METHOD']==="POST")
{
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $Occupation = $_POST["Occupation"];
    $Email = $_POST["Email"];
    $BackgroundColor = $_POST["Theme-color"];
    $Biography = $_POST["Biography"];
    $sql = "Update Users 
    Set FirstName=:firstName, LastName=:lastName, Occupation=:Occupation, Email=:Email, BackgroundColor=:BackgroundColor,Biography=:Biography
    where Username=:Username";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":firstName",$firstName);
    $stmt->bindParam(":lastName",$lastName);
    $stmt->bindParam(":Occupation",$Occupation);
    $stmt->bindParam(":Email",$Email);
    $stmt->bindParam(":BackgroundColor",$BackgroundColor);
    $stmt->bindParam(":Biography",$Biography);
    $stmt->bindParam(":Username",$_SESSION["username"]);
    $stmt->execute();
}
$getData = "Select * from Users where Username=:username";
$stmt2 = $pdo->prepare($getData);

$stmt2->bindParam(":username", $_SESSION["username"]);
$stmt2->execute();
$userData = $stmt2->fetch();

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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>

<body>
<div class="header__wrapper">
<header class="sub-header">
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
</header>
<div class="cols__container" id="backgroundprofile" style="background-color:<?= $userData["BackgroundColor"] ?>">
<div class="left__col" >
    <div class="img__container">
        <img class="profile_pics" src="images/MichaelSunset.JPG" alt="Michael Gordon"/>
        <span></span>
    </div>
    <h2> <?= $userData["FirstName"] ?>  <?= $userData["LastName"] ?></h2>
    <p><?= $userData["Occupation"] ?></p>
    <p><?= $userData["Email"] ?></p>
<hr>
    <div class="content">
        <p> <?= $userData["Biography"] ?></p>
        <ul class="profilelist">
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-linkedin"></i></li>
            <li><i class="fab fa-github"></i></li>
            <li><i class="fab fa-instagram"></i></li>
        </ul>
    </div>
</div>

    <div class="right__col">
        <div class="info-box">

      <h1 class="Information"> Account Information</h1>
            <div class="container">
                <form action="profile.php" method="post">
                    <div class="row">
                        <div class="info25">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="info75">
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="info25">
                            <label for="lname">Last Name</label>
                        </div>
                        <div class="info75">
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="info25">
                            <label for="Occupation">Occupation</label>
                        </div>
                        <div class="info75">
                            <input type="text" id="Occupation" name="Occupation" placeholder="Your Occupation..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="info25">
                            <label for="Email">Email</label>
                        </div>
                        <div class="info75">
                            <input type="text" id="Email" name="Email" placeholder="Your Email..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="info25">
                            <label for="Theme-color">Background Color </label>
                        </div>
                        <div class="info75">
                            <select id="Theme-color" name="Theme-color">
                                <option value="White">Default</option>
                                <option value="Purple">Purple</option>
                                <option value="Orange">Orange</option>
                                <option value="Pink">Pink</option>
                                <option value="Red">Dark Red</option>
                                <option value="Blue">Dark Blue</option>
                                <option value="Green">Dark Green</option>
                                <option value="Gold">Gold</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="info25">
                            <p class="Biography1">Biography</p>
                        </div>
                        <div class="info76">
                            <textarea id="Biography" name="Biography" placeholder="Tell us about yourself.."></textarea>
                        </div>
                    </div>

<!--                    <form action="profile.php" method="post" id="fileToUpload" enctype="multipart/form-data">-->
<!--                       <p class="imagetext">Select image to upload:</p>-->
<!--                        <input type="file" id="chooseimage" name="fileToUpload" id="fileToUpload">-->
<!--                        <input type="submit" id="imagesubmit" value="Upload Image" name="submit">-->
<!--                    </form>-->
<!---->
<!--                    <form action="profile.php" method="post" id="HeaderUpload" enctype="multipart/form-data">-->
<!--                        <p class="imagetext">Select a header image to upload:</p>-->
<!--                        <input type="file" id="chooseimage" name="fileToUpload" id="HeaderUpload">-->
<!--                        <input type="submit" id="imagesubmit" value="Upload Image" name="submit">-->
<!--                    </form>-->
                    <div class="sub-button">
                        <input type="submit" id="submitbtn" value="Submit">
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
</div>









</body>
</html>