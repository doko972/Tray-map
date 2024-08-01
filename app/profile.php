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
    <link rel="stylesheet" href="./scss/main.scss">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="profile-bck">
            <div class="profile-alg">
                <div class="profile-photo">
                    <img class="profile-photo_ff" src="img/profile-photo.png" alt="Photo de l'utulisateur">
                    <button class="profile-photo_btn">Editer le profil</button>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="./js/burger.js"></script>
</body>

</html>