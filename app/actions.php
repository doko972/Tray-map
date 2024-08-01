<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';

// if (!isset($_REQUEST['action'])) {
//     redirectTo('index.php');
// }
// var_dump(getRouteDetails($dbCo,1));



// var_dump(getRouteDetails($dbCo,1));

// $route = getRouteDetails($dbCo,1);
// echo getHtmlProduct($route[0]);



// if ($_REQUEST['action'] === 'search') {
//     $dataStrip = stripTagsArray($_REQUEST);
//     $sqlResuest = constructSqlSearchRoute($dataStrip);
//     // var_dump(getRoutesBySearchParam($dbCo, $sqlResuest));
//     $idRoutes = getRoutesBySearchParam($dbCo, $sqlResuest);
//     foreach ($idRoutes as $idRoute) {
//         # code...
//     }

//     exit;
// }




// $data = [
//     // 'title' => "Marcos",
//     // 'distance' => "5",
//     // "difficulty" => 1,
//     "id_class_route" => "2",
// ];



// // $dataInt = paramsToInt($data);
// // var_dump($dataInt);
// var_dump(getRoutesBySearchParam($dbCo, $data));

//  var_dump(stripTagsArray($data));

// var_dump( constructSqlSearchRoute($data)["bind"]);



// var_dump(getAllroutes($dbCo));
// var_dump(getRouteDetails($dbCo,1));

// searchRouteBy($dbCo,'Marcos');

// var_dump(searchRouteByName($dbCo, 'marco'));




// preventCSRF();

// if (!isset($_REQUEST['action'])=="getAllRoutes") {
//     var_dump(getAllroutes($dbCo));
// }