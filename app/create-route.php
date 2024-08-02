<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_templates.php';
?>


<form class="create-route-form" method="post" action="display-create-route.php">
    <!-- //token  dont forget to send token-->
    <input type="hidden" name="action" value="createRoute">
    <label class="create-route-ttl__label" for="title">Route title</label><br>
    <input class="create-route-ttl__input" type="text" placeholder="ex caen-herouville 5 km.." name="title" required>
    <div class="create-route-path">
        <div class="create-route-path__choice">
            <label class="create-route-path__label" for="distance">Path longer:</label>
            <input class="create-route-path__input" name="distance" type="range" id="distance" min="1" max="100" oninput="this.nextElementSibling.value = this.value" required>
            <output>100</output> km
        </div>

        <div class="create-route-difficulty">
            <legend class="create-route-difficulty__legend" class="create-route-difficulty__legend">Difficulté:</legend>
            <input class="create-route-difficulty__input" type="radio" id="easy" name="difficulty_name" value="1">
            <label class="create-route-difficulty__label" for="easy">Facile</label><br>
            <input class="create-route-difficulty__input" type="radio" id="medium" name="difficulty_name" value="2">
            <label class="create-route-difficulty__label" for="medium">Moyen</label><br>
            <input class="create-route-difficulty__input" type="radio" id="hard" name="difficulty_name" value="3">
            <label class="create-route-difficulty__label" for="hard">Difficile</label><br>
        </div>
        <div class="create-route-mode">
            <legend class="create-route-mode__legend">Mode:</legend>
            <input class="create-route-mode__input" class="create-route-mode" type="radio" id="onfoot" name="class_route" value="1">
            <label class="create-route-mode__label" for="onfoot">A Pieds</label><br>
            <input class="create-route-mode__input" type="radio" id="bike" name="class_route" value="2">
            <label class="create-route-mode__label" for="bike">Vélo</label><br>
        </div>
        <div class="create-route-discription">
            <label for="discription" class="create-route-discription__label">discription</label>

            <textarea class="create-route-discription__txt" id="discription" name="discription" required>
           write a discription for the path.
        </textarea>
        </div>
        <button class="create-route-submit--publish" class="range-btn btn" type="submit" formaction="display-published-route.php">Publish</button>
        <button class="create-route-submit--draft" class="range-btn btn" type="submit" formaction="display-drafted-route.php">Draft</button>
    </div>
</form>

<?php include 'footer.php'; ?>
        <script src="./js/burger.js"></script>
</body>

</html>
