<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';

$data = [
    // 'title' => "Marcos",
    // 'distance' => "5"

    "difficulty" => "1",
    "id_class_route" => "1"
];


var_dump (getRoutesBySearchParam($dbCo, $data));

//  var_dump(stripTagsArray($data));

// var_dump( constructSqlSearchRoute($data)["bind"]);



// var_dump(getAllroutes($dbCo));
// var_dump(getRouteDetails($dbCo,1));

// searchRouteBy($dbCo,'Marcos');

// var_dump(searchRouteByName($dbCo, 'marco'));


// if (!isset($_REQUEST['action'])) {
//     redirectTo('index.php');
// }

// preventCSRF();

// if (!isset($_REQUEST['action'])=="getAllRoutes") {
//     var_dump(getAllroutes($dbCo));
// }
