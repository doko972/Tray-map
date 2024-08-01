<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';
getHtmlMessages($_SESSION);


var_dump($_REQUEST);

$data = stripTagsArray($_REQUEST);
$data["status"] = 0;

$newRoute = [
    "title" => $data['title'],
    "distance" =>  $data['distance'],
    "difficulty" =>  $data['difficulty_name'],
    "status" => ($data['status']),
    // "idPerson" =>  numericInt($data['idUser']),
    "idPerson" => 1,
    "discription" => $data['discription'],
    "timeStamp" => $now = date_create()->format('Y-m-d H:i:s')
  
];
exit;

// $newRoute = [
//     "title" =>"caen",
//     "distance" =>  20,
//     "difficulty" =>  1,
//     "status" =>  1,
//     // "idPerson" =>  numericInt($data['idUser']),
//     "idPerson" => 1,
//     "discription" => "best path to walk through caen",
//     "timeStamp" => $now = date_create()->format('Y-m-d H:i:s')

// ];

if ($_REQUEST['action'] === 'createRoute') {

    addNewRouteWithoutImg($dbCo, $newRoute);
    addMessage("Route created");
    exit;
}
