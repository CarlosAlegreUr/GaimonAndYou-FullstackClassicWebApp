<?php
// $time = time() + 1;
// setcookie("loggedIn", null, $time, "/");

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


// Execute SQL query
$query =
    file_get_contents("../database/scripts/getLeaderboard.sql");
$result = $conn->query($query);

// Store the results in a PHP variable
$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = array("name" => $row["name"], "battlesWon" => $row["battlesWon"], "ownerEmail" => $row["ownerEmail"]);
    }
}

// Close the MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <meta> decription, author, keywords -->

    <link rel="stylesheet" href="../public/styles/index.css">
    <link rel="stylesheet" href="../public/styles/generalStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

    <script defer src="../public/scripts/index.js"></script>
    <title>🏠 Gaimon & You 🏠</title>
</head>

<body>
    <div class="upper-menu-div">
        <ul class="index-upper-menu">
            <li id="login-li">
                <a href="../views/loggingPage.html">
                    <button> LOG IN </button>
                </a>
            </li>

            <li id="signup-li">
                <a href="../views/signingUpPage.html">
                    <button> SIGN UP </button>
                </a>
            </li>

            <li id="linkedIn-li">
                <a href="https://es.linkedin.com/in/carlos-alegre-urquiz%C3%BA-0b19701b3/en" target="_blank">
                    <button> Developer's LinkedIn </button>
                </a>
            </li>

            <li id="gitHub-li">
                <a href="https://github.com/CarlosAlegreUr" target="_blank">
                    <button> Developer's GitHub </button>
                </a>
            </li>
        </ul>
    </div>

    <div class="center-div">
        <h1> GAIMON & YOU </h1>
    </div>

    <div class="info-div">
        <div class="info-text-div">
            <h3> Who is Gaimon?!? </h3>
            <p> Click the treasure's cross to find out! </p>
        </div>

        <div class="cross-images">
            <a href="https://onepiece.fandom.com/wiki/Gaimon" target="_blank">
                <img src="../public/images/treasure_cross.webp" width="13%" alt="Treasure's cross">
            </a>
            <img src="../public/images/jesus_cross.webp" width="23%" alt="Jesus's cross">
        </div>
    </div>

    <div class="center-div">
        <br> <br>
        <h3> War Ranking </h3>
        <table>
            <tr>
                <td></td>
                <td> Owner </td>
                <td> Gaimon Name </td>
                <td></td>
                <td> Score </td>
            </tr>
            <?php $i = 1;
            foreach ($users as $user) : ?>
                <tr>
                    <td>Top <?php echo $i++; ?></td>
                    <td><?php echo $user["ownerEmail"]; ?></td>
                    <td><?php echo $user["name"]; ?></td>
                    <td><img class="table-image" src="../public/images/default_profile.webp" width="30" alt="Default profile pic"></td>
                    <td><?php echo $user["battlesWon"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta> decription, author, keywords 

    <link rel="stylesheet" href="../public/styles/index.css">
    <link rel="stylesheet" href="../public/styles/generalStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

    <script defer src="../public/scripts/index.js"></script>
    <title>🏠 Gaimon & You 🏠</title>
</head>
<body>
    <div class="upper-menu-div">
        <ul class="index-upper-menu">
            <li id="login-li">    
                <a href="loggingPage.html">
                    <button> LOG IN </button>
                </a>
            </li>

            <li id="signup-li">
                <a href="signingUpPage.html">
                    <button> SIGN UP </button>
                </a>
            </li>
        
            <li id="linkedIn-li"> 
                <a href="https://es.linkedin.com/in/carlos-alegre-urquiz%C3%BA-0b19701b3/en" target="_blank"> 
                    <button> Developer's LinkedIn </button>
                </a> 
            </li>

            <li id="gitHub-li"> 
                <a href="https://github.com/CarlosAlegreUr" target="_blank"> 
                    <button> Developer's GitHub </button>
                </a> 
            </li>
        </ul>
    </div>

    <div class="center-div">
        <h1> GAIMON & YOU </h1>
    </div>

    <div class="info-div">
       <div class="info-text-div"> 
            <h3> Who is Gaimon?!? </h3>
            <p> Click the treasure's cross to find out! </p>
       </div>

       <div class="cross-images">
            <a href="https://onepiece.fandom.com/wiki/Gaimon" target="_blank">
             <img src="../public/images/treasure_cross.webp" width="13%" alt="Treasure's cross"> 
            </a>
            <img src="../public/images/jesus_cross.webp" width="23%" alt="Jesus's cross">
        </div>
    </div>

    <div class="center-div">
        <br> <br>
        <h3> War Ranking </h3>
        <table>
            <tr> 
                <td> YourName </td> 
                <td> <img class="table-image" src="../public/images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 1 </td> 
                <td> <img class="table-image" src="../public/images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 2 </td> 
                <td> <img class="table-image" src="../public/images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 3 </td> 
                <td> <img class="table-image" src="../public/images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
        </table>
    </div>
</body>
</html> -->