<section class="range-container">
    <div class="range-nav">
        <form action="/action_page.php">
            <input class="range-search" type="text" placeholder="Search.." name="search">
        </form>
    </div>
    <div class="range-options">
        <div class="range-choice">
            <label for="distance">Distance:</label>
            <input type="range" id="distance" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
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