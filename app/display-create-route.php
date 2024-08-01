<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';
include 'includes/_templates.php';


var_dump($_REQUEST);

$dataStrip = stripTagsArray($_REQUEST);
if ($_REQUEST['action'] === 'createRoute') {


}