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
        <section>
            <h1 class="main-ttl">trailshare - <br> la communauté des amateurs de randonnées et de cyclotourisme</h1>
        </section>
        <!--Create select route-->
        <section class="range-container">
            <div class="range-nav">
                <form action="/action_page.php">
                    <input class="range-search" type="text" placeholder="Search.." name="search">
                    <!-- <button type="submit"><i class=""></i></button> -->
                </form>
            </div>
            <form>
                <div class="range-choice">
                    <label for="distance">Distance</label>
                    <p>0km</p>
                    <!-- <input type="range" id="distance" name="distance" min="0" max="100" step="0.01"/> -->
                    <input type="range" value="distance" min="1" max="100"
                        oninput="this.nextElementSibling.value = this.value">
                    <output>100</output>
                    <p>+ km</p>
                </div>
                <div class="range-choice">
                    <p>Difficulté</p>
                    <input type="radio" id="easy" name="level" value="easy">
                    <label for="easy">Facile</label><br>
                    <input type="radio" id="medium" name="level" value="medium">
                    <label for="medium">Moyen</label><br>
                    <input type="radio" id="hard" name="level" value="hard">
                    <label for="hard">Difficile</label><br>
                </div>
                <div class="range-choice">
                    <p>Mode</p>
                    <input type="radio" id="onfoot" name="class_route" value="onfoot">
                    <label for="onfoot">A Pieds</label><br>
                    <input type="radio" id="bike" name="class_route" value="bike">
                    <label for="bike">Vélo</label><br>
                </div>
            </form>
        </section>
        <!--End of Create select route-->
        <section class="trail-create">
            <h2 class="trail-create-ttl">Créez votre parcours</h2>
            <img class="trail-create-img" src="./img//Rectangle 61.png" alt="cycliste">
            <p class="trail-create-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi modi magni
                reprehenderit quibusdam quod deserunt laborum natus cumque harum nisi, quia aut architecto qui dicta
                amet repellendus numquam obcaecati in odio. Illum, blanditiis animi magni harum tempore explicabo alias
                ducimus aspernatur, enim corrupti dolorum doloribus atque delectus! Fugit, aliquid tenetur?</p>
            <button class="trail-create-btn btn">Créer un parcours</button>
        </section>
        <section class="trail-card">

            <img class="trail-card-img" src="./img//route_4-1.webp" alt="clecy">
            <div class="trail-info">
                <p class="trail-card-ttl">CLE Suisse Normande<br> 107 km - Difficile</p>
                <img src="./img//Vector.png" alt="">
            </div>
            <p class="trail-card-txt">Découvrez ce parcours de vélo de 108,7 km à proximité de Cormelles-le-Royal. Ce
                parcours emprunte 82 km de routes et 26,7 km de pistes cyclables. Il présente une ascension cumulée de
                plus de 1160m</p>

            <button class="btn">Voir la fiche parcours</button>
        </section>
        <section class="trail-card">
            <img class="trail-card-img" src="./img//route_1-1.webp" alt="clecy">
            <div class="trail-info">
                <p class="trail-card-ttl">Vallée de L'Aise au départ de Ifs<br> 50 km - Moyen</p>
                <img src="./img//Vector.png" alt="">
            </div>
            <p class="trail-card-txt">Découvrez ce parcours de vélo de 50,2 km à proximité de Ifs. Il présente une
                ascension cumulée de plus de 410m.</p>
            <button class="btn">Voir la fiche parcours</button>
        </section>
        <section class="trail-card">
            <img class="trail-card-img" src="./img//route_4-1.webp" alt="clecy">
            <div class="trail-info">
                <p class="trail-card-ttl">Louvigny / Le Rocreuil<br> 11 km - Facile</p>
                <img src="./img//Walking.png" alt="">
            </div>
            <p class="trail-card-txt">Découvrez ce parcours de marche nordique de 11 km à proximité de Louvigny. Ce
                parcours emprunte 5 km de chemins et 2,2 km de pistes forestières.</p>
            <button class="btn">Voir la fiche parcours</button>
        </section>

        <section class="trail-card">
            <img class="trail-card-img" src="./img//route_4-1.webp" alt="clecy">
            <div class="trail-info">
                <p class="trail-card-ttl">Abbaye d'Ardennes au jardin public de Caen<br> 12.5 km - Moyen</p>
                <img src="./img//Walking.png" alt="">
            </div>
            <p class="trail-card-txt">Découvrez ce parcours de marche de 12,5 km à proximité de
                Saint-Germain-la-Blanche-Herbe. Ce parcours emprunte 9,2 km de routes et 1,3 km de pistes cyclables.
                Prévoyez environ 3 heures et 20 minutes pour réaliser ce parcours.</p>
            <button class="btn">Voir la fiche parcours</button>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-img">
                <div class="footer-logo">
                    <img src="./img//MinLogo 1.png" alt="logo">
                </div>
                <div class="footer-soc-img">
                    <img src="./img/X Logo.png" alt="twitter">
                    <img src="./img//Logo Instagram.png" alt="instagram">
                    <img src="./img//Logo YouTube.png" alt="youtube">
                    <img src="./img//LinkedIn.png" alt="linkedin">
                </div>
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