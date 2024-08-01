<section class="range-container">
    <div class="range-nav">
        <form method="post" action="actions.php">
            <!-- //token  dont forget to send token-->
            <input type="hidden" name="action" value="search">
            <input class="range-search" type="text" placeholder="Search.." name="title">
            <div class="range-options">
                <div class="range-choice">
                    <label for="distance">Distance:</label>
                    <input name="distance" type="range" id="distance" min="1" max="100"
                        oninput="this.nextElementSibling.value = this.value">
                    <output>100</output> km
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
            </div>

            <div class="range-choice">
                <div class="range_radio-alg">
                    <legend>Mode:</legend>
                    <?php
                    $classRoutes = getClassRoutes($dbCo);
                    foreach ($classRoutes as $classRoute) {
                        echo AddsHtmlClassRoute($classRoute);
                    }
                    ?>
                </div>
                <button class="range-btn btn" type="submit">Rechercher</button>
            </div>
        </form>
    </div>

    <!-- <div class="range-choice">
            <legend>Difficulté:</legend>
            <div class="range_radio-alg">
                <label for="easy">Facile</label><br>
                <input type="radio" id="easy" name="level" value="easy">
            </div>
            <div class="range_radio-alg">
                <label for="medium">Moyen</label><br>
                <input type="radio" id="medium" name="level" value="medium">
            </div>
            <div class="range_radio-alg">
                <label for="hard">Difficile</label><br>
                <input type="radio" id="hard" name="level" value="hard">
            </div>
        </div>

        <div class="range-choice">
            <legend>Mode:</legend>
            <div class="range_radio-alg">
                <label for="onfoot">A Pieds</label><br>
                <input type="radio" id="onfoot" name="class_route" value="onfoot">
            </div>
            <div class="range_radio-alg">
                <label for="bike">Vélo</label><br>
                <input type="radio" id="bike" name="class_route" value="bike">
            </div>
        </div> -->
    <!-- <button class="range-btn btn" type="submit">Rechercher</button> -->
    </div>
</section>