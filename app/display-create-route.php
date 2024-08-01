<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';


var_dump($_REQUEST);

$dataStrip = stripTagsArray($_REQUEST);

$newRoute = [
    "title" => $data['title'],
    "distance" =>  numericInt($data['distance']),
    "difficulty" =>  numericInt($data['difficulty_name']),
    "status" =>  numericInt($data['status']),
    // "idPerson" =>  numericInt($data['idUser']),
    "idPerson" => 1,
    "discription" => $data['discription']

];

if ($_REQUEST['action'] === 'createRoute') {

    addNewRouteWithoutImg($dbCo, $newRoute);
}