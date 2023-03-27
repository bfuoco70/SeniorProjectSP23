<?php
session_start();
use RobThree\Auth\TwoFactorAuth;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'Database.php';

if(!isset($_SESSION["username"])) {
    header("location: Register.php");
    exit;
}
$pdo = getDB();

$tfa = new TwoFactorAuth();
$secret = $tfa->createSecret();
$message="";

if(isset($_POST['submit']))
{
    $pastSecret = $_POST['secret'];
    $current2fa = $_POST['2fa'];
    $result = $tfa->verifyCode(strval($pastSecret), $current2fa);
    if($result)
    {
        echo "Success!";
        //write code to update the database
        $sql = "UPDATE Users SET secret = :secret WHERE Username = :user";
        if($stmt= $pdo->prepare($sql)){
            $param_user = $_SESSION['username'];
            $stmt->bindParam(":secret", $pastSecret,PDO::PARAM_STR);
            $stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
        }
        if($stmt->execute()){
            header("location: login.php");
        }
    }
    else
    {
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
    <p>Please enter the following code in your app: '<?php echo $secret; ?>'</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <p>Once entered, Please enter your One time 2fa code:</p>
        <label for="2fa">2fa Code:</label>
        <input type="text" name="2fa" id="2fa">
        <input type="hidden" name="secret" value="<?= $secret?>">
        <?php
        if($message)
        {
            echo $message;
        }
        ?>
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
</div>

</body>
</html>