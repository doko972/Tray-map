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
    <title>Trail-Map</title>
    <link rel="stylesheet" href="./file.scss//main.scss">
    <link rel="stylesheet" href="./file.scss//range.css">
</head>

<body>
<?php include 'header.php'; ?>
    <main>
        <section>
            <h1 class="main-ttl">trailshare - <br> la communauté des amateurs de randonnées et de cyclotourisme</h1>
        </section>

        <section class="trail-create">
            <h2 class="trail-create-ttl">Créez votre parcours</h2>
            <img class="trail-create-img" src="./img//Rectangle 61.png" alt="cycliste">
            <p class="trail-create-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi modi magni
                reprehenderit quibusdam quod deserunt laborum natus cumque harum nisi, quia aut architecto qui dicta
                amet repellendus numquam obcaecati in odio. Illum, blanditiis animi magni harum tempore explicabo alias
                ducimus aspernatur, enim corrupti dolorum doloribus atque delectus! Fugit, aliquid tenetur?</p>
            <button class="trail-create-btn btn">Créer un parcours</button>
        </section>
    </main>
    <?php include 'range.php'; ?>
    <?php include 'footer.php'; ?>
    <script src="./js/burger.js"></script>
</body>

</html>