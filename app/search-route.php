<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';

$dataStrip = stripTagsArray($_REQUEST);

if ($_REQUEST['action'] === 'search') {
    $sqlResuest = constructSqlSearchRoute($dataStrip);
    $idRoutes = getRoutesBySearchParam($dbCo, $sqlResuest);
    foreach ($idRoutes as $value) {
        $route = getRouteDetails($dbCo, $value['id_route']);
        echo getHtmlProduct($route[0]);
    }

    exit;
}
