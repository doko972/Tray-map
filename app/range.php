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
                    $classRoutes = getClassRoutes($dbCo);
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
    </div>
</section>