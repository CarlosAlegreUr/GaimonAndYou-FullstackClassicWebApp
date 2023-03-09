<?php
function setCookies($email, $password)
{
    $time = time() + 3600;
    $sesionId =  hash("SHA256", "${email}${password}${time}");
    setcookie("loggedIn", $sesionId, $time, "/");
}

function processLogInInput()
{
    //Verifyes syntax of input and it's existnace in the databse.
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = hash("SHA256", $_POST["password"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // TODO: Check in database
        $in_database = true;
        $correct_password = hash("SHA256", "admin");
        if ($in_database)
            if ($password === $correct_password) {
                setCookies($email, $password);
                return true;
            } else
                return "Incorrect password";
        else
            return "This account doesn't exsits";
    } else
        return "Email not valid";
}

$login_error = processLogInInput();
if ($login_error === true) {
    // header('Content-Type: text/html');
    header("Location: ../views/gaimonHub.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/styles/generalStyle.css">

    <title> 📘 Gaimon Wars Log In 📘</title>
</head>

<body>
    <form method="POST">
        <div class="log-form-box">
            <h3> LOG-IN </h3>
            <input class="ship-shape-input" name="email" type="email" placeholder="email"> <br>
            <input class="ship-shape-input" name="password" type="password" placeholder="password"> <br>
            <button id="login-button"> LOG IN </button>
            <p class="error-message">
                <?php echo $login_error ?>
            </p>
        </div>
    </form>

    <footer class="home-button-footer">
        <hr>
        <a href="../views/index.html"> <button> HOME </button> </a>
    </footer>
</body>

</html>