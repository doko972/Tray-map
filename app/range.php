<?php
// include 'includes/_database.php';
// include 'includes/_functions.php';
// include 'includes/_templates.php';

// var_dump(getDifficulties($dbCo));
// var_dump(getClassRoutes($dbCo));
$difficulties =getDifficulties($dbCo);
foreach ( $difficulties as $difficulty) {
   echo displayDifficlty($difficulty);
}
?>

<section class="range-container">
    <div class="range-nav">
        <form method="post" action="actions.php">

            <input class="range-search" type="text" placeholder="Search.." name="title">
            <div class="range-options">
                <div class="range-choice">
                    <label for="distance">Distance:</label>
                    <input name="distance" type="range" id="distance" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                    <output>100</output> km
                </div>

                <div class="range-choice">
                    <legend>Difficulté:</legend>
                    <?php
                    $difficulties =getDifficulties($dbCo);
                    foreach ( $difficulties as $difficulty) {
                       echo displayDifficlty($difficulty);
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
                    <input type="radio" id="onfoot" name="class_route" value="1">
                    <label for="onfoot">A Pieds</label><br>
                    <input type="radio" id="bike" name="class_route" value="2">
                    <label for="bike">Vélo</label><br>
                </div>
                <button class="range-btn btn" type="submit">Rechercher</button>
            </div>
        </form>
    </div>

</section>