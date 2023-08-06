<?php

function setCookies($email, $password)
{
    $time = time() + 3600;
    $sesionId =  hash("SHA256", "$email$password$time");
    // Uncomment on production.
    setcookie("loggedIn", $sesionId, $time, "/"); //, true, true);
}

function processLogInInput()
{
    //Verifyes syntax of input and it's existnace in the databse.
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = hash("SHA256", $_POST["password"]);

    // Connect to database parameters
    $servername = "localhost:3306";
    $username = "root";
    $password = "password";
    $dbname = "GaimonAndYou";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM GaimonAndYou.Gaimons WHERE ownerEmail = '$email'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $email_value = $row['ownerEmail'];
    if (mysqli_num_rows($result) > 0 && $email_value == $email) {
        $password = hash("SHA256", "admin");
        // $hashed_password = hash("SHA256", "$hashed_password");
        
        $query = "SELECT * FROM GaimonAndYou.Gaimons WHERE hashedPassword = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $password_received = $row['hashedPassword'];

        if (mysqli_num_rows($result) > 0 && $password_received == $password) {
            setCookies($email, $password);
            return true;
        } else
            return "Incorrect password";
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