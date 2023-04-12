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

$sql = "SELECT id, Hostname, OSname, OSversion, OSmanufacturer, OSconfiguration, OSbuildtype, RegisteredOwner, RegisteredOrganization, ProductID, OriginalInstallDate, SystemBootTime, SystemManufacturer, SystemModel, SystemType, `Processor(s)`, BiosVersion, WindowsDirectory, SystemDirectory, BootDevice, SystemLocale, InputLocale, TimeZone, TotalPhysicalMemory, AvailablePhysicalMemory, VirtualMemoryMaxSize, VirtualMemoryAvailable, VirtualMemoryInUse, `PageFileLocation(s)`, Domain, LogOnServer, `Hotfix(s)`, `NetworkCard(s)`, HyperVRequirements
FROM Loot";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();
$rownum = 1;
?>

<!doctype html>
<html lang="en">
<head>
    <title>Rundata Page</title>
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
    <link rel = "stylesheet" href="rundata.css"

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
<div class="RundataHeader">
    <p>All Injection Data Collected</p>
</div>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Hostnames...">
<div class="outer-wrapper">
    <div class="table-wrapper">

        <table id="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hostname</th>
                <th scope="col">Os Name</th>
                <th scope="col">Os Version</th>
                <th scope="col">Os Manufacturer</th>
                <th scope="col">Os Configuration</th>
                <th scope="col">Os BuildType</th>
                <th scope="col">Registered Owner</th>
                <th scope="col">Registered Organization</th>
                <th scope="col">Product ID</th>
                <th scope="col">Original Install Date</th>
                <th scope="col">System Boot Time</th>
                <th scope="col">System Manufacturer</th>
                <th scope="col">System Model</th>
                <th scope="col">System Type</th>
                <th scope="col">Processor(s)</th>
                <th scope="col">Bios Version</th>
                <th scope="col">Windows Directory</th>
                <th scope="col">System Directory</th>
                <th scope="col">Boot Device</th>
                <th scope="col">System Locale</th>
                <th scope="col">Input Locale</th>
                <th scope="col">Time Zone</th>
                <th scope="col">Total Physical Memory</th>
                <th scope="col">Available Physical Memory</th>
                <th scope="col">Virtual Memory Max Size</th>
                <th scope="col">Virtual Memory Available</th>
                <th scope="col">Virtual Memory In Use</th>
                <th scope="col">Page File Locations(s)</th>
                <th scope="col">Domain</th>
                <th scope="col">Log On Server</th>
                <th scope="col">Hotfix(s)</th>
                <th scope="col">NetworkCards(s)</th>
                <th scope="col">Hyper V Requirements</th>

                <?php
                $rownum = 1;
                foreach($rows as $row)
                {
                ?>
            <tr>
                <th scope="row"><?=$rownum?></th>
                <td><?=$row["Hostname"]?></td>
                <td><?=$row["OSname"]?></td>
                <td><?=$row["OSversion"]?></td>
                <td><?=$row["OSmanufacturer"]?></td>
                <td><?=$row["OSconfiguration"]?></td>
                <td><?=$row["OSbuildtype"]?></td>
                <td><?=$row["RegisteredOwner"]?></td>
                <td><?=$row["RegisteredOrganization"]?></td>
                <td><?=$row["ProductID"]?></td>
                <td><?=$row["OriginalInstallDate"]?></td>
                <td><?=$row["SystemBootTime"]?></td>
                <td><?=$row["SystemManufacturer"]?></td>
                <td><?=$row["SystemModel"]?></td>
                <td><?=$row["SystemType"]?></td>
                <td><?=$row["Processor(s)"]?></td>
                <td><?=$row["BiosVersion"]?></td>
                <td><?=$row["WindowsDirectory"]?></td>
                <td><?=$row["SystemDirectory"]?></td>
                <td><?=$row["BootDevice"]?></td>
                <td><?=$row["SystemLocale"]?></td>
                <td><?=$row["InputLocale"]?></td>
                <td><?=$row["TimeZone"]?></td>
                <td><?=$row["TotalPhysicalMemory"]?></td>
                <td><?=$row["AvailablePhysicalMemory"]?></td>
                <td><?=$row["VirtualMemoryMaxSize"]?></td>
                <td><?=$row["VirtualMemoryAvailable"]?></td>
                <td><?=$row["VirtualMemoryInUse"]?></td>
                <td><?=$row["PageFileLocation(s)"]?></td>
                <td><?=$row["Domain"]?></td>
                <td><?=$row["LogOnServer"]?></td>
                <td><?=$row["Hotfix(s)"]?></td>
                <td><?=$row["NetworkCard(s)"]?></td>
                <td><?=$row["HyperVRequirements"]?></td>
                <?php

                ?>
            </tr>
            <?php
            $rownum++;
            }
            ?>
            <script>
                function myFunction() {
                    // Declare variables
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("table");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
            </tbody>
        </table>
    </div>
</div>
<!-- Footer --><br>
<footer class="w3-container-w3-theme-dark-w3-padding-16">

    <p>Supported by <a href="https://www.nyit.edu/" target="_blank">New York Institute of Technology</a></p>
    <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
        <span class="w3-text w3-theme-light w3-paddding">Go To Top</span> 
        <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
    </div>
    <p>Contact us at 516.686.7520</p>
</footer>
</body>
</html>