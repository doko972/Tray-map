<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_templates.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trails Show card</title>
    <link rel="stylesheet" href="./file.scss//main.scss">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>

        <section>
            <h1 class="main-ttl">trailshare - <br> la communauté des amateurs de randonnées et de cyclotourisme</h1>
        </section>
        <?php include 'range.php'; ?>
        <?php
        $query = $dbCo->query("SELECT id_route, illustration_img, URL, alt, title, distance, difficulty, description
                            FROM illustrer
                                JOIN route USING(id_route)
                                JOIN img USING (id_img)
                                JOIN categorize USING(id_route)
                                JOIN class_route USING(id_class_route)
                            WHERE is_main = 1 AND status = 1
                            ORDER BY distance;");
        while ($route = $query->fetch()) {
            echo getHtmlProduct($route);
        }
        ?>
    </main>
    <?php include 'footer.php'; ?>
    <script src="./js/burger.js"></script>
</body>

</html>