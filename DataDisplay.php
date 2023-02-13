<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once 'config.php';

$userName = $_SESSION["username"];

$activitysql = "SELECT a.name, a.hour, a.season,l.name as location, ua.date
FROM activities a
JOIN locations l on l.id = a.location_id
JOIN users_activities ua on a.id = ua.activity_id
JOIN users u on u.id = ua.user_id
WHERE u.username = :user";
$stmt = $pdo->prepare($activitysql);
$stmt->bindParam(":user", $userName, PDO::PARAM_STR);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Traveler Scheduler</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="welcome.php" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="plan.php" class="nav-link">Plan more things to do!</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </header>
    </div>
    <h1>
        Planned Activities
    </h1>
    <table class="table table-striped table-hover table-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Activity</th>
            <th scope="col">Location</th>
            <th scope="col">Hour</th>
            <th scope="col">Season</th>
            <th scope="col">Date</th>
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
                    <td><?=$row["name"]?></td>
                    <td><?=$row["location"]?></td>
                    <td><?=$row["hour"]?></td>
                    <td><?=$row["season"]?></td>
                    <td><?=$row["date"]?></td>
                </tr>
            <?php
                $rownum++;
            }
        ?>
        </tbody>
    </table>
</body>
</html>