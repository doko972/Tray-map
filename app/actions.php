<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';

$request = "WHERE";
$data = [
    'title' => "hello",
    'distance' => "5"
];
if (empty($data)) {
    echo "it is empty";
    addError("search_ko");
}
if (isset($data['title'])) {

    echo ' title Like ' . "%" . $data['title'] . "%";
}


if (isset($data['distance'])) {

    echo ' distance <= ' . $data['distance'];
}




var_dump(getAllroutes($dbCo));
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
