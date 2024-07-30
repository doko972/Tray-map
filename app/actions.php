<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';

$data = [
       'title' => "hello",
       'distance' => "5",
      "id_diffuclty" => "2",
      "id_class_route" => "2"
     ];

var_dump(stripTagsArray($data));

// echo ConstructSqlSearchRoute($data);



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
