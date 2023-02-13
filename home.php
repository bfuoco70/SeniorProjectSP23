<?php

session_start();
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: login.php");
exit;
}
?>

!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PE Injection</title>
</head>
<body>
     <span class="main-header-buttons">
    <div class="navButtons">
        <span class="openAPage" onclick="openPlan()"></span>
        <span class="openAPage" onclick="openActivities()"></span>
        <span class="openAPage" onclick="openReset()"></span>
        <span class="openAPage" onclick="openLogout()"></span>

    </div>
    </span>
</body>
<script>
    function openPlan(){
        location.href = "plan.php"
    }
    function openActivities(){
        location.href = "userActivities.php"
    }
    function openReset(){
        location.href = "reset-password.php"
    }
    function openLogout(){
        location.href = "logout.php"
    }
    function openAdmin(){
        location.href = "admin.php"
    }
</script>
</html>
