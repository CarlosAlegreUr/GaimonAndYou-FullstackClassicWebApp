<?php

function verifyInput($email, $password) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $correct_password = hash("SHA256", "admin");
        if ($password === $correct_password) {
            return true;
        } else
            return "Incorrect password";
    } else 
        return "Email not valid";
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = hash("SHA256", $_POST["password"]);
$login_error = verifyInput($email, $password);
if($login_error === true)
    echo "success" 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/generalStyle.css">

    <script defer src="scripts/logInPage.js"></script>
    <title> 📘 Gaimon Wars Log In 📘</title>
</head>

<body>
    <form method="POST" action="loggingPage.php">
        <div class="log-form-box">
            <h3> LOG-IN </h3>
            <input class="ship-shape-input" name="email" type="email" placeholder="email"> <br>
            <input class="ship-shape-input" name="password" type="password" placeholder="password"> <br>
            <a href="./pages/gaimonHub.html">
                <button id="login-button"> LOG IN </button>
            </a>
            <p class="error-message"> <?php echo $login_error ?> </p>
        </div>
    </form>

    <footer class="home-button-footer">
        <hr>
        <a href="./pages/index.html"> <button> HOME </button> </a>
    </footer>
</body>

</html>