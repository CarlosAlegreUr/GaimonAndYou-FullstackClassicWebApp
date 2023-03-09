<?php
// Log to debbug erros in browser
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // Connect to database
     $servername = "localhost:3306";
     $username = "root";
     $password = "password";
     $dbname = "GaimonAndYou";
 
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }


    // Prepare and execute SQL query
    // Gaimons table row
    $ownerEmail = "default@gmail.com";
    $name = $_POST["name"];
    $glasses = isset($_POST["glasses"]) ? $_POST["glasses-menu"] : null;
    $stick = isset($_POST["stick"]) ? 1 : 0;
    $hat = isset($_POST["hat"]) ? 1 : 0;
    $mood = ($_POST["mood"] == true) ? 1 : 0;
    $battlesWon = 0;

    $query =
        file_get_contents("../database/scripts/createGaimon.sql");
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiiiii", $ownerEmail, $name, $glasses, $stick, $hat, $mood, $battlesWon);
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        die("Error inserting data: " . $stmt->error);
    }

    // Close connection
    $stmt->close();
    $conn->close();

    header("Location: ../views/gaimonCustomize.html");
}
?>