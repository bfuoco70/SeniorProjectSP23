<?php
require_once "Database.php";
session_start();
$conn=getDB();
$message="";
//var_dump($_POST);
// Check if the form has been submitted
if (isset($_POST['submit'])) {
// Get the submitted username
    $user = $_POST['username'];

// Check if the username exists in the database
    $query = $conn->prepare("SELECT * FROM Users WHERE Username = :username");
    $query->bindParam(':username', $user);
    $query->execute();
    $data = $query->fetch();
    $_SESSION['id'] = $data["U_id"];
// If the username exists, redirect to the resetPassword.php page
    if ($query->rowCount() > 0) {
        header("Location: resetPassword.php");
        exit;
    } else {
        $message = "Username not found in the database.";
    }
}

?>
<html>
<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E">
    <title class="Title">Reset Password</title>
</head>
<body>
<h1 class="Title">Reset Password</h1>
<div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Please enter your Email:</p>
        <p>
            <?php
            if($message)
            {
                echo $message;
            }
            ?>
        </p>
        <label for="email">Email:</label>
        <input type="text" name="username" id="email">
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
</div>
</body>
</html>