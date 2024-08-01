<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';

generateToken();

processLoginAttempt($dbCo); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title> 

    <link rel="stylesheet" href="./file.scss//main.scss">

</head>

<body>
    <img class="login-img" src="./img//MinLogo 2.png" alt="logo">

    <form class="login-form" action="" method="post">
        <?php 
        
        if (isset($_SESSION['message'])) {
            echo "<p class='error-message'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);  
        }
        ?>
        <label class="form-label" for="email">Email:</label>
        <input class="form-input" placeholder="Votre Mail" type="email" id="email" name="email" required><br><br>
        <label class="form-label" for="password">Mot de passe:</label>
        <input class="form-input" placeholder="Votre mot de passe" type="password" id="password" name="password" required><br><br>
        
        <button class="login-btn" type="submit">Connection</button>
        <a class="forgot-lnk" href="#">Mot de passe oublié ?</a>
    </form>

    <p class="login-txt">Vous n'avez pas de compte ?</p>
    <a href="createAcc.php"><button class="login-btn2">Créer votre compte</button></a>
    <a class="home-lnk" href="index.php">Retour à l'accueil</a>
</body>
</html>