<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';

generateToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
        header('Location: createAcc.php');
        exit;
    }

    if (!isset($_POST['terms'])) {
        $_SESSION['message'] = "Vous devez accepter les conditions de confidentialité.";
        header('Location: createAcc.php');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $query = $dbCo->prepare("INSERT INTO person (email, password, create_date, id_role) VALUES (:email, :password, NOW(), 1)");
        $query->execute(['email' => $email, 'password' => $hashedPassword]);

        $_SESSION['message'] = "Compte créé avec succès !";
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $_SESSION['message'] = "Cet email est déjà utilisé.";
        } else {
            $_SESSION['message'] = "Erreur lors de la création du compte : " . $e->getMessage();
        }
    }
    header('Location: success.php');

    exit;
}

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

    <label>
        <input type="checkbox" id="terms" name="terms" required>
        J'accepte les conditions de confidentialité
    </label>

    <button class="register-btn btn" type="submit">Créer le compte</button>
</form>
    <a class="home-lnk" href="index.php">Retour à l'accueil</a>
</body>

</html>