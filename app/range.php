<section>
    <div class="range-container">
        <form class="range-search-dy" action="/action_page.php" method="POST">
            <section>
                <input class="search-form" type="text" placeholder="Rechercher votre ville..." name="search">
                <input type="hidden" name="action" value="search">
                <!-- //token  dont forget to send token-->
                <input type="hidden" name="action" value="search">
                <button type="submit" class="search-btn">
                    <img src="img/loupe.png" alt="Recherche" class="search-icon">
                </button>
            </section>
            <div class="range-options">
                <div class="range-choice">
                    <div class="range_radio-ad">
                        <label for="distance">Distance</label>
                        <input name="distance" type="range" id="distance" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                        <output>100</output> km

                    </div>
                </div>
                <div class="range-choice">
                    <legend>Difficulté:</legend>
                    <?php
                    $difficulties = getDifficulties($dbCo);
                    foreach ($difficulties as $difficulty) {
                        echo AddsHtmlDifficulty($difficulty);
                    }
                    ?>
                </div>

                <div class="range-choice">
                    <legend>Mode:</legend>
                    <?php
                    $classRoutes  = getClassRoutes($dbCo);
                    foreach ($classRoutes as $classRoute) {
                        echo AddsHtmlClassRoute($classRoute);
                    }
                    ?>
                </div>
                <button class="range-btn btn" type="submit">Rechercher</button>
            </div>
            </form>
    </div>
</section>