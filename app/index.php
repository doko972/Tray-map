<?php
session_start();
include 'includes/_database.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trail-Map</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="header-container">
        <img class="header-logo" src="./img/MinLogo 1.png" alt="logo site">
        <div class="header-right">
            <img src="./img/Generic avatar.png" alt="avatar user">

            <div class="menu-toggle" id="burger-menu">
                <span class="menu-toggle-bar"></span>
            </div>
        </div>
        <nav id="menu">
            <ul class="menu-container">
                <li class="menu-container-itm">
                    <a class="menu-container-lnk" href="#">1er choix</a>
                </li>
                <li class="menu-container-itm">
                    <a class="menu-container-lnk" href="#">2eme choix</a>
                </li>
                <li class="menu-container-itm">
                    <a class="menu-container-lnk" href="#">3eme choix</a>
                </li>
                <li class="menu-container-itm">
                    <a class="menu-container-lnk" href="#">4eme choix</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class="main-ttl">trailshare - <br> la communauté des amateurs de randonnées et de cyclotourisme</h1>
    </main>
    <footer >
        <div class="footer-container">
    <div class="footer-img">
        <img src="./img//MinLogo 1.png" alt="logo">
        <img src="./img/X Logo.png" alt="twitter">
        <img src="./img//Logo Instagram.png" alt="instagram">
        <img src="./img//Logo YouTube.png" alt="youtube">
        <img src="./img//LinkedIn.png" alt="linkedin">
    </div>
        <div class="footer-txt">
            <div class="footer-txt-up">
                <a class="footer-lnk" href="#">Politique de confidentialité</a><br>
                <a class="footer-lnk" href="#">Cookies</a><br>
                <a class="footer-lnk" href="#">Réglement</a>
            </div>
            <div class="footer-txt-dwn">
                <a class="footer-lnk" href="#">Nopus contacter</a><br>
                <a class="footer-lnk" href="#">Foire aux questions</a><br>
                <a class="footer-lnk" href="#">Créer un compte</a><br>
                <a class="footer-lnk" href="#">Signaler un contenu</a>
            </div>
        </div>
    </div>
    </footer>
    <script src="./js/burger.js"></script>
</body>

</html>