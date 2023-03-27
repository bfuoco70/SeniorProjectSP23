<?php

// Initialize the session
session_start();
require_once "Database.php";
$pdo = getDB();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$sql = "SELECT u.Username, pd., a.season,l.name as location, ua.date
FROM activities a
JOIN locations l on l.id = a.location_id
JOIN users_activities ua on a.id = ua.activity_id
JOIN users u on u.id = ua.user_id
WHERE u.username = :user";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user", $Username, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>
<body>
        UserInfo
    </h1>
    <table class="table table-striped table-hover table-primary">
        <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Occupation</th>
            <th scope="col">Email</th>
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
                    <td><?=$row["Lastname"]?></td>
                    <td><?=$row["Occupation"]?></td>
                    <td><?=$row["Email"]?></td>
                </tr>
            <?php
                $rownum++;
            }
        ?>
        </tbody>
    </table>
</body>
</html>