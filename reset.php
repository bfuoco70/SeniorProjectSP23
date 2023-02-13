<?php

require_once "Database.php";

//try {
//$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch(PDOException $e) {
//echo "Error: " . $e->getMessage();
//}
$conn=getDB();
// Check if the form has been submitted
if (isset($_POST['submit'])) {
// Get the submitted username
$user = $_POST['username'];

// Check if the username exists in the database
$query = $conn->prepare("SELECT * FROM users WHERE username = :username");
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
    <title>Reset Password</title>
</head>
<body>
<h1>Reset Password</h1>
<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>