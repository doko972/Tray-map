<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';


var_dump($_REQUEST);

$dataStrip = stripTagsArray($_REQUEST);

$newRoute = [
  "title" =>  $data['title'],
        "distance" => $data['distance'],
        "difficulty" => $data['difficulty_name'],
        "status" => $data['status'],
        "idPerson" => $data['idUser'],
        "discription" => $data['discription']

]

if ($_REQUEST['action'] === 'createRoute') {


}