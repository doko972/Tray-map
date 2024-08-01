<?php

echo getHtmlMessages($messages);

echo getHtmlErrors($errors);

?>
<section>
    <div >
        <form class="range-container" action="search-route.php" method="POST">
            <input type="hidden" name="action" value="search">
            <input type="hidden" id="token" name="token" value="<?= $_SESSION['token'] ?>">
            <div class="range-options">
                <input class="search-form" type="text" placeholder="Rechercher votre ville..." name="title">
                <!-- <button type="submit" class="search-btn">
                <img src="img/loupe.png" alt="Recherche" class="search-icon">
             </button> -->
            </div>
            <div class="range-options">
                <div class="range-choice">
                    <div class="range_radio-ad">
                        <label for="distance">Distance</label>
                    </div>
                    <div class="range-slider">
                        <span>0</span>km
                        <input class="range-input" type="range" id="distance" min="0" max="100" oninput="this.nextElementSibling.value = this.value">
                        <output>100</output>+km
                    </div>
                </div>
                <div class="range-choice">
                    <div class="range-choice_md-ld">
                        <legend>Difficulté</legend>
                    </div>
                    <?php
                    $difficulties = getDifficulties($dbCo);
                    foreach ($difficulties as $difficulty) {
                        echo AddsHtmlDifficulty($difficulty);
                    }
                    ?>
                </div>
                <div class="range-choice_md">
                    <div class="range-choice_md-lg">
                        <legend>Mode</legend>
                    </div>
                    <div class="range-choice_rd">
                        <?php
                        $classRoutes = getClassRoutes($dbCo);
                        foreach ($classRoutes as $classRoute) {
                            echo AddsHtmlClassRoute($classRoute);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <button class="range-btn btn" type="submit">Rechercher</button>
    </div>
    </form>
</section>