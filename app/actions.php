<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';


// if (!isset($_REQUEST['action'])) {
//     redirectTo('index.php');
// }


if ($_REQUEST['action'] === 'search') {
    $dataStrip = stripTagsArray($_REQUEST);
    var_dump($dataStrip );
    $sqlResuest = constructSqlSearchRoute($dataStrip);
    var_dump($sqlResuest );
    var_dump(getRoutesBySearchParam($dbCo, $sqlResuest));
    exit;
}



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