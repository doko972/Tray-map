<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
// var_dump(getAllroutes($dbCo));
var_dump(getRouteDetails($dbCo,1));

// if (!isset($_REQUEST['action'])) {
//     redirectTo('index.php');
// }

// preventCSRF();

// if (!isset($_REQUEST['action'])=="getAllRoutes") {
//     var_dump(getAllroutes($dbCo));
// }
