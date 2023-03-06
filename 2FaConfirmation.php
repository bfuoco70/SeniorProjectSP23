<?php
session_start();
use RobThree\Auth\TwoFactorAuth;
require_once __DIR__ . '/vendor/autoload.php';
require_once 'Database.php';
$pdo = getDB();
$tfa = new TwoFactorAuth();
$message = "";
if(isset($_POST['submit']))
{
    $query = $pdo->prepare("SELECT secret FROM Users WHERE U_id = :id");
    $query->bindParam(':id', $_SESSION["id"]);
    $query->execute();
    $data = $query->fetch();
    $secret = $data['secret'];
    $result = $tfa->verifyCode($secret, $_POST['2fa']);
    if($result){
        header("location: home.php");
    }
    else {
        $message = "Your 2fa code did not match the code in the database; Please try Again";
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="2fa.css">
    <title>2fa Confirmation</title>
</head>
<body>
<div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <p>Please enter your One time 2fa code:</p>
        <label for="2fa">2fa Code:</label>
        <?php
        if($message)
        {
            echo $message;
        }
        ?>
        <input type="text" name="2fa" id="2fa">
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
</div>

</body>
</html>