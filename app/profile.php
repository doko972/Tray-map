<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_templates.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de profil</title>
    <link rel="stylesheet" href="./file.scss//main.scss">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="top-container">
            <div>
                <p>Profil</p>
                <a href=""><img src="./img/edit.png" alt="éditer"></a>
            </div>
            <img class="profile-img" src="img/profile-photo.png" alt="Photo de l'utulisateur">

        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="./js/burger.js"></script>
</body>

</html>