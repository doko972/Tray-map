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

        <section class="trail-create">
            <h2 class="trail-create-ttl">Créez votre parcours</h2>
            <img class="trail-create-img" src="./img//Rectangle 61.png" alt="cycliste">
            <p class="trail-create-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi modi magni
                reprehenderit quibusdam quod deserunt laborum natus cumque harum nisi, quia aut architecto qui dicta
                amet repellendus numquam obcaecati in odio. Illum, blanditiis animi magni harum tempore explicabo alias
                ducimus aspernatur, enim corrupti dolorum doloribus atque delectus! Fugit, aliquid tenetur?</p>
            <button class="trail-create-btn btn">Créer un parcours</button>
        </section>
        <section class="range-container">
            <div class="range-nav">
                <form action="/action_page.php">
                    <input class="range-search" type="text" placeholder="Search.." name="search">
                </form>
            </div>
            <div class="range-options">
                <div class="range-choice">
                    <label for="distance">Distance:</label>
                    <input type="range" id="distance" min="1" max="100"
                        oninput="this.nextElementSibling.value = this.value">
                    <output>100</output> km
                </div>

                <div class="range-choice">
                    <legend>Difficulté:</legend>
                    <input type="radio" id="easy" name="level" value="easy">
                    <label for="easy">Facile</label><br>
                    <input type="radio" id="medium" name="level" value="medium">
                    <label for="medium">Moyen</label><br>
                    <input type="radio" id="hard" name="level" value="hard">
                    <label for="hard">Difficile</label><br>
                </div>

                <div class="range-choice">
                    <legend>Mode:</legend>
                    <input type="radio" id="onfoot" name="class_route" value="onfoot">
                    <label for="onfoot">A Pieds</label><br>
                    <input type="radio" id="bike" name="class_route" value="bike">
                    <label for="bike">Vélo</label><br>
                </div>
                <button class="range-btn btn" type="submit">Rechercher</button>
            </div>
        </section>
        <?php
        $query = $dbCo->query("SELECT id_route, illustration_img, URL, alt, title, distance, difficulty, description
                            FROM illustrer
                                JOIN route USING(id_route)
                                JOIN img USING (id_img)
                                JOIN categorize USING(id_route)
                                JOIN class_route USING(id_class_route)
                            WHERE is_main = 1
                            ORDER BY distance;");
        while ($route = $query->fetch()) {
            echo getHtmlProduct($route);
        }
        ?>
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