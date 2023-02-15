<?php
require_once "Database.php";

$conn=getDB();
// Check if the form has been submitted
if (isset($_POST['submit'])) {
// Get the submitted username
$user = $_POST['username'];

// Check if the username exists in the database
$query = $conn->prepare("SELECT * FROM Users WHERE Username = :username");
$query->bindParam(':username', $user);
$query->execute();

// If the username exists, redirect to the resetPassword.php page
if ($query->rowCount() > 0) {
header("Location: resetPassword.php");
exit;
} else {
echo "Username not found in the database.";
}
}

?>

<html>
<head>

    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title class="Title">Reset Password</title>
</head>
<body>
<h1 class="Title">Reset Password</h1>
<div class="wrapper"
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <p>Please enter your username:</p>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <input type="submit" name="submit" value="Submit" id="submit">
</form>
</body>
</html>