<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';
getHtmlMessages($_SESSION);


var_dump($_REQUEST);

$dataStrip = stripTagsArray($_REQUEST);

// $newRoute = [
//     "title" => $data['title'],
//     "distance" =>  numericInt($data['distance']),
//     "difficulty" =>  numericInt($data['difficulty_name']),
//     "status" =>  numericInt($data['status']),
//     // "idPerson" =>  numericInt($data['idUser']),
//     "idPerson" => 1,
//     "discription" => $data['discription']

// ];

$newRoute = [
    "title" =>"caen",
    "distance" =>  20,
    "difficulty" =>  1,
    "status" =>  1,
    // "idPerson" =>  numericInt($data['idUser']),
    "idPerson" => 1,
    "discription" => "best path to walk through caen",
    "timeStamp" => $now = date_create()->format('Y-m-d H:i:s')

];

if ($_REQUEST['action'] === 'createRoute') {

    addNewRouteWithoutImg($dbCo, $newRoute);
    addMessage("Route created");
    exit;
}