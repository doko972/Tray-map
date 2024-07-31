<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';

generateToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $query = $dbCo->prepare("SELECT password FROM person WHERE email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // L'utilisateur est connecté
            $_SESSION['email'] = $email;
            header("Location: success.php");
            exit();
        } else {
            // L'email ou le mot de passe est incorrect
            $_SESSION['message'] = "Email ou mot de passe incorrect.";
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de la connexion : " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de connection</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <img src="./img//MinLogo 2.png" alt="logo">
    

    <form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>


<p>Vous n'avez pas de compte ?</p>
<a href="createAcc.php"><button>Créer votre compte</button></a>

<a href="index.php">Retour à l'accueil</a>
</body>
</html>