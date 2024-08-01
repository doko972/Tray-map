<section>
    <div class="range-container">
        <form class="range-search-dy" action="/action_page.php" method="POST">
            <input class="search-form" type="text" placeholder="Rechercher votre ville..." name="search">
            <input type="hidden" name="action" value="search">
            <!-- //token  dont forget to send token-->
            <input type="hidden" name="action" value="search">
            <button type="submit" class="search-btn">
                <img src="img/loupe.png" alt="Recherche" class="search-icon">
            </button>
        </form>
        <div class="range-options">
            <div class="range-choice">
                <div class="range_radio-ad">
                    <label for="distance">Distance</label>
                </div>

                <div class="range-choice">
                    <legend>Difficulté:</legend>
                    <?php
                    $difficulties = getDifficulties($dbCo);
                    foreach ($difficulties as $difficulty) {
                        echo AddsHtmlDifficulty($difficulty);
                    }
                    ?>
                    <!-- <input type="radio" id="easy" name="difficulty_name" value="1">
                    <label for="easy">Facile</label><br>
                    <input type="radio" id="medium" name="difficulty_name" value="2">
                    <label for="medium">Moyen</label><br>
                    <input type="radio" id="hard" name="difficulty_name" value="3">
                    <label for="hard">Difficile</label><br> -->
                </div>

                <div class="range-choice">
                    <legend>Mode:</legend>
                    <?php
                    $classRoutes  = getClassRoutes($dbCo);
                    foreach ($classRoutes as $classRoute) {
                        echo AddsHtmlClassRoute($classRoute);
                    }
                    ?>
                    <!-- <input type="radio" id="onfoot" name="class_route" value="1">
                    <label for="onfoot">A Pieds</label><br>
                    <input type="radio" id="bike" name="class_route" value="2">
                    <label for="bike">Vélo</label><br> -->
                </div>
                <button class="range-btn btn" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
</section>