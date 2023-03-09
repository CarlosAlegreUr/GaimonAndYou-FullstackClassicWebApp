<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO Gaimons (ownerEmail, name, glasses, stick, hat, mood, battlesWon) VALUES ('koala@gmail.com', 'Pepe', 0, 1, 0, 0, 10)";

// Prepare the statement and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiiiii", $ownerEmail, $name, $glasses, $stick, $hat, $mood, $battlesWon);

// Set the values of the parameters
$ownerEmail = "example@example.com";
$name = "Gaimon";
$glasses = 1;
$stick = true;
$hat = false;
$mood = true;
$battlesWon = 5;

// Execute the statement
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();
