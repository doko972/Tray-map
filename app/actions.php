<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';

$request = [];
$startRequest="SELECT * FROM route WHERE";
$data = [
    // 'title' => "hello",
    // 'distance' => "5",
    // "id_diffuclty" => "2",
    // // "id_class_route" => "2"


];
if (empty($data)) {
    addError("search_ko");
}

if (isset($data["id_class_route"])) {
    $startRequest = 'SELECT * FROM `route` JOIN categorize
     USING(id_route) WHERE ';
      $request[]='id_class_route  = ' . $data["id_class_route"];
}

if (isset($data['title'])) {

    $request[] = ' title Like ' . "%" . $data['title'] . "%";
}


if (isset($data['distance'])) {

    $request[] = ' distance <= ' . $data['distance'];
}



var_dump($request);
echo $startRequest.implode(' AND ', $request);



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
