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
        </form>
    </div>
    </div>
</section>