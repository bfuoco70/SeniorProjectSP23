<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}

// Include config file
require_once "Database.php";
$pdo = getDB();

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT U_id, Email, Password FROM Users WHERE Email = :email";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if username exists, if yes then verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                            $stmt = $pdo->prepare("UPDATE users SET verification_code = :verification_code WHERE Email = :email");
                            $stmt->bindParam(':verification_code', $verification_code);
                            $stmt->bindParam(':email', $email);
                            $stmt->execute();

                            $to = $email;
                            $subject = "Email Verification";
                            $message = "Please click the following link to verify your email address: http://example.com/verify.php?email=$email&code=$verification_code";
                            $headers = "From: your_email@example.com\r\n";
                            $headers .= "Reply-To: your_email@example.com\r\n";
                            $headers .= "Content-type: text/html\r\n";

                            mail($to, $subject, $message, $headers);
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            $email = $_GET['email'];
                            $verification_code = $_GET['code'];

                            $stmt = $pdo->prepare("SELECT * FROM Users WHERE Email = :email AND verification_code = :verification_code");
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':verification_code', $verification_code);
                            $stmt->execute();

                            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($user) {
                                // Email and verification code match, update the user's account status to "verified"
                                $stmt = $pdo->prepare("UPDATE Users SET status = 'verified' WHERE Email = :email");
                                $stmt->bindParam(':email', $email);
                                $stmt->execute();


                                // Redirect user to welcome page
                                header("location: home.php");
                            } else {
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid email or password.";
                            }
                        }
                    } else {
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid email or password.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                unset($stmt);
            }
        }

        // Close connection
        unset($pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PE Injection Login</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<span class="header">
<h1 class="Title">Welcome to PE Injection</h1>
    <h1 class="Title">A Site Focused on Simplified Code Injection</h1>
</span>
<div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>

 <?php
   if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!--" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Sign in">
        </div>
        <p>Don't have an account? <a href="Register.php">Sign up now</a>.</p>
        <p>Forgot Password? <a href="reset.php">Reset Here</a>.</p>
    </form>
</div>
</body>
</html>