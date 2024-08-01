<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';

if (!$_REQUEST['action'] === 'search') {

    addError("referer");
    redirectTo();
}

// preventCSRF();

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trail-Map</title>
    <link rel="stylesheet" href="./file.scss//main.scss">
</head>

<body>
<?php include 'header.php'; ?>
<main>
<?php

if ($_REQUEST['action'] === 'search') {

    $dataStrip = stripTagsArray($_REQUEST);
    $sqlResuest = constructSqlSearchRoute($dataStrip);
    $idRoutes = getRoutesBySearchParam($dbCo, $sqlResuest);
    foreach ($idRoutes as $value) {
        $route = getRouteDetails($dbCo, $value['id_route']);
        echo getHtmlProduct($route[0]);
    }
}
?>
</main>
</body>

