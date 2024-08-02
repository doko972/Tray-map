<?php

echo getHtmlMessages($messages);

echo getHtmlErrors($errors);

?>
<section>
    
    <form class="range-container" action="search-route.php" method="POST">
    <input type="hidden" name="action" value="search">
    <input type="hidden" id="token" name="token" value="<?= $_SESSION['token'] ?>">
    <div class="range-options">
        <input class="search-form" type="text" placeholder="Rechercher votre ville..." name="title">
    </div>
    <div class="range-options">
        <div class="range-choice">
            <label class="range-distance-label" for="distance">Distance</label>
            <div class="range-slider">
                <span>0</span>km
                <input class="range-input" type="range" id="distance" min="0" max="100" oninput="this.nextElementSibling.value = this.value">
                <output>100</output>+km
            </div>
        </div>
        <div class="range-choice">
            <legend class="range-difficulty-label">Difficulté</legend>
            <?php
            $difficulties = getDifficulties($dbCo);
            foreach ($difficulties as $difficulty) {
                echo AddsHtmlDifficulty($difficulty);
            }
            ?>
        </div>
        <div class="range-choice">
            <legend class="range-mode-label">Mode</legend>
            <?php
            $classRoutes = getClassRoutes($dbCo);
            foreach ($classRoutes as $classRoute) {
                echo AddsHtmlClassRoute($classRoute);
            }
            ?>
        </div>
    </div>
    <button class="range-btn btn" type="submit">Rechercher</button>
</form>

</section>