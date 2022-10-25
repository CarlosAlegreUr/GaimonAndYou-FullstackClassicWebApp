<?php
   $time = time() + 1;
   setcookie("loggedIn", null, $time);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <meta> decription, author, keywords -->

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/generalStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

    <script defer src="scripts/index.js"></script>
    <title>🏠 Gaimon  & You 🏠</title>
</head>
<body>
    <div class="upper-menu-div">
        <ul class="index-upper-menu">
            <li id="login-li">    
                <a href="pages/loggingPage.html">
                    <button> LOG IN </button>
                </a>
            </li>

            <li id="signup-li">
                <a href="pages/signingUpPage.html">
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
             <img src="../../images/treasure_cross.webp" width="13%" alt="Treasure's cross"> 
            </a>
            <img src="../../images/jesus_cross.webp" width="23%" alt="Jesus's cross">
        </div>
    </div>

    <div class="center-div">
        <br> <br>
        <h3> War Ranking </h3>
        <table>
            <tr> 
                <td> YourName </td> 
                <td> <img class="table-image" src="../../images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 1 </td> 
                <td> <img class="table-image" src="../../images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 2 </td> 
                <td> <img class="table-image" src="../../images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
            <tr> 
                <td> top 3 </td> 
                <td> <img class="table-image" src="../../images/default_profile.webp" width="3%" alt="Default profile pic"> </td>
                <td> score </td>
            </tr>
        </table>
    </div>
</body>
</html>