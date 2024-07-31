<?php
session_start();


include 'includes/_database.php';
include 'includes/_config.php';
include 'includes/_functions.php';

generateToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
    header('Location: index.php');

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

    <img src="./img//MinLogo 2.png" alt="logo">
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>

    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Créer le compte</button>


        <a href="index.php">Retour à l'accueil</a>
    </form>
</body>

</html>