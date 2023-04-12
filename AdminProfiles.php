<?php

// Initialize the session
session_start();
require_once "Database.php";
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: Login.php");
    exit;
}

$sql = "SELECT U_id, Username, FirstName, LastName, Occupation, Email, Biography
FROM Users";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin Profiles Page</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet"
          href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin = "anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel = "stylesheet" href="Admin.css"

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
<body>
<div class="adminHeader">
    <p>All User Profiles</p>
</div>
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Occupation</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $rownum = 1;
            foreach($rows as $row)
            {
            ?>
                <tr>
                    <th scope="row"><?=$rownum?></th>
                    <td><?=$row["Username"]?></td>
                    <td><?=$row["FirstName"]?></td>
                    <td><?=$row["LastName"]?></td>
                    <td><?=$row["Occupation"]?></td>
                    <td><?=$row["Email"]?></td>
                    <td><?=$row["Biography"]?></td>
                    <?php

                    ?>
                </tr>
            <?php
                $rownum++;
            }
        ?>
        </tbody>
    </table>
</body>
</html>