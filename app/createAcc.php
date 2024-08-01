<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';

generateToken();

processAccountCreation($dbCo)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <img class="register-img" src="./img//MinLogo 2.png" alt="logo">
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p class='message'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>

    <form class="login-form" action="" method="post">
        <label class="form-label" for="email">Email:</label>
        <input class="form-input" placeholder="Votre mail" type="email" id="email" name="email" required><br><br>
        <label class="form-label" for="password">Mot de passe:</label>
        <input class="form-input" placeholder="Entrez un mot de passe" type="password" id="password" name="password" required><br><br>
        <label class="form-label" for="confirm_password">Confirmer le mot de passe:</label>
        <input class="form-input" placeholder="Confirmez le mot de passe" type="password" id="confirm_password" name="confirm_password" required><br><br>
        <button class="register-btn " type="submit">Créer le compte</button>
        <label class="form-label">
            <input type="checkbox" id="terms" name="terms" required>
            J'accepte les conditions de confidentialité
        </label>


    </form>
    <a class="home-lnk" href="index.php">Retour à l'accueil</a>
</body>

</html>