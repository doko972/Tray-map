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
        <section class="container-bio">
            <div class="profile-bck">

                <img class="profile-img" src="img/profile-photo.png" alt="Image de l'utilisateur">
            </div>
       <h1 class="profile-tte">Paul Martin</h1>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="./js/burger.js"></script>
</body>

</html>